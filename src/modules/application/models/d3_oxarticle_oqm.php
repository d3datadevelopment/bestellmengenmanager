<?php

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use OxidEsales\Eshop\Core\Field;

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @package orderQuantityManager
 * @name d3_oxarticle_oqm
 */
class d3_oxarticle_oqm extends d3_oxarticle_oqm_parent
{

    /**
     * Extended method of oxarticle::save()
     * We differ between zero and NULL values.
     * Empty string will be converted to NULL value.
     * Zero = 0 will not converted.
     *
     * @see oxarticle::save()
     * @return bool
     * @throws \D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException
     * @throws \D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception
     * @throws \Doctrine\DBAL\DBALException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     * @throws \OxidEsales\Eshop\Core\Exception\StandardException
     */
    public function save()
    {
        startProfile(__METHOD__);
        $oD3CfgMod = d3_cfg_mod::get(d3_d3oqm_model_handler::D3OQMMODID);

        if ($oD3CfgMod && $oD3CfgMod->isActive()) {
            foreach ($this->_aFieldNames as $sName => $sVal) {
                $sLongName = $this->_getFieldLongName($sName);
                // we work with values 0 and NULL in the database. We have to react on these values.
                // We convert empty strings and false values to NULL
                // all fields with 'd3oqm' are affected
                if (stripos($sLongName, 'd3oqm') !== false && trim($this->$sLongName->value) == '') {
                    $this->$sLongName->value = null;
                }
            }
        }
        stopProfile(__METHOD__);

        return parent::save();
    }

    /**
     * @param array $aRecord
     *
     * @return null|void
     * @throws \D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException
     * @throws \D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception
     * @throws \Doctrine\DBAL\DBALException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     * @throws \OxidEsales\Eshop\Core\Exception\StandardException
     */
    public function assign($aRecord)
    {
        parent::assign($aRecord);

        if (false == $this->hasD3OQMAvailableOptions()) {
            return;
        }
        startProfile(__METHOD__);

        if (false == $this->isD3OQMRestHandlingActive()) {
            return;
        }

        $stock = $this->getFieldData('oxstock'); // 7

        if ($this->getFieldData('d3oqm_minimum') > $stock || $this->getFieldData('d3oqm_package') > $stock) {
            $this->_setD3RestValue($stock, 'd3oqm_minimum');
            $this->_setD3RestValue($stock, 'd3oqm_maximum');
            $this->_setD3RestValue($stock, 'd3oqm_package');
        }

        stopProfile(__METHOD__);
    }

    /**
     * check if this article has avaible options.
     *
     * @return bool
     * @throws \D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException
     * @throws \D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception
     * @throws \Doctrine\DBAL\DBALException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     * @throws \OxidEsales\Eshop\Core\Exception\StandardException
     */
    public function hasD3OQMAvailableOptions()
    {
        $oD3CfgMod = d3_cfg_mod::get(d3_d3oqm_model_handler::D3OQMMODID);

        if (false == $oD3CfgMod || false == $oD3CfgMod->isActive()) {
            return false;
        }

        return (bool)count($this->getD3OQMArticleOptions());
    }

    /**
     * Returns an array with all available options for this article.
     *
     * @return array
     * @throws \D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException
     * @throws \D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception
     * @throws \Doctrine\DBAL\DBALException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     * @throws \OxidEsales\Eshop\Core\Exception\StandardException
     */
    public function getD3OQMArticleOptions()
    {
        startProfile(__METHOD__);
        $modId        = d3_d3oqm_model_handler::D3OQMMODID;
        $aOptionArray = array();
        $oD3CfgMod    = d3_cfg_mod::get($modId);
        if (false == $oD3CfgMod || false == $oD3CfgMod->isActive()) {
            return $aOptionArray;
        }

        $aTmpOptions = d3_d3oqm_model_handler::getInstance()->getOptionFieldNames();

        foreach ($aTmpOptions as $sOptionName) {
            $sOptionValue = $this->getFieldData($sOptionName);

            if (false == empty($sOptionValue)) {
                $aOptionArray[$sOptionName] = $sOptionValue;
            }
        }
        stopProfile(__METHOD__);

        return $aOptionArray;
    }

    /**
     * returns the information if the article is ready for the rest handling
     *
     *
     * @return bool
     * @throws \D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException
     * @throws \D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception
     * @throws \Doctrine\DBAL\DBALException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     * @throws \OxidEsales\Eshop\Core\Exception\StandardException
     */
    public function isD3OQMRestHandlingActive()
    {
        $oD3CfgMod = d3_cfg_mod::get(d3_d3oqm_model_handler::D3OQMMODID);
        if (false == $oD3CfgMod || false == $oD3CfgMod->isActive()) {
            return false;
        }

        if (false == $this->getConfig()->getConfigParam('blUseStock')
            || $this->isAdmin()
            || false == $oD3CfgMod->getValue('useRemainingStock')
        ) {
            return false;
        }

        // Fremdlager + Standard kann immer bestellt werden (kein Resthandling notwendig)
        if (4 == $this->getFieldData('oxstockflag') || 1 == $this->getFieldData('oxstockflag')) {
            return false;
        }

        return true;
    }

    /**
     * @param $stock
     * @param $sOptionName
     *
     */
    protected function _setD3RestValue($stock, $sOptionName)
    {
        $sLongName          = $this->_getFieldLongName($sOptionName);
        $this->{$sLongName} = oxNew(Field::class, $stock, Field::T_RAW);
    }

}
