<?php
/** @var array $model */

use SW_WAPF_PRO\Includes\Classes\Html;
$unique = mt_rand(10000,99999);

$is_checked = $model['is_edit'] ? $model['default'][0] === $model['field']->options['label_true'] : isset( $model['field']->options['default'] ) && $model['field']->options['default'] === 'checked';

?>
<div class="wapf-checkable">
    <input type="hidden" class="wapf-tf-h" data-fid="<?php echo $model['field']->id;?>" value="0" name="wapf[field_<?php echo $model['field']->id;?>]" />
    <label class="wapf-checkbox-label" for="<?php echo $unique; ?>">
        <input id="<?php echo $unique; ?>" type="checkbox" value="1" <?php echo $is_checked ? 'checked ' : ''; echo $model['field_attributes']; ?> />
        <span class="wapf-custom"></span>
	    <?php if(!empty($model['field']->options['message']) || $model['field']->pricing_enabled()){ ?>
            <span class="wapf-label-text">
                <?php
                if(!empty($model['field']->options['message']))
	                echo esc_html($model['field']->options['message']);
                if($model['field']->pricing_enabled())
                    echo ' ' . Html::frontend_field_pricing_hint($model['field'],$model['product']);
               ?>
            </span>
	    <?php } ?>
    </label>
</div>