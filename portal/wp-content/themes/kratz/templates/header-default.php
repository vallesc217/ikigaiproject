<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

$kratz_header_css   = '';
$kratz_header_image = get_header_image();
$kratz_header_video = kratz_get_header_video();
if ( ! empty( $kratz_header_image ) && kratz_trx_addons_featured_image_override( is_singular() || kratz_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$kratz_header_image = kratz_get_current_mode_image( $kratz_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $kratz_header_image ) || ! empty( $kratz_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $kratz_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $kratz_header_image ) {
		echo ' ' . esc_attr( kratz_add_inline_css_class( 'background-image: url(' . esc_url( $kratz_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( kratz_is_on( kratz_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight kratz-full-height';
	}
	$kratz_header_scheme = kratz_get_theme_option( 'header_scheme' );
	if ( ! empty( $kratz_header_scheme ) && ! kratz_is_inherit( $kratz_header_scheme  ) ) {
		echo ' scheme_' . esc_attr( $kratz_header_scheme );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $kratz_header_video ) ) {
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( kratz_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( kratz_is_on( kratz_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-mobile' ) );
	}

	if ( !is_single() || ( kratz_get_theme_option( 'post_header_position' ) == 'default' && kratz_get_theme_option( 'post_thumbnail_type' ) == 'default' ) ) {
		// Page title and breadcrumbs area
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-title' ) );

		// Display featured image in the header on the single posts
		// Comment next line to prevent show featured image in the header area
		// and display it in the post's content
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-single' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>
