<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    global $creptaam_carousel;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $carousel_image = $has_intro_animation = $has_title_animation = $has_content_animation = $has_button_animation = $content_font_size = $intro_font_size = $intro_font_color = $title_font_size = $title_font_color = $content_font_color = $custom_lg_height = $content_padding_left = $content_padding_right = $button_bg = $btn_radius = $button_color = $btn_height = '';

    if ($tt_atts['intro-font-size']) :
        $intro_font_size = 'font-size: '.$tt_atts['intro-font-size'].';';
    endif;

    if ($tt_atts['title-intro-color']) :
        $intro_font_color = 'color: '.$tt_atts['title-intro-color'].';';
    endif;

    if ($tt_atts['title-font-size']) :
        $title_font_size = 'font-size: '.$tt_atts['title-font-size'].';';
    endif;

    if ($tt_atts['title-font-color']) :
        $title_font_color = 'color: '.$tt_atts['title-font-color'].';';
    endif;

    if ($tt_atts['content-font-size']) :
        $content_font_size = 'font-size: '.$tt_atts['content-font-size'].';';
    endif;

    if ($tt_atts['content-font-color']) :
        $content_font_color = 'color: '.$tt_atts['content-font-color'].';';
    endif;
    
    if($creptaam_carousel['custom_lg_height'] && $creptaam_carousel['slider_height'] === 'tt-custom-height'){
        $custom_lg_height = 'height:'.str_replace('px','',$creptaam_carousel['custom_lg_height']).'px;';
    }

    $tt_image_src = wp_get_attachment_image_src( $tt_atts['slider_image'], 'full' );
    
    if ($tt_image_src[0]) {
        $carousel_image = 'background-image: url('.$tt_image_src[0].');';
    }

    if ($tt_atts['content_padding_left']) :
        $content_padding_left = 'padding-left: '.$tt_atts['content_padding_left'].';';
    endif;

    if ($tt_atts['content_padding_right']) :
        $content_padding_right = 'padding-right: '.$tt_atts['content_padding_right'].';';
    endif;

    if($tt_atts['button_bg'] && $tt_atts['button_style'] === 'btn-custom'){
        $button_bg = 'background-color:'.$tt_atts['button_bg'].';';
    }

    if($tt_atts['button_color'] && $tt_atts['button_style'] === 'btn-custom'){
        $button_color = 'color:'.$tt_atts['button_color'].';';
    }

    if($tt_atts['btn_radius']){
        $btn_radius = 'border-radius:'.str_replace('px','',$tt_atts['btn_radius']).'px;';
    }

    if($tt_atts['btn_height']){
        $btn_height = 'height :'.str_replace('px','',$tt_atts['btn_height']).'px; line-height:'.str_replace('px','',$tt_atts['btn_height']).'px;';
    }


    $intro_margin_bottom = $title_margin_bottom = $content_margin_bottom = "";

    if($tt_atts['intro_margin_bottom']){
        $intro_margin_bottom = 'margin-bottom:'.str_replace('px','',$tt_atts['intro_margin_bottom']).'px; display-block;';
    }
    if($tt_atts['title_margin_bottom']){
        $title_margin_bottom = 'margin-bottom:'.str_replace('px','',$tt_atts['title_margin_bottom']).'px;';
    }
    if($tt_atts['content_margin_bottom']){
        $content_margin_bottom = 'margin-bottom:'.str_replace('px','',$tt_atts['content_margin_bottom']).'px;';
    }

    $img_custom_right = $has_custom_right_value = "";
    if($tt_atts['img_custom_right']){
        $img_custom_right = 'right:'.str_replace('px','',$tt_atts['img_custom_right']).'px;';
        $has_custom_right_value = 'has-custom-right-value';
    }


    $overlay_color_class = $overlay_color_opacity = $overlay_bg = $overlay_bg1 = $overlay_bg2 = "";

    if ($tt_atts['overlay_color'] == 'yes') {
        $overlay_color_class = 'overlay-enabled';
        $overlay_color_opacity = $tt_atts['overlay_color_opacity'];
    
        if($tt_atts['overlay_bg1']){
            $overlay_bg1 = '--tt-carousel-overlay1:'.$tt_atts['overlay_bg1'].';';
        }
    
        if($tt_atts['overlay_bg2']){
            $overlay_bg2 = '--tt-carousel-overlay2:'.$tt_atts['overlay_bg2'].';';
        } elseif ($tt_atts['overlay_bg1']) {
            $overlay_bg2 = '--tt-carousel-overlay2:'.$tt_atts['overlay_bg1'].';';
        }
    }

    // button style
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    // extra image
    $image_src = wp_get_attachment_image_src($tt_atts['extra_image'], 'full' );

    
    wp_enqueue_style('animate');
    wp_enqueue_style('owl-carousel');
    wp_enqueue_script('owl-carousel');

    ob_start();
    ?>

    <div class="item <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$overlay_color_class.' '.$overlay_color_opacity); ?>" style="<?php echo esc_attr($overlay_bg.' '.$carousel_image.' '.$custom_lg_height); ?>">
        
        <div class="tt-content-wrapper  <?php echo esc_attr($tt_atts['content_alignment'])?>" style="<?php echo esc_attr($overlay_bg1.' '.$overlay_bg2) ?>">
            <div class="container">
                <div class="tt-carousel-inner animated zoomOut <?php echo esc_attr($tt_atts['content-max-width']) ?>">
                    <?php if ($tt_atts['intro-title']) : ?>
                        <div>
                            <span class="tt-intro-sub animated <?php echo esc_attr($tt_atts['intro_title_ani_delay']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['intro_title_animation']); ?>" style="<?php echo esc_attr($intro_font_size.' '.$intro_font_color.' '.$intro_margin_bottom);?>"><?php echo esc_html($tt_atts['intro-title']);?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($tt_atts['title']) : ?>
                    <div>
                        <span class="tt-title animated <?php echo esc_attr($tt_atts['title_ani_delay']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['title_animation']); ?>" style="<?php echo esc_attr($title_font_size.' '.$title_font_color.' '.$title_margin_bottom);?>"><?php echo esc_html($tt_atts['title']);?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (wpb_js_remove_wpautop( $content )) : ?>
                        <div>
                            <div class="tt-carousel-content animated <?php echo esc_attr($tt_atts['content_ani_delay']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['content_animation']); ?>" style="<?php echo esc_attr($content_font_size.' '.$content_font_color.' '.$content_padding_left.' '.$content_padding_right.' '.$content_margin_bottom );?>">
                                <?php echo wpb_js_remove_wpautop( $content ); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($tt_atts['button_visibility'] == 'visible'): ?>
                        <div>
                            <div class="tt-carousel-btn animated <?php echo esc_attr($tt_atts['button_ani_delay']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['button_animation']); ?>">
                                <a class="btn btn-lg <?php echo esc_attr($tt_atts['button_style']); ?>" href="<?php echo esc_url($a_href) ?>" target="<?php echo esc_attr($a_target) ?>" title="<?php echo esc_attr($a_title ? $a_title : $tt_atts['title']) ?>" style="<?php echo esc_attr($button_bg .' '. $btn_radius .' '. $button_color.' '.$btn_height) ?>"><?php echo esc_html($tt_atts['button_text']); ?></a>
                            </div>
                        </div>
                    <?php endif; ?> 
                </div>
            </div>
            
            
            <?php if ($image_src[0]): ?>
                <div class="tt-extra-image animated <?php echo esc_attr($tt_atts['image-position'].' '.$tt_atts['image-visibility'].' '.$has_custom_right_value); ?>"  style="<?php echo esc_attr($img_custom_right) ?>">
                    <div class="animated zoomOut">
                        <img class="img-responsive <?php echo esc_attr($tt_atts['image_ani_delay']) ?>" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>" data-animation-in="<?php echo esc_attr($tt_atts['image_animation']); ?>">
                    </div>
                </div>
            <?php endif; ?>
            
        </div> <!-- .intro -->
    </div>
<?php echo ob_get_clean();