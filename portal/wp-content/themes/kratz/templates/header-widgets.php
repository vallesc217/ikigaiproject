<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

// Header sidebar
$kratz_header_name    = kratz_get_theme_option( 'header_widgets' );
$kratz_header_present = ! kratz_is_off( $kratz_header_name ) && is_active_sidebar( $kratz_header_name );
if ( $kratz_header_present ) {
	kratz_storage_set( 'current_sidebar', 'header' );
	$kratz_header_wide = kratz_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $kratz_header_name ) ) {
		dynamic_sidebar( $kratz_header_name );
	}
	$kratz_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $kratz_widgets_output ) ) {
		$kratz_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $kratz_widgets_output );
		$kratz_need_columns   = strpos( $kratz_widgets_output, 'columns_wrap' ) === false;
		if ( $kratz_need_columns ) {
			$kratz_columns = max( 0, (int) kratz_get_theme_option( 'header_columns' ) );
			if ( 0 == $kratz_columns ) {
				$kratz_columns = min( 6, max( 1, kratz_tags_count( $kratz_widgets_output, 'aside' ) ) );
			}
			if ( $kratz_columns > 1 ) {
				$kratz_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $kratz_columns ) . ' widget', $kratz_widgets_output );
			} else {
				$kratz_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $kratz_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $kratz_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $kratz_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'kratz_action_before_sidebar' );
				kratz_show_layout( $kratz_widgets_output );
				do_action( 'kratz_action_after_sidebar' );
				if ( $kratz_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $kratz_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
