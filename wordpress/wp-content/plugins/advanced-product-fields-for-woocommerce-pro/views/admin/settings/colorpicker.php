<?php
/* @var $model array */
?>

<input
    rv-on-change="onChange"
    rv-colorpicker="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    type="text"
    data-default-color="<?php echo isset($model['default']) ? esc_attr($model['default']) : ''; ?>"
/> 