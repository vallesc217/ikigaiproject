<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.10
 */

$kratz_footer_id = kratz_get_custom_footer_id();
$kratz_footer_meta = get_post_meta( $kratz_footer_id, 'trx_addons_options', true );
if ( ! empty( $kratz_footer_meta['margin'] ) ) {
	kratz_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( kratz_prepare_css_value( $kratz_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $kratz_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( the_title_attribute( array( 'echo' => false, 'post'=>$kratz_footer_id ) ) ) ); ?>
						<?php
						$kratz_footer_scheme = kratz_get_theme_option( 'footer_scheme' );
						if ( ! empty( $kratz_footer_scheme ) && ! kratz_is_inherit( $kratz_footer_scheme  ) ) {
							echo ' scheme_' . esc_attr( $kratz_footer_scheme );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'kratz_action_show_layout', $kratz_footer_id );
	?>
</footer><!-- /.footer_wrap -->
