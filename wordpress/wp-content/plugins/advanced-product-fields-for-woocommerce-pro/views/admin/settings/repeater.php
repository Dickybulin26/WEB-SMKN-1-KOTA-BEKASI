<?php
/* @var $model array */
?>

<div style="display: flex;flex-flow:column">

    <div>
        <div class="wapf-toggle" rv-unique-checkbox-tyaj9910222bc2afg>
            <input rv-on-change="qtyBasedChanged" rv-checked="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>" type="checkbox" >
            <label class="wapf-toggle__label" for="wapf-toggle-">
                <span class="wapf-toggle__inner" data-true="<?php _e('Yes','sw-wapf'); ?>" data-false="<?php _e('No','sw-wapf'); ?>"></span>
                <span class="wapf-toggle__switch"></span>
            </label>
        </div>
    </div>

	<div rv-if="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>">

        <div style="padding-top:15px;overflow: hidden">
            <div style="font-weight: bold;padding-bottom:10px;"><?php _e('Repeat type','sw-wapf'); ?></div>
            <select rv-on-change="onChange" rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.repeat_type"> 
                <option value=""><?php _e('Repeat based on WooCommerce quantity input','sw-wapf') ?></option>
                <option value="field"><?php _e('Repeat based on value of other field','sw-wapf') ?></option>
                <option value="button"><?php _e('Repeat by clicking a button','sw-wapf') ?></option>
            </select>
        </div>

        <div style="padding-top:15px; overflow: hidden" rv-if="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.repeat_type | eq 'button'">
            <div style="font-weight: bold;padding-bottom:10px;"><?php _e('Button text','sw-wapf'); ?></div>
            <input rv-on-change="onChange" type="text" rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.clone_btn_txt" />
        </div>

        <div style="padding-top:15px;">
            <div style="font-weight: bold;padding-bottom:10px;"><?php _e('Label for duplicates','sw-wapf'); ?></div>
            <input rv-on-change="onChange" type="text" rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.clone_txt" />
            <small><?php echo __("use {{n}} to denote the number of duplicate.",'sw-wapf'); ?></small>
        </div>

	</div>

</div>