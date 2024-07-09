<?php

namespace SW_WAPF_PRO\Includes\Classes
{

    use SW_WAPF_PRO\Includes\Models\Field;
    use SW_WAPF_PRO\Includes\Models\FieldGroup;

    class Html
    {
    	public static $minimal_allowed_html = [
		    'br'        => [],
		    'hr'        => ['class' => [], 'style' => [],'id' => []],
		    'a'         => ['href' => [], 'target' => [], 'class' => [], 'style' => [],'id' => []],
		    'i'         => ['class' => [], 'style' => [],'id' => []],
		    'em'        => ['class' => [], 'style' => [],'id' => []],
		    'b'         => ['class' => [], 'style' => [],'id' => []],
		    'ol'        => ['class' => [], 'style' => [],'id' => []],
		    'li'        => ['class' => [], 'style' => [],'id' => []],
	    ];

        public static $minimal_allowed_html_element = [
            'br'        => [],
            'hr'        => ['class' => [], 'style' => [],'id' => []],
            'a'         => ['href' => [], 'target' => [], 'class' => [], 'style' => [],'id' => []],
            'i'         => ['class' => [], 'style' => [],'id' => []],
            'em'        => ['class' => [], 'style' => [],'id' => []],
            'b'         => ['class' => [], 'style' => [],'id' => []],
            'span'      => ['class' => [], 'style' => [],'id' => []],
            'h3'        => ['class' => [], 'style' => [],'id' => []],
            'h4'        => ['class' => [], 'style' => [],'id' => []],
            'h5'        => ['class' => [], 'style' => [],'id' => []],
            'h6'        => ['class' => [], 'style' => [],'id' => []],
	        'ul'        => ['class' => [], 'style' => [],'id' => []],
            'ol'        => ['class' => [], 'style' => [],'id' => []],
            'li'        => ['class' => [], 'style' => [],'id' => []],
	        'table'     => ['class' => [], 'style' => [],'id' => []],
	        'tr'        => ['class' => [], 'style' => [],'id' => []],
	        'td'        => ['class' => [], 'style' => [],'id' => []],
	        'th'        => ['class' => [], 'style' => [],'id' => []],
	        'thead'     => ['class' => [], 'style' => [],'id' => []],
        ];

        #region General views
        public static function partial($view, $model = null)
        {
            ob_start();
            $dir = trailingslashit(wapf_get_setting('path')) . 'views/' . $view;
            include $dir . '.php';
            echo ob_get_clean();
        }

        public static function view($view, $model = null)
        {
            ob_start();

            $dir = trailingslashit(wapf_get_setting('path')) . 'views/' . $view;
            include $dir . '.php';

            return ob_get_clean();
        }

        #endregion

        #region Admin Functions
	    public static function admin_tooltip($txt){
        	return '<div class="wapf-tt"><i class="dashicons-before dashicons-editor-help"></i><span class="tt-inner">'.esc_html($txt).'</span></div>';
	    }

	    public static function admin_choice_option_extra_input($input) {

        	$html = '';

        	switch($input['type']) {
		        case 'text':
			        $html = '<input type="text" rv-on-change="onChange"
                            placeholder="' . (isset($input['placeholder']) ? esc_attr($input['placeholder']) : '' ). '"
                            rv-value="choice.options.' . esc_attr($input['key']) . '" />';
		        break;

		        case 'number':
			        $html = '<input type="number" rv-on-change="onChange"
                            placeholder="' . (isset($input['placeholder']) ? esc_attr($input['placeholder']) : '' ). '"
                            rv-value="choice.options.' . esc_attr($input['key']) . '" />';
			        break;

		        case 'checkbox':
			        $html = '<input rv-on-change="onChange" rv-checked="choice.options.' . esc_attr($input['key']) . '" type="checkbox" />';
			        break;
        	}

        	return $html;

	    }

        public static function setting($model = []) {

            if(!isset($model['type']))
                return;

			$show_if = '';

			if(!empty($model['show_if'])) {
				$show_if = 'field.' . esc_attr($model['show_if']);
			}

			echo sprintf(
				'<div %s class="wapf-field__setting" data-setting="%s"><div class="wapf-setting__label"><label>%s</label>%s</div>',
				empty($show_if) ? '' : 'rv-show="'.$show_if .'"',
				isset($model['id']) ? $model['id'] : '',
				__($model['label'],'sw-wapf'),
				isset($model['description']) ? '<p class="wapf-description">'.esc_html($model['description']).'</p>' : ''
			);

			echo '<div class="wapf-setting__input">';

	        ob_start();

	        $view = apply_filters(
		        'wapf/admin_setting_template_path',
		        trailingslashit(wapf_get_setting('path')) . 'views/admin/settings/' . $model['type'] .'.php',
		        $model['type']
	        );

            include $view;

            echo ob_get_clean();

            echo '</div></div>';
        }

        public static function admin_field($field = [], $type = 'wapf_product') {
            ob_start();
            $path = trailingslashit(wapf_get_setting('path')) . 'views/admin/field.php';
            include $path;
            echo ob_get_clean();
        }

        public static function wp_list_table($view_name,$model,$list) {
            ob_start();
            $path = trailingslashit(wapf_get_setting('path')) . 'views/admin/'.$view_name.'.php';
            include $path;
            echo ob_get_clean();
        }

        public static function help_modal($data) {
        	$model = array_merge(array(
		        'content'   => '',
		        'title'     => '',
		        'button'    => null,
		        'icon'      => false,
		        'id'        => 'wapf--' . uniqid()
	        ), $data);

	        ob_start();
	        $path = trailingslashit(wapf_get_setting('path')) . 'views/admin/help-modal.php';
	        include $path;
	        echo ob_get_clean();
        }
        #endregion

        #region Product-related Functions
        public static function product_totals($product, $field_groups = []) {

            $data = [
            	'product-id'        => $product->get_id(),
	            'product-type'      => $product->get_type() === 'variation' ? 'variable' : $product->get_type(),
	            'product-price'     => apply_filters('wapf/pricing/product', wc_get_price_to_display($product), $product) 
            ];

            $data_output = Enumerable::from($data)->join(function($value,$key){
            	return 'data-' . esc_html($key) . '="'.esc_html($value).'"';
            },' ');

            ob_start();
            $path = trailingslashit(wapf_get_setting('path')) . 'views/frontend/product-totals.php';
            include $path;
            $totals_html = ob_get_clean();

            echo apply_filters('wapf/html/product_totals',$totals_html, $product);

        }
        #endregion

        #region Field Groups and Fields

	    public static function display_field_groups($field_groups, $product, $cart_item_fields = []) {

		    ob_start();

		    do_action('wapf_before_wrapper', $product);

		    echo '<div class="wapf-wrapper">';

		    $group_ids = [];

		    foreach ($field_groups as $field_group) {

			    $group_ids[] = $field_group->id;
			    echo self::field_group($product,$field_group, $cart_item_fields);

		    }

		    echo '<input type="hidden" value="'.implode(',',$group_ids).'" name="wapf_field_groups"/>';

		    if(!empty($cart_item_fields))
		        echo '<input type="hidden" name="_wapf_edit" value="'.esc_attr($_GET['_edit']).'" />';
		    echo '</div>';

		    do_action('wapf_before_product_totals', $product);

		    self::product_totals($product, $field_groups);

		    do_action('wapf_after_product_totals', $product);

		    return ob_get_clean();
	    }

        public static function field_group($product, FieldGroup $field_group, $cart_item_fields = []) {

            if(empty($field_group) || empty($field_group->fields))
                return '';

            ob_start();
            $dir = trailingslashit(wapf_get_setting('path')) . 'views/frontend/field-group.php';
            include $dir;
            return ob_get_clean();

        }

        public static function field_defaults(Field $field, $cart_item_field) {
	        $defaults = [self::field_value($field)];

	        if(!empty($cart_item_field)) {
		        $defaults = [];
		        foreach($cart_item_field['values'] as $v) {
		        	$defaults[] = isset($v['slug']) ? $v['slug'] : $v['label'];
		        }
	        }

	        return $defaults;
        }

        public static function field($product, Field $field, $fieldgroup_id, $cart_item_field = []) {

        	$field_attributes = self::field_attributes($product,$field,$fieldgroup_id);
        	$field_attributes_html = Enumerable::from( $field_attributes )->join( function ( $value, $key ) {
		        if ( isset($value) && strval($value)!='' ) {
			        return $key . '="' . esc_attr( $value ) . '"';
		        } else {
			        return $key;
		        }
	        }, ' ' );

        	$data = self::field_data($product, $field, $fieldgroup_id);

        	$defaults = self::field_defaults($field,$cart_item_field);
        	$is_edit = !empty($cart_item_field);

            $model = apply_filters('wapf/field_template_model',[
            	'product'               => $product,
                'field'                 => $field,
                'default'               => $defaults,
	            'is_edit'               => $is_edit,
	            'field_value'           => self::field_value($field),
                'field_attributes'      => $field_attributes_html,
	            'raw_field_attributes'  => $field_attributes,
	            'data'                  => $data
            ], $field, $fieldgroup_id, $product);

            $file_name = $field->type === 'p' ? 'content' : $field->type;

            $view = apply_filters(
            	'wapf/field_template_path',
	            trailingslashit(wapf_get_setting('path')) . 'views/frontend/fields/' . $file_name . '.php',
	            $field
            );

            ob_start();

            include $view;

            return ob_get_clean();

        }

        private static function field_data($product, $field, $fieldgroup_id) {
        	$data = [];
        	if($field->type === 'date') {
        		global $wp_locale;
        		if($wp_locale) {
			        $data = [
						'months'        => array_values($wp_locale->month),
						'monthsShort'   => array_values($wp_locale->month_abbrev),
						'days'          => array_values($wp_locale->weekday),
				        'daysShort'     => array_values($wp_locale->weekday_initial)
			        ];
		        }

	        }
        	return $data;
        }

        public static function field_description(Field $field) {

        	if(empty($field->description))
        		return '';

            $field_description = '<div class="wapf-field-description">'.wp_kses($field->description,self::$minimal_allowed_html).'</div>';

            return apply_filters('wapf/html/field_description',$field_description,$field);
        }

        public static function section_container_classes(Field $field) {
	        $extra_classes = apply_filters('wapf/section_classes/' . $field->id, []);

	        $classes = ['wapf-section'];

	        if(!empty($field->class))
		        $classes[] = $field->class;

	        if($field->has_conditionals())
	        	$classes[] = 'wapf-hide has-conditions';

	        return implode(' ', array_merge(array_map('sanitize_html_class', $extra_classes), $classes));
        }

        public static function field_container_classes(Field $field,\WC_Product $product) {

            $extra_classes = apply_filters('wapf/html/field_container_classes', [], $field);
            $classes = ['wapf-field-container','wapf-field-' . $field->type];

            if(!empty($field->class))
                $classes[] = $field->class;

            if($field->has_conditionals() )
                $classes[] = 'wapf-hide';

            if(!$field->is_choice_field() && $field->pricing_enabled())
            	$classes[] = 'has-pricing';

	        if(!empty($field->conditionals)) {
		        $classes[] = 'has-conditions';
	        }

            return implode(' ', array_merge(array_map('sanitize_html_class', $extra_classes), $classes));
        }

        public static function field_container_attributes(Field $field){

            $attributes = ['for' => $field->id];

	        if(!empty($field->conditionals)) {
		        $dependencies = Helper::thing_to_html_attribute_string($field->conditionals);
		        $attributes['data-wapf-d'] = $dependencies;
	        }

            if($field->qty_based) {
	            $attributes['data-qty-based'] = '';

	            if($field->type === 'section')
		            $attributes['data-clone-txt'] = empty($field->clone_txt) ? '' : $field->clone_txt;
	            else $attributes['data-clone-txt'] = empty($field->clone_txt) ? ($field->label . ' #{n}') : $field->clone_txt;

            }

            $attributes = apply_filters('wapf/html/field_container_attributes', $attributes, $field);

            return Enumerable::from($attributes)->join(function($value,$key) {
                if($value)
                    return sanitize_text_field($key) . '="' . esc_attr($value) .'"';
                else return sanitize_text_field($key);
            },' ');
        }

        public static function field_label(Field $field, $product, $show_required_symbol = true) {

            $label = '<span>' . wp_kses($field->label, self::$minimal_allowed_html) .'</span>';

            if($show_required_symbol && $field->required)
                $label .= ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';

            if($field->pricing_enabled() && $field->type !== 'true-false' && !$field->is_choice_field() )
                $label .= ' ' . self::frontend_field_pricing_hint($field,$product);

            return apply_filters('wapf/html/field_label',$label,$field,$product);

        }

        public static function multi_choice_attributes(Field $field, $product) {

        	$attributes = [
		        'data-is-required' => $field->required
	        ];

	        $attributes = apply_filters('wapf/html/multi_choice_attributes', $attributes, $field, $product);

	        return Enumerable::from( $attributes )->join( function ( $value, $key ) {
		        if ( isset($value) && strval($value)!='' ) {
			        return $key . '="' . esc_attr( $value ) . '"';
		        } else {
			        return $key;
		        }
	        }, ' ' );

        }

        public static function option_attributes($type,$product, Field $field, $option, $multiple_choice = false) {

	        $prefix = 'data-wapf-';

	        $attributes = [
				'type'              => $type,
				'id'                => 'wapf_field_' . $field->id .'_' . $option['slug'],
				'name'              => sprintf('wapf[field_%s]' . ($multiple_choice ? '[]' : ''), $field->id),
				'class'             => 'wapf-input',
				'data-field-id'     => $field->id,
				'value'             => $option['slug'],
				$prefix .'label'    => esc_html($option['label']),
			];

	        $attributes['data-is-required'] = $field->required;

	        if($field->required)
		        $attributes['required'] = '';

	        if(isset($option['pricing_type']) && $option['pricing_type'] !== 'none') {
		        $attributes[$prefix . 'pricetype'] = $option['pricing_type'];
		        $attributes[$prefix . 'price'] = $option['pricing_type'] === 'fx' ? $option['pricing_amount'] : Helper::adjust_addon_price($product,$option['pricing_amount'],$option['pricing_type'],'shop');
		        if($option['pricing_type'] === 'fx')
			        $attributes[$prefix . 'tax'] = wc_get_price_to_display($product, ['qty' => 1, 'price' => 1]);
	        }

	        if($multiple_choice ) {
	        	if(isset($field->options['max_choices']))
	        	    $attributes['data-maxc'] = intval($field->options['max_choices']);
		        if(isset($field->options['min_choices']))
			        $attributes['data-minc'] = intval($field->options['min_choices']);
	        }

	        $attributes = apply_filters('wapf/html/option_attributes', $attributes, $field, $product, $option);

	        return $attributes;

        }

        private static function field_attributes($product,Field $field, $field_group_id) {

        	$field_attributes = [
		        'data-is-required'  => $field->required,
		        'data-field-id'     => $field->id
	        ];

	        if($field->required)
		        $field_attributes['required'] = '';

	        if(!$field->is_content_field()) {

		        $extra_classes = apply_filters('wapf/html/field_classes', [], $field);
		        $classes = ['wapf-input'];

		        $field_attributes['name'] = 'wapf[field_'.$field->id.']';
		        $field_attributes['class'] = implode(' ',array_merge(array_map('sanitize_html_class',$extra_classes,$classes)));

		        if ( $field->type !== 'select' ) {
			        if ( $field->pricing_enabled() ) {
				        $field_attributes['data-wapf-price'] = $field->pricing->type === 'fx' ?
					        $field->pricing->amount :
					        Helper::adjust_addon_price( $product, $field->pricing->amount, $field->pricing->type, 'shop' );
				        $field_attributes['data-wapf-pricetype'] = $field->pricing->type;
				        if ( $field->pricing->type === 'fx' ) {
					        $field_attributes['data-wapf-tax'] = wc_get_price_to_display( $product, ['qty' => 1, 'price' => 1] );
				        }
			        }
		        }

		        if($field->type === 'date') {
		        	$field_attributes['data-df'] = get_option('wapf_date_format','mm-dd-yyyy');
		        }

		        if($field->type === 'file' && !File_Upload::is_ajax_upload()) {
			        $field_attributes['name'] = $field_attributes['name'] . '[]';
			        if(!empty($field->options['multiple']))
						$field_attributes['multiple'] = '';
					if(isset($field->options['accept'])) {
						$accept = '.' . str_replace(array(',','|'),',.',$field->get_option('accept'));
						$field_attributes['accept'] = $accept;
					}
		        }

		        if ( isset( $field->options['placeholder'] ) ) {
			        $field_attributes['placeholder'] = $field->options['placeholder'];
		        }

		        if ( isset( $field->options['minimum'] ) ) {
			        $field_attributes['min'] = $field->options['minimum'];
		        }

		        if ( isset( $field->options['maximum'] ) ) {
			        $field_attributes['max'] = $field->options['maximum'];
		        }

		        if(isset($field->options['number_type']) && $field->options['number_type'] !== 'int')
		        	$field_attributes['step'] = $field->options['number_type'];

		        if ( !empty( $field->options['minlength'] ) ) {
			        $field_attributes['minlength'] = intval($field->options['minlength']);
		        }
		        if ( !empty( $field->options['maxlength'] ) ) {
			        $field_attributes['maxlength'] = intval($field->options['maxlength']);
		        }
		        if ( !empty( $field->options['pattern'] ) ) {
			        $field_attributes['pattern'] = $field->options['pattern'];
		        }

	        }

	        $field_attributes = apply_filters('wapf/html/field_attributes',$field_attributes, $field, $product, $field_group_id);

	        return $field_attributes;

        }

        private static function field_value(Field $field) {

        	if($field->type === 'p')
        		return empty($field->options['p_content']) ? '' : wp_kses($field->options['p_content'], array_merge(self::$minimal_allowed_html_element, ['img' => ['src' => [], 'class' => [], 'style' => [],'id' => [] ] ]));
        	if($field->type === 'img')
		        return empty($field->options['image']) ? '' : $field->options['image'];

	        $value = isset($field->options['default']) ? esc_html($field->options['default']) : '';

            return $value;
        }

	    public static function tooltip(Field $field,$option,$product) {

		    $pricing_hint = self::frontend_option_pricing_hint($option, $product);

		    $ttp_css = '';
		    $span_css = '';
			if(!empty($field->options['tooltip_bg'])) {
				$bg = esc_attr($field->options['tooltip_bg']);
				$ttp_css = 'background:' . $bg . ';color:' . $bg;
			}
		    if(!empty($field->options['tooltip_fg']))
			    $span_css = 'color:' . esc_attr($field->options['tooltip_fg']) . ';';

		    return sprintf(
			    '<span class="wapf-ttp" %s><span %s>%s%s</span></span>',
			    empty($ttp_css) ? '' : ('style="' . $ttp_css . '"'),
			    empty($span_css) ? '' : ('style="' . $span_css . '"'),
			    esc_html($option['label']),
			    empty($pricing_hint) ? '' : '  ' . $pricing_hint
		    );
	    }

	    public static function swatch_label(Field $field,$image_swatch_option,$product, $default = 'default') {

        	$label_position = isset($field->options['label_pos']) ? $field->options['label_pos'] : $default;

        	switch($label_position) {
		        case 'tooltip' : return self::tooltip($field,$image_swatch_option,$product);
		        case 'hide' : return '';
		        default: return '<div class="wapf-swatch-label">' . esc_html($image_swatch_option['label']) . ' ' . Html::frontend_option_pricing_hint($image_swatch_option,$product) . '</div>';
	        }

	    }

	    public static function frontend_option_pricing_hint($option, $product) {

		    if(!Util::show_pricing_hints() || empty($option['pricing_type']) || $option['pricing_type'] === 'none')
		    	return '';

		    return '<span class="wapf-pricing-hint">' . Helper::format_pricing_hint($option['pricing_type'], $option['pricing_type'] === 'fx' ? '' : $option['pricing_amount'], $product,'shop') . '</span>';

        }

	    public static function frontend_field_pricing_hint(Field $field, $product) {

		    if(!$field->pricing_enabled() || !Util::show_pricing_hints())
		    	return '';

		    return '<span class="wapf-pricing-hint">'. Helper::format_pricing_hint($field->pricing->type, $field->pricing->type === 'fx' ? '' : $field->pricing->amount, $product,'shop') .'</span>';
	    }

	    #endregion

    }
} 