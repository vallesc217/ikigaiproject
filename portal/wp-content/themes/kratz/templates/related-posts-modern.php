<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

$kratz_link        = get_permalink();
$kratz_post_format = get_post_format();
$kratz_post_format = empty( $kratz_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kratz_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $kratz_post_format ) ); ?>>
	<?php
	kratz_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'kratz_filter_related_thumb_size', kratz_get_thumb_size( (int) kratz_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'show_no_image' => kratz_get_no_image() != '',
			'post_info'     => '<div class="post_header entry-header">'
									. '<div class="post_categories">' . wp_kses( kratz_get_post_categories( '' ), 'kratz_kses_content' ) . '</div>'
									. '<h6 class="post_title entry-title"><a href="' . esc_url( $kratz_link ) . '">' . wp_kses_data( get_the_title() ) . '</a></h6>'
									. ( in_array( get_post_type(), array( 'post', 'attachment' ) )
											? '<div class="post_meta"><a href="' . esc_url( $kratz_link ) . '" class="post_meta_item post_date">' . wp_kses_data( kratz_get_date() ) . '</a></div>'
											: '' )
								. '</div>',
		)
	);
	?>
</div>
