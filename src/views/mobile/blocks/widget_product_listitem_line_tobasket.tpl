[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    [{oxhasrights ident="TOBASKET"}]
        [{assign var='config' value=$oView->getConfig()}]
        <div class="add-to-basket">
            <input class="quantity" id="amountToBasket_[{$iIndex}]" type="number" name="am"
                   value="[{d3_oqm_getminamount product=$product}]"
                   min="[{d3_oqm_getminamount product=$oDetailsProduct}]"

                [{if !empty($product->oxarticles__d3oqm_maximum->value)}]
                    max="[{$product->oxarticles__d3oqm_maximum->value}]"
                [{/if}]

                [{if !empty($product->oxarticles__d3oqm_package->value)}]
                    step="[{$product->oxarticles__d3oqm_package->value}]"
                [{elseif $config->getConfigParam('blAllowUnevenAmounts')}]
                    step="any"
                [{/if}]
                   size="2" autocomplete="off"/>
            <button id="toBasket_[{$iIndex}]" name="add_to_basket_button" class="btn">[{oxmultilang ident="TO_CART"}]</button>
        </div>
    [{/oxhasrights}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
