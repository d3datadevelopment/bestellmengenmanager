<?php

namespace D3\Oqm\Setup;

use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Installwizzard\d3installconfirmmessage;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;

/**
 * Class d3_oqm_Setup_InstallRoutine
 *
 */
class Installroutine extends d3install_updatebase
{
    // Standardwert fuer checkModCfgSameRevision() und updateModCfgSameRevision()
    public $sModKey = 'd3oqm';
    public $sModName = 'D3 Bestellmengen Manager';
    public $sModVersion = '5.0.4.3';
    public $sModRevision = '5043';
    public $sBaseConf = 'yp6v2==eUVPTnZHZktXRnR5SGJRU0JwRHZMTmlnNTlBK2FBL2wvWU16bXIvN1c0c1VuR1JVbFJOQ3pPZ
kZMVFZYTzJCL2d1VTJUUnlZQWF1eXNueHZoVzJMKzlJb2Z1cDR6OVJobllFSWpOVWtpVlFta2UwUmZhM
zVvMDlLY2hWMi84RFByZFVQZWZLYWdDQ2tMNUZ4NHJqQlhhSktqTUc5WGhqT01XakdGSXJLZ0tzZXFmN
1ZFbzRPNXR5a2JoRlp0WE04a2srcDJ3WVFWRVMzb0xWTytaSkdyckNLMWVSZnZzV3lDYWZQeTU1QVkrc
Fl1OUw0aFFETml6MjVBRWZ0bHVieEoxc0UzdUFFSDBtTFNyZGZOZ2ZWSllSdHhqN1lsdjZYTjViVzJIW
kwzZ2pvOWJWTjVFSUhmOGltaWxSSDNwWkQ=';

    public $sBaseValue = '';
    public $sMinModCfgVersion = '5.3.0.0';

    // auszufuehrende Check- und Updateanweisungen in auszufuehrender Reihenfolge
    protected $_aUpdateMethods = array(
        array(
            'check' => 'checkModCfgItemExist',
            'do'    => 'updateModCfgItemExist'
        ),
        array(
            'check' => 'checkWrongTemplateBlock',
            'do'    => 'fixWrongTemplateBlock',
        ),
        array(
            'check' => 'hasOldOxmoduleInOxtplblocks',
            'do'    => 'fixOldOxmoduleInOxtplblocks',
        ),
        array(
            'check' => 'checkFields',
            'do'    => 'fixFields'
        ),
        array(
            'check' => 'checkIndizes',
            'do'    => 'fixIndizes'
        ),
        array(
            'check' => 'hasInitialTypeField',
            'do'    => 'updateInitialTypeField',
        ),
        array(
            'check' => 'hasInitialValueField',
            'do'    => 'updateInitialValueField',
        ),
        array(
            'check' => 'hasOldSmartyFiles',
            'do'    => 'messageOldSmartyFiles',
        ),
        array(
            'check' => 'checkModCfgSameRevision', // prueft auf nachgezogene Revisionsnummer und uebertraegt diese ggf.
            'do'    => 'updateModCfgSameRevision'
        ),
    );

    /***** Standardwerte fuer aufgerufene Funktionen ********************************************/

    // alle zu aktualisierenden Module, verwendet nicht onDeactivate-Handler
    protected $_aRefreshMetaModuleIds = array('d3oqm');

    // Standardwerte fuer checkFields(), _addTable() und fixFields()
    public $aFields = array(
        array(
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3OQM_PACKAGE',
            'sType'       => 'DOUBLE',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'd3oqm - Bestellmengenmanager Verpackungseinheit',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        array(
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3OQM_MINIMUM',
            'sType'       => 'DOUBLE',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'd3oqm - Bestellmengenmanager Minimum',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        array(
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3OQM_MAXIMUM',
            'sType'       => 'DOUBLE',
            'blNull'      => true,
            'sDefault'    => 'NULL',
            'sComment'    => 'd3oqm - Bestellmengenmanager Maximum',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
    );

    // Standardwerte fuer checkIndizes() und fixIndizes()
    public $aIndizes = array(
        array(
            'sTableName'  => 'oxarticles',
            'sType'       => 'INDEX',
            'sName'       => 'D3OQMINDEX',
            'aFields'     => array(
                'D3OQM_PACKAGE' => 'D3OQM_PACKAGE',
                'D3OQM_MAXIMUM' => 'D3OQM_MAXIMUM',
                'D3OQM_MINIMUM' => 'D3OQM_MINIMUM',
            ),
            'blMultilang' => false,
        ),
    );

    /**
     * check if wrong template block
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkWrongTemplateBlock()
    {
        $oShop  = $this->getActShop();
        $aWhere = array(
            'oxfile'      => 'd3GetMinAmout_input_field',
            'oxblockname' => 'widget_product_listitem_grid_tobasket',
            'oxshopid'    => $oShop->getId(),
        );

        // NOTE: _checkTableItemExist returns true if not exsist
        return !$this->_checkTableItemNotExist('oxtplblocks', $aWhere);
    }

    /**
     * fix Version 3.2.0.1
     *
     * @return bool
     * @throws DBALException
     * @throws ConnectionException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixWrongTemplateBlock()
    {
        $blRet = false;

        if ($this->checkWrongTemplateBlock()) {
            $oShop = $this->getActShop();

            $aWhere = array(
                'oxfile'      => 'd3GetMinAmout_input_field',
                'oxblockname' => 'widget_product_listitem_grid_tobasket',
                'oxshopid'    => $oShop->getId(),
            );

            // abwaertskompatibel auch mit Feldname als Key (siehe "OXNAME"),
            // dann jedoch keine Duplikatentfernung bei mehrfacher Feldzuweisung.
            $aInsertFields = array(
                array(
                    // Feldname ggf. sprachspezifisch mit _getLangAbbrFieldName()
                    'fieldname'     => 'OXFILE',
                    // Feldinhalt
                    'content'       => 'widget_product_listitem_grid_tobasket.tpl',
                    // bei Update, Inhalt wird ueberschrieben
                    'force_update'  => true,
                    // Inhalt muss gequoted werden
                    'use_quote'     => true,
                    // Multilang-Felder auf Basis dieses Feldes werden bei INSERT mit diesem Wert gefuellt,
                    // wenn diese in der Liste nicht anderweitig belegt sind
                    'use_multilang' => false,
                ),
            );
            $aRet          = $this->_updateTableItem2('oxtplblocks', $aInsertFields, $aWhere);
            $blRet         = $aRet['blRet'];
        }

        return $blRet;
    }

    /**
     * check if 'd3/d3oqm' is in oxmodule
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function hasOldOxmoduleInOxtplblocks()
    {
        $oShop = $this->getActShop();

        $aWhere = array(
            'oxmodule' => 'd3/d3oqm',
            'oxshopid' => $oShop->getId(),
        );

        // NOTE: _checkTableItemExist returns true if not exsist
        return !$this->_checkTableItemNotExist('oxtplblocks', $aWhere);
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixOldOxmoduleInOxtplblocks()
    {
        if ($this->hasOldOxmoduleInOxtplblocks()) {
            $oShop = $this->getActShop();
            $aQueries = array(
                "DELETE FROM oxtplblocks WHERE oxmodule = 'd3/d3oqm' AND  oxshopid = '{$oShop->getId()}';"
            );

            return $this->_executeMultipleQueries($aQueries);
        }

        return true;
    }

    /**
     * @param null $iDirectNumber
     *
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasInitialTypeField($iDirectNumber = null)
    {
        $blReturn = false;
        if ($iDirectNumber === null) {
            for ($i = 0; $i <= 2; $i++) {
                $iNumber  = $i == 0 ? null : $i;
                $blReturn = $this->_checkTableFieldExist('oxarticles', "d3_ve_type$iNumber");
                if ($blReturn) {
                    return $blReturn;
                }
            }
        } else {
            $iNumber  = $iDirectNumber == 0 ? null : $iDirectNumber;
            $blReturn = $this->_checkTableFieldExist('oxarticles', "d3_ve_type$iNumber");
        }

        return $blReturn;
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateInitialTypeField()
    {
        $blReturn = false;

        for ($i = 0; $i <= 2; $i++) {
            if ($this->hasInitialTypeField($i)) {
                $iNumber  = $i == 0 ? null : $i;
                $blReturn = $this->_updateInitialTypeField($iNumber);
            }
        }

        return $blReturn;
    }

    /**
     * @param null $iNumber
     *
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _updateInitialTypeField($iNumber = null)
    {
        if ($this->hasInitialTypeField($iNumber)) {
            $aQueries = array(
                "UPDATE oxarticles SET D3OQM_MINIMUM = IF(d3_ve_value$iNumber = 0, NULL, d3_ve_value$iNumber) WHERE d3_ve_type$iNumber = 'minimum' AND D3OQM_MINIMUM = 0;",
                "UPDATE oxarticles SET D3OQM_MAXIMUM = IF(d3_ve_value$iNumber = 0, NULL, d3_ve_value$iNumber) WHERE d3_ve_type$iNumber = 'maximum' AND D3OQM_MAXIMUM = 0;",
                "UPDATE oxarticles SET D3OQM_PACKAGE = IF(d3_ve_value$iNumber = 0, NULL, d3_ve_value$iNumber) WHERE d3_ve_type$iNumber = 'package' AND D3OQM_PACKAGE = 0;",
                "ALTER TABLE `oxarticles` DROP `d3_ve_type$iNumber`;",
            );
            $blReturn = $this->_executeMultipleQueries($aQueries);
            $this->_getDatabaseHandler()->resetFieldCache();
            if ($blReturn) {
                $this->_blRequireViewUpdate = true;
            }

            return $blReturn;
        }

        return true;
    }

    /**
     * definition array see fixFields
     *
     *
     * @return bool
     * @throws DBALException
     * @throws ConnectionException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixFields()
    {
        $blReturn = parent::fixFields();
        if ($blReturn) {
            $this->_blRequireViewUpdate = true;
        }

        return $blReturn;
    }

    /**
     * @param null $iDirectNumber
     *
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasInitialValueField($iDirectNumber = null)
    {
        $blReturn = false;
        if ($iDirectNumber === null) {
            for ($i = 0; $i <= 2; $i++) {
                $iNumber  = $i == 0 ? null : $i;
                $blReturn = $this->_checkTableFieldExist('oxarticles', "d3_ve_value$iNumber");
                if ($blReturn) {
                    return $blReturn;
                }
            }
        } else {
            $iNumber  = $iDirectNumber == 0 ? null : $iDirectNumber;
            $blReturn = $this->_checkTableFieldExist('oxarticles', "d3_ve_value$iNumber");
        }

        return $blReturn;
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateInitialValueField()
    {
        $blReturn = false;

        for ($i = 0; $i <= 2; $i++) {
            if ($this->hasInitialValueField($i)) {
                $iNumber  = $i == 0 ? null : $i;
                $blReturn = $this->_updateInitialValueField($iNumber);
            }
        }

        return $blReturn;
    }

    /**
     * @param null $iNumber
     *
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _updateInitialValueField($iNumber = null)
    {
        if ($this->hasInitialValueField($iNumber)) {
            $aQueries = array(
                "ALTER TABLE `oxarticles` DROP `d3_ve_value$iNumber`;"
            );
            $blReturn = $this->_executeMultipleQueries($aQueries);
            $this->_getDatabaseHandler()->resetFieldCache();
            if ($blReturn) {
                $this->_blRequireViewUpdate = true;
            }

            return $blReturn;
        }

        return true;
    }

    public function hasOldSmartyFiles()
    {

        $file = Registry::getConfig()->getConfigParam('sShopDir') . 'core/smarty/plugins/function.d3_oqm_getMinAmount.php';

        if( is_file($file)) {
            return true;
        }
        return false;
    }

    public function messageOldSmartyFiles()
    {
        $file = Registry::getConfig()->getConfigParam('sShopDir') . 'core/smarty/plugins/function.d3_oqm_getMinAmount.php';
        /** @var d3installconfirmmessage $oInstallConfirmMessage */
        $oInstallConfirmMessage = oxNew(d3installconfirmmessage::class, $this);
        $oInstallConfirmMessage->confirmCustomMessage(
            Registry::getLang()->translateString('D3OQM_INSTALLATION_OLDSMARTYFILEFOUND').  $file
        );
    }
}
