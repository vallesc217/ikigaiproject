<?php
/*
Template Name: Visual Composer Template
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="vc-page-contents">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; // End of the loop. ?>
</div>
<?php get_footer(); ?>