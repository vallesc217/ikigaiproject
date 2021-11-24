<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.14
 */
$kratz_header_video = kratz_get_header_video();
$kratz_embed_video  = '';
if ( ! empty( $kratz_header_video ) && ! kratz_is_from_uploads( $kratz_header_video ) ) {
	if ( kratz_is_youtube_url( $kratz_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $kratz_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php kratz_show_layout( kratz_get_embed_video( $kratz_header_video ) ); ?></div>
		<?php
	}
}
