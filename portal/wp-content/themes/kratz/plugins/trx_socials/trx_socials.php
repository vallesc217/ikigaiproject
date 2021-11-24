<?php
/* TRX Socials support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('kratz_trx_socials_theme_setup9')) {
	add_action( 'after_setup_theme', 'kratz_trx_socials_theme_setup9', 9 );
	function kratz_trx_socials_theme_setup9() {
		
		if (is_admin()) {
			add_filter( 'kratz_filter_tgmpa_required_plugins',	'kratz_trx_socials_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'kratz_trx_socials_tgmpa_required_plugins' ) ) {

    function kratz_trx_socials_tgmpa_required_plugins($list=array()) {
        if ( kratz_storage_isset( 'required_plugins', 'trx_socials' ) ) {
            $path = kratz_get_file_dir('plugins/trx_socials/trx_socials.zip');
            $list[] = array(
                'name'     => kratz_storage_get_array( 'required_plugins', 'trx_socials', 'title' ),
                'slug' 		=> 'trx_socials',
                'source'	=> !empty($path) ? $path : 'upload://trx_socials.zip',
                'version'   => '1.3.6',
                'required' 	=> false
            );
        }
        return $list;
    }
}

// Check if TRX Socials installed and activated
if ( !function_exists( 'kratz_exists_trx_socials' ) ) {
	function kratz_exists_trx_socials() {
        return function_exists( 'trx_socials_load_plugin_textdomain' );
	}
}
?>