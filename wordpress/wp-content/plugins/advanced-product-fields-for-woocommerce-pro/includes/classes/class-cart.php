<?php

namespace SW_WAPF_PRO\Includes\Classes {

	use SW_WAPF_PRO\Includes\Models\Field;
	use DateTime;

	class Cart {

		public static function get_cart_item_base_price($product, $quantity,$cart_item) {

			$price = floatval($product->get_price()); 

			$price = apply_filters('wapf/pricing/base', $price, $product, $quantity); 
			$price = apply_filters('wapf/pricing/cart_item_base', $price, $product, $quantity, $cart_item);

			return $price;

		}

		public static function calculate_cart_item_options_total($cart_item) {

			if(empty($cart_item['wapf']))
				return false;

			$quantity = isset($cart_item['quantity']) ? $cart_item['quantity'] : 1;
			$product_id = empty($cart_item['variation_id']) ? $cart_item['product_id'] : $cart_item['variation_id'];

			$product = wc_get_product($product_id);
			$base = self::get_cart_item_base_price($product, $quantity, $cart_item);

			$data = [
				'options_total' => 0,
				'base'          => $base,
				'options'       => []
			];

			$options_total = 0;

			foreach ($cart_item['wapf'] as $field) {
				$prices = [];

				if(!empty($field['values'])) {
					foreach ($field['values'] as $value) {
						if($value['price'] === 0 || $value['price_type'] === 'none')
							continue;

						$v = isset($value['slug']) ? $value['label'] : $field['raw'];

												$price = Fields::do_pricing($field['qty_based'], $value['price_type'], $value['price'], $base, $quantity, $v, $product_id,$cart_item['wapf'],$cart_item['wapf_field_groups'],isset($cart_item['wapf_clone']) ? $cart_item['wapf_clone'] : 0,$options_total);

												$options_total = $options_total + $price;

						$prices[ $v ] = [
							'price' => $price,
							'pricing_hint' => Helper::format_pricing_hint($value['price_type'],$price,$product,'cart'),
						];
					}
				}

				if(!empty($prices))
					$data['options'][$field['id']] = $prices;

			}

			if($options_total === 0) return false;

			$data['options_total'] = $options_total;
			$data['base'] = $base;

			return $data;

		}

		public static function validate_cart_data($field_groups,$passed, $product_id, $qty, $variation_id = null, $is_order_again = false, $cart_item_data = null) {

			$get_value = function($field,$i,$is_order_again, $cart_item_data) {
				if($is_order_again) {

					if(!isset($cart_item_data['wapf'])) return null;
					$the_field = Enumerable::from($cart_item_data['wapf'])->firstOrDefault( function($x) use($field) { return $x['id'] === $field->id; });
					if(!$the_field) return null;

					return $the_field['raw'];

				} else {
					$value = Fields::get_raw_field_value_from_request( $field, $i, true ); 
				}

				return $value;
			};

			foreach ( $field_groups as $field_group ) {

				foreach ( $field_group->fields as $field ) {
					if(!$field->is_normal_field()) continue;
					$loop = $qty > 1 && $field->is_field_or_parent_qty_based() ? $qty-1 : 0;

					$filter = 'wapf/validate/' . $field->id;
					if ( has_filter( $filter ) ) {
						for($i = 0;$i<=$loop;$i++) {
							$clone_idx = $i > 0 ? ($i+1):$i;
							$value = $get_value($field, $clone_idx, $is_order_again, $cart_item_data); 
							$error = apply_filters( $filter, [ 'error' => ! $passed ], $value, $field, $variation_id === null ? $product_id : $variation_id, $clone_idx );
							if ( $error['error'] )
								return $error['message'];
						}
					}

					for($i = 0; $i<=$loop;$i++) {
						$clone_idx = $i > 0 ? ($i+1):$i;
						if ( $field->type === 'file' ) {
							$file_err = self::validate_file_field($field,$clone_idx);
							if( is_string( $file_err ) )
								return $file_err;
						}

						$value = $get_value($field,$clone_idx, $is_order_again, $cart_item_data);

						if($value === '' || $value === null) {
							if(!Fields::should_field_be_filled_out( $field_group, $field, $variation_id === null ? $product_id : $variation_id ))
								continue;
							if($field->required)
								return sprintf(__( 'The field "%s" is required.', 'sw-wapf' ), $field->get_label());
						}

						if(!empty($value)) {
							$valid = true;
							if($field->is_multichoice_field()) {
								self::validate_multiple_choice_field($field,$value);
							}

							if($field->type === 'date') {
								self::validate_date_field($field,$value);
							}

							if($field->type === 'number') {
								self::validate_number_field($field,$value);
							}

							if(is_string($valid)) return $valid;

							$err = apply_filters('wapf/validate', ['error' => !$passed], $value, $field, $variation_id === null ? $product_id : $variation_id, $clone_idx);
							if ( $err['error'] )
								return isset($err['message']) ? $err['message'] : '';

						}

					}
				}
			}

			return $passed;

		}

		public static function to_cart_item_field(Field $field, $clone_idx = 0,$raw_values = null) {

			if(!$raw_values) {
				$raw_values = Fields::get_raw_field_value_from_request($field, $clone_idx);
			}

			$values = Fields::raw_to_cartfield_values($field, $raw_values,$clone_idx);

			return
				apply_filters('wapf/cart/cart_item_field',
					array(
					'id'            => $field->id,
					'type'          => $field->type,
					'raw'           => is_string($raw_values) ? sanitize_textarea_field($raw_values) : array_map('sanitize_textarea_field',$raw_values),
					'values'        => $values,
					'qty_based'     => $field->is_field_or_parent_qty_based(),
					'label'         => esc_html( $field->get_label() ),
					'hide_cart'     => self::should_hide_on('cart',$field,$raw_values),
					'hide_checkout' => self::should_hide_on('checkout', $field,$raw_values),
					'hide_order'    => self::should_hide_on('order', $field,$raw_values)
					),
					$field,
					$clone_idx
				);

		}

		#region Private Helpers
		private static function should_hide_on($page,Field $field,$raw_value) {

			if($field->type === 'number' && isset($field->options['hide_zero']) && $field->options['hide_zero'] && $raw_value === '0')
				return true;

			switch($page) {
				case 'cart' : return isset( $field->options['hide_cart'] ) && $field->options['hide_cart'];
				case 'checkout': return isset($field->options['hide_checkout']) && $field->options['hide_checkout'];
				case 'order': return isset($field->options['hide_order']) && $field->options['hide_order'];
			}

			return false;
		}

		private static function validate_file_field(Field $field, $clone_idx) {
			$files = Cache::get_files();

			if(File_Upload::is_ajax_upload()) {
				$value = Fields::get_raw_field_value_from_request( $field, $clone_idx, true );
				$return = File_Upload::validate_ajax_upload_for_cart($value);
			}
			else
				$return = File_Upload::validate_files_for_field( $files, $field );

			return $return;
		}

		private static function validate_date_field(Field $field, $value) {
			$date_format = get_option('wapf_date_format','mm-dd-yyyy');
			$regex = '/'.Helper::date_format_to_regex($date_format).'/';
			if(!preg_match($regex,$value))
				return sprintf(__('The field "%s" has an incorrect date format.','sw-wapf'), $field->get_label());

			$disable_past = isset($field->options['disable_past']) && $field->options['disable_past'];
			$disable_future = isset($field->options['disable_future']) && $field->options['disable_future'];
			$disable_today = isset($field->options['disable_today']) && $field->options['disable_today'];

			$date = DateTime::createFromFormat(Helper::date_format_to_php_format($date_format),$value,Helper::wp_timezone())->setTime(0,0,0);
			$now = new DateTime('now',Helper::wp_timezone());
			$now->setTime(0,0,0);
			$interval = $now->diff($date);

			if($disable_today && $interval->days == 0)
				return sprintf(__("\"%s\" can't be equal to today.",'sw-wapf'), $field->get_label());
			if($disable_future && $interval->invert === 0)
				return sprintf(__("\"%s\" can't be in the future.",'sw-wapf'), $field->get_label());
			if($disable_past && $interval->invert === 1)
				return sprintf(__("\"%s\" can't be in the past.",'sw-wapf'), $field->get_label());

			return true;
		}

		private static function validate_number_field(Field $field, $value) {
			$value = floatval($value);

			if(isset($field->options['minimum']) && $field->options['minimum'] != '' && $value < floatval($field->options['minimum']) )
				return sprintf(__( 'The field "%s" requires a minimum of %s.', 'sw-wapf' ), $field->get_label(), $field->options['minimum']);

			if(isset($field->options['maximum']) && $field->options['maximum'] != '' && $value > floatval($field->options['maximum']) )
				return sprintf(__( 'The field "%s" requires a maximum of %s.', 'sw-wapf' ), $field->get_label(), $field->options['maximum']);

			return true;
		}

		private static function validate_multiple_choice_field(Field $field,$value) {
			if ( ! empty( $field->options['min_choices'] ) && count( (array) $value ) < intval( $field->options['min_choices'] ) )
				return sprintf(__( 'The field "%s" requires at minimum %s selections.', 'sw-wapf' ), $field->get_label(),$field->options['min_choices']);

			if ( ! empty( $field->options['max_choices'] ) && count( (array) $value ) > intval( $field->options['max_choices'] ) )
				return sprintf(__( 'The field "%s" requires at maximum %s selections.', 'sw-wapf' ), $field->get_label(), $field->options['max_choices'] );

			return true;
		}
		#endregion

	}
} 