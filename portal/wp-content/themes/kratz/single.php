<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	// Prepare theme-specific vars:

	// Full post loading
	$full_post_loading        = kratz_get_value_gp( 'action' ) == 'full_post_loading';

	// Prev post loading
	$prev_post_loading        = kratz_get_value_gp( 'action' ) == 'prev_post_loading';

	// Position of the related posts
	$kratz_related_position = kratz_get_theme_option( 'related_position' );

	// Type of the prev/next posts navigation
	$kratz_posts_navigation = kratz_get_theme_option( 'posts_navigation' );
	$kratz_prev_post        = false;

	if ( 'scroll' == $kratz_posts_navigation ) {
		$kratz_prev_post = get_previous_post( true );         // Get post from same category
		if ( ! $kratz_prev_post ) {
			$kratz_prev_post = get_previous_post( false );    // Get post from any category
			if ( ! $kratz_prev_post ) {
				$kratz_posts_navigation = 'links';
			}
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $kratz_prev_post ) ) {
		kratz_storage_set_array( 'options_meta', 'post_thumbnail_type', 'default' );
		if ( kratz_get_theme_option( 'post_header_position' ) != 'below' ) {
			kratz_storage_set_array( 'options_meta', 'post_header_position', 'above' );
		}
		kratz_sc_layouts_showed( 'featured', false );
		kratz_sc_layouts_showed( 'title', false );
		kratz_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $kratz_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'kratz_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// If related posts should be inside the content
	if ( strpos( $kratz_related_position, 'inside' ) === 0 ) {
		$kratz_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'kratz_action_related_posts' );
		$kratz_related_content = ob_get_contents();
		ob_end_clean();

		$kratz_related_position_inside = max( 0, min( 9, kratz_get_theme_option( 'related_position_inside' ) ) );
		if ( 0 == $kratz_related_position_inside ) {
			$kratz_related_position_inside = mt_rand( 1, 9 );
		}
		
		$kratz_p_number = 0;
		$kratz_related_inserted = false;
		for ( $i = 0; $i < strlen( $kratz_content ) - 3; $i++ ) {
			if ( $kratz_content[ $i ] == '<' && $kratz_content[ $i + 1 ] == 'p' && in_array( $kratz_content[ $i + 2 ], array( '>', ' ' ) ) ) {
				$kratz_p_number++;
				if ( $kratz_related_position_inside == $kratz_p_number ) {
					$kratz_related_inserted = true;
					$kratz_content = ( $i > 0 ? substr( $kratz_content, 0, $i ) : '' )
										. $kratz_related_content
										. substr( $kratz_content, $i );
				}
			}
		}
		if ( ! $kratz_related_inserted ) {
			$kratz_content .= $kratz_related_content;
		}

		kratz_show_layout( $kratz_content );
	}

	// Author bio
	if ( kratz_get_theme_option( 'show_author_info' ) == 1
		&& ! is_attachment()
		&& get_the_author_meta( 'description' )
		&& ( 'scroll' != $kratz_posts_navigation || kratz_get_theme_option( 'posts_navigation_scroll_hide_author' ) == 0 )
		&& ( ! $full_post_loading || kratz_get_theme_option( 'open_full_post_hide_author' ) == 0 )
	) {
		do_action( 'kratz_action_before_post_author' );
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/author-bio' ) );
		do_action( 'kratz_action_after_post_author' );
	}

	// Previous/next post navigation.
	if ( 'links' == $kratz_posts_navigation && ! $full_post_loading ) {
		do_action( 'kratz_action_before_post_navigation' );
		?>
		<div class="nav-links-single<?php
			if ( ! kratz_is_off( kratz_get_theme_option( 'posts_navigation_fixed' ) ) ) {
				echo ' nav-links-fixed fixed';
			}
		?>">
			<?php
			the_post_navigation(
                array(
                    'next_text' => '<span class="nav-arrow related-next"></span>'
                        .'<span class="related-nav ">' . esc_html__( 'Next', 'kratz' ) . '<span class="nav-ico  icon-arrow-button-right"></span></span> '
                        . '<h6 class="post-title">%title</h6>'
                        . '<span class="post_date">%date</span>',
                    'prev_text' => '<span class="nav-arrow related-prev "></span>'
                        . '<span class="related-nav"><span class="nav-ico  icon-arrow-button-left"></span>' . esc_html__( 'Prev', 'kratz' ) . '</span> '
                        . '<h6 class="post-title">%title</h6>'
                        . '<span class="post_date">%date</span>',
                )
			);
			?>
		</div>
		<?php
		do_action( 'kratz_action_after_post_navigation' );
	}

	// Related posts
	if ( 'below_content' == $kratz_related_position
		&& ( 'scroll' != $kratz_posts_navigation || kratz_get_theme_option( 'posts_navigation_scroll_hide_related' ) == 0 )
		&& ( ! $full_post_loading || kratz_get_theme_option( 'open_full_post_hide_related' ) == 0 )
	) {
		do_action( 'kratz_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	$kratz_comments_number = get_comments_number();
	if ( comments_open() || $kratz_comments_number > 0 ) {
		if ( kratz_get_value_gp( 'show_comments' ) == 1 || ( ! $full_post_loading && ( 'scroll' != $kratz_posts_navigation || kratz_get_theme_option( 'posts_navigation_scroll_hide_comments' ) == 0 || kratz_check_url( '#comment' ) ) ) ) {
			do_action( 'kratz_action_before_comments' );
			comments_template();
			do_action( 'kratz_action_after_comments' );
		} else {
			?>
			<div class="show_comments_single">
				<a href="<?php echo esc_url( add_query_arg( array( 'show_comments' => 1 ), get_comments_link() ) ); ?>" class="theme_button show_comments_button">
					<?php
					if ( $kratz_comments_number > 0 ) {
						echo esc_html( sprintf( _n( 'Show comment', 'Show comments ( %d )', $kratz_comments_number, 'kratz' ), $kratz_comments_number ) );
					} else {
						esc_html_e( 'Leave a comment', 'kratz' );
					}
					?>
				</a>
			</div>
			<?php
		}
	}

	if ( 'scroll' == $kratz_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $kratz_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $kratz_prev_post ) ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $kratz_prev_post ) ); ?>">
		</div>
		<?php
	}
}

get_footer();
