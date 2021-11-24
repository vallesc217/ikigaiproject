<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.10
 */


// Socials
if ( kratz_is_on( kratz_get_theme_option( 'socials_in_footer' ) ) ) {
	$kratz_output = kratz_get_socials_links();
	if ( '' != $kratz_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php kratz_show_layout( $kratz_output ); ?>
			</div>
		</div>
		<?php
	}
}
