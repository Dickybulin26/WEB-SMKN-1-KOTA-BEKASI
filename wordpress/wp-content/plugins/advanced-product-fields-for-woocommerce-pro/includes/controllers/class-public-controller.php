<?php

namespace SW_WAPF_PRO\Includes\Controllers {

	use SW_WAPF_PRO\Includes\Classes\Enumerable;
	use SW_WAPF_PRO\Includes\Classes\Field_Groups;
	use SW_WAPF_PRO\Includes\Classes\File_Upload;
	use SW_WAPF_PRO\Includes\Classes\Helper;
	use SW_WAPF_PRO\Includes\Classes\Woocommerce_Service;

    if (!defined('ABSPATH')) {
        die;
    }

    class Public_Controller {

        public function __construct()
        {

            add_action( 'wp_enqueue_scripts',                               [$this, 'register_assets'], 5000 );

	        add_action('init',                                              [$this, 'maybe_disable_payment_request_buttons']);

	        add_action('init',                                              [$this, 'add_ajax']);

            wapf_add_formula_function('min', function($args,$data) {
	            return min(array_map(function($x) use ($data) { return Helper::parse_math_string($x,$data['fields']); },$args ));
            });
	        wapf_add_formula_function('max', function($args,$data) {
		        return max(array_map(function($x) use ($data) { return Helper::parse_math_string($x,$data['fields']); },$args ));
	        });
	        wapf_add_formula_function('len', function($args, $data) {
		        return mb_strlen('' . $args[0]);
	        });
	        wapf_add_formula_function('lookuptable', function($args,$data) {

		        $tables = apply_filters('wapf/lookup_tables', []);

		        if(!empty($tables) && isset($tables[$args[0]])) {
			        $table = $tables[ $args[0] ];

			        $table_values = [];
			        $prev         = $table;

			        for ( $k = 1; $k < sizeof( $args ); $k ++ ) {
				        global $solution;
				        $field = Enumerable::from( $data['fields'] )->firstOrDefault( function ( $x ) use ( $args, $k ) {
					        return $x['id'] === $args[ $k ];
				        } );
				        if ( ! $field ) {
					        $solution = 0;
					        break;
				        }
				        $value = $field['values'][0]['label'];
				        if ( $value === '' ) {
					        $solution = 0;
					        break;
				        }
				        $n              = Helper::find_nearest( $value, $prev );
				        $table_values[] = $n;
				        $prev           = $prev[ $n ];
			        }

			        return array_reduce( $table_values, function ( $acc, $curr ) {
				        return $acc[ $curr ];
			        }, $table );
		        }

		        return 0;

	        });

        }

        public function maybe_disable_payment_request_buttons(){
	        if( defined('WC_STRIPE_VERSION') && (version_compare('5.5.0', WC_STRIPE_VERSION,'>=') || version_compare('6.3.0', WC_STRIPE_VERSION, '<=') ) ) {
		        add_filter('wc_stripe_hide_payment_request_on_product_page',    '__return_true',10,2);
	        }
        }

        public function add_ajax() {
	        if( File_Upload::is_ajax_upload()) {
		        add_action( 'wp_ajax_wapf_upload',                  [$this, 'ajax_upload'] );
		        add_action( 'wp_ajax_nopriv_wapf_upload',           [$this, 'ajax_upload'] );
		        add_action( 'wp_ajax_wapf_upload_remove',           [$this, 'ajax_upload_remove'] );
		        add_action( 'wp_ajax_nopriv_wapf_upload_remove',    [$this, 'ajax_upload_remove'] );
	        }
        }

        public function ajax_upload_remove() {

	        if(!isset($_GET['nonce']) || !wp_verify_nonce($_GET['nonce'], 'wapf_fupload') || !isset($_GET['file'])) {
		        wp_send_json_error();
	        }

	        $file = sanitize_text_field($_GET['file']);
			$path = File_Upload::get_base_upload_dir() . $file;
	        if(file_exists($path))
	            unlink(sanitize_text_field($path));
	        wp_send_json_success();
        }

        public function ajax_upload() {
	        
	        if(empty($_FILES))
	        	wp_send_json_error();

	        $files = File_Upload::create_uploaded_file_array();
	        if(empty($files))
	        	wp_send_json_error();

	        $field_groups = Field_Groups::get_by_ids(explode(',', sanitize_text_field($_POST['field_groups'])));
			$valid = File_Upload::validate_files_from_ajax($files,$field_groups);
			if(is_string($valid))
				wp_send_json_error($valid,403);

	        $files_upload_result = File_Upload::handle_files_array($field_groups,$files);
	        if(is_string($files_upload_result)) {
	        	wp_send_json_error($files_upload_result,400);
	        }

	        $res = [];

	        foreach($files_upload_result as $files_arr) {
	        	foreach($files_arr as $f) {
			        $res[] = [
			        	'path' => $f['field'] . explode($f['field'],$f['uploaded_file_path'])[1].uniqid(),
				        'file' => $f['uploaded_file'] . uniqid() . ( '.' . (isset($f['uploaded_extension']) ? $f['uploaded_extension'] :''))
			        ];
		        }
	        }

	        wp_send_json_success($res);
        }

        public function register_assets() {

            $url =  trailingslashit(wapf_get_setting('url')) . 'assets/';
            $version = '2711-bta';

            wp_enqueue_style('wapf-frontend', $url . 'css/frontend.min.css', [], $version);
            wp_enqueue_script('wapf-frontend', $url . 'js/frontend.min.js', ['jquery'], $version, true);

            $script_vars = [
            	'ajax'              =>  admin_url('admin-ajax.php'),
                'page_type'         => Woocommerce_Service::get_current_page_type(),
                'display_options'   => Woocommerce_Service::get_price_display_options(),
	            'slider_support'    => get_theme_support('wc-product-gallery-slider')
            ];

            wp_localize_script('wapf-frontend', 'wapf_config', $script_vars);

	        if( File_Upload::is_ajax_upload()) {
		        wp_enqueue_script('wapf-dropzone', $url . 'js/dropzone.min.js', [], $version, true);
		        wp_enqueue_style( 'wapf-dropzone', $url . 'css/dropzone.min.css', [], $version );
	        }

	        if(get_option('wapf_datepicker','no') === 'yes') {
		        wp_enqueue_script('wapf-dp', $url . 'js/datepicker.min.js', [], $version, true);
		        wp_enqueue_style( 'wapf-dp', $url . 'css/datepicker.min.css', [], $version );
	        }

        }

    }
} 