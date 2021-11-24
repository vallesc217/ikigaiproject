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
    ob_start();
?>

    <div class="tt-testimonial-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="testimonial-des" style="<?php echo esc_attr($client_quote_text_color); ?>">
            <?php echo wpb_js_remove_wpautop($content, true); ?>
        </div>

        <div class="testimonial-meta">
            <div class="testimonial-header-entry">
                <?php if ($tt_atts['client_name']) : ?>
                    <h3 style="<?php echo esc_attr($client_name_color); ?>">
                        <?php echo esc_html($tt_atts['client_name'])?>
                    </h3>
                <?php endif; ?>
                
                <?php if ($tt_atts['client_org']) : ?>
                    <span style="<?php echo esc_attr($client_org_color); ?>">
                        <?php echo esc_html($tt_atts['client_org'])?>
                    </span>
                <?php endif; ?>
            </div>
        </div> <!-- .testimonial-meta -->
    </div> <!-- .testimonial-carousel-wrapper -->
<?php echo ob_get_clean();