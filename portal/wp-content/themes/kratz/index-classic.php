<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

kratz_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	kratz_blog_archive_start();

	$kratz_classes    = 'posts_container '
						. ( substr( kratz_get_theme_option( 'blog_style' ), 0, 7 ) == 'classic'
							? 'columns_wrap columns_padding_bottom'
							: 'masonry_wrap'
							);
	$kratz_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$kratz_sticky_out = kratz_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $kratz_stickies ) && count( $kratz_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $kratz_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $kratz_sticky_out ) {
		if ( kratz_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( kratz_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'kratz_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}

		?>
		<div class="<?php echo esc_attr( $kratz_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $kratz_sticky_out && ! is_sticky() ) {
			$kratz_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $kratz_classes ); ?>">
			<?php
		}
		$kratz_part = $kratz_sticky_out && is_sticky() ? 'sticky' : 'classic';
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'content', $kratz_part ), $kratz_part );
	}

	?>
	</div>
	<?php

	kratz_show_pagination();

	kratz_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
