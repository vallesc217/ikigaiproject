<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
	ob_start();
?>
    <div class="subscribe-form form-inline <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$tt_atts['styles']); ?>">
        <?php if (shortcode_exists('mc4wp_form')) :
        	echo do_shortcode('[mc4wp_form]');
        endif; ?>
    </div>
<?php echo ob_get_clean();