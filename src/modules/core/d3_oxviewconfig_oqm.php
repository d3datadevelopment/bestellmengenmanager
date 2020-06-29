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

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;

/**
 * class d3_oxViewConfig_d3oqm
 */
class d3_oxviewconfig_oqm extends d3_oxviewconfig_oqm_parent
{
    /**
     * @return string
     * @throws \Doctrine\DBAL\DBALException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function getD3MappedThemeId()
    {
        return d3_cfg_mod::get('d3oqm')->getMappedThemeId();
    }
}
