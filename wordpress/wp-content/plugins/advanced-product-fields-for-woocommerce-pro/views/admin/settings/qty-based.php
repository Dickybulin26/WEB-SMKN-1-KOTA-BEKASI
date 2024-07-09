<?php
/* @var $model array */
?>

<div style="display: flex">
    <div class="wapf-toggle" rv-unique-checkbox>
        <input rv-on-change="qtyBasedChanged" rv-checked="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>" type="checkbox" >
        <label class="wapf-toggle__label" for="wapf-toggle-">
            <span class="wapf-toggle__inner" data-true="<?php _e('Yes','sw-wapf'); ?>" data-false="<?php _e('No','sw-wapf'); ?>"></span>
            <span class="wapf-toggle__switch"></span>
        </label>
    </div>
    <div rv-if="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>" style="padding-left:15px;margin-top:-1rem;">
        <div style="font-weight: bold;padding-bottom:8px;"><?php _e('Label for duplicates:','sw-wapf'); ?></div>
        <input rv-on-change="onChange" type="text" rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.clone_txt" />
        <small><?php echo __("use {{n}} to denote the number of duplicate.",'sw-wapf'); ?></small>
    </div>
</div> 