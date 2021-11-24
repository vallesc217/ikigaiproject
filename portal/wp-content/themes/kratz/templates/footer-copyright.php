<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
$kratz_copyright_scheme = kratz_get_theme_option( 'copyright_scheme' );
if ( ! empty( $kratz_copyright_scheme ) && ! kratz_is_inherit( $kratz_copyright_scheme  ) ) {
	echo ' scheme_' . esc_attr( $kratz_copyright_scheme );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$kratz_copyright = kratz_get_theme_option( 'copyright' );
			if ( ! empty( $kratz_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$kratz_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $kratz_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$kratz_copyright = kratz_prepare_macros( $kratz_copyright );
				// Display copyright
				echo wp_kses_post( nl2br( $kratz_copyright ) );
			}
			?>
			</div>
		</div>
	</div>
</div>
