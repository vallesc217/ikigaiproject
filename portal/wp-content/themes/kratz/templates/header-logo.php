<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

$kratz_args = get_query_var( 'kratz_logo_args' );

// Site logo
$kratz_logo_type   = isset( $kratz_args['type'] ) ? $kratz_args['type'] : '';
$kratz_logo_image  = kratz_get_logo_image( $kratz_logo_type );
$kratz_logo_text   = kratz_is_on( kratz_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$kratz_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $kratz_logo_image['logo'] ) || ! empty( $kratz_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $kratz_logo_image['logo'] ) ) {
			if ( empty( $kratz_logo_type ) && function_exists( 'the_custom_logo' ) && is_numeric( $kratz_logo_image['logo'] ) && $kratz_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$kratz_attr = kratz_getimagesize( $kratz_logo_image['logo'] );
				echo '<img src="' . esc_url( $kratz_logo_image['logo'] ) . '"'
						. ( ! empty( $kratz_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $kratz_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $kratz_logo_text ) . '"'
						. ( ! empty( $kratz_attr[3] ) ? ' ' . wp_kses_data( $kratz_attr[3] ) : '' )
						. '>';
			}
		} else {
			kratz_show_layout( kratz_prepare_macros( $kratz_logo_text ), '<span class="logo_text">', '</span>' );
			kratz_show_layout( kratz_prepare_macros( $kratz_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
