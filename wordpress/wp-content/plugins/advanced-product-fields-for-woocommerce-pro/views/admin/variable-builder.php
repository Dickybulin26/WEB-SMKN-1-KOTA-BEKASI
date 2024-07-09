<?php
/* @var $model array */
use SW_WAPF_PRO\Includes\Classes\Helper;
?>
<div rv-controller="VariablesCtrl" data-variables="<?php echo Helper::thing_to_html_attribute_string($model['variables']); ?>">
    <input type="hidden" name="wapf-variables" rv-value="json" />

    <div class="wapf-collapsible__holder" style="padding:0 25px;" rv-show="variables|isNotEmpty">
        <div rv-each-variable="variables" class="wapf-collapsible__wrapper" rv-data-variable-id="variable.name">
            <div class="wapf-collapsible__header">
                <div class="wapf-collapsible__sort" title="<?php _e('Drag & drop','sw-wapf');?>">☰</div>
                <div class="wapf-collapsible__name">
                    var_{variable.name}
                </div>
                <div class="wapf-collapsible__actions">
                    <div class="wapf__action_icon" rv-on-click="deleteVariable" title="<?php _e('Delete variable','sw-wapf');?>">
                        <svg height="16" width="16" viewBox="0 0 16 16"><path d="M13 3s0-0.51-2-0.8v-0.7c-0.017-0.832-0.695-1.5-1.53-1.5-0 0-0 0-0 0h-3c-0.815 0.017-1.47 0.682-1.47 1.5 0 0 0 0 0 0v0.7c-0.765 0.068-1.452 0.359-2.007 0.806l-0.993-0.006v1h12v-1h-1zM6 1.5c0.005-0.274 0.226-0.495 0.499-0.5l3.001-0c0 0 0.001 0 0.001 0 0.282 0 0.513 0.22 0.529 0.499l0 0.561c-0.353-0.042-0.763-0.065-1.178-0.065-0.117 0-0.233 0.002-0.349 0.006-0.553-0-2.063-0-2.503 0.070v-0.57z" ></path><path d="M2 5v1h1v9c1.234 0.631 2.692 1 4.236 1 0.002 0 0.003 0 0.005 0h1.52c0.001 0 0.003 0 0.004 0 1.544 0 3.002-0.369 4.289-1.025l-0.054-8.975h1v-1h-12zM6 13.92q-0.51-0.060-1-0.17v-6.75h1v6.92zM9 14h-2v-7h2v7zM11 13.72c-0.267 0.070-0.606 0.136-0.95 0.184l-0.050-6.904h1v6.72z" ></path></svg>
                    </div>

                </div>
            </div>
            <div class="wapf-collapsible__body">
                <div class="wapf-field__setting">
                    <div class="wapf-setting__label">
                        <label>
                            <?php _e('Variable name','sw-wapf');?>
                        </label>
                        <p class="wapf-description">
                            <?php _e('A unique key to identify your variable. Use this key in pricing formulas.','sw-wapf'); ?>
                        </p>
                    </div>
                    <div class="wapf-setting__input">
                        <div>
                            <div class="wapf-input-prepend">var_</div>
                            <div class="wapf-input-prepend-append">
                                <input type="text" rv-value="variable.name" rv-on-keyup="onChangeVariableName"  />
                            </div>
                        </div>
                        <p style="opacity:.7;width: 100%;box-sizing: border-box"><?php _e('Should only contain letters, numbers, or underscores.','sw-wapf'); ?></p>
                    </div>
                </div>
                <div class="wapf-field__setting">
                    <div class="wapf-setting__label">
                        <label>
                            <?php _e('Standard value','sw-wapf');?>
                        </label>
                        <p class="wapf-description">
                            <?php _e('The default value of your variable.','sw-wapf'); ?>
                        </p>
                    </div>
                    <div class="wapf-setting__input">
                        <input type="text" rv-value="variable.default" rv-on-change="onChange"  />
                        <p style="opacity:.7"><?php _e('This should be a number or a formula.','sw-wapf'); ?></p>
                    </div>
                </div>
                <div class="wapf-field__setting">
                    <div class="wapf-setting__label">
                        <label>
                            <?php _e('Value changes','sw-wapf');?>
                        </label>
                        <p class="wapf-description">
                            <?php _e('Add rules when the value of this variable should change.','sw-wapf'); ?>
                        </p>
                    </div>
                    <div class="wapf-setting__input">
                        <div class="variable_rule__wrapper">

                            <table>
                                <tr rv-each-variablerule="variable.rules">
                                    <td>
                                        <strong><?php _e('If this happens','sw-wapf'); ?></strong>
                                        <select rv-on-change="onVariableRuleTypeChange" rv-value="variablerule.type">
                                            <option rv-disabled="canAddFieldToVariableRule|neq true" value="field"><?php _e('Field value changes','sw-wapf');?></option>
                                            <option value="qty"><?php _e('Product quantity changes','sw-wapf');?></option>
                                        </select>
                                    </td>
                                    <td rv-show="variablerule.type|eq 'qty'">
                                        <strong><?php _e('And quantity','sw-wapf'); ?></strong>
                                        <select rv-value="variablerule.condition" rv-on-change="onChange">
                                            <option value="=="><?php _e(' is equal to','sw-wapf'); ?></option>
                                            <option value="!="><?php _e('is not equal to','sw-wapf'); ?></option>
                                            <option value="gt"><?php _e('is greater than','sw-wapf'); ?></option>
                                            <option value="lt"><?php _e('is lesser than','sw-wapf'); ?></option>
                                        </select>
                                    </td>
                                    <td rv-show="variablerule.type|eq 'qty'">
                                        <input step="any" min="1" rv-on-change="onChange" rv-on-keyup="onChange" type="number" rv-value="variablerule.value" />
                                    </td>
                                    <td rv-show="variablerule.type|eq 'qty'">&nbsp;</td>
                                    <td rv-show="variablerule.type |eq 'field'" style="width: 20%;">
                                        <strong><?php _e('This field changes','sw-wapf'); ?></strong>
                                        <select rv-value="variablerule.field" rv-on-change="onChange" >
                                            <option rv-each-field="fields" rv-value="field.id">{field.label}</option>
                                        </select>
                                    </td>
                                    <td rv-show="variablerule.type |eq 'field'" style="width: 20%">
                                        <select rv-value="variablerule.condition" rv-on-change="onChange" >
                                            <option rv-each-condition="availableConditions | filterConditions variablerule.field fields" rv-value="condition.value">{ condition.label }</option>
                                        </select>
                                    </td>
                                    <td rv-show="variablerule.type |eq 'field'" style="width: 20%;">
                                        <input rv-if="variablerule.condition | conditionNeedsValue availableConditions 'text' fields variablerule.field" rv-on-keyup="onChange" type="text" rv-value="variablerule.value" />
                                        <input rv-if="variablerule.condition | conditionNeedsValue availableConditions 'number' fields variablerule.field" step="any" rv-on-change="onChange" rv-on-keyup="onChange" type="number" rv-value="variablerule.value" />
                                        <select rv-if="variablerule.condition | conditionNeedsValue availableConditions 'options' fields variablerule.field" rv-on-change="onChange" rv-value="variablerule.value">
                                            <option rv-each-v="fields | query 'first' 'id' '===' variablerule.field 'get' 'choices'" rv-value="v.slug">{v.label}</option>
                                        </select>
                                        <input rv-if="variablerule.condition | conditionDoesntNeedValue availableConditions fields variablerule.field" disabled type="text"/>
                                    </td>
                                    <td>
                                        <strong><?php _e('Variable value is','sw-wapf');?></strong>
                                        <input type="text" rv-value="variablerule.variable" rv-on-change="onChange"/>
                                    </td>
                                    <td style="width: 30px">
                                        <a href="#" title="<?php _e('Delete','sw-wapf');?>" rv-on-click="deleteVariableRule" class="wapf-button--tiny-rounded btn-del">&times;</a>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div style="padding-top:15px;">
                            <a href="#" rv-on-click="addVariableRule" class="button button-small"><?php _e('Add new rule','sw-wapf'); ?></a>
                            <div style="padding-top:10px;" rv-hide="canAddFieldToVariableRule">
                                <?php _e('If you add some fields to this field group first, you can also change this variable when a field value changes!','sw-wapf'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wapf-list--empty">
        <a href="#" class="button button-primary button-large" rv-on-click="addEmptyVariable"><?php _e('Add new variable','sw-wapf'); ?></a>
    </div>

</div>