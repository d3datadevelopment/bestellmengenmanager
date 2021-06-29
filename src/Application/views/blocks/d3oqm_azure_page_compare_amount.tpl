[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    <input type="hidden" name="am" value="[{d3_oqm_getminamount product=$product}]">
[{else}]
    [{$smarty.block.parent}]
[{/if}]
