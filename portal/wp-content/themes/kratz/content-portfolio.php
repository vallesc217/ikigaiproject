<?php
/**
 * The Portfolio template to display the content
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
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
	);
	kratz_add_blog_animation( $kratz_template_args );
	?>
>
<?php

// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	$kratz_image_hover = ! empty( $kratz_template_args['hover'] ) && ! kratz_is_inherit( $kratz_template_args['hover'] )
								? $kratz_template_args['hover']
								: kratz_get_theme_option( 'image_hover' );
	// Featured image
	kratz_show_post_featured(
		array(
			'hover'         => $kratz_image_hover,
			'no_links'      => ! empty( $kratz_template_args['no_links'] ),
			'thumb_size'    => kratz_get_thumb_size(
				strpos( kratz_get_theme_option( 'body_style' ), 'full' ) !== false || $kratz_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $kratz_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $kratz_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!