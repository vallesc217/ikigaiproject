<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="single-service-section">
    <?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; // End of the loop. ?>
</div> <!-- .single-service-section -->

<?php get_footer(); ?>