[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    [{assign var="d3ThemeId" value=$oViewConf->getD3MappedThemeId()}]
    [{if $d3ThemeId === 'azure'}]
        [{if !( $_product->getVariantsCount() || $_product->hasMdVariants() || ($oViewConf->showSelectListsInList() && $_product->getSelections(1)) )}]
            [{d3_oqm_getminamount product=$_product assign="d3OqmGetminamount"}]
            <a href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=start" params="fnc=tobasket&amp;aid=`$_product->oxarticles__oxid->value`&amp;am=`$d3OqmGetminamount`"}]" class="toCart button" title="[{oxmultilang ident="TO_CART"}]">[{oxmultilang ident="TO_CART"}]</a>
        [{else}]
            <a href="[{$_product->getMainLink()}]" class="toCart button">[{oxmultilang ident="MORE_INFO"}]</a>
        [{/if}]
      [{elseif $d3ThemeId === 'flow' || $d3ThemeId === 'wave'}]
        [{$smarty.block.parent}]
        <input type="hidden" name="am" value="[{d3_oqm_getminamount product=$product}]">
    [{/if}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
