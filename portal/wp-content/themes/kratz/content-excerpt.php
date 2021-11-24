<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

$kratz_template_args = get_query_var( 'kratz_template_args' );
if ( is_array( $kratz_template_args ) ) {
	$kratz_columns    = empty( $kratz_template_args['columns'] ) ? 1 : max( 1, $kratz_template_args['columns'] );
	$kratz_blog_style = array( $kratz_template_args['type'], $kratz_columns );
	if ( ! empty( $kratz_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $kratz_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $kratz_columns ); ?>">
		<?php
	}
}
$kratz_components = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );
$kratz_expanded    = ! kratz_sidebar_present() && kratz_is_on( kratz_get_theme_option( 'expand_content' ) );
$kratz_post_format = get_post_format();
$kratz_post_format = empty( $kratz_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kratz_post_format );

$link = empty($args['no_links'])
			? (!empty($meta['link']) ? $meta['link'] : get_permalink())
			: '';
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $kratz_post_format ) );
	kratz_add_blog_animation( $kratz_template_args );
	?>
>
<div class="post_wrapper">
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

    $vowels ='';
    $kratz_components = str_replace($vowels, "", $kratz_components);
	$kratz_hover = ! empty( $kratz_template_args['hover'] ) && ! kratz_is_inherit( $kratz_template_args['hover'] )
						? $kratz_template_args['hover']
						: kratz_get_theme_option( 'image_hover' );
	$kratz_components = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );
    // Title and post meta
	$kratz_show_title = get_the_title() != '';
	$kratz_components = kratz_array_get_keys_by_value( kratz_get_theme_option( 'meta_parts' ) );
	$kratz_show_meta  = ! empty( $kratz_components ) && ! in_array( $kratz_hover, array( 'border', 'pull', 'slide', 'fade' ) );
    if ( $kratz_show_title &&  in_array( $kratz_post_format, array( 'audio' ))) {
            ?>
            <div class="post_header entry-header">
                <?php
                // Post title
                if ( $kratz_show_title ) {
                    do_action( 'kratz_action_before_post_title' );
                    if ( empty( $kratz_template_args['no_links'] ) ) {
                        the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                    } else {
                        the_title( '<h3 class="post_title entry-title">', '</h3>' );
                    }
                }

                ?>
            </div><!-- .post_header -->
            <?php
        }
	// Featured image
	$date_val = 'date';
    $date = '';
    $pos = strpos($kratz_components, $date_val);
    if ( $pos !== false ) {

        $date .= kratz_show_post_meta(
                apply_filters(
                    'kratz_filter_post_meta_args', array(
                        'components' => 'date',
                        'seo'        => false,
                        'class'       => '',
                        'echo'        => false,
                    ), 'excerpt-date', 1
                )
            );
    }

	kratz_show_post_featured(
		array(
		    'post_info' =>   $date,
			'no_links'   => ! empty( $kratz_template_args['no_links'] ),
			'hover'      => $kratz_hover,
			'thumb_ratio'   => '790:470',
			'thumb_size' => kratz_get_thumb_size( strpos( kratz_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $kratz_expanded ? 'huge' : 'huge' ) ),
		)
	);


	if ( $kratz_show_title &&  ! in_array( $kratz_post_format, array( 'audio' ))) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			if ( $kratz_show_title ) {
				do_action( 'kratz_action_before_post_title' );
				if ( empty( $kratz_template_args['no_links'] ) ) {
					the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( '<h3 class="post_title entry-title">', '</h3>' );
				}
			}

			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	   if ( empty( $kratz_template_args['hide_excerpt'] ) && kratz_get_theme_option( 'excerpt_length' ) > 0 ) {
		?>
		<div class="post_content entry-content">
			<?php
			if ( kratz_get_theme_option( 'blog_content' ) == 'fullpost' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'kratz_action_before_full_post_content' );
					the_content( '' );
					do_action( 'kratz_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'kratz' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'kratz' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
			    if( ! in_array( $kratz_post_format, array( 'audio' ))){
			        	// Post content area
				kratz_show_post_content( $kratz_template_args, '<div class="post_content_inner">', '</div>' );
			    }

				 // Post meta
                    if ( $kratz_show_meta ) {
                        do_action( 'kratz_action_before_post_meta' );
                        kratz_show_post_meta(
                            apply_filters(
                                'kratz_filter_post_meta_args', array(
                                    'components' => $kratz_components,
                                    'seo'        => false,
                                ), 'excerpt', 1
                            )
                        );
                    }

				// More button
				if ( empty( $kratz_template_args['no_links'] ) && ! in_array( $kratz_post_format, array( 'link', 'aside', 'status', 'quote', 'audio' ) ) ) {
					kratz_show_post_more_link( $kratz_template_args, '<p>', '</p>' );
				}
			}
			?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
</div>
</article>
<?php

if ( is_array( $kratz_template_args ) ) {
	if ( ! empty( $kratz_template_args['slider'] ) || $kratz_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
