<?php
namespace SW_WAPF_PRO\Includes\Classes\Integrations {

	use SW_WAPF_PRO\Includes\Classes\Cache;
	use SW_WAPF_PRO\Includes\Classes\Cart;
	use SW_WAPF_PRO\Includes\Classes\Enumerable;
	use SW_WAPF_PRO\Includes\Classes\Field_Groups;
	use SW_WAPF_PRO\Includes\Classes\File_Upload;
	use SW_WAPF_PRO\Includes\Models\Field;

	class Yith_RAQ
	{
		public function __construct() {


			add_filter('ywraq_add_item',                                    [$this,'add_to_raq_item'],10,2);

			add_filter('ywraq_request_quote_view_item_data',                [$this,'add_meta_data_to_raq_view'],10,3);

			add_action('ywraq_quote_adjust_price',                          [$this,'change_product_price'],10,2);

			add_action('ywraq_request_quote_email_view_item_after_title',   [$this,'output_meta_to_email_view'],10,3);

			add_action('ywraq_from_cart_to_order_item',                     [$this,'add_order_item_meta'],10,3);

			add_filter('option_ywraq_show_update_list',                     [$this,'set_show_update_list'],10,2);

			add_filter('woocommerce_after_quantity_input_field',            [$this,'after_quantity_input_field']);

			add_filter('ywraq_exists_in_list',                              [$this,'set_exists_to_false'],10,5);

			add_filter('ywraq_quote_item_id',                               [$this,'change_item_id'],10,2);

			add_action('wp_loaded',                                 [$this,'check_accepting_quote'], 1); 

		}

		public function check_accepting_quote() {

			if( !empty($_REQUEST['request_quote']) && intval($_REQUEST['request_quote']) > 0 && !empty($_REQUEST['raq_nonce']) && !empty($_REQUEST['status']) && $_REQUEST['status'] === 'accepted') {

				add_filter('wapf/skip_cart_validation', function($bool) {
					return true;
				});

			}

		}

		public function change_item_id($id,$product_raq) {
			return $id . '_'.uniqid();
		}

		public function set_exists_to_false($return, $product_id, $variation_id, $postadata, $raq_content) {
			return false;
		}

		public function after_quantity_input_field(){
			echo '<script>var wapf_qtys = document.querySelectorAll(\'.qty[name*="raq["]\');for(i=0;i<wapf_qtys.length;++i){wapf_qtys[i].readOnly=true;}</script>';
		}

		public function set_show_update_list($value,$option) {
			return 'no';
		}

		public function recalculate_prices($cart_updated) {

			if(!$cart_updated)
				return;

			$cart = WC()->cart->get_cart();

			foreach( $cart as $key=>$item ) {
				if(!empty($item['wapf'])) {
					$pricing = Cart::calculate_cart_item_options_total($item);
					if($pricing !== false)
						WC()->cart->cart_contents[$key]['wapf_item_price'] = $pricing;
				}
			}
		}

		public function add_order_item_meta($raq, $cart_item_key, $item_id) {
			if(!empty($raq['wapf'])) {
				$hide_price = get_option('ywraq_hide_price') === 'yes';
				$meta = self::raq_data_to_meta_data($raq,$hide_price);
				foreach ($meta as $m) {
					wc_add_order_item_meta( $item_id, $m['key'], $m['value'] );
				}
			}
		}

		public function change_product_price($raq,$product) {

			if(empty($raq['wapf']))
				return;

			if(isset($raq['wapf_item_price']) && $raq['wapf_item_price'] !== false) {

				$price = floatval( $raq['wapf_item_price']['base'] ) + floatval( $raq['wapf_item_price']['options_total'] );
				if ( is_numeric($price) && $price > 0 ) {
					$product->set_price( $price );
				}

			}
		}

		public function output_meta_to_email_view($raq_item,$raq_data,$key) {
			if(empty($raq_item['wapf']))
				return;

			$hide_price = get_option('ywraq_hide_price') === 'yes';
			$meta = self::raq_data_to_meta_data($raq_item,$hide_price);

			echo '<div><small>' . Enumerable::from($meta)->join( function($x) {
				return esc_html( $x['key'] ) . ': ' . wp_kses( $x['value'], [ 'a' => ['class' => [],'href' => [], 'target' => [] ], 'span' => ['class'] ]);
			}, '<br/>') . '</small></div>';

		}

		public function add_meta_data_to_raq_view($item_data, $raq, $_product) {

			if(empty($raq['wapf']))
				return $item_data;

			$hide_price = get_option('ywraq_hide_price') === 'yes';

			$item_data = array_merge($item_data,self::raq_data_to_meta_data($raq,$hide_price));

			return $item_data;
		}

		public function add_to_raq_item($raq_item = [],$post_data = []) {

			if(!isset($post_data['wapf_field_groups']) || isset($raq_item['wapf']))
				return $raq_item;

			$field_group_ids = explode(',', sanitize_text_field(urldecode($post_data['wapf_field_groups'])));
			$field_groups = Field_Groups::get_by_ids($field_group_ids);
			$fields = Enumerable::from($field_groups)->merge(function($x){return $x->fields; })->toArray();
			$files = Cache::get_files();
			$quantity = empty($post_data['quantity']) ? 1 : intval($post_data['quantity']);

			$wapf_data = [];
			$clones = [];

			foreach($fields as $field) {
				$key = 'field_' . $field->id;

				if( ($field->type === 'file' && isset($files[$key]) ) || (isset($post_data['wapf']) && isset($post_data['wapf'][$key])) ) {
					$cart_field  = Cart::to_cart_item_field( $field, 0 );
					$wapf_data[] = $cart_field;
				}

			}

			$raq_item['wapf'] = $wapf_data;
			$raq_item['wapf_field_groups'] = $field_group_ids;
			$raq_item['wapf_item_price'] = Cart::calculate_cart_item_options_total($raq_item);
			$raq_item['wapf_clones'] = $clones;

			return $raq_item;

		}

		public function validate_data($err_message) {

			if(!isset($_REQUEST['wapf_field_groups']))
				return $err_message;

			$is_ajax_upload = File_Upload::is_ajax_upload();
			if(isset($_GET['wc-ajax']) && $_GET['wc-ajax'] === 'yith_ywraq_action') {
				foreach($_REQUEST['wapf'] as $k => $v) {
					if(is_string($v))
						$_REQUEST['wapf'][$k] = rawurldecode($v);
				}
			}

			$field_groups = Field_Groups::get_by_ids(explode(',',sanitize_text_field(urldecode($_REQUEST['wapf_field_groups']))));
			$files = [];
			if(!$is_ajax_upload) {
				$files = File_Upload::create_uploaded_file_array();
				Cache::set_files( $files ); 
			}

			$product_id = intval($_POST['product_id']);
			$variation_id = empty($_POST['variation_id']) ? null : intval($_POST['variation_id']);
			$qty = empty($_POST['quantity']) ? 1 : intval($_POST['quantity']);

			$validation = Cart::validate_cart_data($field_groups,true, $product_id, $qty, $variation_id);

			if(is_string($validation))
				return [esc_html($validation)];

			if(!$is_ajax_upload && !empty($files)) {

				$files_upload_result = File_Upload::handle_files_array($field_groups,$files);
				if(is_string($files_upload_result))
					return [esc_html($files_upload_result)];

				Cache::set_files($files_upload_result);

			}

			return $err_message;

		}


		private function raq_data_to_meta_data($raq,$hide_price) {

			$item_data = [];

			foreach($raq['wapf'] as $field) {

				if(!isset($field['values']))
					continue;

				if(Enumerable::from($field['values'])->any(function($x) use($raq) { return isset($x['label']) && strlen($x['label']) > 0; })) {

					$item_data[] = [
						'key'   => $field['label'],
						'value' => Enumerable::from( $field['values'] )->join( function ( $x ) use($raq, $field,$hide_price) {

							if ( !$hide_price && $x['price_type'] !== 'none' && !empty($x['price']) ) {

								$v = isset($x['slug']) ? $x['label'] : $field['raw'];

								if(isset($raq['wapf_item_price']['options'][$field['id']][$v])) {

									$pricing_hint = '<span class="wapf-pricing-hint">' . $raq['wapf_item_price']['options'][$field['id']][$v]['pricing_hint'] . '</span>';

									return sprintf(
										'%s %s',
										$x['label'],
										$pricing_hint
									);
								}

							}

							return $x['label'];
						}, ', ' )
					];
				}
			}
			return $item_data;
		}

	}
} 