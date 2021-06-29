[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    [{assign var='d3MappedThemeId' value=$oViewConf->getD3MappedThemeId()}]
    [{if $d3MappedThemeId === 'flow' || $d3MappedThemeId === 'wave'}]
        [{assign var="aD3OQMDrifts" value=$oxcmp_basket->getD3OQMDrifts()}]
        [{if $aD3OQMDrifts && ($oView->getNewBasketItemMsgType() == 1 || $oView->getNewBasketItemMsgType() == 3)}][{strip}]
            <div id="d3OQMMessage" class="alert alert-warning">
                [{if $d3MappedThemeId === 'wave'}]
                    <strong>[{oxmultilang ident="D3OQM_ERROR_HEADLINE"}]</strong>
                [{/if}]
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                [{if $d3MappedThemeId === 'flow'}]
                    <strong>[{oxmultilang ident="D3OQM_ERROR_HEADLINE"}]</strong>
                [{/if}]
                <table class="table table-striped">
                [{foreach from=$aD3OQMDrifts item="aDrift" key="basketItemId" name="d3OQMDrifts"}]
                    <tr>
                        <td>
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
                        </td>
                        <td>
                        &nbsp;[{oxmultilang ident="D3OQM_PRE_MSG"}]
                        &nbsp;<strong>[{$aDrift.wantedAmount}]</strong>[{$sUnitName}]
                        &nbsp;[{oxmultilang ident="D3OQM_PRE_MSG_END"}]&nbsp;

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
                        <br>
                        <br>

                        [{if $aDrift.type|count > 0}]
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
                        </td>
                    </tr>
                [{/foreach}]
                </table>
            </div>
            [{if false == $oxcmp_basket->isNewItemAdded()}]
                [{oxscript add="$('#newItemMsg').hide();"}]
            [{/if}]

            [{$oxcmp_basket->resetD3OQMDrifts()}]
        [{/strip}][{/if}]
    [{/if}]
[{/if}]
