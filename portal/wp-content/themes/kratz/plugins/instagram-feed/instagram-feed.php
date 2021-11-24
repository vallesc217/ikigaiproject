<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kratz_instagram_feed_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kratz_instagram_feed_theme_setup9', 9 );
	function kratz_instagram_feed_theme_setup9() {
		if ( kratz_exists_instagram_feed() ) {
			add_action( 'wp_enqueue_scripts', 'kratz_instagram_responsive_styles', 2000 );
			add_filter( 'kratz_filter_merge_styles_responsive', 'kratz_instagram_merge_styles_responsive' );
		}
		if ( is_admin() ) {
			add_filter( 'kratz_filter_tgmpa_required_plugins', 'kratz_instagram_feed_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kratz_instagram_feed_tgmpa_required_plugins' ) ) {
	function kratz_instagram_feed_tgmpa_required_plugins( $list = array() ) {
		if ( kratz_storage_isset( 'required_plugins', 'instagram-feed' ) && kratz_storage_get_array( 'required_plugins', 'instagram-feed', 'install' ) !== false ) {
			$list[] = array(
				'name'     => kratz_storage_get_array( 'required_plugins', 'instagram-feed', 'title' ),
				'slug'     => 'instagram-feed',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if Instagram Feed installed and activated
if ( ! function_exists( 'kratz_exists_instagram_feed' ) ) {
	function kratz_exists_instagram_feed() {
		return defined( 'SBIVER' );
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'kratz_instagram_responsive_styles' ) ) {
	function kratz_instagram_responsive_styles() {
		if ( kratz_is_on( kratz_get_theme_option( 'debug_mode' ) ) ) {
			$kratz_url = kratz_get_file_url( 'plugins/instagram/instagram-responsive.css' );
			if ( '' != $kratz_url ) {
				wp_enqueue_style( 'kratz-instagram-responsive', $kratz_url, array(), null );
			}
		}
	}
}

// Merge responsive styles
if ( ! function_exists( 'kratz_instagram_merge_styles_responsive' ) ) {
	function kratz_instagram_merge_styles_responsive( $list ) {
		$list[] = 'plugins/instagram/instagram-responsive.css';
		return $list;
	}
}

