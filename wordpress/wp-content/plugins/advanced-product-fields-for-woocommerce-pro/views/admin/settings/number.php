<?php /* @var $model array */ ?>

<?php if(!empty($model['postfix'])) { ?>
    <div class="wapf-input-with-append">
<?php } ?>

<input
    <?php //if($model['id'] === 'label') echo 'rv-on-change="field.updateKey"'; ?>
    rv-on-keyup="onChange" rv-on-change="onChange"
    <?php if(isset($model['min'])) echo ' min="'.$model['min'].'" '; ?>
    <?php if(isset($model['max'])) echo ' max="'.$model['max'].'" '; ?>
    rv-default="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>" data-default="<?php echo isset($model['default']) ? esc_attr($model['default']) : ''; ?>"
    rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    type="number"
    step="any"
    placeholder="<?php echo empty($model['placeholder']) ? '' : esc_attr($model['placeholder']); ?>"
/>
<?php if(!empty($model['postfix'])) { ?>
    <div class="wapf-input-append"><?php echo $model['postfix']; ?></div>
    </div>
<?php } ?>
 