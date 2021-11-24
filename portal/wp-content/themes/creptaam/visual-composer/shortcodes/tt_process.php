<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $process_info = (array)vc_param_group_parse_atts($tt_atts['process_info']);
    $process_info_data = array();
    foreach ($process_info as $data) :
        $tt_process_info = $data;
        $tt_process_info['process_title'] = isset($data['process_title']) ? $data['process_title'] : '';
        $tt_process_info['process_title_color'] = isset($data['process_title_color']) ? $data['process_title_color'] : '';
        $tt_process_info['process_content'] = isset($data['process_content']) ? $data['process_content'] : '';
        $process_info_data[] = $tt_process_info;
    endforeach; 
    ob_start();
?>

    <ul class="list-inline row process-in <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <?php foreach ($process_info_data as $info): ?>
            <li class="col-sm-3 col-xs-12">
                <div class="process-dot" ></div>
                <div class="process-desc">
                    <div class="process-info">
                        <p><?php echo esc_html($info['process_content']);?></p>
                    </div>
                    <div class="process-date">
                        <p style="color: <?php echo esc_attr($info['process_title_color']);?>"><?php echo esc_html($info['process_title']);?></p>
                    </div>
                </div> 
            </li>                    
        <?php endforeach ?>
    </ul>

<?php echo ob_get_clean();