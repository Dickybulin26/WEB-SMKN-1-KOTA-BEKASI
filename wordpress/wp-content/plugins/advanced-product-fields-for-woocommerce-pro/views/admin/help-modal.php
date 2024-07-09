<?php
/* @var $model array */
$class = $model['id'];
$model['class'] = $class;
?>
<?php if($model['button']) { ?>
<a style="padding-top:15px;display: inline-block;" href="#" onclick="javascript:event.preventDefault();jQuery('.<?php echo $class;?>').show();">
    <?php
        if(empty($model['button']))
            _e('View help','sw-wapf');
        else echo $model['button'];
    ?>
</a>
<?php } if($model['icon']) { ?>
    <a class="modal_help_icon" style="padding:5px;" href="#" onclick="javascript:event.preventDefault();jQuery('.<?php echo $class;?>').show();">
        <i class="dashicons-before dashicons-editor-help"></i>
    </a>
<?php } ?>
<?php  \SW_WAPF_PRO\Includes\Classes\Html::partial('admin/modal',$model ) ?>