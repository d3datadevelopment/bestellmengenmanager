[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if !$oDetailsProduct->isNotBuyable() && $oxcmp_basket && $mod_d3oqm}]
    [{assign var="d3ThemeId" value=$oViewConf->getD3MappedThemeId()}]
    [{assign var='config' value=$oView->getConfig()}]
    [{if $d3ThemeId === 'azure'}]
        [{oxhasrights ident="TOBASKET"}][{strip}]
            [{oxstyle include=$oViewConf->getModuleUrl("d3oqm", "out/css/d3oqm.css")}]
            <button class="submitButton largeButton" id="d3OqmMinus"
                    data-target="amountToBasket" data-type="-">-
            </button>
            <input id="amountToBasket" type="text" name="am" value="[{d3_oqm_getminamount product=$oDetailsProduct}]"
                   size="3"
                   data-min="[{d3_oqm_getminamount product=$oDetailsProduct}]"

                    [{if !empty($oDetailsProduct->oxarticles__d3oqm_maximum->value)}]
                        data-max="[{$oDetailsProduct->oxarticles__d3oqm_maximum->value}]"
                    [{/if}]

                    [{if !empty($oDetailsProduct->oxarticles__d3oqm_package->value)}]
                        data-step="[{$oDetailsProduct->oxarticles__d3oqm_package->value}]"
                    [{elseif $config->getConfigParam('blAllowUnevenAmounts')}]
                        data-step="any"
                    [{/if}]
                   class="textbox">
            <button class="submitButton largeButton" id="d3OqmPlus"
                    data-target="amountToBasket" data-type="+">+
            </button>
            <button id="toBasket" type="submit" [{if !$blCanBuy}]disabled="disabled"[{/if}]
                    class="submitButton largeButton"
                    title="[{oxmultilang ident="TO_CART"}]">[{oxmultilang ident="TO_CART"}]</button>
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
                    [{oxmultilang ident="D3OQM_MSG_GENERAL2"}]
                    <br>
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
        [{/strip}][{/oxhasrights}]
    [{elseif $d3ThemeId === 'flow'}]
        <div class="tobasketFunction clear">
            [{oxhasrights ident="TOBASKET"}]
            [{if !$oDetailsProduct->isNotBuyable()}]
                <div class="input-group">
                    <div class="input-group-tweak">
                        <button class="btn btn-primary pull-right" id="d3OqmMinus"
                                data-target="amountToBasket" data-type="-">-
                        </button>
                    </div>
                    <input id="amountToBasket" autocomplete="off" class="form-control"
                           type="text" name="am" value="[{d3_oqm_getminamount product=$oDetailsProduct}]"
                           data-min="[{d3_oqm_getminamount product=$oDetailsProduct}]"

                            [{if !empty($oDetailsProduct->oxarticles__d3oqm_maximum->value)}]
                                data-max="[{$oDetailsProduct->oxarticles__d3oqm_maximum->value}]"
                            [{/if}]

                            [{if !empty($oDetailsProduct->oxarticles__d3oqm_package->value)}]
                        data-step="[{$oDetailsProduct->oxarticles__d3oqm_package->value}]"
                            [{elseif $config->getConfigParam('blAllowUnevenAmounts')}]
                        data-step="any"
                            [{/if}]>
                    <div class="input-group-tweak">
                        <button class="btn btn-primary" id="d3OqmPlus"
                                data-target="amountToBasket" data-type="+">+
                        </button>
                    </div>
                    <div class="input-group-tweak">
                        <button id="toBasket" type="submit" [{if !$blCanBuy}]disabled="disabled"[{/if}]
                                class="btn btn-primary submitButton largeButton"><i
                                    class="fa fa-shopping-cart"></i> [{oxmultilang ident="TO_CART"}]</button>
                    </div>
                </div>
                <div class="input-group">
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
                        [{oxmultilang ident="D3OQM_MSG_GENERAL2"}]
                        <br>
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
                </div>
            [{/if}]
            [{/oxhasrights}]
        </div>
    [{/if}]

    [{capture name="doNotShow"}]
        <script type="text/javascript">
            [{capture name="javaScript"}]
            d3OqmChangeAmount("#d3OqmPlus, #d3OqmMinus");
            [{/capture}]
        </script>
    [{/capture}]
    [{oxscript add=$smarty.capture.javaScript}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
