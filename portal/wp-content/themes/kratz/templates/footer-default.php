<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.10
 */

?>
<footer class="footer_wrap footer_default
<?php
$kratz_footer_scheme = kratz_get_theme_option( 'footer_scheme' );
if ( ! empty( $kratz_footer_scheme ) && ! kratz_is_inherit( $kratz_footer_scheme  ) ) {
	echo ' scheme_' . esc_attr( $kratz_footer_scheme );
}
?>
				">
	<?php

	// Footer widgets area
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/footer-widgets' ) );

	// Logo
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/footer-logo' ) );

	// Socials
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/footer-socials' ) );

	// Menu
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/footer-menu' ) );

	// Copyright area
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/footer-copyright' ) );

	?>
</footer><!-- /.footer_wrap -->
