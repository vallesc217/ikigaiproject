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
	$kratz_columns    = empty( $kratz_template_args['columns'] ) ? 1 : max( 1, min( 3, $kratz_template_args['columns'] ) );
	$kratz_blog_style = array( $kratz_template_args['type'], $kratz_columns );
} else {
	$kratz_blog_style = explode( '_', kratz_get_theme_option( 'blog_style' ) );
	$kratz_columns    = empty( $kratz_blog_style[1] ) ? 1 : max( 1, min( 3, $kratz_blog_style[1] ) );
}
$kratz_expanded    = ! kratz_sidebar_present() && kratz_is_on( kratz_get_theme_option( 'expand_content' ) );
$kratz_post_format = get_post_format();
$kratz_post_format = empty( $kratz_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kratz_post_format );

?><article id="post-<?php the_ID(); ?>"	data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item'
		. ' post_layout_chess'
		. ' post_layout_chess_' . esc_attr( $kratz_columns )
		. ' post_format_' . esc_attr( $kratz_post_format )
		. ( ! empty( $kratz_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
	);
	kratz_add_blog_animation( $kratz_template_args );
	?>
>

	<?php
	// Add anchor
	if ( 1 == $kratz_columns && ! is_array( $kratz_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" icon="' . esc_attr( kratz_get_post_icon() ) . '"]' );
	}

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
			'class'         => 1 == $kratz_columns && ! is_array( $kratz_template_args ) ? 'kratz-full-height' : '',
			'hover'         => $kratz_hover,
			'no_links'      => ! empty( $kratz_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => kratz_get_thumb_size(
				strpos( kratz_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $kratz_columns ? 'huge' : 'original' )
										: ( 2 < $kratz_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'kratz_action_before_post_title' );

			// Post title
			if ( empty( $kratz_template_args['no_links'] ) ) {
				the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			} else {
				the_title( '<h3 class="post_title entry-title">', '</h3>' );
			}

			do_action( 'kratz_action_before_post_meta' );

			// Post meta
			$kratz_components = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );
			$kratz_post_meta  = empty( $kratz_components ) || in_array( $kratz_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: kratz_show_post_meta(
											apply_filters(
												'kratz_filter_post_meta_args', array(
													'components' => $kratz_components,
													'seo'  => false,
													'echo' => false,
												), $kratz_blog_style[0], $kratz_columns
											)
										);
			kratz_show_layout( $kratz_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
			<?php
			// Post content area
            if ( empty( $kratz_template_args['hide_excerpt'] ) && kratz_get_theme_option( 'excerpt_length' ) > 0 ) {
				kratz_show_post_content( $kratz_template_args, '<div class="post_content_inner">', '</div>' );
			}
			// Post meta
			if ( in_array( $kratz_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				kratz_show_layout( $kratz_post_meta );
			}
			// More button
			if ( empty( $kratz_template_args['no_links'] ) && ! in_array( $kratz_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				kratz_show_post_more_link( $kratz_template_args, '<p>', '</p>' );
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
