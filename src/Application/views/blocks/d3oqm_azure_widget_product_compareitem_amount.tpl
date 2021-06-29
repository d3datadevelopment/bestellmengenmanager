[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    <input type="text" name="am" value="[{d3_oqm_getminamount oxid=$product->getId()}]" size="3" autocomplete="off" class="textbox" title="[{ oxmultilang ident="QUANTITY" suffix="COLON" }]">
[{else}]
    [{$smarty.block.parent}]
[{/if}]

