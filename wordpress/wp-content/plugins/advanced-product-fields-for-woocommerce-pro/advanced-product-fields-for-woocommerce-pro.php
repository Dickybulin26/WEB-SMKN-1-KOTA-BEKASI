<?php

/*
 * Plugin Name: Advanced Product Fields Pro for WooCommerce
 * Plugin URI: https://www.studiowombat.com/plugin/advanced-product-fields-for-woocommerce/
 * Description: Customize WooCommerce product pages with powerful and intuitive fields ( = product add-ons).
 * Version: 2.7.11
 * Author: StudioWombat
 * Author URI: https://studiowombat.com/
 * Text Domain: sw-wapf
 * WC requires at least: 4.1
 * WC tested up to: 8.8.2
 * Build: 0001
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//raz0r
update_option( 'advanced-product-fields-for-woocommerce-pro_license', 'InsnaGFzX2xpY2Vuc2UnOnRydWUsICdsaWNlbnNlX2lkJzonMjQxMicsICdpZCc6J3h4eHh4J30i' );
if(!function_exists('SW_WAPF_PRO_auto_loader')) {
	function SW_WAPF_PRO_auto_loader( $class_name ) {
		// Not loading a class from our plugin.
		if ( ! is_int( strpos( $class_name, 'SW_WAPF_PRO' ) ) ) {
			return;
		}
		// Remove root namespace as we don't have that as a folder.
		$class_name = str_replace( 'SW_WAPF_PRO\\', '', $class_name );
		$class_name = str_replace( '\\', '/', strtolower( $class_name ) ) . '.php';
		// Get only the file name.
		$pos       = strrpos( $class_name, '/' );
		$file_name = is_int( $pos ) ? substr( $class_name, $pos + 1 ) : $class_name;
		// Get only the path.
		$path = str_replace( $file_name, '', $class_name );
		// Append 'class-' to the file name and replace _ with -
		$new_file_name = 'class-' . str_replace( '_', '-', $file_name );
		// Construct file path.
		$file_path = plugin_dir_path( __FILE__ ) . str_replace( '\\', DIRECTORY_SEPARATOR, $path . strtolower( $new_file_name ) );

		if ( file_exists( $file_path ) ) {
			require_once( $file_path );
		}
	}

	spl_autoload_register( 'SW_WAPF_PRO_auto_loader' );
}

if(!function_exists('wapf_pro')) {
	function wapf_pro() {

		$version = '2.7.11';

		// globals
		global $wapf;

		// initialize
		if ( ! isset( $wapf ) ) {
			$wapf = new \SW_WAPF_PRO\WAPF();
			$wapf->initialize( $version, __FILE__ );
		}

		return $wapf;

	}
}
// initialize
wapf_pro();


register_activation_hook( __FILE__, 'wapfe_on_activation' );
function wapfe_on_activation() {
	deactivate_plugins( 'advanced-product-fields-for-woocommerce-pro/advanced-product-fields-for-woocommerce-pro.php' );
}

