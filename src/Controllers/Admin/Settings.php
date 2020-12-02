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


use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;

/**
 */
class d3_oqm_controllers_admin_settings extends d3_cfg_mod_main
{
    /**
     * @var string
     */
    protected $_sThisTemplate = 'd3_oqm_views_admin_tpl_settings.tpl';

    /**
     * @var string
     */
    protected $_sModId = 'd3oqm';

    /**
     * @var string
     */
    protected $_sMenuItemTitle = 'd3mxd3modules';

    /**
     * @var string
     */
    protected $_sMenuSubItemTitle = 'd3taboqm_settings';


    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $sReturn = parent::render();

        return $sReturn;
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        parent::save();
    }
}
