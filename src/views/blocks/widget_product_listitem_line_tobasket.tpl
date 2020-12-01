[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    [{assign var='config' value=$oView->getConfig()}]
    [{assign var="d3ThemeId" value=$oViewConf->getD3MappedThemeId()}]
    [{if $d3ThemeId === 'azure'}]
        <div class="tobasketFunction clear">
            [{if $blShowToBasket}]
                [{oxhasrights ident="TOBASKET"}]
                    [{assign var='config' value=$oView->getConfig()}]
                    <button class="submitButton largeButton" id="d3OqmMinus_[{$iIndex}]" data-target="amountToBasket_[{$iIndex}]" data-type="-">
                        &minus;
                    </button>
                    <input id="amountToBasket_[{$iIndex}]" type="text" name="am" value="[{d3_oqm_getminamount product=$product}]" data-min="[{d3_oqm_getminamount product=$product}]"

                        [{if !empty($product->oxarticles__d3oqm_maximum->value)}]
                            data-max="[{$product->oxarticles__d3oqm_maximum->value}]"
                        [{/if}]

                        [{if !empty($product->oxarticles__d3oqm_package->value)}]
                            data-step="[{$product->oxarticles__d3oqm_package->value}]"
                        [{elseif $config->getConfigParam('blAllowUnevenAmounts')}]
                            data-step="any"
                        [{/if}]
                    size="3" autocomplete="off" class="textbox">
                    <button class="submitButton largeButton" id="d3OqmPlus_[{$iIndex}]" data-target="amountToBasket_[{$iIndex}]" data-type="+">
                        +
                    </button>
                    <button id="toBasket_[{$iIndex}]" type="submit" class="submitButton largeButton">
                        [{oxmultilang ident="TO_CART"}]
                    </button>
                [{/oxhasrights}]
            [{else}]
                <a class="submitButton largeButton" href="[{$_productLink}]" >[{oxmultilang ident="MORE_INFO"}]</a>
            [{/if}]
            [{if $removeFunction && (($owishid && ($owishid==$oxcmp_user->oxuser__oxid->value)) || (($wishid==$oxcmp_user->oxuser__oxid->value)) || $recommid)}]
                <button triggerForm="remove_[{$removeFunction}][{$iIndex}]" type="submit" class="submitButton largeButton removeButton">
                    <span>[{oxmultilang ident="REMOVE"}]</span>
                </button>
            [{/if}]
        </div>
    [{elseif $d3ThemeId === 'flow'}]
        [{if $blShowToBasket}]
            [{oxhasrights ident="TOBASKET"}]
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-tweak">
                            <button class="btn btn-primary" id="d3OqmMinus_[{$testid}]" data-target="amountToBasket_[{$testid}]" data-type="-">
                                &minus;
                            </button>
                        </div>
                        <input id="amountToBasket_[{$testid}]" type="text" name="am" value="[{d3_oqm_getminamount product=$product}]" data-min="[{d3_oqm_getminamount product=$product}]"
                            [{if !empty($product->oxarticles__d3oqm_maximum->value)}]
                                data-max="[{$product->oxarticles__d3oqm_maximum->value}]"
                            [{/if}]

                            [{if !empty($product->oxarticles__d3oqm_package->value)}]
                                data-step="[{$product->oxarticles__d3oqm_package->value}]"
                            [{elseif $config->getConfigParam('blAllowUnevenAmounts')}]
                                data-step="any"
                            [{/if}]
                        size="3" autocomplete="off" class="form-control amount">
                        <div class="input-group-tweak">
                            <button class="btn btn-primary" id="d3OqmPlus_[{$testid}]" data-target="amountToBasket_[{$testid}]" data-type="+">
                                +
                            </button>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button id="toBasket_[{$testid}]" type="submit" class="btn btn-primary" title="[{oxmultilang ident="TO_CART"}]">
                                <i class="fa fa-shopping-cart"></i> [{oxmultilang ident="TO_CART"}]
                            </button>
                            [{if $removeFunction && (($owishid && ($owishid==$oxcmp_user->oxuser__oxid->value)) || (($wishid==$oxcmp_user->oxuser__oxid->value)) || $recommid)}]
                                <button triggerForm="remove_[{$removeFunction}][{$testid}]" type="submit" class="btn btn-danger removeButton hasTooltip" title="[{oxmultilang ident="REMOVE"}]">
                                    <i class="fa fa-times"></i>
                                </button>
                            [{/if}]
                        </span>
                    </div>
                </div>
            [{/oxhasrights}]
        [{else}]
            [{$smarty.block.parent}]
        [{/if}]
    [{elseif $d3ThemeId === 'wave'}]
    [{oxstyle include=$oViewConf->getModuleUrl("d3oqm", "out/css/d3oqm.css")}]
        [{if $blShowToBasket}]
            [{oxhasrights ident="TOBASKET"}]
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-tweak">
                            <button class="btn btn-primary" id="d3OqmMinus_[{$testid}]" data-target="amountToBasket_[{$testid}]" data-type="-">
                                &minus;
                            </button>
                        </div>
                        <input id="amountToBasket_[{$testid}]" type="text" name="am" value="[{d3_oqm_getminamount product=$product}]" data-min="[{d3_oqm_getminamount product=$product}]"
                            [{if !empty($product->oxarticles__d3oqm_maximum->value)}]
                                data-max="[{$product->oxarticles__d3oqm_maximum->value}]"
                            [{/if}]

                            [{if !empty($product->oxarticles__d3oqm_package->value)}]
                                data-step="[{$product->oxarticles__d3oqm_package->value}]"
                            [{elseif $config->getConfigParam('blAllowUnevenAmounts')}]
                                data-step="any"
                            [{/if}]
                        size="3" autocomplete="off" class="form-control amount">
                        <div class="input-group-tweak">
                            <button class="btn btn-primary" id="d3OqmPlus_[{$testid}]" data-target="amountToBasket_[{$testid}]" data-type="+">
                                +
                            </button>
                        </div>
                        <span class="input-group-append">
                            <button id="toBasket_[{$testid}]" type="submit" aria-label="[{oxmultilang ident="TO_CART"}]" class="btn btn-primary hasTooltip" title="[{oxmultilang ident="TO_CART"}]" data-container="body">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            [{if $removeFunction && (($owishid && ($owishid==$oxcmp_user->oxuser__oxid->value)) || (($wishid==$oxcmp_user->oxuser__oxid->value)) || $recommid)}]
                                <button triggerForm="remove_[{$removeFunction}][{$testid}]" type="submit" class="btn btn-danger removeButton hasTooltip" title="[{oxmultilang ident="REMOVE"}]">
                                    <i class="fa fa-times"></i>
                                </button>
                            [{/if}]
                        </span>
                    </div>
                </div>
            [{/oxhasrights}]
        [{else}]
            [{$smarty.block.parent}]
        [{/if}]
    [{/if}]
    [{capture name="doNotShow"}]
        <script type="text/javascript">
            [{capture name="javaScript"}]
            [{if isset($iIndex)}]
                d3OqmChangeAmount("#d3OqmPlus_[{$iIndex}], #d3OqmMinus_[{$iIndex}]");
            [{else}]
                d3OqmChangeAmount("#d3OqmPlus_[{$testid}], #d3OqmMinus_[{$testid}]");
            [{/if}]
            [{/capture}]
        </script>
    [{/capture}]
    [{oxscript add=$smarty.capture.javaScript}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
