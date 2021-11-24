<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    global $tt_time_line_array;
    $tt_time_line_array =  $tt_atts;
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
    ob_start(); 
?>
    <div class="tt-time-lines <?php echo esc_attr($tt_atts['el_class'] .' '.$css_class); ?>"> 
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="time-lines-wrapper" data-initial-slide="<?php echo esc_attr($tt_atts['initial_slide']); ?>">
            <div class="swiper-wrapper">
              <?php echo wpb_js_remove_wpautop($content, true); ?>
            </div>
          </div>
    </div><!-- .tt-img-wrapper -->
<?php $tt_time_line_array = array();
echo ob_get_clean();