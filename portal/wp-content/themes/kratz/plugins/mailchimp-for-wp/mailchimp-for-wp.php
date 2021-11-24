<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kratz_mailchimp_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kratz_mailchimp_theme_setup9', 9 );
	function kratz_mailchimp_theme_setup9() {
		if ( kratz_exists_mailchimp() ) {
			add_action( 'wp_enqueue_scripts', 'kratz_mailchimp_frontend_scripts', 1100 );
			add_filter( 'kratz_filter_merge_styles', 'kratz_mailchimp_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'kratz_filter_tgmpa_required_plugins', 'kratz_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kratz_mailchimp_tgmpa_required_plugins' ) ) {
	function kratz_mailchimp_tgmpa_required_plugins( $list = array() ) {
		if ( kratz_storage_isset( 'required_plugins', 'mailchimp-for-wp' ) && kratz_storage_get_array( 'required_plugins', 'mailchimp-for-wp', 'install' ) !== false ) {
			$list[] = array(
				'name'     => kratz_storage_get_array( 'required_plugins', 'mailchimp-for-wp', 'title' ),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'kratz_exists_mailchimp' ) ) {
	function kratz_exists_mailchimp() {
		return function_exists( '__mc4wp_load_plugin' ) || defined( 'MC4WP_VERSION' );
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue styles for frontend
if ( ! function_exists( 'kratz_mailchimp_frontend_scripts' ) ) {
	function kratz_mailchimp_frontend_scripts() {
		if ( kratz_is_on( kratz_get_theme_option( 'debug_mode' ) ) ) {
			$kratz_url = kratz_get_file_url( 'plugins/mailchimp-for-wp/mailchimp-for-wp.css' );
			if ( '' != $kratz_url ) {
				wp_enqueue_style( 'kratz-mailchimp', $kratz_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'kratz_mailchimp_merge_styles' ) ) {
	function kratz_mailchimp_merge_styles( $list ) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( kratz_exists_mailchimp() ) {
	require_once KRATZ_THEME_DIR . 'plugins/mailchimp-for-wp/mailchimp-for-wp-styles.php'; }

