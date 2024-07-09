<?php /* @var $model array */ ?>

<input
    <?php //if($model['id'] === 'label') echo 'rv-on-change="field.updateKey"'; ?>
    rv-on-keyup="<?php echo $model['id'] === 'label' ? 'onLabelChange' :'onChange'; ?>"
    rv-on-change="<?php echo $model['id'] === 'label' ? 'onLabelChange' :'onChange'; ?>"
    rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    type="text"
    <?php if(isset($model['placeholder'])) echo 'placeholder="'.$model['placeholder'].'"'; ?>
    rv-default="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>" data-default="<?php echo isset($model['default']) ? esc_attr($model['default']) : ''; ?>"
/>
<?php if(isset($model['note'])) { ?>
<div class="wapf-option-note">
    <?php echo wp_kses( $model['note'], [ 'a' => ['href' => [], 'onclick' => [], 'class' => []] ] ); ?>
</div>
<?php } ?>
<?php if(isset($model['modal']))
    \SW_WAPF_PRO\Includes\Classes\Html::help_modal($model['modal']);
?> 