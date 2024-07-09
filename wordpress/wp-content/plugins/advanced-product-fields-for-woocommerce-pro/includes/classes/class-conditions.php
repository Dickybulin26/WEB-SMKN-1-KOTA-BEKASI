<?php

namespace SW_WAPF_PRO\Includes\Classes {


    use SW_WAPF_PRO\Includes\Models\ConditionRuleGroup;
    use SW_WAPF_PRO\Includes\Models\FieldGroup;

    class Conditions
    {
	    public static function get_field_visibility_conditions() {

		    $options = [
			    [
				    'type'          => 'text',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '==contains', 'label' => __('Value contains','sw-wapf'), 'type' => 'text'],
				    ]
			    ],
			    [
				    'type'          => 'email',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '==contains', 'label' => __('Value contains','sw-wapf'), 'type' => 'text'],
				    ]
			    ],
			    [
				    'type'          => 'url',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '==contains', 'label' => __('Value contains','sw-wapf'), 'type' => 'text'],
				    ]
			    ],
			    [
				    'type'          => 'number',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '==contains', 'label' => __('Value contains','sw-wapf'), 'type' => 'text'],
				    ]
			    ],
			    [
				    'type'          => 'textarea',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'text'],
					    ['value' => '==contains', 'label' => __('Value contains','sw-wapf'), 'type' => 'text'],
				    ]
			    ], [
				    'type'          => 'true-false',
				    'conditions'    => [
					    ['value' => 'check', 'label' => __('Is checked', 'sw-wapf'), 'type' => false],
					    ['value' => '!check', 'label' => __('Is not checked', 'sw-wapf'), 'type' => false]
				    ]
			    ], [
				    'type'          => 'select',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'options'],
				    ]
			    ], [
				    'type'          => 'checkboxes',
				    'conditions'    => [
					    ['value' => '==', 'label' => __('Selection contains','sw-wapf'), 'type' => 'options'], 
					    ['value' => '!=', 'label' => __('Selection does not contain','sw-wapf'), 'type' => 'options'],
				    ]
			    ], [
				    'type'          => 'radio',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'options'],
				    ]
			    ],
			    [
				    'type'          => 'date',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Date is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Date is any date','sw-wapf'), 'type' => false],
					    ['value' => '!=', 'label' => __('Date is not equal to','sw-wapf'), 'type' => 'text', 'desc' => __('Use this date format: mm-dd-yyyy','sw-wapf')],
				    ]
			    ],
			    [
				    'type'          => 'image-swatch',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'options'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'options'],
				    ]
			    ],
			    [
				    'type'          => 'multi-image-swatch',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Selection contains','sw-wapf'), 'type' => 'options'],
					    ['value' => '!=', 'label' => __('Selection does not contain','sw-wapf'), 'type' => 'options'],
				    ]
			    ],
			    [
				    'type'          => 'color-swatch',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'options'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'options'],
				    ]
			    ],
			    [
				    'type'          => 'multi-color-swatch',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '!=', 'label' => __('Selection does not contain','sw-wapf'), 'type' => 'options'],
				    ]
			    ],
			    [
				    'type'          => 'text-swatch',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '==', 'label' => __('Value is equal to','sw-wapf'), 'type' => 'options'],
					    ['value' => '!=', 'label' => __('Value is not equal to','sw-wapf'), 'type' => 'options'],
				    ]
			    ],
			    [
				    'type'          => 'multi-text-swatch',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Value is empty','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Value is any value','sw-wapf'), 'type' => false],
					    ['value' => '!=', 'label' => __('Selection does not contain','sw-wapf'), 'type' => 'options'],
				    ]
			    ],
			    [
				    'type'          => 'file',
				    'conditions'    => [
					    ['value' => 'empty', 'label' => __('Has no files selected','sw-wapf'), 'type' => false],
					    ['value' => '!empty', 'label' => __('Has file(s) selected','sw-wapf'), 'type' => false],
				    ]
			    ]
		    ];

		    return $options;

	    }

	    public static function get_fieldgroup_visibility_conditions() {

		    $product_options = [

			    [
				    'group'                 => __('User','sw-wapf'),
				    'children'              => [
					    [
						    'id'            => 'auth',
						    'label'         => __('Authentication','sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'auth',
								    'label' => __('Logged in', 'sw-wapf'),
								    'value' => []
							    ], [
								    'id'    => '!auth',
								    'label' => __('Not logged in', 'sw-wapf'),
								    'value' => []
							    ]
						    ]
					    ],[
						    'id'            => 'role',
						    'label'         => __('User role','sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'role',
								    'label' => __('Is equal to', 'sw-wapf'),
								    'value' => [
									    'type'          => 'select',
									    'data'          => Helper::get_all_roles()
								    ]
							    ], [
								    'id'    => '!role',
								    'label' => __('Is not equal to', 'sw-wapf'),
								    'value' => [
									    'type'          => 'select',
									    'data'          => Helper::get_all_roles()
								    ]
							    ]
						    ]
					    ]
				    ]
			    ],
			    [
				    'group'                 => __('Product', 'sw-wapf'),
				    'children'              => [
					    [
						    'id'            => 'product',
						    'label'         => __('Product', 'sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'product',
								    'label' => __('Is equal to','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a product...",'sw-wapf'),
									    'action'        => 'wapf_search_products',
									    'single'        => true
								    ]
							    ],
							    [
								    'id'    => '!product',
								    'label' => __('Is not equal to','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a product...",'sw-wapf'),
									    'action'        => 'wapf_search_products',
									    'single'        => true
								    ]
							    ],
							    [
								    'id'    => 'products',
								    'label' => __('Any in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a product...",'sw-wapf'),
									    'action'        => 'wapf_search_products',
								    ]
							    ],
							    [
								    'id'    => '!products',
								    'label' => __('Not in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a product...",'sw-wapf'),
									    'action'        => 'wapf_search_products',
								    ]
							    ],

						    ]
					    ],
					    [
						    'id'            => 'product_variation',
						    'label'         => __('Product variation', 'sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'product_var',
								    'label' => __('Any in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a product variation...",'sw-wapf'),
									    'action'        => 'wapf_search_variations'
								    ]
							    ],
							    [
								    'id'    => '!product_var',
								    'label' => __('Not in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a product variation...",'sw-wapf'),
									    'action'        => 'wapf_search_variations'
								    ]
							    ],
						    ]
					    ], [
						    'id'            => 'product_cat',
						    'label'         => __('Product category', 'sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'product_cat',
								    'label' => __('Is equal to','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a category...",'sw-wapf'),
									    'action'        => 'wapf_search_cat',
									    'single'        => true
								    ]
							    ],
							    [
								    'id'    => '!product_cat',
								    'label' => __('Is not equal to','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a category...",'sw-wapf'),
									    'action'        => 'wapf_search_cat',
									    'single'        => true
								    ]
							    ],
							    [
								    'id'    => 'product_cats',
								    'label' => __('Any in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a category...",'sw-wapf'),
									    'action'        => 'wapf_search_cat',
									    'single'        => false
								    ]
							    ],
							    [
								    'id'    => '!product_cats',
								    'label' => __('Not in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a category...",'sw-wapf'),
									    'action'        => 'wapf_search_cat',
									    'single'        => false
								    ]
							    ],
						    ]
					    ],
					    [
						    'id'            => 'var_att',
						    'label'         => __('Product attribute', 'sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'patts',
								    'label' => __('Any in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __('Search a product attribute...','sw-wapf'),
									    'action'        => 'wapf_search_attributes'
								    ]
							    ],
							    [
								    'id'    => '!patts',
								    'label' => __('Not in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __('Search a product attribute...','sw-wapf'),
									    'action'        => 'wapf_search_attributes'
								    ]
							    ]
						    ]
					    ],
					    [
						    'id'            => 'product_tag',
						    'label'         => __('Product tag', 'sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'p_tags',
								    'label' => __('Any in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a tag...",'sw-wapf'),
									    'action'        => 'wapf_search_tag',
									    'single'        => false
								    ]
							    ],
							    [
								    'id'    => '!p_tags',
								    'label' => __('Not in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Search a tag...",'sw-wapf'),
									    'action'        => 'wapf_search_tag',
									    'single'        => false
								    ]
							    ],
						    ]
					    ],
					    [
						    'id'            => 'product_type',
						    'label'         => __('Product type', 'sw-wapf'),
						    'conditions'    => [
							    [
								    'id'    => 'product_type',
								    'label' => __('Any in list','sw-wapf'),
								    'value' => [
									    'type'          => 'select2',
									    'placeholder'   => __("Select a type",'sw-wapf'),
									    'data'          => [
										    ['id' => 'simple', 'text' => 'Simple product'],
                                            ['id' => 'variable', 'text' => 'Variable product'],
                                            ['id' => 'grouped', 'text' => 'Grouped product'],
                                        ]
                                    ]
                                ],
                                [
	                                'id'    => '!product_type',
	                                'label' => __('Not in list','sw-wapf'),
	                                'value' => [
		                                'type'          => 'select2',
		                                'placeholder'   => __("Select a type",'sw-wapf'),
		                                'data'          => [
			                                ['id' => 'simple', 'text' => 'Simple product'],
                                            ['id' => 'variable', 'text' => 'Variable product'],
                                            ['id' => 'grouped', 'text' => 'Grouped product'],
                                        ]
                                    ]
                                ],
                            ]
                        ]

                    ]
                ]
            ];

            $system = ['group' => __('System','sw-wapf'), 'children' => [] ];

            $languages = Helper::get_available_languages();

	        if ( !empty($languages)) {
		        $system['children'][] = [
			        'id'            => 'lang',
			        'label'         => __('Language','sw-wapf'),
			        'conditions'    => [
				        [
					        'id'    => 'lang',
					        'label' => __('Is equal to', 'sw-wapf'),
					        'value' => [
						        'type'          => 'select',
						        'data'          => $languages
					        ]
				        ]
			        ]
		        ];

		        $product_options[] = $system;
	        }

            $product_options = apply_filters('wapf/field_group/condition_options', $product_options);

            return ['wapf_product' => $product_options];
        }

        public static function is_field_group_valid(FieldGroup $field_group)
        {

            if(empty($field_group->rules_groups))
                return true;

            foreach ($field_group->rules_groups as $rule_group) {
                if(self::is_rule_group_valid($rule_group))
                    return true;
            }

            return false;

        }

        public static function is_field_group_valid_for_product(FieldGroup $field_group, $product)
        {

            if(empty($field_group->rules_groups))
                return true;

            foreach ($field_group->rules_groups as $rule_group) {
                if(self::is_rule_group_valid($rule_group, $product))
                    return true;
            }
            return false;
        }

        public static function is_rule_group_valid(ConditionRuleGroup $group, $product = null) {

            if(empty($group->rules))
                return true;

            foreach ($group->rules as $rule) {

                $value = $rule->value;

                if(is_array($value) && count($value) > 0 && isset($value[0]['text']))
                    $value = Enumerable::from($value)->select(function($x) {
                        return $x['id'];
                    })->toArray();

                if(!Conditions::check($rule->condition,$value,$product))
                    return false;

            }

            return true;

        }

        private static function check($condition, $value, $product = null)
        {

            switch ($condition) {
                case 'auth':
                    return is_user_logged_in() === true;
                case '!auth':
                    return is_user_logged_in() === false;
                case 'role':
                    return self::user_has_role($value) === true;
                case '!role':
                    return self::user_has_role($value) === false;
            }

            $product = empty($product) ? $GLOBALS['product'] : $product;

            switch ($condition) {
                case 'product':
                case 'products':
                    return self::is_current_product($product, (array)$value) === true;
                case '!product':
                case '!products':
                    return self::is_current_product($product,(array)$value) === false;
                case 'product_var':
                    return self::is_product_variation($product, $value) === true;
                case '!product_var':
                    return self::is_product_variation($product,$value) === true; 
                case 'product_cat':
                case 'product_cats':
                    return self::is_current_product_category($product,(array)$value) === true;
                case '!product_cat':
                case '!product_cats':
                    return self::is_current_product_category($product,(array)$value) === false;
                case 'product_type':
                    return self::product_is_type($product, $value) === true;
                case '!product_type':
                    return self::product_is_type($product, $value) === false;
	            case 'p_tags':
	            	return self::product_has_tags($product,$value);
	            case '!p_tags':
	            	return self::product_has_tags($product,$value) === false;
	            case 'patts':
					return self::product_has_attribute_values($product,(array)$value);
	            case '!patts':
		            return self::product_has_attribute_values($product,(array)$value) === false;
            }

            switch($condition){
	            case 'lang': return self::current_language_is($value);
	            case '!lang': return self::current_language_is($value) === false;
            }

            return apply_filters('wapf/field_group/is_condition_valid',false,$condition,$value, ['product' => $product]);

        }

        public static function product_has_attribute_values($product,$attribute_values, $strict = false) {

	        $product_attributes = Woocommerce_Service::get_product_attributes($product,$strict);
	        if(empty($product_attributes))
	        	return false;

	        foreach($attribute_values as $v) {
	        	$split = explode('|',$v);
	        	$attr_name = 'pa_' . $split[0];
	        	$value = $split[1];

	        	if(isset($product_attributes[$attr_name]) && ($value === '*' || in_array($value, $product_attributes[$attr_name])))
	        		return true;
	        }

	        return false;

        }

        private static function current_language_is($lang) {
        	return Helper::get_current_language() === $lang;
        }

        private static function user_has_role($role) {

            if(!is_user_logged_in())
                return false;

            $user = wp_get_current_user();

            if($user->ID == 0)
                return false;

            return in_array($role, (array) $user->roles);

        }

        private static function compare_string($subject,$compare_to,$type = '=') {
        	$subject = '' . $subject;
        	$compare_to = '' . $compare_to;

        	switch($type) {
		        case '!=': return $subject !== $compare_to;
		        case '%': return strpos($subject,$compare_to) !== false;
		        default: return $subject === $compare_to;
	        }

        }

        private static function compare_number($subject, $compare_to_value, $type = 'gt') {

            $value = floatval($compare_to_value);
            $subject = floatval($subject);

            switch ($type) {
                case ">": return $subject > $value;
                case "<": return $subject < $value;
                default: return $subject == $value;
            }
        }

        private static function product_has_tags($product,$value = []) {
	        $product_id = $product->get_type() === 'variation' ? $product->get_parent_id() : $product->get_id();
			$tags = get_the_terms($product_id,'product_tag');

			if($tags === false)
				return false;

			foreach ($tags as $tag) {
				if(in_array($tag->term_id,$value))
					return true;
			}

			return false;

        }

        private static function product_is_type($product, $types = []) {

            if(empty($types))
                return false;

            return in_array($product->get_type(),$types);

        }

        private static function is_product_variation( $product, $variations = []) {

	        if($product->is_type('variation')) {
        		return in_array($product->get_id(),$variations, false);
	        }

	        if($product->is_type('variable')) {
		        $children = $product->get_children();
		        foreach ( $children as $child ) {

			        if ( in_array( $child, $variations, false ) ) {
				        return true;
			        }
		        }
	        }

            return false;

        }

        private static function is_current_product($product, $product_ids = []) {

            if(empty($product_ids))
                return false;

            $product_id = $product->get_type() === 'variation' ? $product->get_parent_id() : $product->get_id();

			return in_array($product_id,$product_ids, false);

        }

        private static function is_current_product_category($product, $term_ids = []) {

        	$product_id = $product->get_type() === 'variation' ? $product->get_parent_id() : $product->get_id();
            $terms = get_the_terms($product_id, 'product_cat');

            if(empty($terms) && !is_array($terms))
                return false;

            return Enumerable::from($terms)->any(function($x) use ($term_ids) {
                return in_array($x->term_id,$term_ids);
            });

        }

    }
} 