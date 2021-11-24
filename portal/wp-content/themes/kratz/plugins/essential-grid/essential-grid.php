<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kratz_essential_grid_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kratz_essential_grid_theme_setup9', 9 );
	function kratz_essential_grid_theme_setup9() {
		if ( kratz_exists_essential_grid() ) {
			add_action( 'wp_enqueue_scripts', 'kratz_essential_grid_frontend_scripts', 1100 );
			add_filter( 'kratz_filter_merge_styles', 'kratz_essential_grid_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'kratz_filter_tgmpa_required_plugins', 'kratz_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kratz_essential_grid_tgmpa_required_plugins' ) ) {
	function kratz_essential_grid_tgmpa_required_plugins( $list = array() ) {
		if ( kratz_storage_isset( 'required_plugins', 'essential-grid' ) && kratz_storage_get_array( 'required_plugins', 'essential-grid', 'install' ) !== false && kratz_is_theme_activated() ) {
			$path = kratz_get_plugin_source_path( 'plugins/essential-grid/essential-grid.zip' );
			if ( ! empty( $path ) || kratz_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => kratz_storage_get_array( 'required_plugins', 'essential-grid', 'title' ),
					'slug'     => 'essential-grid',
					'source'   => ! empty( $path ) ? $path : 'upload://essential-grid.zip',
					'version'  => '3.0.11',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'kratz_exists_essential_grid' ) ) {
	function kratz_exists_essential_grid() {
		return defined( 'EG_PLUGIN_PATH' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'kratz_essential_grid_frontend_scripts' ) ) {
	function kratz_essential_grid_frontend_scripts() {
		if ( kratz_is_on( kratz_get_theme_option( 'debug_mode' ) ) ) {
			$kratz_url = kratz_get_file_url( 'plugins/essential-grid/essential-grid.css' );
			if ( '' != $kratz_url ) {
				wp_enqueue_style( 'kratz-essential-grid', $kratz_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'kratz_essential_grid_merge_styles' ) ) {
	function kratz_essential_grid_merge_styles( $list ) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}

