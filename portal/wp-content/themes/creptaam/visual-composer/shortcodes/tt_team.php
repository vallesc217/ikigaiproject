<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $image_src = wp_get_attachment_image_src($tt_atts['team_img'], 'full');

    $title_color = $desig_color = $contact_color = $contact_bg = "";
    if($tt_atts['title_color']){
        $title_color = 'color:'.$tt_atts['title_color'].';';
    }
    if($tt_atts['desig_color']){
        $desig_color = 'color:'.$tt_atts['desig_color'].';';
    }
    if($tt_atts['contact_color']){
        $contact_color = 'color:'.$tt_atts['contact_color'].';';
    }
    if($tt_atts['contact_bg']){
        $contact_bg = 'background-color:'.$tt_atts['contact_bg'].';';
    }

    ob_start();
?>

    <div class="team-item text-center <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="team-thumb">
            <img src="<?php echo esc_attr($image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
            <span class="contact-no h-font" style="<?php echo esc_attr($contact_color.' '.$contact_bg); ?>"><?php echo esc_html($tt_atts['contact_no']); ?></span>
        </div>
        <div class="team-info">
            <h3 style="<?php echo esc_attr($title_color); ?>"><?php echo esc_html($tt_atts['team_name']); ?></h3>
            <span class="h-font" style="<?php echo esc_attr($desig_color); ?>"><?php echo esc_html($tt_atts['team_desig']); ?></span>
        </div>
    </div>

<?php echo ob_get_clean();