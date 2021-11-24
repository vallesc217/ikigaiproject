<?php
/*
Template Name: Service Template
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();	

$dept_title = creptaam_option('dept-title');
$dept_per_page = creptaam_option('dept-per-page');
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;		
$args = array(
	'post_type' => 'tt-service',
	'posts_per_page' => $dept_per_page ? $dept_per_page : 9,
	'paged' => $paged
);
$wp_query = new WP_Query($args); 
?>

<div class="service-section">
	<div class="container">
		<?php 
			if ($dept_title) {?>
				<div class="row">
					<div class="col-md-12 text-center mb-40">
						<h2><?php echo esc_html($dept_title); ?></h2>
					</div>
				</div>
			<?php }
		?>
		<div class="row masonry-wrap">
			<?php
				if ( $wp_query -> have_posts() ) :
					/* Start the Loop */ 
					while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
						<!-- depart start -->
						<div class="col-md-4 col-sm-6 col-xs-12 masonry-column">
						    <div class="service-wrapper mb-30" itemscope itemtype="http://schema.org/Article">
						    	<?php if(has_post_thumbnail()) : ?>
							        <div class="service-media">
							        	<?php the_post_thumbnail('creptaam-service-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
							        </div>
							    <?php endif;?>
						        <div class="service-body">
						            <?php the_title( sprintf( '<h3 class="service-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						            <div class="service-content">
										<p><?php echo wp_trim_words(get_the_content(), 15, ''); ?></p>
						                <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html__('read more', 'creptaam') ?></a>
						            </div>
						        </div>
						    </div>
						</div><!-- /.depart -->
					<?php wp_reset_postdata();
					endwhile;
				endif; 
			?>
		</div>

		<div class="row text-center">
			<?php echo creptaam_posts_pagination(); ?>
		</div>
	</div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>