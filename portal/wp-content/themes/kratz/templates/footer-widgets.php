<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.10
 */

// Footer sidebar
$kratz_footer_name    = kratz_get_theme_option( 'footer_widgets' );
$kratz_footer_present = ! kratz_is_off( $kratz_footer_name ) && is_active_sidebar( $kratz_footer_name );
if ( $kratz_footer_present ) {
	kratz_storage_set( 'current_sidebar', 'footer' );
	$kratz_footer_wide = kratz_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $kratz_footer_name ) ) {
		dynamic_sidebar( $kratz_footer_name );
	}
	$kratz_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $kratz_out ) ) {
		$kratz_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $kratz_out );
		$kratz_need_columns = true;   //or check: strpos($kratz_out, 'columns_wrap')===false;
		if ( $kratz_need_columns ) {
			$kratz_columns = max( 0, (int) kratz_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $kratz_columns ) {
				$kratz_columns = min( 4, max( 1, kratz_tags_count( $kratz_out, 'aside' ) ) );
			}
			if ( $kratz_columns > 1 ) {
				$kratz_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $kratz_columns ) . ' widget', $kratz_out );
			} else {
				$kratz_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $kratz_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $kratz_footer_wide ) {
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
				kratz_show_layout( $kratz_out );
				do_action( 'kratz_action_after_sidebar' );
				if ( $kratz_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $kratz_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
