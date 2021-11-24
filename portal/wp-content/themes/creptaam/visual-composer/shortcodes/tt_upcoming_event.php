<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();
?>

    <div class="event-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    	<div class="row masonry-wrap">
            <?php 
            $args = array(
                'post_type'     => 'tribe_events',
                'posts_per_page'=> $tt_atts['event_limit'],
                'post_status'   => 'publish'
            );

            $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : ?>

                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6 col-xs-12 masonry-column">
                        
                        <div class="upcoming-campaign">
                            <div class="event-info">
                                <?php if (function_exists('tribe_get_venue')): ?>
                                    <span class="event-vanue"><i class="fa fa-map-marker"></i> <?php echo tribe_get_venue() ?></span>
                                <?php endif; ?>
                                
                                <h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                
                                <div class="event-meta">
                                    <ul class="list-inline">
                                        <?php if (function_exists('tribe_events_event_schedule_details')): ?>
                                            <?php echo tribe_events_event_schedule_details( get_the_ID(), '<li><i class="fa fa-clock-o"></i> ', '</li>' ); ?>
                                        <?php endif; ?>
                                        
                                        <?php if ( function_exists('tribe_get_cost') && tribe_get_cost() ) : ?>
                                            <li class="tribe-events-cost"><i class="fa fa-money"></i> <?php echo tribe_get_cost( null, true ) ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div><!-- .event-info -->

                            <?php the_post_thumbnail('creptaam-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive'));?>

                        </div> <!-- .upcoming-campaign -->

                    </div> <!-- .col -->
                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e('Event not found !', 'creptaam'); ?></p>
            <?php endif; ?>

        </div> <!-- .row -->
    </div> <!-- .event-wrapper -->

<?php echo ob_get_clean();