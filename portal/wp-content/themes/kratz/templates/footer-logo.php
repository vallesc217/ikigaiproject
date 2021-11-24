<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.10
 */

// Logo
if ( kratz_is_on( kratz_get_theme_option( 'logo_in_footer' ) ) ) {
	$kratz_logo_image = kratz_get_logo_image( 'footer' );
	$kratz_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $kratz_logo_image['logo'] ) || ! empty( $kratz_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $kratz_logo_image['logo'] ) ) {
					$kratz_attr = kratz_getimagesize( $kratz_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $kratz_logo_image['logo'] ) . '"'
								. ( ! empty( $kratz_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $kratz_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'kratz' ) . '"'
								. ( ! empty( $kratz_attr[3] ) ? ' ' . wp_kses_data( $kratz_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $kratz_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $kratz_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
