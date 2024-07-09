<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

delete_option('wapf_db_version');
delete_option('advanced-product-fields-for-woocommerce-pro_license');