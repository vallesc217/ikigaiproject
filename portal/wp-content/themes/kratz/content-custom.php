<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.50
 */

$kratz_template_args = get_query_var( 'kratz_template_args' );
if ( is_array( $kratz_template_args ) ) {
	$kratz_columns    = empty( $kratz_template_args['columns'] ) ? 2 : max( 1, $kratz_template_args['columns'] );
	$kratz_blog_style = array( $kratz_template_args['type'], $kratz_columns );
} else {
	$kratz_blog_style = explode( '_', kratz_get_theme_option( 'blog_style' ) );
	$kratz_columns    = empty( $kratz_blog_style[1] ) ? 2 : max( 1, $kratz_blog_style[1] );
}
$kratz_blog_id       = kratz_get_custom_blog_id( join( '_', $kratz_blog_style ) );
$kratz_blog_style[0] = str_replace( 'blog-custom-', '', $kratz_blog_style[0] );
$kratz_expanded      = ! kratz_sidebar_present() && kratz_is_on( kratz_get_theme_option( 'expand_content' ) );
$kratz_components    = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );

$kratz_post_format   = get_post_format();
$kratz_post_format   = empty( $kratz_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kratz_post_format );

$kratz_blog_meta     = kratz_get_custom_layout_meta( $kratz_blog_id );
$kratz_custom_style  = ! empty( $kratz_blog_meta['scripts_required'] ) ? $kratz_blog_meta['scripts_required'] : 'none';

if ( ! empty( $kratz_template_args['slider'] ) || $kratz_columns > 1 || ! kratz_is_off( $kratz_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $kratz_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( kratz_is_off( $kratz_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $kratz_custom_style ) ) . '-1_' . esc_attr( $kratz_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
			'post_item post_format_' . esc_attr( $kratz_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $kratz_columns )
					. ' post_layout_' . esc_attr( $kratz_blog_style[0] )
					. ' post_layout_' . esc_attr( $kratz_blog_style[0] ) . '_' . esc_attr( $kratz_columns )
					. ( ! kratz_is_off( $kratz_custom_style )
						? ' post_layout_' . esc_attr( $kratz_custom_style )
							. ' post_layout_' . esc_attr( $kratz_custom_style ) . '_' . esc_attr( $kratz_columns )
						: ''
						)
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
	// Custom layout
	do_action( 'kratz_action_show_layout', $kratz_blog_id, get_the_ID() );
	?>
</article><?php
if ( ! empty( $kratz_template_args['slider'] ) || $kratz_columns > 1 || ! kratz_is_off( $kratz_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
