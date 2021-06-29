[{if $d3oqmError}]
    <div class="msg" style="border-color: #D11104;">
        <img src="[{$oViewConf->getImageUrl('d3_att_sign.png')}]" style="text-align: left; margin-right: 3px;">
        <div><strong>[{oxmultilang ident="D3OQM_ERROR_HEADLINE"}]</strong></div><br>
        <div>
        [{if $d3oqmError->sD3oqmError_Type == 'minimum'}]
            [{oxmultilang ident="D3OQM_MINIMUM_DESC1"}]<b><a href="[{$VEArticle->getLink()}]">[{$d3oqmError->sD3oqmError_ProdName}][{if $d3oqmError->sD3oqmError_ProdVar}] [{$d3oqmError->sD3oqmError_ProdVar}][{/if}]</a></b>[{oxmultilang ident="D3OQM_MINIMUM_DESC2"}]<b>[{$d3oqmError->sD3oqmError_ProdVE}] [{if $d3oqmError->sD3oqmError_ProdUnit}][{$d3oqmError->sD3oqmError_ProdUnit}][{else}][{oxmultilang ident="D3OQM_MINIMUM_DESC3"}][{/if}]</b>.
        [{elseif $d3oqmError->sD3oqmError_Type == 'maximum'}]
        	[{oxmultilang ident="D3OQM_MAXIMUM_DESC1"}]<b><a href="[{$VEArticle->getLink()}]">[{$d3oqmError->sD3oqmError_ProdName}][{if $d3oqmError->sD3oqmError_ProdVar}] [{$d3oqmError->sD3oqmError_ProdVar}][{/if}]</a></b>[{oxmultilang ident="D3OQM_MAXIMUM_DESC2"}]<b>[{$d3oqmError->sD3oqmError_ProdVE}] [{if $d3oqmError->sD3oqmError_ProdUnit}][{$d3oqmError->sD3oqmError_ProdUnit}][{else}][{oxmultilang ident="D3OQM_MAXIMUM_DESC3"}][{/if}]</b>.
        [{else}]
            [{oxmultilang ident="D3OQM_PACKAGE_DESC1"}]<b><a href="[{$VEArticle->getLink()}]">[{$d3oqmError->sD3oqmError_ProdName}][{if $d3oqmError->sD3oqmError_ProdVar}] [{$d3oqmError->sD3oqmError_ProdVar}][{/if}]</a></b>[{oxmultilang ident="D3OQM_PACKAGE_DESC2"}]<b>[{$d3oqmError->sD3oqmError_ProdVE}] [{if $d3oqmError->sD3oqmError_ProdUnit}][{$d3oqmError->sD3oqmError_ProdUnit}][{else}][{oxmultilang ident="D3OQM_PACKAGE_DESC3"}][{/if}]</b>[{oxmultilang ident="D3OQM_PACKAGE_DESC4"}].
        [{/if}]
        </div><br>
        [{if $d3oqmError->blD3oqmError_Changed}]
            <div>[{oxmultilang ident="D3OQM_CHANGE_MSG"}]</div>
        [{else}]
            <div>[{oxmultilang ident="D3OQM_ERROR_MSG"}]</div>
        [{/if}]
    </div>
[{/if}]
