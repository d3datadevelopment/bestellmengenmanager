[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    <input type="text" name="am" value="[{d3_oqm_getminamount oxid=$product->getId()}]" size="3" autocomplete="off" class="form-control" title="[{oxmultilang ident="QUANTITY"}]">
[{else}]
    [{$smarty.block.parent}]
[{/if}]




