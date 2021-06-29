[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
      [{$oViewConf->getHiddenSid()}]
      <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
      <input type="hidden" name="fnc" value="save">
      <input type="hidden" name="oxid" value="[{$oxid}]">
      <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">
      <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
    [{include file="d3_cfg_mod_active.tpl"}]
    <table border="0" width="100%" cellspacing="10">
        <tr>
            <td class="edittext ext_edittext" colspan="2"><b>[{oxmultilang ident="D3OQM_INFO"}]</b></td>
        </tr>
        <tr>
            <td class="edittext ext_edittext" colspan="2">
                <input type="hidden" name="value[d3_cfg_mod__blAddRoundedVEAmounts]" value="0">
                <input type="checkbox" name="value[d3_cfg_mod__blAddRoundedVEAmounts]" value="1"
                   [{if $edit->getValue('blAddRoundedVEAmounts')}]checked[{/if}]>
                [{oxmultilang ident="D3OQM_ROUNDEDAMOUNT"}]
            </td>
        </tr>
        <tr>
            <td class="edittext ext_edittext" colspan="2">
                <input type="hidden" name="value[d3_cfg_mod__blD3VEMathRound]" value="0">
                <input type="checkbox" name="value[d3_cfg_mod__blD3VEMathRound]" value="1"
                       [{if $edit->getValue('blD3VEMathRound')}]checked[{/if}]>
                [{oxmultilang ident="D3OQM_MATHROUND"}]
            </td>
        </tr>
        <tr>
            <td class="edittext ext_edittext" colspan="2">
                <input type="hidden" name="value[d3_cfg_mod__useRemainingStock]" value="0">
                <input type="checkbox" name="value[d3_cfg_mod__useRemainingStock]" value="1"
                       [{if $edit->getValue('useRemainingStock')}]checked[{/if}]>
                [{oxmultilang ident="D3OQM_USEREMAININGSTOCK"}]
                [{oxinputhelp ident="HELP_D3OQM_USEREMAININGSTOCK"}]
            </td>
        </tr>
        <tr>
            <td class="edittext ext_edittext" colspan="2">
                <input type="hidden" name="value[d3_cfg_mod__showBasketInfo]" value="0">
                <input type="checkbox" name="value[d3_cfg_mod__showBasketInfo]" value="1"
                       [{if $edit->getValue('showBasketInfo')}]checked[{/if}]>
                [{oxmultilang ident="D3OQM_SHOWBASKETINFO"}]
                [{oxinputhelp ident="HELP_D3OQM_SHOWBASKETINFO"}]
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <span class="d3modcfg_btn" style="width: 100px;">
                    <input type="submit" class="edittext ext_edittext" name="save"
                           value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]">
                </span>
            </td>
        </tr>
    </table>
</form>

[{if $blRefreshList}]
    [{oxscript add="top.oxid.admin.updateList();"}]
[{/if}]

[{oxscript add='function _groupExp(el) {
    var _cur = el.parentNode;
    if (_cur.className == "exp") {
        _cur.className = "";
    } else {
        _cur.className = "exp";
    }
}'}]

[{include file="d3_cfg_mod_inc.tpl"}]
[{* NOTE: open div for oxids closing div ^^ *}]
<div>
[{include file="bottomitem.tpl"}]
