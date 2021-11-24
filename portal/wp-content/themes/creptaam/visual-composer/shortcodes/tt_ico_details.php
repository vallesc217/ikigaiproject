<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
    
    $ico_details = (array) vc_param_group_parse_atts( $tt_atts['ico_details'] );
    $label_width = $label_color = $content_color = $label_alignment = "";
    if($tt_atts[ 'label_width' ]){
        $label_width = "width: ".$tt_atts[ 'label_width' ];
    }
    if($tt_atts[ 'label_color' ]){
        $label_color = "color: ".$tt_atts[ 'label_color' ];
    }
    if($tt_atts[ 'content_color' ]){
        $content_color = "color: ".$tt_atts[ 'content_color' ];
    }
    if($tt_atts[ 'label_alignment' ]){
        $label_alignment = "text-align: ".$tt_atts[ 'label_alignment' ];
    }
    ob_start(); 
?>

    <div class="ico-details-panel <?php echo esc_attr($tt_atts[ 'el_class' ].' '.$css_class);?>">
        <ul>
        <?php foreach ($ico_details as $data):  ?>
            <li>
                <?php if(! empty($data['ico_title'])) : ?>
                    <span style="<?php echo esc_attr($label_width.'; '.$label_color.'; '.$label_alignment); ?>"><?php echo esc_html($data['ico_title']); ?></span>
                <?php endif; ?>

                <?php if(! empty($data['ico_content'])) : ?>
                    <p style ="<?php echo esc_attr($content_color); ?>"><?php echo esc_html($data['ico_content']); ?></p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div> <!-- .pricing-wrapper -->
<?php echo ob_get_clean();