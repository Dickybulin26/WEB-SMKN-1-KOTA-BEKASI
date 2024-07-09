<?php /* @var $model array */ ?>

<input
    <?php //if($model['id'] === 'label') echo 'rv-on-change="field.updateKey"'; ?>
    rv-on-keyup="onChange"
    rv-value="<?php echo $model['is_field_setting'] ?  'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    type="email"
/> 