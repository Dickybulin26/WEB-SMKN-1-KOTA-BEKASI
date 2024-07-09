<?php

namespace SW_WAPF_PRO {

	use SW_WAPF_PRO\Includes\Classes\Enumerable;
	use SW_WAPF_PRO\Includes\Classes\Field_Groups;
	use SW_WAPF_PRO\Includes\Classes\l10n;
    use SW_WAPF_PRO\Includes\Controllers\Admin_Controller;
	use SW_WAPF_PRO\Includes\Controllers\Integrations_Controller;
	use SW_WAPF_PRO\Includes\Controllers\Product_Controller;
	use SW_WAPF_PRO\Includes\Controllers\Public_Controller;
		
	use SW_WAPF_PRO\Includes\Models\Conditional;
	use SW_WAPF_PRO\Includes\Models\ConditionalRule;

	if (!defined('ABSPATH')) {
        die;
    }

    class WAPF
    {

        private $settings = [];
        public $controllers = [];

        public function __construct()
        {

        }

        public function initialize($version,$base_file) {

            $basename = plugin_basename( $base_file );

            $this->settings = [

                // basic
                'name'				=> 'Advanced Product Fields (Extended) for WooCommerce',
                'version'			=> $version,
	            
                'slug'				=> 'advanced-product-fields-for-woocommerce-extended',
				
	            // urls
                'basename'			=> $basename,
                'path'				=> plugin_dir_path( $base_file ),
                'url'				=> plugin_dir_url( $base_file ),

                // options
                'capability'        => 'manage_options',

                // cpts
                'cpts'              => ['wapf_product']
            ];

            // Includes
            include_once( trailingslashit($this->settings['path']) . 'includes/api/api-helpers.php');

            // Language stuff
            new l10n();

            // Actions
            add_action('init',	            [$this, 'register_post_types']);
	        add_action('plugins_loaded',    [$this, 'upgrade_routine']);

	        if(!$this->is_woocommerce_active()) {
	        	return;
	        }

            // Kick off admin page.
            if(is_admin())
                $this->controllers['admin'] = new Admin_Controller();

	        $this->controllers['public'] = new Public_Controller();

	        $this->controllers['product'] = new Product_Controller();

	        $this->controllers['integrations'] = new Integrations_Controller();

	        			

        }

        public function has_setting( $name ) {
            return isset($this->settings[ $name ]);
        }

        public function get_setting( $name ) {
            return isset($this->settings[ $name ]) ? $this->settings[ $name ] : null;
        }

        public function register_post_types() {

            $cap = wapf_get_setting('capability');

            register_post_type('wapf_product', [
                'labels'			=> [
                    'name'					=> __( 'Product Field Groups', 'sw-wapf' ),
                    'singular_name'			=> __( 'Field Group', 'sw-wapf' ),
                    'add_new'				=> __( 'Add New' , 'sw-wapf' ),
                    'add_new_item'			=> __('Add New Product Field Group' , 'sw-wapf'),
                    'edit_item'				=> __('Edit Product Field Group' , 'sw-wapf'),
                    'new_item'				=> __( 'New Field Group' , 'sw-wapf' ),
                    'view_item'				=> __( 'View Field Group', 'sw-wapf' ),
                    'search_items'			=> __( 'Search Field Groups', 'sw-wapf' ),
                    'not_found'				=> __( 'No Field Groups found', 'sw-wapf' ),
                    'not_found_in_trash'	=> __( 'No Field Groups found in Trash', 'sw-wapf' ),
                ],
                'public'			=> false,
                'show_ui'			=> true,
                '_builtin'			=> false,
                'capability_type'	=> 'post',
                'capabilities'		=> [
                    'edit_post'			=> $cap,
                    'delete_post'		=> $cap,
                    'edit_posts'		=> $cap,
                    'delete_posts'		=> $cap,
                ],
                'hierarchical'		=> true,
                'rewrite'			=> false,
                'query_var'			=> false,
                'supports' 			=> ['title'],
                'show_in_menu'		=> false,
                'show_in_rest'      => false
            ] );

        }

        public function upgrade_routine() {

	        $version = get_option('wapf-pro-dev-version');

	        if($version !== wapf_get_setting('version')) {

		        $all = Field_Groups::get_all();

		        foreach($all as $field_group) {
					$save = false;
			        foreach($field_group->rules_groups as $rg) {

				        $variation_rules = $rg->get_variation_rules();

				        if(!empty($variation_rules)) {

					        foreach($variation_rules as $variation_rule) {
						        /** @var ConditionalRule $variation_rule */

						        foreach ($field_group->fields as $field) {
							        $rule = new ConditionalRule();
							        $rule->field = $field->id;
							        $rule->condition = $variation_rule->condition;
							        $rule->value = Enumerable::from((array)$variation_rule->value)->join(function($value) {
								        return intval($value['id']);
							        },',');

							        if(empty($field->conditionals)) {
								        $c = new Conditional();
								        $c->rules[] = $rule;
								        $field->conditionals[] = $c;
								        $save = true;
							        } else {
							        	$go_ahead = true;
							        	//Find out if it's already done.
							        	foreach ($field->conditionals as $conditional) {
							        		foreach ($conditional->rules as $rule) {
							        			if(strpos($rule->condition,'product_var') !== false) {
											        $go_ahead = false;
											        break;
										        }
									        }
								        }

							        	if($go_ahead) {
									        foreach ( $field->conditionals as $conditional ) {
										        $conditional->rules[] = $rule;
									        }
									        $save = true;
								        }
							        }
						        }

					        }

				        }
			        }
			        if($save)
			        	Field_Groups::save($field_group);

		        }

		        update_option('wapf-pro-dev-version', wapf_get_setting('version'),true);

	        }

        }

	    private function is_woocommerce_active()
	    {
		    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
			    return true;
		    }
		    if (is_multisite()) {
			    $plugins = get_site_option('active_sitewide_plugins');
			    if (isset($plugins['woocommerce/woocommerce.php']))
				    return true;
		    }
		    return false;
	    }

    }
}