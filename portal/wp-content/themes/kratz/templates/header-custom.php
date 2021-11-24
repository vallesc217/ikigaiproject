<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.06
 */

$kratz_header_css   = '';
$kratz_header_image = get_header_image();
$kratz_header_video = kratz_get_header_video();
if ( ! empty( $kratz_header_image ) && kratz_trx_addons_featured_image_override( is_singular() || kratz_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$kratz_header_image = kratz_get_current_mode_image( $kratz_header_image );
}

$kratz_header_id = kratz_get_custom_header_id();
$kratz_header_meta = get_post_meta( $kratz_header_id, 'trx_addons_options', true );
if ( ! empty( $kratz_header_meta['margin'] ) ) {
	kratz_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( kratz_prepare_css_value( $kratz_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $kratz_header_id ); ?> top_panel_custom_<?php echo sanitize_title( the_title_attribute( array( 'echo' => false, 'post'=>$kratz_header_id ) ) ); ?>
				<?php
				echo ! empty( $kratz_header_image ) || ! empty( $kratz_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'kratz_action_show_layout', $kratz_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
