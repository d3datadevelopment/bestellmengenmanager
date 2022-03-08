[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    [{* NOTE: __oxid_include_dynamic = true: prevents the include of css *}]
    [{assign var="oldOID" value=$__oxid_include_dynamic}]
    [{assign var="__oxid_include_dynamic" value=false}]
    [{assign var='d3MappedThemeId' value=$oViewConf->getD3MappedThemeId()}]

    [{if $d3MappedThemeId === 'azure'}]
        [{oxstyle include=$oViewConf->getModuleUrl("d3oqm", "out/css/d3oqm.css")}]

        [{assign var="__oxid_include_dynamic" value=$oldOID}]
        [{assign var="aD3OQMDrifts" value=$oxcmp_basket->getD3OQMDrifts()}]

        [{if $aD3OQMDrifts}][{strip}]
            <div id="[{$_prefix}]d3OQMFlyOut" class="basketFlyout corners d3OQMFlyOut">
                <p class="title">
                    <strong>[{oxmultilang ident="D3OQM_ERROR_HEADLINE"}]</strong>
                    <img src="[{$oViewConf->getImageUrl('x.png')}]" alt="" class="d3OQMClosePop">
                </p>
                [{foreach from=$aD3OQMDrifts item="aDrift" key="basketItemId" name="d3OQMDrifts"}]
                    <div class="functions">
                        [{if $aDrift.isChanged}]
                            <img src="[{$oViewConf->getModuleUrl("d3oqm", "out/img/d3_warning_sign.png")}]" alt=""
                                 class="d3OQMImg">
                        [{else}]
                            <img src="[{$oViewConf->getModuleUrl("d3oqm", "out/img/d3_att_sign.png")}]" alt=""
                                 class="d3OQMImg">
                        [{/if}]

                        [{capture name="CaptureUnitName"}]
                            [{*this capute is necessary to supress multilangassign not found*}]
                            [{oxmultilang ident=$aDrift.unitName noerror="1"}]
                        [{/capture}]
                        [{assign var='sUnitName' value=$smarty.capture.CaptureUnitName}]

                        [{oxmultilang ident="D3OQM_PRE_MSG"}]&nbsp;
                        <strong>[{$aDrift.wantedAmount}]</strong>[{$sUnitName}]&nbsp;
                        [{oxmultilang ident="D3OQM_PRE_MSG_END"}]<br>

                        [{if $aDrift.isChanged}]
                            [{oxmultilang ident="D3OQM_CHANGE_MSG"}]
                            <strong>[{$aDrift.addedAmount}]</strong>[{$sUnitName}]
                            [{oxmultilang ident="D3OQM_CHANGE_MSG_END"}]
                            <strong>[{$aDrift.totalAmount}]</strong>[{$sUnitName}]
                        [{elseif $aDrift.error}]
                            <strong>[{oxmultilang ident=$aDrift.error}]</strong>
                        [{else}]
                            <strong>[{oxmultilang ident="D3OQM_ERROR_MSG"}]</strong>
                        [{/if}]
                        <hr>

                        [{if $aDrift.type|@count > 0}]
                            [{assign var="sDriftTitle" value="D3OQM_DRIFT_DESC1"|oxmultilangassign}]
                            [{$sDriftTitle|replace:'%1':$aDrift.title|replace:'%2':$aDrift.artnum}]
                            <ul>
                                [{foreach from=$aDrift.type item="typeValue" key="typeName"}]
                                    <li>
                                        [{assign var=type value=$typeName|strtoupper}]
                                        [{assign var="sDriftDesc" value="`$type`_DESC"|oxmultilangassign}]
                                        [{$sDriftDesc|replace:'%1':"<strong>`$typeValue`</strong>`$sUnitName`"}]
                                    </li>
                                [{/foreach}]
                            </ul>
                        [{/if}]
                    </div>
                [{/foreach}]
            </div>
            [{if $_prefix != 'modal' && ($oView->getNewBasketItemMsgType() != 2 || $oViewConf->getActiveClassName() == "basket" || $oViewConf->getActiveClassName() == "oxwminibasket" || !$oxcmp_basket->isNewItemAdded())}]
                [{oxscript add='$( \'#'|cat:$_prefix|cat:'d3OQMFlyOut\').show();'}]
            [{/if}]

            [{oxscript add='$( \'.d3OQMClosePop\' ).click(function(){$(\'#'|cat:$_prefix|cat:'d3OQMFlyOut\').hide();});'}]
            [{$oxcmp_basket->resetD3OQMDrifts()}]
        [{/strip}][{/if}]
    [{/if}]

[{/if}]
