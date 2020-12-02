[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    [{assign var="d3ThemeId" value=$oViewConf->getD3MappedThemeId()}]
    [{if $d3ThemeId === 'azure'}]
        <div class="priceBlock">
            [{oxhasrights ident="TOBASKET"}]
            [{$smarty.capture.product_price}]
            [{if !$blShowToBasket}]
                <a href="[{$_productLink}]" class="toCart button">[{oxmultilang ident="MORE_INFO"}]</a>
            [{else}]
                [{assign var="listType" value=$oView->getListType()}]
                [{d3_oqm_getminamount product=$product assign="d3OqmGetminamount"}]
                <a href="[{$oView->getLink()|oxaddparams:"listtype=`$listType`&amp;fnc=tobasket&amp;aid=`$product->oxarticles__oxid->value`&amp;am=`$d3OqmGetminamount`"}]"
                   class="toCart button" title="[{oxmultilang ident="TO_CART"}]">[{oxmultilang ident="TO_CART"}]</a>
            [{/if}]
            [{/oxhasrights}]
        </div>
    [{elseif $d3ThemeId === 'flow' || $d3ThemeId === 'wave'}]
        [{$smarty.block.parent}]
        <input type="hidden" name="am" value="[{d3_oqm_getminamount product=$product}]">
    [{/if}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
