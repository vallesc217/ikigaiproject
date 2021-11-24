<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();
?>

    <div class="creptaam-partner-wrapper text-center <?php echo esc_attr($tt_atts['el_class'].' '. $tt_custom_css );?>">
        <?php 
            $tt_custom_links =  $logo_height = $logo_border = $logo_margin = "";
            if($tt_atts['on_click_action'] == 'custom_link') :
                $tt_custom_links = explode(',',$tt_atts['links']);
            endif;
            if($tt_atts['logo_height']){
                $logo_height = 'height: '.$tt_atts['logo_height'].';';
            }
            if($tt_atts['logo_margin']){
                $logo_margin = 'margin: '.$tt_atts['logo_margin'].';';
            }
            if($tt_atts['logo_border'] == 'no'){
                $logo_border = 'border: none;';
            }
            $images = explode( ',', $tt_atts['images'] );
            $i = -1;
            foreach ( $images as $attach_id ) :
                $i++;
                $tt_img_src = wp_get_attachment_image_src($attach_id, 'full'); 

                if($tt_atts['on_click_action'] == 'custom_link' and isset($tt_custom_links[$i])) : ?>
                    <a href="<?php echo esc_url($tt_custom_links[$i]);?>" target="_blank">
                        <img style="<?php echo esc_attr($logo_height.' '.$logo_border.' '.$logo_margin); ?>" class="img-responsive" src="<?php echo esc_url($tt_img_src[0]); ?>" alt>
                    </a>
                <?php else : ?>
                    <img style="<?php echo esc_attr($logo_height.' '.$logo_border.' '.$logo_margin); ?>" class="img-responsive" src="<?php echo esc_url($tt_img_src[0]); ?>" alt>
                <?php endif; 
            endforeach; 
        ?>
    </div>
<?php echo ob_get_clean();