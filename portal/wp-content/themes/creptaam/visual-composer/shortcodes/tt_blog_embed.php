<?php 
	if ( ! defined( 'ABSPATH' ) ) :
	    exit; // Exit if accessed directly
	endif;

	$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

	$blog_column = creptaam_option('blog-column');

	
	$posts_per_page = $tt_atts['posts_per_page'];
	// link
    $link     = vc_build_link($tt_atts['blog_page_url']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

	$btn_color = $btn_bg = "";
    if($tt_atts['btn_color']){
    	$btn_color = 'color:'.$tt_atts['btn_color'].';';
    }
    if($tt_atts['btn_bg']){
    	$btn_bg = 'background-color:'.$tt_atts['btn_bg'].';';
    }

	$args = array(
		'post_type' 	=> 'post',
		'post_status'	=> 'publish',
		'posts_per_page'=> $posts_per_page
	);
	$wp_query = new WP_Query($args);
	ob_start();
?>
	<div class="blog-embed <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
		<div id="main" class="posts-content" role="main">
			<div class="row masonry-wrap">
				<?php if ( $wp_query -> have_posts() ) :
					/* Start the Loop */ 
					while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>

						<?php $creptaam_count = 1;
							$blog_layout = "";
							if($blog_column == 2){
								$blog_layout = 'col-md-6 ';
							} elseif($blog_column == 3){
								$blog_layout = 'col-md-6 ';
							} else{
								$blog_layout = 'col-md-6 ';
							}
							$post_grid = esc_attr($blog_layout) ."col-sm-12 col-xs-12 masonry-column"; 

							if (is_sticky() && $creptaam_count == 1): 
								$post_grid = "col-md-12 sticky-post";
							endif 
						?>

						<div class="<?php echo esc_attr($post_grid ); ?>">
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						</div>
						<?php $creptaam_count++;
					endwhile;

					wp_reset_postdata();
					
				else : 
					get_template_part( 'template-parts/content', 'none' ); 
				endif; ?>
			</div>
		</div><!-- .posts-content -->
		<?php if($link['url']) : ?>
			<a style="<?php echo esc_attr($btn_color.' '.$btn_bg); ?>" href="<?php echo esc_attr($link['url']); ?>" class="btn blog-btn"><?php echo esc_html($tt_atts['button_text']); ?></a>
		<?php endif; ?>
	</div> <!-- .blog-wrapper -->
<?php echo ob_get_clean();
