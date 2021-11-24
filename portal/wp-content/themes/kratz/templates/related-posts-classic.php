<?php
/**
 * The template 'Style 2' to displaying related posts
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
		    'post_info'    => ( in_array( get_post_type(), array( 'post', 'attachment' ) )
		    ? '<div class="post_meta"><a class="post_meta_item post_date" href="' . esc_url( $kratz_link ) . '">' . wp_kses_data( kratz_get_date() ) . '</a></div>': '' ),
			'thumb_size'    => apply_filters( 'kratz_filter_related_thumb_size', kratz_get_thumb_size( (int) kratz_get_theme_option( 'related_posts' ) == 1 ? 'big' : 'big' ) ),
			'hover'   => '',
			'singular'      => false,
			'show_no_image' => kratz_get_no_image() != '',
		)
	);
	?>
	<div class="post_header entry-header">
		<h5 class="post_title entry-title"><a href="<?php echo esc_url( $kratz_link ); ?>"><?php the_title(); ?></a></h5>

        <?php
        // Post content area
        if ( has_excerpt() ) {?>
            <div class="related-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), '12');?>
            </div>
<?php    }     ?>
        <?php
        $kratz_components = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );
        if ( ! empty( $kratz_components )) {
            kratz_show_post_meta(
                apply_filters(
                    'kratz_filter_post_meta_args', array(
                    'components' => 'comments,likes',
                    'seo'        => false,
                    'echo'       => true,
                 )
                )
            );
        }
        ?>
	</div>
</div>
