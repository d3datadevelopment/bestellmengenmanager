[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $editable && $mod_d3oqm
    && ($oModCfg_d3oqm->getValue('showBasketInfoFlowTable') && $blockinfo === 'table'
    || $oModCfg_d3oqm->getValue('showBasketInfoFlowList') && $blockinfo === 'list'
    )
}]
    <div class="small[{$classAdd}]">
        [{capture name="d3OQMUnitName"}][{strip}]
            [{if empty($oArticle->oxarticles__oxunitname->value)
            && (
            empty($oArticle->oxarticles__oxunitquantity->value)
            || $oArticle->oxarticles__oxunitquantity->value == '1'
            )
            }]
                &nbsp;[{oxmultilang ident="D3OQM_MSG_GENERAL1"}]
            [{else}]
                [{assign var="sStandardUnitName" value='D3OQM_MSG_GENERAL1'|oxmultilangassign}]
                x [{$oArticle->getUnitQuantity()}] [{$oArticle->getUnitName()|default:$sStandardUnitName}]
            [{/if}]
            [{oxmultilang ident="D3OQM_MSG_GENERAL2"}]
            <br>
        [{/strip}][{/capture}]

        [{if !empty($oArticle->oxarticles__d3oqm_minimum->value)}]
            [{oxmultilang ident="D3OQM_MSG_MINIMUM"}]
            [{$oArticle->oxarticles__d3oqm_minimum->value}][{$smarty.capture.d3OQMUnitName}]
        [{/if}]

        [{if !empty($oArticle->oxarticles__d3oqm_maximum->value)}]
            [{oxmultilang ident="D3OQM_MSG_MAXIMUM"}]
            [{$oArticle->oxarticles__d3oqm_maximum->value}][{$smarty.capture.d3OQMUnitName}]
        [{/if}]

        [{if !empty($oArticle->oxarticles__d3oqm_package->value)}]
            [{oxmultilang ident="D3OQM_MSG_PACKAGE"}]
            [{$oArticle->oxarticles__d3oqm_package->value}][{$smarty.capture.d3OQMUnitName}]
        [{/if}]
    </div>
[{/if}]
