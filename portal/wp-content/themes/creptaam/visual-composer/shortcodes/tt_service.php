<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $args = array(
        'post_type'     => 'tt-service',
        'post_status'    => 'publish',
        'posts_per_page' => $tt_atts['post_limit'],
        'orderby'        => $tt_atts['orderby'],
        'order'          => $tt_atts['order']
    ); 
    ob_start();
?>

<div class="service-section <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <div class="row masonry-wrap">
        <?php
            $wp_query = new WP_Query( $args );
            if ( $wp_query -> have_posts() ) :
                /* Start the Loop */ 
                while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>

                    <!-- depart start -->
                    <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6 col-xs-12 masonry-column">
                        <div class="service-wrapper">
                            <?php if(has_post_thumbnail()) : ?>
                                <div class="service-media">
                                    <?php the_post_thumbnail('creptaam-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                </div>
                            <?php endif;?>

                            <div class="service-body">
                                <?php the_title( sprintf( '<h3 class="service-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

                                <?php if ($tt_atts['show_hide_content'] == 'show'): ?>
                                    <div class="service-content">
                                        <?php the_excerpt(); ?>
                                        <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html__('read more', 'creptaam') ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div><!-- /.depart -->
                <?php wp_reset_postdata();
                endwhile;
            endif; 
        ?>
    </div> <!-- .row -->
</div> <!-- .service-section -->
<?php echo ob_get_clean();