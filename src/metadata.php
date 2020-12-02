<?php

use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Install\d3install;

$sMetadataVersion = '1.2';

$sModuleId = 'd3oqm';

$aModule = array(
    'id'             => $sModuleId,
    'title'          => 
        '<svg style="height:1em;width:1em"><image xlink:href="https://logos.oxidmodule.com/d3logo.svg" style="height:1em;width:1em" /></svg> '.
        'Bestellmengenmanager',
    'description'    => 'Legen Sie fest, in welchen Mengen bzw. Packungsgr&ouml;&szlig;en Sie ihre Produkte abgeben.' //
        . 'Der Kunde wird bei unpassender Mengenangabe informiert.' //
        . 'Optional wird die korrigierte Menge in den Warenkorb gelegt.' //
        . 'Alle Einstellungen sind im Admin zu setzen.</br>' //
        . 'Wenn das Modul &uuml;ber den Shop aktiviert wurde, muss danach unter:</br>' //
        . '<strong>/D&sup3; Module/Modul-Connector/Modulverwaltung/</strong> das Modul aktiviert werden.',
    'thumbnail'      => 'picture.png',
    'version'        => '5.0.4.1',
    'author'         => 'D&sup3; Data Development',
    'email'          => 'support@shopmodule.com',
    'url'            => 'http://www.oxidmodule.com/',
    'events'         => array(
        'onActivate' => d3install::class . '::checkUpdateStart',
    ),

    'files'          => array(
        'd3_d3oqm_model_handler'            => 'd3/oqm/models/handler.php',
        'd3_oqm_Setup_InstallRoutine'       => 'd3/oqm/Setup/Installroutine.php',
        'd3_oqm_controllers_admin_base'     => 'd3/oqm/Controllers/Admin/Base.php',
        'd3_oqm_controllers_admin_list'     => 'd3/oqm/Controllers/Admin/List.php',
        'd3_oqm_controllers_admin_settings' => 'd3/oqm/Controllers/Admin/Settings.php',
        'd3_oqm_controllers_admin_support'  => 'd3/oqm/Controllers/Admin/Support.php',
    ),

    'templates'      => array(
        'd3_msg_basket_oqm_error.tpl'         => 'd3/oqm/views/tpl/d3_msg_basket_oqm_error.tpl',
        'd3_oqm_views_tpl_script.tpl'         => 'd3/oqm/views/tpl/script.tpl',
        'd3_oqm_views_admin_tpl_settings.tpl' => 'd3/oqm/views/admin/tpl/settings.tpl',
        'd3_oqm_views_tpl_basketitem.tpl'     => 'd3/oqm/views/tpl/basketitem.tpl',
    ),

    'extend'         => array(
        \OxidEsales\Eshop\Application\Model\Article::class   => 'd3/oqm/modules/application/models/d3_oxarticle_oqm',
        \OxidEsales\Eshop\Application\Model\Basket::class    => 'd3/oqm/modules/application/models/d3_oxbasket_oqm',
        \OxidEsales\Eshop\Core\UtilsView::class              => 'd3/oqm/modules/core/d3_oxutilsview_oqm',
        \OxidEsales\Eshop\Core\ViewConfig::class             => 'd3/oqm/modules/core/d3_oxviewconfig_oqm',
    ),

    'blocks'         => array(
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block'    => 'details_productmain_tobasket',
            'file'     => 'views/blocks/details_productmain_tobasket.tpl'
        ],
        [
            // Azure only
            'template' => 'widget/minibasket/minibasket.tpl',
            'block'    => 'widget_minibasket',
            'file'     => 'views/blocks/widget_minibasket.tpl'
        ],
        [
            'template' => 'widget/product/listitem_grid.tpl',
            'block'    => 'widget_product_listitem_grid_tobasket',
            'file'     => 'views/blocks/widget_product_listitem_grid_tobasket.tpl'
        ],
        [
            // Azure only
            'template' => 'widget/product/bargainitem.tpl',
            'block'    => 'widget_product_bargainitem_tobasket',
            'file'     => 'views/blocks/widget_product_bargainitem_tobasket.tpl'
        ],
        [
            // Azure only
            'template' => 'widget/product/bargainitems.tpl',
            'block'    => 'widget_product_bargainitem_tobasket',
            'file'     => 'views/blocks/widget_product_bargainitem_tobasket.tpl'
        ],
        [
            'template' => 'widget/product/listitem_infogrid.tpl',
            'block'    => 'widget_product_listitem_infogrid_tobasket',
            'file'     => 'views/blocks/d3getminamount_input_field.tpl'
        ],
        [
            'template' => 'widget/product/listitem_line.tpl',
            'block'    => 'widget_product_listitem_line_tobasket',
            'file'     => 'views/blocks/widget_product_listitem_line_tobasket.tpl'
        ],
        [
            'template' => 'article_extend.tpl',
            'block'    => 'admin_article_extend_form',
            'file'     => 'views/admin/blocks/admin_article_extend_form.tpl'
        ],
        [
            // Modal?
            'template' => 'layout/header.tpl',
            'block'    => 'header_main',
            'file'     => 'views/blocks/header_main.tpl'
        ],
        [
            // Modal?
            'template' => 'layout/footer.tpl',
            'block'    => 'footer_main',
            'file'     => 'views/blocks/footer_main.tpl'
        ],
        [
            'template' => 'layout/base.tpl',
            'block'    => 'base_js',
            'file'     => 'views/blocks/base_js.tpl'
        ],
        [
            // Azure only
            'template' => 'page/compare/compare.tpl',
            'block'    => 'd3oqm_azure_page_compare_amount',
            'file'     => 'views/blocks/d3oqm_azure_page_compare_amount.tpl'
        ],
        [
            // Azure only
            'template' => 'widget/minibasket/minibasketmodal.tpl',
            'block'    => 'd3oqm_azure_widget_minibasket_minibasketmodal_script',
            'file'     => 'views/blocks/d3oqm_azure_widget_minibasket_minibasketmodal_script.tpl'
        ],
        [
            // Azure only
            'template' => 'widget/product/compareitem.tpl',
            'block'    => 'd3oqm_azure_widget_product_compareitem_amount',
            'file'     => 'views/blocks/d3oqm_azure_widget_product_compareitem_amount.tpl'
        ],
        [
            // Flow only
            'template' => 'page/compare/inc/compareitem.tpl',
            'block'    => 'd3oqm_flow_page_compare_inc_compareitem_amount',
            'file'     => 'views/blocks/d3oqm_flow_page_compare_inc_compareitem_amount.tpl'
        ],
        [
            // Wave only
            'template' => 'page/compare/inc/compareitem.tpl',
            'block'    => 'd3oqm_wave_page_compare_inc_compareitem_amount',
            'file'     => 'views/blocks/d3oqm_wave_page_compare_inc_compareitem_amount.tpl'
        ],
        [
            'template' => 'page/checkout/inc/basketcontents_table.tpl',
            'block'    => 'dd_checkout_inc_basketcontents_table_item_desc',
            'file'     => 'views/blocks/dd_checkout_inc_basketcontents_table_item_desc.tpl'
        ],
        [
            'template' => 'page/checkout/inc/basketcontents_list.tpl',
            'block'    => 'checkout_basketcontents_basketitem_titlenumber',
            'file'     => 'views/blocks/checkout_basketcontents_basketitem_titlenumber.tpl'
        ],
        [
            // Azure only
            'template' => 'page/checkout/inc/basketcontents.tpl',
            'block'    => 'checkout_basketcontents_basketitem_persparam_editable',
            'file'     => 'views/blocks/azure_checkout_basketcontents_basketitem_titlenumber.tpl'
        ],
    ),
    'settings'    => [
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToWave_'.$sModuleId,
            'type' => 'str',
        ],
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToFlow_'.$sModuleId,
            'type' => 'str',
        ],
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToAzure_'.$sModuleId,
            'type' => 'str',
        ],
    ],
);
