<?php

namespace SW_WAPF_PRO\Includes\Classes {

	class Helper
    {

    	#region Date functions

		public static function date_format_to_php_format($date_format) {

			$search = ['mm', 'dd', 'yyyy' ];
			$replace = [ 'm', 'd', 'Y'];
			$search2 = [ 'm', 'd', 'yy' ];
			$replace2 = [ 'n', 'j', 'y' ];

			for($i=0; $i<count($search); $i++) {
				$c=0;
				$date_format = str_replace($search[$i],$replace[$i],$date_format,$c);
				if($c === 0)
					$date_format = str_replace($search2[$i],$replace2[$i],$date_format);
			}

			return $date_format;

		}

    	public static function date_format_to_regex($date_format) {
		    return str_replace(
			    [
				    'mm',
				    'dd',
				    'yyyy',
				    'm',
				    'd',
				    'yy',
				    '.',
				    '/'
			    ],
			    [
				    '(0[1-9]|1[012])',
				    '(0[1-9]|[12][0-9]|3[01])',
				    '[0-9]{4}',
				    '([1-9]|1[012])',
				    '([1-9]|[12][0-9]|3[01])',
				    '[0-9]{2}',
				    '\.',
				    '\/',
			    ],
			    $date_format
		    );
	    }

		public static function wp_timezone() {
			return new \DateTimeZone( self::wp_timezone_string() );
		}

		private static function wp_timezone_string() {
			$timezone_string = get_option( 'timezone_string' );

			if ( $timezone_string ) {
				return $timezone_string;
			}

			$offset  = (float) get_option( 'gmt_offset' );
			$hours   = (int) $offset;
			$minutes = ( $offset - $hours );

			$sign      = ( $offset < 0 ) ? '-' : '+';
			$abs_hour  = abs( $hours );
			$abs_mins  = abs( $minutes * 60 );
			$tz_offset = sprintf( '%s%02d:%02d', $sign, $abs_hour, $abs_mins );

			return $tz_offset;
		}

	    #endregion

		#region String functions

		public static function string_to_date($str) {
			$split = explode('-',$str);
			if(sizeof($split) === 2) $str .= ('-' . date('Y'));
			$day = \DateTime::createFromFormat('m-d-Y',$str, wp_timezone());
			$day->setTime(0,0,0);
			return $day;
		}

		public static function extract_upload_urls_from_html($html) {

			$wp_upload_dir = wp_upload_dir();
			$path = $wp_upload_dir['baseurl'] . '/' . File_Upload::$upload_parent_dir;

			$urls = [];
			$htmls = explode(', ', $html);

			foreach($htmls as $h) {
				if(empty($h)) continue;
				$url = self::extract_url_from_a_tag($h);
				$urls[] = str_replace(trailingslashit($path),'',$url);
			}

			return $urls;
		}

		public static function extract_url_from_a_tag($html) {
			if(empty($html)) return '';
			if(strpos($html,'<a href=') === false) return $html; 
			$url = preg_match('/<a href="(.+?)"/', $html, $match);
			if(count($match) >1) return $match[1];
			return '';
		}

		#endregion

		public static function split_multibyte_string($str) {
			return function_exists('mb_str_split') ? mb_str_split($str) :  preg_split('//u', $str, null, PREG_SPLIT_NO_EMPTY);
		}

    	public static function wp_slash($value) {
		    if ( is_array( $value ) ) {
			    $value = array_map( 'self::wp_slash', $value );
		    }
		    if ( is_string( $value ) ) {
			    return addslashes( $value );
		    }
		    return $value;
	    }

        public static function get_all_roles() {

            $roles = get_editable_roles();

            return Enumerable::from($roles)->select(function($role, $id) {
                return [ 'id' => $id,'text' => $role['name'] ];
            })->toArray();
        }

        public static function thing_to_html_attribute_string($thing) {

            $encoded = wp_json_encode($thing);
            return function_exists('wc_esc_json') ? wc_esc_json($encoded) : _wp_specialchars($encoded, ENT_QUOTES, 'UTF-8', true);

        }

	    public static function normalize_string_decimal($number)
	    {
		    return preg_replace('/\.(?=.*\.)/', '', (str_replace(',', '.', $number)));
	    }

	    public static function hex_to_rgba( $hex, $alpha = 1 ) {

		    $hex = str_replace( '#', '', $hex );

		    $length = strlen( $hex );
		    $rgb['r'] = hexdec( $length == 6 ? substr( $hex, 0, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 0, 1 ), 2 ) : 0 ) );
		    $rgb['g'] = hexdec( $length == 6 ? substr( $hex, 2, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 1, 1 ), 2 ) : 0 ) );
		    $rgb['b'] = hexdec( $length == 6 ? substr( $hex, 4, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 2, 1 ), 2 ) : 0 ) );
		    return sprintf('rgba(%s,%s,%s,%s)',$rgb['r'],$rgb['g'],$rgb['b'],$alpha);
	    }

        #region Price functions

		public static function maybe_add_tax($product, $price, $for_page = 'shop'){

				if(empty($price) || $price > 0 || !wc_tax_enabled())
					return $price;

				if(is_int($product))
					$product = wc_get_product($product);

				$args = [ 'qty' => 1, 'price' => $price ];

				if($for_page === 'cart') {
					if(get_option('woocommerce_tax_display_cart') === 'incl')
						return wc_get_price_including_tax($product, $args);
					else
						return wc_get_price_excluding_tax($product, $args);
				}
				else
					return wc_get_price_to_display($product, $args);

		}

	    public static function adjust_addon_price($product, $amount,$type,$for = 'shop') {

		    if($amount === 0)
			    return 0;

		    if($type === 'percent' || $type === 'p')
		    	return $amount;

		    $amount = self::maybe_add_tax($product,$amount,$for);

		    $amount = apply_filters('wapf/pricing/addon',$amount, $product, $type, $for);

		    return $amount;

	    }

	    public static function format_price($price) {

		    $price_display_options = Woocommerce_Service::get_price_display_options();

		    return sprintf(
			    $price_display_options['format'],
			    $price_display_options['symbol'],
			    number_format(
				    $price,
				    $price_display_options['decimals'],
				    $price_display_options['decimal'],
				    $price_display_options['thousand']
			    )
		    );
	    }

        public static function format_pricing_hint($type, $amount, $product, $for_page = 'shop') {

	        $format = apply_filters('wapf/html/pricing_hint/format','(<span class="wapf-addon-price">{x}</span>)',$product, $amount, $type);
			$amount = apply_filters('wapf/html/pricing_hint/amount', $amount, $product, $type);

			$ar_sign = empty($amount) ? '+' : ($amount < 0 ? '' : '+');

	        if($for_page === 'shop' && ($type === 'percent' || $type === 'p')) {
		        return apply_filters( 'wapf/html/pricing_hint', str_replace(
			        '{x}',
			        sprintf( '%s%s%%', $ar_sign, empty( $amount ) ? 0 : $amount )
			        , $format
		        ), $product, $amount, $type );
	        }

	        $price_output = self::format_price( self::adjust_addon_price($product,empty($amount) ? 0 : $amount,$type, $for_page) );

	        if($type === 'fx')
		        return apply_filters('wapf/html/pricing_hint', str_replace('{x}', (empty($amount) ? '...' : sprintf('%s%s',$ar_sign,$price_output)), $format),$product,$amount,$type);

            if($for_page === 'shop' && ($type === 'char' || $type == 'charq')) {
                return apply_filters( 'wapf/html/pricing_hint', str_replace( '{x}', sprintf( '%s%s %s', $ar_sign, $price_output, __( 'per character', 'sw-wapf' ) ), $format ), $product, $amount, $type );
            }

            $sign = $type === 'nr' || $type === 'nrq' ? '&times;' : $ar_sign;

	        $str =  str_replace('{x}',sprintf('%s%s', $sign, $price_output), $format);
	        return apply_filters('wapf/html/pricing_hint',$str,$product,$amount,$type);
        }

        #endregion

        #region language functions

	    public static function get_available_languages() {

		    if(function_exists('pll_languages_list')) {
			    $languages = pll_languages_list(['fields' => null]);

			    if(is_array($languages))
			    	return Enumerable::from($languages)->select(function($x){
			    		return [
			    			'id'    => $x->locale, 
			    			'text'    => $x->name,
					    ];
				    })->toArray();
		    }

		    if(function_exists('icl_get_languages')) {
			    $languages = icl_get_languages('skip_missing=0&orderby=code');
			    return Enumerable::from($languages)->select(function($x){
				    return [
					    'id' => $x['code'],
					    'text' => $x["native_name"]
				    ];
			    })->toArray();
		    }

			return [];
	    }

	    public static function get_current_language() {

		    if(function_exists('pll_current_language')) {
		    	return pll_current_language('locale');
		    }

			if(defined('ICL_LANGUAGE_CODE'))
				return ICL_LANGUAGE_CODE;

		    return 'default';
	    }

		#endregion

		#region Formula functions

		private static $formula_functions = [];

	    public static function add_formula_function($func,$callback) {
	    	self::$formula_functions[$func] = $callback;
	    }

	    public static function get_all_formula_functions() {
	    	return apply_filters('wapf/fx/functions', array_keys(self::$formula_functions));
	    }

	    public static function split_formula_variables($str) {
	    	$open = 0;
	    	$paramStr = '';
	    	$params = [];
	    	$chars = self::split_multibyte_string($str);
			$len = count($chars);

	    	for($i=0;$i<$len;$i++) {
			    if ($chars[$i] === ';' && $open === 0) {
				    $params[] = $paramStr;
				    $paramStr = '';
				    continue;
			    }
			    if ($chars[$i] === '(')
				    $open++;
			    if ($chars[$i] === ')')
				    $open--;
			    $paramStr .= $chars[$i];
		    }

		    if (strlen($paramStr) > 0 || count($params) === 0) {
			    $params[] = $paramStr;
		    }
		    return array_map('trim',$params);
	    }

		public static function closing_bracket_index($str,$from_pos) {
			$arr = str_split($str);
			$openBrackets = 1;

			for($i = $from_pos;$i<strlen($str);$i++) {

				if($arr[$i] === '(')
					$openBrackets++;
				if($arr[$i] === ')') {
					$openBrackets--;
					if($openBrackets === 0)
						return $i;
				}
			}
			return sizeof($str)-1;
		}

		public static function replace_in_formula($str,$qty,$base_price,$val,$options_total = 0,$cart_fields = [], $product_id = null) {


	    				$str = str_replace( ['[gty]','[price]','[y]','[options_total]'], [$qty,$base_price,$val,$options_total], $str );

						$str =  preg_replace_callback('/\[field\..+?]/', function($matches) use ($cart_fields) {
				$field_id = str_replace( ['[field.',']'],'',$matches[0]);
				$field = Enumerable::from($cart_fields)->firstOrDefault(function($f) use ($field_id){return $f['id'] === $field_id;});
				return isset( $field['values'][0]['label']) ?  $field['values'][0]['label'] : '';
			},$str);


						return apply_filters('wapf/replace_in_formula', $str, [
				'quantity'      => $qty,
				'base_price'    => $base_price,
				'options_total' => $options_total,
				'cart_fields'   => $cart_fields,
				'product_id'    => $product_id
			]);

						}

		public static function find_nearest($value, $axis) {

			if(isset($axis[$value]))
				return $value;

			$keys = array_keys($axis);
			$value = floatval($value);

			if($value < floatval($keys[0]))
				return $keys[0];

			for($i=0; $i < count($keys); $i++ ) {
				if($value > floatval($keys[$i]) && $value <= floatval($keys[$i+1]))
					return $keys[$i+1];
			}

            return $keys[$i];

        }

        public static function parse_math_string($str, $cart_fields = [], $evaluate = true, $additional_info = []) {
	        $str = htmlspecialchars_decode($str); 

	    	$functions = self::get_all_formula_functions();

	        for($i=0;$i<sizeof($functions);$i++) {
		        $test = $functions[$i] . '(';

		        while (($idx = strpos($str, $test)) !== false) {

			        $l = $idx + strlen($test);
			        $b = self::closing_bracket_index($str,$l);
			        $args = self::split_formula_variables(substr($str,$l,$b-$l));

			        $solution = '';

			        if(isset(self::$formula_functions[$functions[$i]])) {
			        	$callable = self::$formula_functions[$functions[$i]];
				        $solution = $callable($args,[
				        	'fields' => $cart_fields,
					        'product_id' => isset($additional_info['product_id']) ? $additional_info['product_id'] : null
				        ]);
			        } else {
			        	$solution = apply_filters('wapf/fx/solve',$solution,$functions[$i],$args);
			        }
			        $str = substr($str,0,$idx) . $solution . substr($str,$b+1);

		        }

	        }

	        return $evaluate ? self::evaluate_math_string($str) : $str;

        }

		public static function evaluate_math_string($str, $clean = true, $false_on_error = false) {

			$__eval = function ($str) use(&$__eval,$clean,$false_on_error) {
				$error = false;
				$div_mul = false;
				$add_sub = false;
				$result = 0;
			
				$str = rtrim(trim($str, '/*+'),'-');
				if ((strpos($str, '(') !== false &&  strpos($str, ')') !== false)) {
					$regex = '/\(([\d.+\-*\/]+)\)/';
					preg_match($regex, $str, $matches);
					if (isset($matches[1])) {
						return $__eval(preg_replace($regex, $__eval($matches[1]), $str, 1));
					}
				}
				$str = str_replace( [ '(', ')' ], '', $str);
				if ((strpos($str, '/') !== false ||  strpos($str, '*') !== false)) {
					$div_mul = true;
					$operators = [ '*','/' ];
					while(!$error && $operators) {
						$operator = array_pop($operators);
						while($operator && strpos($str, $operator) !== false) {
							if ($error) {
								break;
							}
							$regex = '/([\d.]+)\\'.$operator.'(\-?[\d.]+)/';
							preg_match($regex, $str, $matches);
							if (isset($matches[1]) && isset($matches[2])) {
								if ($operator=='+') $result = (float)$matches[1] + (float)$matches[2];
								if ($operator=='-') $result = (float)$matches[1] - (float)$matches[2];
								if ($operator=='*') $result = (float)$matches[1] * (float)$matches[2];
								if ($operator=='/') {
									if ((float)$matches[2]) {
										$result = (float)$matches[1] / (float)$matches[2];
									} else {
										$error = false;
									}
								}
								$str = preg_replace($regex, $result, $str, 1);
								$str = str_replace( [ '-+', '+-' ], [ '-', '-' ], $str);
							} else {
								$error = true;
							}
						}
					}
				}

				if (!$error && (strpos($str, '+') !== false ||  strpos($str, '-') !== false)) {
					$str = str_replace('--', '+', $str);
					$add_sub = true;
					preg_match_all('/([\d\.]+|[\+\-])/', $str, $matches);
					if (isset($matches[0])) {
						$result = 0;
						$operator = '-';
						$tokens = $matches[0];
						$count = count($tokens);
						for ($i=0; $i < $count; $i++) {
							if ($tokens[$i] == '+' || $tokens[$i] == '-') {
								$operator = $tokens[$i];
							} else {
								$result = ($operator == '+') ? ($result + (float)$tokens[$i]) : ($result - (float)$tokens[$i]);
							}
						}
					}
				}

				if (!$error && !$div_mul && !$add_sub) {
					if( $false_on_error ) return false; 
					$result = (float)$str;
				}

				if($error && $false_on_error)
					return false;

				return $error ? 0 : $result;
			};

			return $__eval($str);

		}

		public static function evaluate_variables($str, $fields, $variables,$product_id,$clone_idx,$base_price,$val,$qty,$options_total,$cart_item_fields) {
			return preg_replace_callback( '/\[var_.+?]/', function ( $matches ) use ( $variables,$fields,$product_id, $clone_idx, $base_price, $cart_item_fields, $options_total, $val, $qty) {
				$var_name = str_replace( [ '[_var', ']' ], '', $matches[0] );

				$var = Enumerable::from( $variables )->firstOrDefault( function ( $x ) use ( $var_name ) {
					return $x['name'] === $var_name;
				});

				if($var) {
					$valu = $var['default'];

					foreach ( $var['rules'] as $rule ) {
						if(Fields::is_valid_rule($fields,$rule['field'],$rule['condition'],$rule['value'],$product_id,$cart_item_fields,$clone_idx,$qty)){
							$valu = $rule['variable'];
							break;
						}
					}

					return Helper::parse_math_string(
						Helper::replace_in_formula(
							Helper::evaluate_variables($valu,$fields,$variables,$product_id,$clone_idx,$base_price,$val,$qty,$options_total,$cart_item_fields)
							,$qty,$base_price,$val,0,$cart_item_fields,$product_id)
						,$cart_item_fields, true, ['product_id' => $product_id]);
				}

				return '0';
			}, $str );
		}

		#endregion

		public static function is_admin_order() {

			if ( function_exists('get_current_screen') ){
				$screen = get_current_screen();
				if ( $screen && in_array( $screen->id, [ 'edit-shop_order', 'shop_order' ] ) ) {
					return true;
				}
			}

			return false;

		}

		public static function values_to_string($cartitem_field, $simple = false, $pricing = '') {

	    	if($simple) {
			    return Enumerable::from( $cartitem_field['values'] )->join( function ( $x ) {
				    return $x['label'];
			    }, ', ' );
		    }

			return Enumerable::from( $cartitem_field['values'])->join( function ( $x ) use($cartitem_field, $pricing) {

				$label = isset($x['formatted_label']) ? $x['formatted_label'] : $x['label'];

				if ( !empty($pricing) && $x['price_type'] !== 'none' && !empty($x['price']) && Util::show_pricing_hints() ) {

					if(is_string($pricing))
						$pricing_hint = $pricing;
					else {
						$v = $cartitem_field['raw'];
						if(isset($x['slug']))
							$v = $x['label'];

						$pricing_hint = '<span class="wapf-pricing-hint">' . $pricing[ $cartitem_field['id'] ][ $v ]['pricing_hint'] . '</span>';

					}

					if(!empty($pricing_hint)) {
						$label = sprintf(
							'%s %s',
							$label,
							$pricing_hint
						);
					}

				}

				return $label;

			}, ', ' );

		}

	}
} 