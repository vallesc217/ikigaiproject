<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

// Page (category, tag, archive, author) title

if ( kratz_need_page_title() ) {
	kratz_sc_layouts_showed( 'title', true );
	kratz_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								kratz_show_post_meta(
									apply_filters(
										'kratz_filter_post_meta_args', array(
											'components' => kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) ),
											'counters'   => kratz_array_get_keys_by_value( kratz_get_theme_option( 'counters' ) ),
											'seo'        => kratz_is_on( kratz_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$kratz_blog_title           = kratz_get_blog_title();
							$kratz_blog_title_text      = '';
							$kratz_blog_title_class     = '';
							$kratz_blog_title_link      = '';
							$kratz_blog_title_link_text = '';
							if ( is_array( $kratz_blog_title ) ) {
								$kratz_blog_title_text      = $kratz_blog_title['text'];
								$kratz_blog_title_class     = ! empty( $kratz_blog_title['class'] ) ? ' ' . $kratz_blog_title['class'] : '';
								$kratz_blog_title_link      = ! empty( $kratz_blog_title['link'] ) ? $kratz_blog_title['link'] : '';
								$kratz_blog_title_link_text = ! empty( $kratz_blog_title['link_text'] ) ? $kratz_blog_title['link_text'] : '';
							} else {
								$kratz_blog_title_text = $kratz_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $kratz_blog_title_class ); ?>">
								<?php
								$kratz_top_icon = kratz_get_term_image_small();
								if ( ! empty( $kratz_top_icon ) ) {
									$kratz_attr = kratz_getimagesize( $kratz_top_icon );
									?>
									<img src="<?php echo esc_url( $kratz_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'kratz' ); ?>"
										<?php
										if ( ! empty( $kratz_attr[3] ) ) {
											kratz_show_layout( $kratz_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_post( $kratz_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $kratz_blog_title_link ) && ! empty( $kratz_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $kratz_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $kratz_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'kratz_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
