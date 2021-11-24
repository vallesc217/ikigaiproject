<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();


$blog_column = creptaam_option('blog-column');
$blog_sidebar = creptaam_option('blog-sidebar', false, 'right-sidebar');
$grid_column = 'col-md-12';

if ($blog_sidebar == 'right-sidebar') :
	$grid_column = (is_active_sidebar('creptaam-blog-sidebar')) ? 'col-md-8' : $grid_column;
elseif ($blog_sidebar == 'left-sidebar') :
	$grid_column = (is_active_sidebar('creptaam-blog-sidebar')) ? 'col-md-8 col-md-push-4' : $grid_column;
endif;
?>
<div class="blog-wrapper standard-blog">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($grid_column); ?>">
				<div id="main" class="posts-content" role="main">
					<div class="row masonry-wrap">
						<?php if ( have_posts() ) : ?>
							<?php $creptaam_count = 1; ?>
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									$blog_layout = "";
									if($blog_column == 2){
										$blog_layout = 'col-md-6 ';
									} elseif($blog_column == 3 && $blog_sidebar == 'no-sidebar'){
										$blog_layout = 'col-md-4 ';
									} else{
										$blog_layout = 'col-md-12 ';
									}
									$post_grid = esc_attr($blog_layout) ."col-sm-12 col-xs-12 masonry-column"; 
								?>

								<div class="<?php echo esc_attr($post_grid ); ?>">

								<?php
									/*
		                             * Include the Post-Format-specific template for the content.
		                             * If you want to override this in a child theme, then include a file
		                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		                             */
									get_template_part( 'template-parts/content', get_post_format() );
								?>
								</div>
								
								<?php get_template_part('template-parts/blog-overlay', 'css'); ?>

							<?php $creptaam_count++; endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>
					</div>
				</div><!-- .posts-content -->
				
				<!-- pagination / navigation-->
				<div class="text-center post-pagination">
					<?php if ( creptaam_option( 'blog-page-nav', false, true ) ) {
						echo creptaam_posts_pagination();
					} else {
						creptaam_posts_navigation();
					} ?>
				</div>

			</div> <!-- .col-## -->

			<!-- Sidebar -->
			<?php get_sidebar(); ?>

		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer(); ?>