<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    // Color option
    $title_color = $title_intro_color = $description_color = $description_font_size = $title_font_size = $title_line_height = $text_transform = $font_weight = "";

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].';';
    endif;

    if ($tt_atts['title_font_size']) :
        $title_font_size = 'font-size:'.$tt_atts['title_font_size'].';';
    endif;

    if ($tt_atts['title_line_height']) :
        $title_line_height = 'line-height:'.$tt_atts['title_line_height'].';';
    endif;

    if ($tt_atts['title_intro_color_option'] == 'custom-color') :
        $title_intro_color = 'color:'.$tt_atts['title_intro_color'].';';
    endif;

    if ($tt_atts['description_color_option'] == 'custom-color') :
        $description_color = 'color:'.$tt_atts['description_color'].';';
    endif;

    if ($tt_atts['description_font_size']) :
        $description_font_size = 'font-size:'.$tt_atts['description_font_size'].';';
    endif;

    if ($tt_atts['text_transform']) {
        $text_transform = 'text-transform:'.$tt_atts['text_transform'].';';
    }

    if ($tt_atts['font_weight']) {
        $font_weight = 'font-weight:'.$tt_atts['font_weight'].';';
    }

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
    ob_start();
?>

    <div class="sction-title-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '. $tt_atts['title_alignment'].' '.$css_class); ?>">
        <?php if ($tt_atts['title_intro']) : ?>
            <span class="section-intro <?php echo esc_attr($tt_atts['title_intro_color_option']);?>" style="<?php echo esc_attr($title_intro_color);?>"><?php echo esc_html($tt_atts['title_intro']); ?></span>
        <?php endif; ?>
        
        <h2 style="<?php echo esc_attr($title_color.''.$font_weight.''.$text_transform.''.$title_font_size.''.$title_line_height);?>" class="section-title <?php echo esc_attr($tt_atts['title_color_option']);?>"><?php echo esc_html($tt_atts['title'])?></h2>

        <?php if (wpb_js_remove_wpautop($content)) : ?>
            <div class="section-sub" style="<?php echo esc_attr($description_color.' '.$description_font_size);?>"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
        <?php endif; ?>
    </div> <!-- .section-intro -->

<?php echo ob_get_clean();