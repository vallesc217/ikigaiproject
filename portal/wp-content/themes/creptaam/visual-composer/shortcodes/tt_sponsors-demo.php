<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();
?>

    <div class="creptaam-partner-wrapper <?php echo esc_attr($tt_atts['el_class'].' '. $tt_custom_css );?>">
        <div class="row">
            <?php $tt_custom_links = '';
            if($tt_atts['on_click_action'] == 'custom_link') :
                $tt_custom_links = explode(',',$tt_atts['links']);
            endif;
            $images = explode( ',', $tt_atts['images'] );
            $i = -1;
            foreach ( $images as $attach_id ) :
                $i++;
                $tt_img_src = wp_get_attachment_image_src($attach_id, 'full'); ?>
                <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6">
                    <div class="partner-logo">
                        <?php if($tt_atts['on_click_action'] == 'custom_link' and isset($tt_custom_links[$i])) : ?>
                            <a href="<?php echo esc_url($tt_custom_links[$i]);?>" target="_blank"><img class="img-responsive" src="<?php echo esc_url($tt_img_src[0]); ?>" alt></a>
                        <?php else : ?>
                            <img class="img-responsive" src="<?php echo esc_url($tt_img_src[0]); ?>" alt>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php echo ob_get_clean();