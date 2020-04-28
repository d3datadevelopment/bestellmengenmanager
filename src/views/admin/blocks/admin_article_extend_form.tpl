[{* D3 MOD OQM START *}]
[{d3modcfgcheck modid="d3oqm"}][{/d3modcfgcheck}]
[{if $mod_d3oqm}]
    <tr>
        <td colspan="2">
            <fieldset title="[{oxmultilang ident="D3OQM_PLAIN_TITLE"}]" style="padding-left: 5px;">
                <legend>[{oxmultilang ident="D3OQM_TITLE"}]</legend>
                <table border="0" style="width:100%">
                    <tr>
                        <td class="edittext">
                            <label for="d3oqm_minimum">[{oxmultilang ident="D3OQM_LIMITTYPE_MIN"}]</label>
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="10"
                                   maxlength="[{$edit->oxarticles__d3oqm_minimum->fldmax_length}]"
                                   id="d3oqm_minimum"
                                   name="editval[oxarticles__d3oqm_minimum]"
                                   value="[{$edit->oxarticles__d3oqm_minimum->value}]" [{$readonly}]>
                        </td>
                        <td rowspan="3" class="varsell" style="text-align:right;">
                            [{oxmultilang ident="D3OQM_RULES"}] [{oxinputhelp ident="HELP_D3OQM_RULES"}]<br>
                            [{oxmultilang ident="D3OQM_INHERITANCE"}] [{oxinputhelp ident="HELP_D3OQM_INHERITANCE"}]<br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="d3oqm_maximum">[{oxmultilang ident="D3OQM_LIMITTYPE_MAX"}]</label>
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="10"
                                   maxlength="[{$edit->oxarticles__d3oqm_maximum->fldmax_length}]"
                                   id="d3oqm_maximum"
                                   name="editval[oxarticles__d3oqm_maximum]"
                                   value="[{$edit->oxarticles__d3oqm_maximum->value}]" [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="d3oqm_package">[{oxmultilang ident="D3OQM_LIMITTYPE_VE"}]</label>
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="10"
                                   maxlength="[{$edit->oxarticles__d3oqm_package->fldmax_length}]"
                                   id="d3oqm_package"
                                   name="editval[oxarticles__d3oqm_package]"
                                   value="[{$edit->oxarticles__d3oqm_package->value}]" [{$readonly}]>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br>
        </td>
    </tr>
[{/if}]
[{* D3 MOD OQM END *}]
[{$smarty.block.parent}]
