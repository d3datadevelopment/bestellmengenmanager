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

namespace D3\Oqm\Modules\Application\Model
{

    use OxidEsales\Eshop\Application\Model\Article;
    use OxidEsales\Eshop\Application\Model\Basket;

    class d3_oxarticle_oqm_parent extends Article {}

    class d3_oxbasket_oqm_parent extends Basket {}
}

namespace D3\Oqm\Modules\Core
{

    use OxidEsales\Eshop\Core\UtilsView;
    use OxidEsales\Eshop\Core\ViewConfig;

    class d3_oxviewconfig_oqm_parent extends ViewConfig {}

    class d3_oxutilsview_oqm_parent extends UtilsView {}
}
