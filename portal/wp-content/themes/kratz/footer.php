<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

							// Widgets area inside page content
							kratz_create_widgets_area( 'widgets_below_content' );
							?>
						</div><!-- </.content> -->
					<?php

					// Show main sidebar
					get_sidebar();

					$kratz_body_style = kratz_get_theme_option( 'body_style' );
					?>
					</div><!-- </.content_wrap> -->
					<?php

					// Widgets area below page content and related posts below page content
					$kratz_widgets_name = kratz_get_theme_option( 'widgets_below_page' );
					$kratz_show_widgets = ! kratz_is_off( $kratz_widgets_name ) && is_active_sidebar( $kratz_widgets_name );
					$kratz_show_related = is_single() && kratz_get_theme_option( 'related_position' ) == 'below_page';
					if ( $kratz_show_widgets || $kratz_show_related ) {
						if ( 'fullscreen' != $kratz_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $kratz_show_related ) {
							do_action( 'kratz_action_related_posts' );
						}

						// Widgets area below page content
						if ( $kratz_show_widgets ) {
							kratz_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $kratz_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				kratz_show_post_banner('footer');
			}
			// Footer
			$kratz_footer_type = kratz_get_theme_option( 'footer_type' );
			if ( 'custom' == $kratz_footer_type && ! kratz_is_layouts_available() ) {
				$kratz_footer_type = 'default';
			}
			get_template_part( apply_filters( 'kratz_filter_get_template_part', "templates/footer-{$kratz_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>