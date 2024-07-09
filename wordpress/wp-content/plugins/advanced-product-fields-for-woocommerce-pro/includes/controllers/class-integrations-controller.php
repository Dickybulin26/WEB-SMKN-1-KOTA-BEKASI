<?php

namespace SW_WAPF_PRO\Includes\Controllers {

    if (!defined('ABSPATH')) {
        die;
    }

    class Integrations_Controller
    {

        private $available_integrations = [
	       // 'WC_Bookings'                                       => 'WooCommerce_Bookings'
        ];

      

        public function __construct()
        {
        	add_action('plugins_loaded',    [$this,'add_integrations'], 50);
        }

        public function add_integrations() {

	        foreach ($this->available_integrations as $integration => $class) {
		        if(class_exists($integration)) {
		        	$n = 'SW_WAPF_PRO\\Includes\\Classes\\Integrations\\' . $class;
			        new $n();
		        }
	        }

	    
        }


    }
}