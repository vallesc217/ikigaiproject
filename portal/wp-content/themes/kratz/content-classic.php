<?php
/**
 * The Classic template to display the content
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
$kratz_expanded   = ! kratz_sidebar_present() && kratz_is_on( kratz_get_theme_option( 'expand_content' ) );
$kratz_components = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );

$kratz_post_format = get_post_format();
$kratz_post_format = empty( $kratz_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kratz_post_format );

?><div class="
<?php
if ( ! empty( $kratz_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $kratz_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $kratz_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $kratz_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $kratz_columns )
				. ' post_layout_' . esc_attr( $kratz_blog_style[0] )
				. ' post_layout_' . esc_attr( $kratz_blog_style[0] ) . '_' . esc_attr( $kratz_columns )
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

	// Featured image
	$kratz_hover = ! empty( $kratz_template_args['hover'] ) && ! kratz_is_inherit( $kratz_template_args['hover'] )
						? $kratz_template_args['hover']
						: kratz_get_theme_option( 'image_hover' );
	kratz_show_post_featured(
		array(
			'thumb_size' => kratz_get_thumb_size(
				'classic' == $kratz_blog_style[0]
						? ( strpos( kratz_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $kratz_columns > 2 ? 'big' : 'huge' )
								: ( $kratz_columns > 2
									? ( $kratz_expanded ? 'med' : 'small' )
									: ( $kratz_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( kratz_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $kratz_columns > 2 ? 'masonry-big' : 'full' )
								: ( $kratz_columns <= 2 && $kratz_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $kratz_hover,
			'no_links'   => ! empty( $kratz_template_args['no_links'] ),
		)
	);

	if ( ! in_array( $kratz_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'kratz_action_before_post_title' );

			// Post title
			if ( empty( $kratz_template_args['no_links'] ) ) {
				the_title( sprintf( '<h5 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			} else {
				the_title( '<h5 class="post_title entry-title">', '</h5>' );
			}

			do_action( 'kratz_action_before_post_meta' );

			// Post meta
			if ( ! empty( $kratz_components ) && ! in_array( $kratz_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				kratz_show_post_meta(
					apply_filters(
						'kratz_filter_post_meta_args', array(
							'components' => $kratz_components,
							'seo'        => false,
						), $kratz_blog_style[0], $kratz_columns
					)
				);
			}

			do_action( 'kratz_action_after_post_meta' );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
		<?php
        if ( empty( $kratz_template_args['hide_excerpt'] ) && kratz_get_theme_option( 'excerpt_length' ) > 0 ) {
			// Post content area
			kratz_show_post_content( $kratz_template_args, '<div class="post_content_inner">', '</div>' );
		}
		
		// Post meta
		if ( in_array( $kratz_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			if ( ! empty( $kratz_components ) ) {
				kratz_show_post_meta(
					apply_filters(
						'kratz_filter_post_meta_args', array(
							'components' => $kratz_components,
						), $kratz_blog_style[0], $kratz_columns
					)
				);
			}
		}
		
		// More button
		if ( empty( $kratz_template_args['no_links'] ) && ! empty( $kratz_template_args['more_text'] ) && ! in_array( $kratz_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			kratz_show_post_more_link( $kratz_template_args, '<p>', '</p>' );
		}
		?>
	</div><!-- .entry-content -->

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
