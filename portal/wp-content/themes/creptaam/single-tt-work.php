<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="single-work-section">
    <?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; // End of the loop. ?>
</div> <!-- .single-work-section -->

<?php get_footer(); ?>