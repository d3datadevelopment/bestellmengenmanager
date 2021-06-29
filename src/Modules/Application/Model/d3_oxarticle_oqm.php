<?php
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

namespace D3\Oqm\Modules\Application\Model;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\Oqm\Application\Model\handler;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Registry;

/**
 * Class d3_oxarticle_oqm
 *
 * @package D3\Oqm\Modules\Application\Model
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
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function save()
    {
        startProfile(__METHOD__);
        $oD3CfgMod = d3_cfg_mod::get(handler::D3OQMMODID);

        $assign = [];
        if ($oD3CfgMod && $oD3CfgMod->isActive()) {
            foreach ($this->_aFieldNames as $sName => $sVal) {
                // we work with values 0 and NULL in the database. We have to react on these values.
                // We convert empty strings and false values to NULL
                // all fields with 'd3oqm' are affected
                if (stripos($sName, 'd3oqm') !== false && trim($this->getFieldData($sName)) == '') {
                    $assign[$sName] = null;
                }
            }
        }

        $this->assign($assign);

        stopProfile(__METHOD__);

        return parent::save();
    }

    /**
     * @param array $aRecord
     *
     * @return null|void
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
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
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function hasD3OQMAvailableOptions()
    {
        $oD3CfgMod = d3_cfg_mod::get(handler::D3OQMMODID);

        if (false == $oD3CfgMod || false == $oD3CfgMod->isActive()) {
            return false;
        }

        return (bool)count($this->getD3OQMArticleOptions());
    }

    /**
     * Returns an array with all available options for this article.
     *
     * @return array
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function getD3OQMArticleOptions()
    {
        startProfile(__METHOD__);
        $modId        = handler::D3OQMMODID;
        $aOptionArray = array();
        $oD3CfgMod    = d3_cfg_mod::get($modId);
        if (false == $oD3CfgMod || false == $oD3CfgMod->isActive()) {
            return $aOptionArray;
        }

        $aTmpOptions = handler::getInstance()->getOptionFieldNames();

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
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function isD3OQMRestHandlingActive()
    {
        $oD3CfgMod = d3_cfg_mod::get(handler::D3OQMMODID);
        if (false == $oD3CfgMod || false == $oD3CfgMod->isActive()) {
            return false;
        }

        if (false == Registry::getConfig()->getConfigParam('blUseStock')
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
