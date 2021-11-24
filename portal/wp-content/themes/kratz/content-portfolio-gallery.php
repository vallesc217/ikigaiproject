<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

$kratz_template_args = get_query_var( 'kratz_template_args' );
if ( is_array( $kratz_template_args ) ) {
	$kratz_columns    = empty( $kratz_template_args['columns'] ) ? 2 : max( 1, $kratz_template_args['columns'] );
	$kratz_blog_style = array( $kratz_template_args['type'], $kratz_columns );
} else {
	$kratz_blog_style = explode( '_', kratz_get_theme_option( 'blog_style' ) );
	$kratz_columns    = empty( $kratz_blog_style[1] ) ? 2 : max( 1, $kratz_blog_style[1] );
}
$kratz_post_format = get_post_format();
$kratz_post_format = empty( $kratz_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kratz_post_format );
$kratz_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><div class="
<?php
if ( ! empty( $kratz_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo 'masonry_item masonry_item-1_' . esc_attr( $kratz_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $kratz_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $kratz_columns )
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $kratz_columns )
	);
	kratz_add_blog_animation( $kratz_template_args );
	?>
	data-size="
		<?php
		if ( ! empty( $kratz_image[1] ) && ! empty( $kratz_image[2] ) ) {
			echo intval( $kratz_image[1] ) . 'x' . intval( $kratz_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $kratz_image[0] ) ) {
			echo esc_url( $kratz_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$kratz_image_hover = 'icon';
if ( in_array( $kratz_image_hover, array( 'icons', 'zoom' ) ) ) {
	$kratz_image_hover = 'dots';
}
$kratz_components = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );
kratz_show_post_featured(
	array(
		'hover'         => $kratz_image_hover,
		'no_links'      => ! empty( $kratz_template_args['no_links'] ),
		'thumb_size'    => kratz_get_thumb_size( strpos( kratz_get_theme_option( 'body_style' ), 'full' ) !== false || $kratz_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $kratz_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $kratz_components )
								? kratz_show_post_meta(
									apply_filters(
										'kratz_filter_post_meta_args', array(
											'components' => $kratz_components,
											'seo'      => false,
											'echo'     => false,
										), $kratz_blog_style[0], $kratz_columns
									)
								)
								: ''
								)
							. ( empty( $kratz_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $kratz_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'kratz' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
