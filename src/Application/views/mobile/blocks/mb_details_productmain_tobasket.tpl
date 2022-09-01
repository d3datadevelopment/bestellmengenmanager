[{oxhasrights ident="TOBASKET"}]
[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if !$oDetailsProduct->isNotBuyable() && $oxcmp_basket && $mod_d3oqm}]
    [{strip}]
        [{assign var='config' value=$oView->getConfig()}]
        [{oxstyle include=$oViewConf->getModuleUrl("d3oqm", "out/css/d3oqm.css")}]
        <input id="amountToBasket" type="number" name="am" value="[{d3_oqm_getminamount product=$oDetailsProduct}]"
                    min="[{d3_oqm_getminamount product=$oDetailsProduct}]"

                [{if !empty($oDetailsProduct->oxarticles__d3oqm_maximum->value)}]
                    max="[{$oDetailsProduct->oxarticles__d3oqm_maximum->value}]"
                [{/if}]

                [{if !empty($oDetailsProduct->oxarticles__d3oqm_package->value)}]
                    step="[{$oDetailsProduct->oxarticles__d3oqm_package->value}]"
                [{elseif $config->getConfigParam('blAllowUnevenAmounts')}]
                    step="any"
                [{/if}]
               size="3" class="textbox">
        <button id="toBasket" type="submit" [{if !$blCanBuy}]disabled="disabled"[{/if}] class="submitButton largeButton btn[{if !$blCanBuy}] disabled[{/if}]">[{oxmultilang ident="TO_CART"}]</button>
        <p class="d3OQMDetails">
            [{capture name="d3OQMUnitName"}][{strip}]
                [{if empty($oDetailsProduct->oxarticles__oxunitname->value)
                && (
                empty($oDetailsProduct->oxarticles__oxunitquantity->value)
                || $oDetailsProduct->oxarticles__oxunitquantity->value == '1'
                )
                }]
                    &nbsp;[{oxmultilang ident="D3OQM_MSG_GENERAL1"}]
                [{else}]
                    [{assign var="sStandardUnitName" value='D3OQM_MSG_GENERAL1'|oxmultilangassign}]
                    x [{$oDetailsProduct->getUnitQuantity()}] [{$oDetailsProduct->getUnitName()|default:$sStandardUnitName}]
                [{/if}]
                [{oxmultilang ident="D3OQM_MSG_GENERAL2"}]<br>
            [{/strip}][{/capture}]

            [{if !empty($oDetailsProduct->oxarticles__d3oqm_minimum->value)}]
                [{oxmultilang ident="D3OQM_MSG_MINIMUM"}]
                [{$oDetailsProduct->oxarticles__d3oqm_minimum->value}][{$smarty.capture.d3OQMUnitName}]
            [{/if}]

            [{if !empty($oDetailsProduct->oxarticles__d3oqm_maximum->value)}]
                [{oxmultilang ident="D3OQM_MSG_MAXIMUM"}]
                [{$oDetailsProduct->oxarticles__d3oqm_maximum->value}][{$smarty.capture.d3OQMUnitName}]
            [{/if}]

            [{if !empty($oDetailsProduct->oxarticles__d3oqm_package->value)}]
                [{oxmultilang ident="D3OQM_MSG_PACKAGE"}]
                [{$oDetailsProduct->oxarticles__d3oqm_package->value}][{$smarty.capture.d3OQMUnitName}]
            [{/if}]
        </p>
    [{/strip}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
[{/oxhasrights}]
