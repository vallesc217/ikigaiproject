<?php
/**
 * The "News Excerpt" template to show post's content
 *
 * Used in the widget Recent News.
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.0
 */
 
$widget_args = get_query_var('trx_addons_args_recent_news');
$style = $widget_args['style'];
$number = $widget_args['number'];
$count = $widget_args['count'];
$post_format = get_post_format();
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$animation = apply_filters('trx_addons_blog_animation', '');

?><article 
	<?php post_class( 'post_item post_layout_'.esc_attr($style)
					.' post_format_'.esc_attr($post_format)
					); ?>
	<?php echo (!empty($animation) ? ' data-animation="'.esc_attr($animation).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}
	
	trx_addons_get_template_part('templates/tpl.featured.php',
								'trx_addons_args_featured',
								apply_filters('trx_addons_filter_args_featured', array(
										'thumb_size' => kratz_get_thumb_size('tiny'),
                                        'hover' => ''
										), 'recent_news-excerpt')
								);
	?>

	<div class="post_body">

		<?php
		if ( !in_array($post_format, array('link', 'aside', 'status', 'quote')) ) {
			?>
			<div class="post_header entry-header">
				<?php
				
				the_title( '<h4 class="post_title entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h4>' );

				?>
			</div><!-- .entry-header -->
			<?php
		}
		?>


	</div><!-- .post_body -->

</article>