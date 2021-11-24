<?php
/**
 * The default template to displaying related posts
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.54
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
		)
	);
	?>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $kratz_link ); ?>"><?php the_title(); ?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<span class="post_date"><a href="<?php echo esc_url( $kratz_link ); ?>"><?php echo wp_kses_data( kratz_get_date() ); ?></a></span>
			<?php
		}
		?>
	</div>
</div>
