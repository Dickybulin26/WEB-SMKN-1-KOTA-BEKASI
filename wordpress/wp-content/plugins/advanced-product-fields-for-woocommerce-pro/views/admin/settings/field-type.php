<?php /* @var $model array */ ?>

<select rv-default="field.<?php echo $model['id']; ?>" rv-on-change="onChangeType" rv-value="field.<?php echo $model['id']; ?>">
    <?php
    $groups = \SW_WAPF_PRO\Includes\Classes\Enumerable::from($model['options'])->groupBy(function($x){
        return isset($x['subtype']) ? $x['subtype'] : '';
    })->toArray();

    foreach($groups as $optgroup => $types) {
	    echo '<optgroup label="' . $optgroup . '">';
	    foreach($types as $type){
		    echo '<option value="'.$type['id'].'">'.esc_html($type['title']).'</option>';
	    }
    }
    ?>
</select>
<div>
    <?php
    foreach($groups as $optgroup => $types) {
        foreach($types as $type){
            echo '<div class="wapf-option-note" rv-show="field.type | eq \''.$type['id'].'\'">'.esc_html($type['description']).'</div>';
        }
    }
    ?>
</div>
 