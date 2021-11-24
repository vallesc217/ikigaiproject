<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kratz_trx_updater_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kratz_trx_updater_theme_setup9', 9 );
	function kratz_trx_updater_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'kratz_filter_tgmpa_required_plugins', 'kratz_trx_updater_tgmpa_required_plugins', 8 );
		}
	}
}

// Filter to add in the required plugins list
// Priority 8 is used to add this plugin before all other plugins
if ( ! function_exists( 'kratz_trx_updater_tgmpa_required_plugins' ) ) {
	function kratz_trx_updater_tgmpa_required_plugins( $list = array() ) {
		if ( kratz_storage_isset( 'required_plugins', 'trx_updater' ) && kratz_storage_get_array( 'required_plugins', 'trx_updater', 'install' ) !== false && kratz_is_theme_activated() ) {
			$path = kratz_get_plugin_source_path( 'plugins/trx_updater/trx_updater.zip' );
			if ( ! empty( $path ) || kratz_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => kratz_storage_get_array( 'required_plugins', 'trx_updater', 'title' ),
					'slug'     => 'trx_updater',
					'source'   => ! empty( $path ) ? $path : 'upload://trx_updater.zip',
					'version'  => '1.5.6',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'kratz_exists_trx_updater' ) ) {
	function kratz_exists_trx_updater() {
		return defined( 'TRX_UPDATER_VERSION' );
	}
}
