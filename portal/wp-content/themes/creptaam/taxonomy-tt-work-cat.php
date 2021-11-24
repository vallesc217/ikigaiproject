<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

    get_header(); 

    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = array(
        'post_type'      => 'tt-work',
        'posts_per_page' => 12,
        'tt-work-cat'   => $term->slug,
        'post_status'    => 'publish', 
        'paged' => $paged,
    );
    $wp_query = new WP_Query($args);
?>
    
    <div class="container section-padding">
            <div class="tt-grid row">
            <?php if ( $wp_query->have_posts() ) : ?>

                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                    $tt_image_attr = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full' ); ?>

                    <div class="tt-item work-item col-md-4">
                        <div class="work-wrapper">
                            <div class="tt-overlay-theme-color"></div>
                            <?php echo get_the_post_thumbnail( get_the_ID(), 'creptaam-work-thumbnail', array( 'class' => 'img-responsive', 'alt' => get_the_title()));
                            ?>
                                <div class="work-info">
                                    <h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="project-meta"> 
                                          <?php creptaam_work_cat(); ?>
                                    </div>
                                </div>
                                
                                <ul class="work-external-link">
                                    <li><a class="tt-lightbox" href="<?php echo esc_url($tt_image_attr[0]); ?>"><i class="fa fa-search"></i></a></li>
                                    <li><a href="<?php the_permalink(); ?>"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                        </div> <!-- .work -->
                    </div> <!-- .tt-item -->

                <?php endwhile; ?>
                <!-- end of the loop -->
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, work not found !', 'creptaam' ); ?></p>
            <?php endif; ?>            
        </div> <!-- .tt-grid -->
        <div class="text-center post-pagination">
            <?php echo creptaam_posts_pagination(); ?>
        </div>
       
    </div> <!-- .work-container -->
<?php get_footer(); ?>