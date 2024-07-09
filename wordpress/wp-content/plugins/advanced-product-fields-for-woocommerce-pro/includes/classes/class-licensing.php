<?php

namespace SW_WAPF_PRO\Includes\Classes {

    if (!defined('ABSPATH')) {
        die;
    }

    use stdClass;
	use DateTime;
	use DateInterval;

    class Licensing {
        private $api_url     = '';
        private $slug        = '';
        private $version     = '';
        private $wp_override = false;
        private $name        = '';
        private $key         = '';
        private $exp         = '';
        private $cached_plugin_update = null;

        public function __construct( ) {

            $this->api_url     = 'https://api.studiowombat.com/';
            $this->slug        = wapf_get_setting('slug');
            $this->version     = wapf_get_setting('version');
            $this->name        = wapf_get_setting('basename');

	        add_filter( 'pre_set_site_transient_update_plugins', [$this, 'check_update'] );
	        add_filter( 'plugins_api', [$this, 'plugins_api_filter'], 10, 3 );
	        add_action( 'in_plugin_update_message-advanced-product-fields-for-woocommerce-pro/advanced-product-fields-for-woocommerce-pro.php', [$this, 'in_plugin_update_message'], 10, 2 );

	        if(isset($_GET['force-check']) && $_GET['force-check'] === '1')
		        $this->wp_override = true;
        }

        public function in_plugin_update_message($args, $response) {
	        if($this->get_key() === false || empty( $response->package ))
		        echo  '<br/>' . __('Updates are disabled because your license key is expired. To enable updates, please renew your license key.', 'sw-wapf');
	        if(!empty($response->upgrade_notice))
		        echo '<div style="padding:12px 0;border-top:1px solid #ffb900;"><strong>Upgrade warning! </strong>' . wp_kses_post($response->upgrade_notice) . '</div><p style="display: none">';
        }

        public static function get_license_info() {
            $raw = get_option( 'advanced-product-fields-for-woocommerce-pro_license' );
            return $raw === false ? null : json_decode(base64_decode($raw));
        }

        public function deactivate_license()
        {
            $key = $this->get_key();
            if($key !== false){
                $this->api_request('license/deactivate', [ 'key' => $key ] );
            }
            delete_option('advanced-product-fields-for-woocommerce-pro_license');

            return true;
        }

        public function activate_license()
        {
            $key = $_POST['wapf_license'];

            $result = $this->api_request('license/activate',[ 'key' => $key ] );

            if($result === null)
                return "Couldn't connect to license server";

            if($result->status !== 'passed')
                return $result->message;

            update_option('advanced-product-fields-for-woocommerce-pro_license', base64_encode(json_encode(
                [
                    'key' => $key,
                    'expiration' => $result->expiration,
                    'url' => home_url()
                ]
            )));
            return true;

        }

        public function plugins_api_filter( $_data, $_action = '', $_args = null ) {

            if ( $_action != 'plugin_information' ) {
                return $_data;
            }
            if ( ! isset( $_args->slug ) || ( $_args->slug != $this->slug ) ) {
                return $_data;
            }

            if ($this->get_key() === false)
                return $_data;

            $api_response = $this->api_request( 'plugin/info', [ 'key' => $this->get_key() ] );

            if ( null !== $api_response ) {
                $_data = $api_response;
            }

            // Convert sections into an associative array, since we're getting an object, but core expects an array.
            if ( isset( $_data->sections ) && !is_array( $_data->sections ) ) {
                $new_sections = [];
                foreach ( $_data->sections as $key => $value ) {
                    $new_sections[ $key ] = $value;
                }
                $_data->sections = $new_sections;
            }

            return $_data;
        }

        public function check_update( $_transient_data ) {

	        if ( ! is_object( $_transient_data ) ) {
		        $_transient_data = new stdClass;
	        }

	        if ( ! empty( $_transient_data->response ) && ! empty( $_transient_data->response[ $this->name ] ) && false === $this->wp_override ) {
		        return $_transient_data;
	        }

	        if($this->get_key() === false)
		        return $_transient_data;

	        if(empty($this->exp))
		        return $_transient_data;

	        // If plugin is expired 3 months or longer, don't run anymore
	        $exp = DateTime::createFromFormat("Y-m-d H:i:s",$this->exp);
	        $now = new DateTime('now');
	        $exp = $exp->add(new DateInterval('P3M'));
	        if($exp < $now) return $_transient_data;

	        // Cached because this filter is called twice in the same pageload
	        if($this->cached_plugin_update != null)
		        $version_info = $this->cached_plugin_update;
	        else
		        $version_info = $this->wp_override ? null : $this->get_cached_version_info();

            if ( null === $version_info) {
                $version_info = $this->api_request( 'plugin/update', [ 'version' => $this->version, 'key' => $this->get_key() ] );
                if(isset($version_info->icons))
                	$version_info->icons = json_decode(json_encode($version_info->icons),true);
                $this->set_version_info_cache( $version_info );
                $this->cached_plugin_update = $version_info;
            }

            if ( null !== $version_info && is_object( $version_info ) && isset( $version_info->new_version ) ) {

            	if( version_compare( $this->version, $version_info->new_version, '<' )) {
		            $_transient_data->response[ $this->name ] = $version_info;
		            $_transient_data->last_checked           = current_time( 'timestamp' );
		            $_transient_data->checked[ $this->name ] = $this->version;
	            } else {
		            // Populating the no_update information is required to support auto-updates in WordPress 5.5.
		            $_transient_data->no_update[ $this->name ] = $version_info;
	            }

            }

            return $_transient_data;
        }

        public function get_cached_version_info( ) {

            $transient = get_transient($this->slug . '_version_info');
            if($transient === false)
            	return null;

            $decoded = json_decode($transient);
	        if(isset($decoded->icons))
		        $decoded->icons = json_decode(json_encode($decoded->icons),true);

			return $decoded;
        }

        public function set_version_info_cache( $value ) {

            set_transient($this->slug .'_version_info', json_encode($value), HOUR_IN_SECONDS * 10 ); // Store for 10 hours.

        }

        private function api_request( $action, $api_data = [] ) {

            global $wp_version;

            $api_params = [
                'wp_version'    => $wp_version,
                'url'           => home_url(),
                'slug'          => $this->slug,
                'action'        => $action
            ];

	        $data = [
		        'timeout' 	=> apply_filters('wapf/licensing/timeout', 5),
		        'body'		=> array_merge($api_params, $api_data )
	        ];

            $request = wp_remote_post( $this->api_url, $data);

            if ( is_wp_error( $request ) )
                return null;

            $return = null;

            if ( $request['response']['code'] == 200 )
            {
                $return = json_decode($request['body']);

                if( $action === 'update' && is_object($return)) {
		                // Needed to make auto-update work.
		                $return->plugin = $this->name;
		                $return->id = $this->name;
                }

            }

            return $return;
        }

         private function get_key() {
		    if(empty($this->key)) {
			    $raw = get_option('advanced-product-fields-for-woocommerce-pro_license');
			    if($raw === false)
				    return false;
			    $raw = json_decode(base64_decode($raw));
			    if(empty($raw) || !is_string($raw->key) || strlen($raw->key) < 20 || strpos($raw->key,'-') === false)
				    return false;

			    $this->key = $raw->key;
			    $this->exp = $raw->expiration;

			    return $raw->key;
		    }
		    return $this->key;
	    }

    }
}