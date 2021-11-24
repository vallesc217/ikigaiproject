<?php
/*
Template Name: Page Sidebar Left
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="page-wrapper content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-push-4 col-sm-8 col-sm-push-4">
				<div id="main" class="posts-content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php if ( creptaam_option( 'page-comment-visibility', false, comments_open() ) ) : 
							
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							
						endif; ?>

					<?php endwhile; // End of the loop. ?>

				</div> <!-- .posts-content -->
			</div> <!-- .col-# -->

			<?php $pagesidebar = 'creptaam-page-sidebar';
			if (function_exists('rwmb_meta')) :
				$pagesidebar = rwmb_meta('creptaam_page_sidebars');
			endif; ?>
			
			<div class="sidebar-sticky col-md-4 col-md-pull-8 col-sm-4 col-sm-pull-8">
				<div class="tt-sidebar-wrapper left-sidebar" role="complementary">
					<?php if (function_exists('smk_sidebar')) :
						smk_sidebar($pagesidebar);
					else :
						dynamic_sidebar( 'creptaam-page-sidebar' );
					endif; ?>
				</div>
			</div> <!-- .col-# -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>