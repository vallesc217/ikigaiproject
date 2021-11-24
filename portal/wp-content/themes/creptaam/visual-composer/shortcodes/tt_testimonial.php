<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    // color options
    $client_name_color = "";
    $client_org_color = "";
    $client_quote_bg_color = "";
    $client_quote_text_color = "";

    if ($tt_atts['client_text_color']) :
        $client_name_color = 'color: ' .$tt_atts['client_text_color']. ';';
    endif;

    if ($tt_atts['client_org_text_color']) :
        $client_org_color = 'color: ' .$tt_atts['client_org_text_color']. ';';
    endif;

    if ($tt_atts['client_quote_text_color']) :
        $client_quote_text_color = 'color: ' .$tt_atts['client_quote_text_color']. ';';
    endif;

    $testimonial_info = (array)vc_param_group_parse_atts($tt_atts['testimonial_info']);
    $testimonial_info_data = array();
    foreach ($testimonial_info as $data) :
        $tt_testimonial_info = $data;
        $tt_testimonial_info['client_name'] = isset($data['client_name']) ? $data['client_name'] : '';
        $tt_testimonial_info['client_org'] = isset($data['client_org']) ? $data['client_org'] : '';
        $tt_testimonial_info['content'] = isset($data['content']) ? $data['content'] : '';

        $testimonial_info_data[] = $tt_testimonial_info;
    endforeach; 
    ob_start();
?>

    <div class="testimonial-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($testimonial_info_data as $key => $carousel_content) : ?>
                    <div class="swiper-slide text-center">

                        <div class="testimonial-des" style="<?php echo esc_attr($client_quote_text_color); ?>">
                            <p><?php echo esc_html($carousel_content['content']); ?></p>
                        </div>
                        <div class="testimonial-meta">
                            <div class="testimonial-header-entry">
                                <?php if ($carousel_content['client_name']): ?>
                                    <h3 style="<?php echo esc_attr($client_name_color); ?>">
                                        <?php echo esc_html($carousel_content['client_name']); ?>
                                    </h3>
                                <?php endif; ?>
                                
                                <?php if ($carousel_content['client_org']): ?>
                                    <span style="<?php echo esc_attr($client_org_color); ?>"><?php echo esc_html($carousel_content['client_org']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div> <!-- .testimonial-meta -->
                    </div> <!-- .swiper-slide -->
                <?php endforeach; ?>
            </div> <!-- /.swiper-wrapper -->

            <!-- Add Arrows -->
            <div class="swiper-button-next transition">
                <i class="fa fa-long-arrow-right"></i>
            </div>
            <div class="swiper-button-prev transition">
                <i class="fa fa-long-arrow-left"></i>
            </div>
        </div> <!-- .swiper-container -->
    </div> <!-- .testimonial-carousel-wrapper -->
<?php echo ob_get_clean();