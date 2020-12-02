<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

use OxidEsales\Eshop\Core\Registry;

/**
 * Class d3_oxutilsview_oqm
 */
class d3_oxutilsview_oqm extends d3_oxutilsview_oqm_parent
{
    /**
     * @param smarty $oSmarty
     *
     * @return null|void
     * @throws \OxidEsales\EshopCommunity\Core\Exception\FileException
     */
    protected function _fillCommonSmartyProperties($oSmarty)
    {
        parent::_fillCommonSmartyProperties($oSmarty);

        $oSmarty->plugins_dir[] = Registry::getConfig()
                ->getActiveView()->getViewConfig()->getModulePath('d3oqm')
            . 'core/smarty/plugins';
    }
}
