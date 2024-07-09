<?php
/* @var $model array */
?>

<div class="wapf-toggle" rv-unique-checkbox>
    <input rv-on-change="onChange" rv-checked="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>" type="checkbox" >
    <label class="wapf-toggle__label" for="wapf-toggle-">
        <span class="wapf-toggle__inner" data-true="<?php echo isset($model['true_label']) ? $model['true_label'] : __('Yes','sw-wapf'); ?>" data-false="<?php echo isset($model['false_label']) ? $model['false_label'] : __('No','sw-wapf'); ?>"></span>
        <span class="wapf-toggle__switch"></span>
    </label>
</div>

<?php if(isset($model['note'])) { ?>
    <div style="padding-top:10px;">
		<?php echo wp_kses( $model['note'], ['b' => [], 'em' => [], 'i' => [],'strong' => []] ); ?>
    </div>
<?php } ?> 