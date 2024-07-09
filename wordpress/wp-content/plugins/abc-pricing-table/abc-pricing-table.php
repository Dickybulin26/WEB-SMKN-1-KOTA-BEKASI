<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*
Plugin Name: ABC Pricing Table
Plugin URI: http://awplife.com/code
Description: A Responsive pricing table Amazing Easy To Use Tables, Table, Pricing, Widget, Shortcode- Irresistible CSS Based WordPress pricing table Plugin.
Version: 1.4.3
Author: A WP Life
Author URI: http://awplife.com/
License: GPLv2 or later
Text Domain: abc-pricing-table
Domain Path: /languages
*/
if ( ! class_exists( 'apt_pricingtable' ) ) {
	class apt_pricingtable {

		public function __construct() {
			$this->_constants();
			$this->_hooks();
		}

		protected function _constants() {
			// Plugin Version
			define( 'APT_PLUGIN_VER', '1.4.3' );

			// Plugin Text Domain
			define( 'APT_TXTDM', 'abc-pricing-table' );

			// Plugin Name
			define( 'APT_PLUGIN_NAME', __( 'Pricing', APT_TXTDM ) );

			// Plugin Slug
			define( 'APT_PLUGIN_SLUG', 'abc-pricing' );

			// Plugin Directory Path
			define( 'APT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

			// Plugin Directory URL
			define( 'APT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

			define( 'APT_SECURE_KEY', md5( NONCE_KEY ) );

		} // end of constructor function

		protected function _hooks() {
			// Load text domain
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

			// add testimonial menu item, change menu filter for multisite
			add_action( 'admin_menu', array( $this, 'pricing_menu' ), 101 );

			// Create pricing table  Custom Post
			add_action( 'init', array( $this, 'Pricing' ) );

			// Add meta box to custom post
			add_action( 'add_meta_boxes', array( $this, 'admin_add_meta_box' ) );

			// loaded during admin init
			add_action( 'admin_init', array( $this, 'admin_add_meta_box' ) );

			add_action( 'save_post', array( &$this, '_apt_save_settings' ) );

			// Shortcode Compatibility in Text Widgets
			add_action( 'widget_text', 'do_shortcode' );

			// add pfg cpt shortcode column - manage_{$post_type}_posts_columns
			add_filter( 'manage_abc-pricing_posts_columns', array( &$this, 'set_abc_pricing_shortcode_column_name' ) );

			// add pfg cpt shortcode column data - manage_{$post_type}_posts_custom_column
			add_action( 'manage_abc-pricing_posts_custom_column', array( &$this, 'custom_abc_pricing_shodrcode_data' ), 10, 2 );

		} // end of hook function


		// end of hook function

		// Pricing table cpt shortcode column before date columns
		public function set_abc_pricing_shortcode_column_name( $defaults ) {
			$new       = array();
			$shortcode = $columns['abc_pricing_shortcode'];  // save the tags column
			unset( $defaults['tags'] );   // remove it from the columns list

			foreach ( $defaults as $key => $value ) {
				if ( $key == 'date' ) {  // when we find the date column
					$new['abc_pricing_shortcode'] = __( 'Shortcode', 'abc-pricing-table' );  // put the tags column before it
				}
				$new[ $key ] = $value;
			}
			return $new;
		}

		// abc cpt shortcode column data
		public function custom_abc_pricing_shodrcode_data( $column, $post_id ) {
			switch ( $column ) {
				case 'abc_pricing_shortcode':
					echo "<input type='text' class='button button-primary' id='abc-pricing-shortcode-" . esc_attr( $post_id ) . "' value='[APT id=" . esc_attr( $post_id ) . "]' style='font-weight:bold; background-color:#32373C; color:#FFFFFF; text-align:center;' />";
					echo "<input type='button' class='button button-primary' onclick='return ABCCopyShortcode" . esc_attr( $post_id ) . "();' readonly value='Copy' style='margin-left:4px;' />";
					echo "<span id='copy-msg-" . esc_attr( $post_id ) . "' class='button button-primary' style='display:none; background-color:#32CD32; color:#FFFFFF; margin-left:4px; border-radius: 4px;'>copied</span>";
					echo '<script>
						function ABCCopyShortcode' . esc_attr( $post_id ) . "() {
							var copyText = document.getElementById('abc-pricing-shortcode-" . esc_attr( $post_id ) . "');
							copyText.select();
							document.execCommand('copy');
							
							//fade in and out copied message
							jQuery('#copy-msg-" . esc_attr( $post_id ) . "').fadeIn('1000', 'linear');
							jQuery('#copy-msg-" . esc_attr( $post_id ) . "').fadeOut(2500,'swing');
						}
						</script>
					";
					break;
			}
		}


		public function load_textdomain() {
			load_plugin_textdomain( 'abc-pricing-table', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		public function pricing_menu() {
			$plugins_help_menu = add_submenu_page( 'edit.php?post_type=' . APT_PLUGIN_SLUG, __( 'Our Plugins', 'abc-pricing-table' ), __( 'Our Plugins', 'abc-pricing-table' ), 'administrator', 'pricing-featured-plugins-page', array( $this, '_abcpt_featured_plugins' ) );
		}

		public function Pricing() {
			$labels = array(
				'name'               => __( 'Pricing Table', 'post type general name', 'abc-pricing-table' ),
				'singular_name'      => __( 'Pricing Table', 'post type singular name', 'abc-pricing-table' ),
				'menu_name'          => __( 'Pricing Table', 'abc-pricing-table' ),
				'name_admin_bar'     => __( 'Pricing Table', 'add new on admin bar', 'abc-pricing-table' ),
				'add_new'            => __( 'Add Pricing Table', 'abc-pricing-table' ),
				'add_new_item'       => __( 'Add Pricing Table', 'abc-pricing-table' ),
				'new_item'           => __( 'New Pricing Table', 'abc-pricing-table' ),
				'edit_item'          => __( 'Edit Pricing Table', 'abc-pricing-table' ),
				'view_item'          => __( 'View Pricing Table', 'abc-pricing-table' ),
				'all_items'          => __( 'All Pricing Table', 'abc-pricing-table' ),
				'search_items'       => __( 'Search Pricing Table', 'abc-pricing-table' ),
				'parent_item_colon'  => __( 'Parent Pricing Table', 'abc-pricing-table' ),
				'not_found'          => __( 'No Pricing Table', 'abc-pricing-table' ),
				'not_found_in_trash' => __( 'No Pricing Table found in Trash', 'abc-pricing-table' ),
			);

			$args = array(
				'labels'             => __( 'Pricing Table', 'abc-pricing-table' ),
				'description'        => __( 'Description', 'abc-pricing-table' ),
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				// 'rewrite'            => array( 'slug' => 'pricing' ),
				'capability_type'    => 'page',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_icon'          => 'dashicons-cart',
				'menu_position'      => null,
				'supports'           => array( 'title' ),
			);
			register_post_type( 'abc-pricing', $args );
		}

		public function admin_add_meta_box() {
			add_meta_box( __( 'Add Pricing Table', 'abc-pricing-table' ), __( 'Add Pricing Table', 'abc-pricing-table' ), array( &$this, 'apt_pricing_upload' ), 'abc-pricing', 'normal', 'default' );
			add_meta_box( __( 'Upgrade Pricing Table Pro', 'abc-pricing-table' ), __( 'Upgrade Pricing Table Pro', 'abc-pricing-table' ), array( &$this, 'apt_upgrade_pro' ), 'abc-pricing', 'side', 'default' );
			add_meta_box( __( 'Rate Our Plugin', 'abc-pricing-table' ), __( 'Rate Our Plugin', 'abc-pricing-table' ), array( &$this, 'apt_rate_plugin' ), 'abc-pricing', 'side', 'default' );
		}
		/** meta upgrade pro **/
		public function apt_upgrade_pro() { ?>
			<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'assets/img/2017-12-08_20-43-13.png'); ?>" width="250" height="280">
			<a href="https://awplife.com/demo/pricing-table-premium/" target="_new" class="button button-primary button-large" style="background: #496481; text-shadow: none; margin-top:10px"><span class="dashicons dashicons-search" style="line-height:1.4;" ></span> Live Demo</a>
			<a href="https://awplife.com/wordpress-plugins/pricing-table-wordpress-plugin/" target="_new" class="button button-primary button-large" style="background: #496481; text-shadow: none; margin-top:10px"><span class="dashicons dashicons-unlock" style="line-height:1.4;" ></span> Upgrade Pro</a>
			<?php
		}
		/** meta rate us **/
		public function apt_rate_plugin() {
			?>
		<div style="text-align:center">
			<p>If you like our plugin then please <b>Rate us</b> on WordPress</p>
		</div>
		<div style="text-align:center">
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
		</div>
		<br>
		<div style="text-align:center">
			<a href="https://wordpress.org/support/plugin/abc-pricing-table/reviews/?filter=5" target="_new" class="button button-primary button-large" style="background: #496481; text-shadow: none;"><span class="dashicons dashicons-heart" style="line-height:1.4;" ></span> Please Rate Us</a>
		</div>	
		<?php }

		public function apt_pricing_upload( $post ) {

			require_once 'include/add-new-pricing.php';

			wp_nonce_field( 'apt_post_save_settings', 'apt_post_save_nonce' );
		}

		public function _apt_save_settings( $post_id ) {

			if ( isset( $_POST['apt_post_save_nonce'] ) ) {
				if ( wp_unslash( isset( $_POST['apt_post_save_nonce'] ) ) || wp_verify_nonce( $_POST['apt_post_save_nonce'], 'apt_post_save_settings' ) ) {

					$total_cols                       = sanitize_text_field($_POST['total_cols'] ) ;
					$pricing_table_design             = sanitize_text_field($_POST['pricing_table_design'] );
					$currency_icon                    = sanitize_text_field($_POST['currency_icon'] );
					$heading_text_color               = sanitize_text_field($_POST['heading_text_color'] );
					$heading_background_color         = sanitize_text_field($_POST['heading_background_color'] );
					$button_color                     = sanitize_text_field($_POST['button_color'] );
					$button_hover_color               = sanitize_text_field($_POST['button_hover_color'] ) ;
					$background_hover_color           = sanitize_text_field($_POST['background_hover_color'] );
					$button_heading_color             = sanitize_text_field($_POST['button_heading_color'] );
					$feature_heading_text_color       = sanitize_text_field($_POST['feature_heading_text_color'] );
					$feature_button_color             = sanitize_text_field($_POST['feature_button_color']);
					$feature_heading_background_color = sanitize_text_field($_POST['feature_heading_background_color'] );
					$feature_button_heading_color     = sanitize_text_field($_POST['feature_button_heading_color'] );
					$feature_background_hover_color   = sanitize_text_field($_POST['feature_background_hover_color'] );
					$feature_button_hover_color       = sanitize_text_field($_POST['feature_button_hover_color'] );

					if ( isset( $_POST['apt_custom_css'] ) ) {
							$apt_custom_css = wp_kses( $_POST['apt_custom_css'], array(), array() );
					} else {
						$apt_custom_css = '';
					}

						$pricing_name = array();

						$pricing_name_val = isset( $_POST['pricing_name'] ) ? (array) $_POST['pricing_name'] : array();
						$pricing_name_val = array_map( 'sanitize_text_field', $pricing_name_val );

						$apt_i = 0;
					foreach ( $pricing_name_val as $pricing_name_v ) {

						$featured_button[]   = sanitize_text_field($_POST['featured_button'][ $apt_i ] );
						$pricing_name[]      = sanitize_text_field($_POST['pricing_name'][ $apt_i ] );
						$pricing_price[]     = sanitize_text_field($_POST['pricing_price'][ $apt_i ] );
						$pricing_plan[]      = sanitize_text_field($_POST['pricing_plan'][ $apt_i ] );
						$pricing_features[]  = sanitize_textarea_field($_POST['pricing_features'][ $apt_i] );
						$pricing_btn_text[]  = sanitize_text_field($_POST['pricing_btn_text'][ $apt_i ] );
						$pricing_btn_url[]   = sanitize_text_field($_POST['pricing_btn_url'][ $apt_i ] );
						$pricing_icon_pick[] = sanitize_text_field($_POST['pricing_icon_pick'][ $apt_i ] );

						$apt_i++;
					}

					$pricing_post_settings = array(

						'featured_button'                  => $featured_button,
						'pricing_name'                     => $pricing_name,
						'pricing_price'                    => $pricing_price,
						'pricing_plan'                     => $pricing_plan,
						'pricing_features'                 => $pricing_features,
						'pricing_btn_text'                 => $pricing_btn_text,
						'pricing_btn_url'                  => $pricing_btn_url,
						'pricing_icon_pick'                => $pricing_icon_pick,
						'total_cols'                       => $total_cols,
						'pricing_table_design'             => $pricing_table_design,
						'currency_icon'                    => $currency_icon,
						'heading_text_color'               => $heading_text_color,
						'heading_background_color'         => $heading_background_color,
						'button_color'                     => $button_color,
						'button_hover_color'               => $button_hover_color,
						'background_hover_color'           => $background_hover_color,
						'button_heading_color'             => $button_heading_color,
						'feature_heading_text_color'       => $feature_heading_text_color,
						'feature_button_color'             => $feature_button_color,
						'feature_heading_background_color' => $feature_heading_background_color,
						'feature_button_heading_color'     => $feature_button_heading_color,
						'feature_background_hover_color'   => $feature_background_hover_color,
						'feature_button_hover_color'       => $feature_button_hover_color,
						'apt_custom_css'                   => $apt_custom_css,

					);

					$apt_pricing_table_meta_key = 'apt_pricing_table_data_' . $post_id;
					update_post_meta( $post_id, $apt_pricing_table_meta_key, $pricing_post_settings );

				} else {
					print 'Sorry, your nonce did not verify.';
					exit;

				}
			}//// end save setting
		}//end _apt_save_settings()
		public function _abcpt_featured_plugins() {
			require_once 'featured-plugins/featured-plugins.php';
		}
	}

		// register sf scripts
	function awplife_apt_register_scripts() {

		// css & JS
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'apt-bootstrap-min-js', plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.min.js' );
		wp_register_style( 'apt-pricing-frontend-bootstrap-css', plugin_dir_url( __FILE__ ) . 'assets/css/pricing-frontend-bootstrap.css' );
		wp_register_style( 'apt-all-css', plugin_dir_url( __FILE__ ) . 'assets/css/all.css' );
		// css & JS
	}
		add_action( 'wp_enqueue_scripts', 'awplife_apt_register_scripts' );

	// Plugin Recommend
		add_action( 'tgmpa_register', 'APT_TXTDM_plugin_recommend' );
	function APT_TXTDM_plugin_recommend() {
		$plugins = array(
			array(
				'name'     => 'Portfolio Filter Gallery',
				'slug'     => 'portfolio-filter-gallery',
				'required' => false,
			),
			array(
				'name'     => 'Blog Filter & Post Portfolio',
				'slug'     => 'blog-filter',
				'required' => false,
			),
			array(
				'name'     => 'Team Builder Member Showcase',
				'slug'     => 'team-builder-member-showcase',
				'required' => false,
			),
		);
		tgmpa( $plugins );
	}


	$new_pricingtable_object = new apt_pricingtable();
	require_once 'shotcode.php';
	require_once 'class-tgm-plugin-activation.php';
}
?>
