<?php /* @var $model array */ ?>
<select
    <?php echo isset($model['multiple']) && $model['multiple'] ? 'multiple="multiple"' : ''; ?>
        rv-default="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
        data-default="<?php echo isset($model['default']) ? esc_attr($model['default']) : ''; ?>"
        rv-on-change="<?php echo $model['id'] === 'type' ? 'onChangeType' : 'onChange'; ?>"
        rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    <?php if(isset($model['select2']) && $model['select2']) { ?>
        rv-select2-basic="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.<?php echo $model['id']; ?>"
    <?php } ?>
    <?php if(isset($model['select2_source'])) { ?>
        data-source="<?php echo esc_attr($model['select2_source']); ?>"
    <?php } ?>
>
    <?php
        if(isset($model['options']))
            foreach($model['options'] as $value => $label) {
                if(is_array($label)) {
                    echo '<optgroup label="' . $value . '">';
                    foreach ($label as $v => $l) {
                        echo '<option value="'.$v.'">'.$l.'</option>';
                    }
                    echo '</optgroup>';
                } else echo '<option value="'.$value.'">'.$label.'</option>';

            }
    ?>
</select>
<?php if(isset($model['note'])) { ?>
    <div style="padding-top:10px;">
        <?php echo wp_kses( $model['note'], ['b' => [], 'em' => [], 'i' => [],'strong' => []] ); ?>
    </div>
<?php } ?>