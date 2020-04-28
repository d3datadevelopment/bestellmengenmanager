[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    [{assign var='d3MappedThemeId' value=$oViewConf->getD3MappedThemeId()}]

    [{if $d3MappedThemeId === 'flow'}]
        [{assign var="aD3OQMDrifts" value=$oxcmp_basket->getD3OQMDrifts()}]

        [{if $aD3OQMDrifts && $oView->getNewBasketItemMsgType() == 2}][{strip}]
            <div class="modal fade basketFlyout" id="d3OQMModal" tabindex="1" role="dialog"
                 aria-labelledby="d3OQMModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">[{oxmultilang ident="CLOSE"}]</span>
                            </button>
                            <h4 class="modal-title"
                                id="d3OQMModalLabel">[{oxmultilang ident="D3OQM_ERROR_HEADLINE"}]</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                            [{foreach from=$aD3OQMDrifts item="aDrift" key="basketItemId" name="d3OQMDrifts"}]
                                <tr>
                                    <td>
                                    [{if $aDrift.isChanged}]
                                        <img src="[{$oViewConf->getModuleUrl("d3oqm", "out/img/d3_warning_sign.png")}]"
                                             alt="" class="d3OQMImg">
                                    [{else}]
                                        <img src="[{$oViewConf->getModuleUrl("d3oqm", "out/img/d3_att_sign.png")}]"
                                             alt="" class="d3OQMImg">
                                    [{/if}]

                                    [{capture name="CaptureUnitName"}]
                                        [{*this capute is necessary to supress multilangassign not found*}]
                                        [{oxmultilang ident=$aDrift.unitName noerror="1"}]
                                    [{/capture}]
                                    [{assign var='sUnitName' value=$smarty.capture.CaptureUnitName}]

                                    [{oxmultilang ident="D3OQM_PRE_MSG"}]&nbsp;
                                    <strong>[{$aDrift.wantedAmount}]</strong>[{$sUnitName}]&nbsp;
                                    [{oxmultilang ident="D3OQM_PRE_MSG_END"}]&nbsp;

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
                    </div>
                </div>
            </div>
            [{oxscript add="\$('#d3OQMModal').modal('show');"}]
            [{if false == $oxcmp_basket->isNewItemAdded()}]
                [{oxscript add='$(\'#basketModal\').on(\'shown.bs.modal\', function (e) {$(this).modal(\'hide\')});'}]
            [{/if}]
            [{$oxcmp_basket->resetD3OQMDrifts()}]
        [{/strip}][{/if}]

    [{/if}]
[{/if}]
