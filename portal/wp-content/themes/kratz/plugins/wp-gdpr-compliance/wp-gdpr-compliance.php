<?php
/* WP GDPR Compliance support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kratz_wp_gdpr_compliance_feed_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kratz_wp_gdpr_compliance_theme_setup9', 9 );
	function kratz_wp_gdpr_compliance_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'kratz_filter_tgmpa_required_plugins', 'kratz_wp_gdpr_compliance_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kratz_wp_gdpr_compliance_tgmpa_required_plugins' ) ) {
	function kratz_wp_gdpr_compliance_tgmpa_required_plugins( $list = array() ) {
		if ( kratz_storage_isset( 'required_plugins', 'wp-gdpr-compliance' ) && kratz_storage_get_array( 'required_plugins', 'wp-gdpr-compliance', 'install' ) !== false ) {
			$list[] = array(
				'name'     => kratz_storage_get_array( 'required_plugins', 'wp-gdpr-compliance', 'title' ),
				'slug'     => 'wp-gdpr-compliance',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'kratz_exists_wp_gdpr_compliance' ) ) {
	function kratz_exists_wp_gdpr_compliance() {
		return class_exists( 'WPGDPRC\WPGDPRC' );
	}
}
