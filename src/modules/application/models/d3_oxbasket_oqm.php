<?php

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Registry;

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @package orderQuantityManager
 * @name d3_oxbasket_oqm
 */
class d3_oxbasket_oqm extends d3_oxbasket_oqm_parent
{
    /**
     * Session based message handler
     *
     * @var array
     */
    protected $_aD3OQMDrifts = array();

    /**
     * Adds user item to basket. Returns oxbasketitem object if adding succeded
     *
     * @param string $sProductID       id of product
     * @param float  $sAmount          product amount
     * @param array  $aSel             product select lists (default null)
     * @param array  $aPersParam       product persistent parameters (default null)
     * @param bool   $blOverride       marker to acumulate passed amount or renew (default false)
     * @param bool   $blBundle         marker if product is bundle or not (default false)
     * @param string $sOldBasketItemId id if old basket item if to change it
     *
     * @return object
     *
     * @throws \OxidEsales\Eshop\Core\Exception\OutOfStockException
     * @throws \D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception
     * @throws \OxidEsales\Eshop\Core\Exception\ArticleInputException
     * @throws \OxidEsales\Eshop\Core\Exception\NoArticleException
     * @throws \OxidEsales\Eshop\Core\Exception\ObjectException
     * @throws object
     */
    public function addToBasket(
        $sProductID,
        $sAmount,
        $aSel = null,
        $aPersParam = null,
        $blOverride = false,
        $blBundle = false,
        $sOldBasketItemId = null
    ) {

        $oD3CfgMod = d3_cfg_mod::get(d3_d3oqm_model_handler::D3OQMMODID);
        /** @var Module $oModule */
        $oModule = oxNew(Module::class);


        //is module inactive or amount is zero or article is bundle article
        if (false == $oD3CfgMod
            || false == $oD3CfgMod->isActive()
            || false == $oModule->load(d3_d3oqm_model_handler::D3OQMMODID)
            || false == $oModule->isActive()
            || empty($sAmount)
            || $blBundle != false
        ) {

            return parent::addToBasket(
                $sProductID,
                $sAmount,
                $aSel,
                $aPersParam,
                $blOverride,
                $blBundle,
                $sOldBasketItemId
            );
        }
        startProfile(__METHOD__);

        $sNewAmount = $sAmount;
        $dAmount    = d3_d3oqm_model_handler::convertStrToFloat($sAmount);
        $dOldAmount = 0;
        $sBasketId  = $this->getItemKey($sProductID, $aSel, $aPersParam, $blBundle);

        //get Article and load it
        /** @var $oArticle d3_oxarticle_oqm */
        $oArticle = oxNew('oxarticle');
        if ($oArticle->load($sProductID)) {
            $oD3OQMHandler = d3_d3oqm_model_handler::getInstance();
            $oD3OQMHandler->setCurrentArticle($oArticle);

            // get old amount from basket
            if ($oArticle->hasD3OQMAvailableOptions()) {
                if ($aBasketItems = $this->getContents()) {
                    /** @var $oBasketItem \OxidEsales\Eshop\Application\Model\BasketItem */
                    if ($oBasketItem = $aBasketItems[$sBasketId]) {
                        $dOldAmount = $oBasketItem->getAmount();
                    }
                }

                $aConstellation = array(
                    'dAddedAmount'     => $dAmount,
                    'dOldAmount'       => $dOldAmount,
                    'basketId'         => $sBasketId,
                    'aSel'             => $aSel,
                    'aPersParam'       => $aPersParam,
                    'blOverride'       => $blOverride,
                    'blBundle'         => $blBundle,
                    'sOldBasketItemId' => $sOldBasketItemId,

                );

                $blOldOverRide = $blOverride;

                $sNewAmount = $oD3OQMHandler->validateAmount($aConstellation);
                $blOverride = true;

                if ($sNewAmount > 0 && false == $blOldOverRide && $dOldAmount != $sNewAmount) {
                    Registry::getSession()->setVariable('blAddedNewItem', true);
                }

                $this->_aD3OQMDrifts = d3_d3oqm_model_handler::getInstance()->getDrifts();
                $this->getSession()->setVariable('_aD3OQMDrifts', serialize($this->_aD3OQMDrifts));
            }
        }

        stopProfile(__METHOD__);

        return parent::addToBasket(
            $sProductID,
            $sNewAmount,
            $aSel,
            $aPersParam,
            $blOverride,
            $blBundle,
            $sOldBasketItemId
        );
    }

    /**
     * Simple Wrapper for the drifts
     *
     * @return array
     */
    public function getD3OQMDrifts()
    {
        return unserialize($this->getSession()->getVariable('_aD3OQMDrifts'));
    }

    /**
     * Simple Wrapper for the drifts
     *
     */
    public function resetD3OQMDrifts()
    {
        d3_d3oqm_model_handler::getInstance()->resetDrifts();
        $this->getSession()->deleteVariable('_aD3OQMDrifts');
    }

}
