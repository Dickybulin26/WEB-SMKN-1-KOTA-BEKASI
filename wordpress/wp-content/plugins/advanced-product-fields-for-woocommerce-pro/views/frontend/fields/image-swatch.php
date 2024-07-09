<?php
/** @var array $model */

use SW_WAPF_PRO\Includes\Classes\Enumerable;
use SW_WAPF_PRO\Includes\Classes\Html;

$cols = isset($model['field']->options['items_per_row']) ? intval($model['field']->options['items_per_row']) : 3;
$cols_tablet = isset($model['field']->options['items_per_row_tablet']) ? intval($model['field']->options['items_per_row_tablet']) : 3;
$cols_mobile = isset($model['field']->options['items_per_row_mobile']) ? intval($model['field']->options['items_per_row_mobile']) : 3;
$first = true;
if(!empty($model['field']->options['choices'])) {

	echo '<div class="wapf-image-swatch-wrapper wapf-swatch-wrapper wapf-col--'.$cols.'" style="--wapf-cols:'.$cols.';--wapf-cols-t:'.$cols_tablet.';--wapf-cols-m:'.$cols_mobile.'">';

	foreach ($model['field']->options['choices'] as $option) {

		$attributes = Html::option_attributes('radio',$model['product'],$model['field'],$option,false);
		$is_checked = $model['is_edit'] ? in_array($option['slug'],$model['default']) : isset($option['selected']) && $option['selected'] === true;
		if($is_checked)
			$attributes['checked'] = '';

		$has_pricing = isset($option['pricing_type']) && $option['pricing_type'] !== 'none';

		echo sprintf(
			'<div class="%swapf-swatch wapf-swatch--image%s">%s<input %s /><img autocomplete="off" src="%s"/>%s</div>',
			$has_pricing ? 'has-pricing ' : '',
			isset($attributes['checked']) ? ' wapf-checked' :'',
			$first ? '<input type="hidden" class="wapf-tf-h" data-fid="'.$model['field']->id.'" value="0" name="wapf[field_'.$model['field']->id.']" />' : '',
			Enumerable::from($attributes)->join(function($value,$key) {
				if($value)
					return $key . '="' . esc_attr($value) .'"';
				else return $key;
			},' '),
			$option['image'],
			Html::swatch_label($model['field'],$option,$model['product'])
		//esc_html($option['label']) . ' ' . Html::frontend_option_pricing_hint($option,$model['product'])
		);

		$first = false;

	}

	echo '</div>';

}