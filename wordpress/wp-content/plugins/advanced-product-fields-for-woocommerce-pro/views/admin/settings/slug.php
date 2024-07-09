<?php /* @var $model array */ ?>

<input
    rv-on-keyup="onChange"
    rv-value="<?php echo $model['is_field_setting'] ?  'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    rv-slugify="<?php echo $model['is_field_setting'] ?  'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    type="text"
/>