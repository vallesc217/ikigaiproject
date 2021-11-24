<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
    $icon_color = $icon_bg = $border_width = $border_color = $border_radius = "";
    if($tt_atts['icon_color']){
        $icon_color = 'color: '.$tt_atts['icon_color']. ';';
    }
    if($tt_atts['icon_bg']){
        $icon_bg = 'background-color: '.$tt_atts['icon_bg']. ';';
    }
    if($tt_atts['border_width']){
        $border_width = 'border-width: '.$tt_atts['border_width']. '; border-style: solid;';
    }
    if($tt_atts['border_color']){
        $border_color = 'border-color: '.$tt_atts['border_color']. ';';
    }
    if($tt_atts['border_radius']){
        $border_radius = 'border-radius: '.$tt_atts['border_radius']. ';';
    }
    // image sources
    $image_src = wp_get_attachment_image_src($tt_atts['video_bg'], 'full'); 
    ob_start();
?>
    <div class="popup-wrapper tt-video-embed <?php echo esc_attr($tt_atts['el_class'] .' '.$css_class); ?>">
        <?php if($image_src[0]) : ?>
            <img style="<?php echo esc_attr($border_width.' '.$border_color.' '.$border_radius) ?>" class="img-responsive" src="<?php echo esc_url($image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
        <?php endif;?>
        <a class="popup-vimeo popup-play" href="<?php echo esc_url($tt_atts['tt_video_url']); ?>" style="<?php echo esc_attr($icon_color.' '.$icon_bg) ?>"><i class="fa fa-play"></i></a>
    </div>

<?php echo ob_get_clean();