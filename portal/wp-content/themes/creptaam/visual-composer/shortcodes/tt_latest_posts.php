<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $args = array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'orderby'       => $tt_atts['orderby'],
        'order'         => $tt_atts['order'],
        'ignore_sticky_posts' => 1,
        'posts_per_page'    => $tt_atts['post_limit'],
    ); 

    if ($tt_atts['post_source'] == 'most-recent' || $tt_atts['post_source'] == 'by-category' || $tt_atts['post_source'] == 'by-tag' || $tt_atts['post_source'] == 'by-author') :
        $post_exclude = explode(',', $tt_atts['exclude']);
        $args = wp_parse_args(
            array(
                'post__not_in'      => $post_exclude,
                'offset'            => $tt_atts['offset'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-category' && $tt_atts['taxonomies']) :
        $args = wp_parse_args(
            array(
                'cat' => $tt_atts['taxonomies'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-tag' && $tt_atts['tags']) :
        $post_tag_array = explode(',', $tt_atts['tags']);

        $args = wp_parse_args(
            array(
                'tag_slug__in' => $post_tag_array,
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-author' && $tt_atts['authors']) :
        $args = wp_parse_args(
            array(
                'author' => $tt_atts['authors'],
            )
        , $args );
    endif;

    if ($tt_atts['post_source'] == 'by-id' && $tt_atts['post_id']) :
        $post_id_array = explode(',', $tt_atts['post_id']);
        $args = wp_parse_args(
            array(
                'post__in' => $post_id_array,
            )
        , $args );
    endif; 

    $post_layout = "";
    if ($tt_atts['post_style'] == 'style-one') {
        $post_layout = 'style-one';
    }else{
        $post_layout = 'style-two';
    }
    $content_limit = $tt_atts['content_limit'];
    $title_limit = $tt_atts['title_limit'];
    ob_start();
?>

    <div class="blog-home-section <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$post_layout); ?>">
        <div class="row masonry-wrap">
            <?php $query = new WP_Query( $args ); ?>
        
            <?php if ( $query->have_posts() ) :
                $post_count = 1;
                while ( $query->have_posts() ) : $query->the_post(); 
                    $hidden_sm = "";
                    if($tt_atts['grid_column'] == 4 && $post_count == 3 && $post_count < 4){
                        $hidden_sm = 'hidden-sm';
                    } ?>

                    <div class="col-md-<?php echo esc_attr($tt_atts['grid_column'].' '.$hidden_sm); ?> col-sm-6 col-xs-12 masonry-column">
                        <div class="home-blog-wrapper">
                            <header>
                                <div class="home-blog-cat">
                                    <?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'creptaam')); ?>
                                </div>
                                <?php if($title_limit) : ?>
                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $title_limit, ''); ?></a></h3>
                                <?php else : ?>
                                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php endif; ?>
                            </header>

                            <?php if (has_post_thumbnail() && $tt_atts['post_style'] == 'style-one') : ?>
                                <div class="home-blog-thumbnail home-blog-<?php the_ID(); ?>">
                                    <?php the_post_thumbnail( 'creptaam-thumbnail', array('class' => 'img-responsive', 'alt' => creptaam_alt_text()));

                                        $embed_video = get_post_meta( get_the_ID(), 'creptaam_embed_video');
                                        $overlay_class = "";
                                        if(function_exists('rwmb_meta')){
                                            $overlay_class = rwmb_meta('creptaam_overlay_class');
                                        }
                                    ?>
                                        
                                    <div class="post-overlay <?php echo esc_attr($overlay_class); ?>">
                                        <?php if($embed_video) : ?>
                                            <a class="popup-play video-link" href="<?php echo esc_attr($embed_video[0]); ?>">
                                                <i class="fa fa-play"></i>
                                            </a>
                                         <?php else : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <i class="fa fa-th-large"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($tt_atts['show_hide_content'] == 'show') : ?>
                                <div class="home-blog-content">
                                    <div class="entry-content">
                                        <p><?php echo wp_trim_words(get_the_content(), $content_limit, '...'); ?></p>
                                    </div><!-- .entry-content -->
                                </div> <!-- .home-blog-content -->
                            <?php endif; ?>
                        </div> <!-- .home-blog-wrapper -->
                    </div> <!-- .col-# -->
            
                    <?php $post_count++;
                endwhile; 
                    wp_reset_postdata(); 
                else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'creptaam' ); ?></p>
            <?php endif; ?>
        </div> <!-- .row -->
    </div> <!-- .blog-home-section -->
<?php echo ob_get_clean();