<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

if ( kratz_sidebar_present() ) {
	ob_start();
	$kratz_sidebar_name = kratz_get_theme_option( 'sidebar_widgets' );
	kratz_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $kratz_sidebar_name ) ) {
		dynamic_sidebar( $kratz_sidebar_name );
	}
	$kratz_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $kratz_out ) ) {
		$kratz_sidebar_position    = kratz_get_theme_option( 'sidebar_position' );
		$kratz_sidebar_position_ss = kratz_get_theme_option( 'sidebar_position_ss' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $kratz_sidebar_position );
			echo ' sidebar_' . esc_attr( $kratz_sidebar_position_ss );

			if ( 'float' == $kratz_sidebar_position_ss ) {
				echo ' sidebar_float';
			}
			$kratz_sidebar_scheme = kratz_get_theme_option( 'sidebar_scheme' );
			if ( ! empty( $kratz_sidebar_scheme ) && ! kratz_is_inherit( $kratz_sidebar_scheme ) ) {
				echo ' scheme_' . esc_attr( $kratz_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php
			// Single posts banner before sidebar
			kratz_show_post_banner( 'sidebar' );
			// Button to show/hide sidebar on mobile
			if ( in_array( $kratz_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$kratz_title = apply_filters( 'kratz_filter_sidebar_control_title', 'float' == $kratz_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'kratz' ) : '' );
				$kratz_text  = apply_filters( 'kratz_filter_sidebar_control_text', 'above' == $kratz_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'kratz' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $kratz_title ); ?>"><?php echo esc_html( $kratz_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'kratz_action_before_sidebar' );
				kratz_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $kratz_out ) );
				do_action( 'kratz_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
