<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

$page_sidebar = creptaam_option('page-sidebar', false, 'right-sidebar');
$grid_column = 'col-md-12';

if ($page_sidebar == 'right-sidebar') :
	$grid_column = (is_active_sidebar('creptaam-page-sidebar')) ? 'col-md-8' : $grid_column;
elseif ($page_sidebar == 'left-sidebar') :
	$grid_column = (is_active_sidebar('creptaam-page-sidebar')) ? 'col-md-8 col-md-push-4' : $grid_column;
endif;
?>
<div class="page-wrapper content-wrapper">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($grid_column); ?>">
				<div id="main" class="posts-content" role="main">
					
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif; ?>

					<?php endwhile; // End of the loop. ?>

				</div> <!-- .posts-content -->
			</div> <!-- .col-## -->

			<!-- Page sidebar -->
			<?php get_sidebar('page'); ?>

		</div> <!-- .row -->	
	</div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>