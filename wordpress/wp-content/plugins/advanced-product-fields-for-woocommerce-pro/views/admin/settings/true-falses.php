<?php
/* @var $model array */
?>

<?php foreach($model['options'] as $key => $sentence) { ?>
    <div style="width: 100%; display: flex;align-items: center;margin-bottom: 20px;" data-setting="<?php echo $key; ?>">
        <div class="wapf-toggle" rv-unique-checkbox>
        <input rv-on-change="onChange" rv-checked="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $key; ?>" type="checkbox" >
            <label class="wapf-toggle__label" for="wapf-toggle-">
                <span class="wapf-toggle__inner" data-true="<?php echo isset($model['true_label']) ? $model['true_label'] : __('Yes','sw-wapf'); ?>" data-false="<?php echo isset($model['false_label']) ? $model['false_label'] : __('No','sw-wapf'); ?>"></span>
                <span class="wapf-toggle__switch"></span>
            </label>
        </div>
        <div style="padding-left:15px;"><?php echo $sentence; ?></div>
    </div>
<?php } ?> 