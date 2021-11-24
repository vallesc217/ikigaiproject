<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    global $tt_icon_block_attr;

    $tt_icon_block_attr =  $tt_atts;

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $grid_column = $tt_atts['grid_column'];
    $grid_column_class = "";

    if ($grid_column == 3) :
        $grid_column_class = "four-column";
    endif;

    if ($grid_column == 4) :
        $grid_column_class = "three-column";
    endif;

    if ($grid_column == 6) :
        $grid_column_class = "two-column";
    endif;

    $wrapper_class = "row icon-block-wrapper";
    ob_start();
?>
    <div class="<?php echo esc_attr($wrapper_class .' '.$tt_atts['featured_block_style'].' '.$tt_atts['box_space'].' '.$tt_atts['el_class'].' '.$css_class.' '.$grid_column_class); ?>">
        <?php echo wpb_js_remove_wpautop( $content ); ?>
    </div>
<?php $tt_icon_block_attr = array();
echo ob_get_clean();