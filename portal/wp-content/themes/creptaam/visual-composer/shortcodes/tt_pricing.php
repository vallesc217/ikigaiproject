<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    // table content
    $table_contents = (array) vc_param_group_parse_atts( $tt_atts['table_content'] );
    $tables = array();
    foreach ( $table_contents as $data ) :
        $table_data = $data;
        $table_data['package_name'] = isset( $data['package_name'] ) ? $data['package_name'] : '';
        $table_data['currency_symbol'] = isset( $data['currency_symbol'] ) ? $data['currency_symbol'] : '';
        $table_data['currency_code'] = isset( $data['currency_code'] ) ? $data['currency_code'] : '';
        $table_data['package_rate'] = isset( $data['package_rate'] ) ? $data['package_rate'] : '';
        $table_data['package_duration'] = isset( $data['package_duration'] ) ? $data['package_duration'] : '';
        $table_data['details'] = isset( $data['details'] ) ? $data['details'] : '';
        $table_data['purchase_button_show'] = isset( $data['purchase_button_show'] ) ? $data['purchase_button_show'] : '';
        $table_data['purchase_button_text'] = isset( $data['purchase_button_text'] ) ? $data['purchase_button_text'] : '';
        $table_data['purchase_button_link'] = isset( $data['purchase_button_link'] ) ? $data['purchase_button_link'] : '';
        $table_data['currency_symbol'] = isset( $data['currency_symbol'] ) ? $data['currency_symbol'] : '';
        $table_data['button_background_option'] = isset( $data['button_background_option'] ) ? $data['button_background_option'] : '';
        if ($table_data['button_background_option'] == 'custom-color') :
            $table_data['button_color'] = isset( $data['button_color'] ) ? $data['button_color'] : '';
        	$table_data['button_text_color'] = isset( $data['button_text_color'] ) ? $data['button_text_color'] : '';
    	endif;
        $tables[] = $table_data;
    endforeach;

    $pricing_tbl_body_color = $pricing_tbl_body_bg = "";

    if ($tt_atts['pricing_tbl_body_color']) {
        $pricing_tbl_body_color = 'color:' .$tt_atts['pricing_tbl_body_color']. ';';
    }
    if ($tt_atts['pricing_tbl_body_bg']) {
        $pricing_tbl_body_bg = 'background-color:' .$tt_atts['pricing_tbl_body_bg']. ';';
    }
    ob_start(); 
?>

    <div class="row pricing-wrapper <?php echo esc_attr($tt_atts[ 'el_class' ].' '.$css_class);?>">
        <?php foreach ($tables as $table): 
            $link     = vc_build_link($table['purchase_button_link']);
            $a_href   = $link['url'];
            $a_title  = $link['title'];
            $a_target = trim($link['target']);

            $target = "";
            $title = "";

            if ($a_target) {
                $target = 'target='.$a_target.'';
            }

            if ($a_title) {
                $title = 'title='.$a_title.'';
            } ?>

            <div class="col-sm-6 col-md-<?php echo esc_attr($tt_atts['grid_column']);?>">
                <div class="pricing-table">
                    <div class="table-contents text-center" style="<?php echo esc_attr($pricing_tbl_body_color.' '.$pricing_tbl_body_bg) ?>">
                        <?php
                            $pricing_header_bg = $pricing_header_text_color = "";

                            if (!empty($tt_atts['pricing_header_bg'])) {
                                $pricing_header_bg = 'background-color:'.$tt_atts['pricing_header_bg'].'; background-image: none;';
                            }
                            if (!empty($tt_atts['pricing_header_text_color'])) {
                                $pricing_header_text_color = 'color:' .$tt_atts['pricing_header_text_color']. ';';
                            }
                            $btn_bg_color = "";
                            $btn_bg_text_color = "";
                            if ($table['button_background_option'] == 'custom-color') {
                                $btn_bg_color = 'background-color:' .$table['button_color']. ';';
                            }
                            if ($table['button_background_option'] == 'custom-color') {
                                $btn_bg_text_color = 'color:' .$table['button_text_color']. ';';
                            }
                        ?>
                        <div class="table-header" style="<?php echo esc_attr($pricing_header_bg.' '.$pricing_header_text_color); ?>">
                            <?php if($table['package_name']) : ?>                       
                                <div class="package-name">
                                    <span><?php echo esc_html($table['package_name']);?></span>
                                </div> 
                            <?php endif; ?>

                            <div class="package-price">
                                <?php if ($table['currency_symbol']): ?>
                                    <span class="currency-symbol"><?php echo esc_html($table['currency_symbol']);?></span>
                                <?php endif ?>

                                <?php if ($table['package_rate']): ?>
                                    <span class="price"><?php echo esc_html($table['package_rate']);?></span>
                                <?php endif ?>

                                <?php if ($table['currency_code'] || $table['package_duration']): ?>
                                    <span class="currency-code">
                                        <?php echo esc_html($table['currency_code']);
                                        if ($table['package_duration']):?>
                                            /<?php echo esc_html($table['package_duration']);?>
                                        <?php endif ?>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div> <!-- /.table-header -->

                        <div class="table-info">
                            <?php if ($table['details']): ?>
                                <ul>
                                    <?php echo wp_kses( $table['details'], array(
                                        'a'      => array(
                                            'href'   => array(),
                                            'title'  => array(),
                                            'target' => array()
                                        ),
                                        'ul'    => array('class' => array()),
                                        'li'    => array('class' => array()),
                                        'del'   => array(),
                                        'span'  => array('class' => array()),
                                        'p'     => array('class' => array()),
                                        'br'    => array(),
                                        'em'    => array(),
                                        'strong'=> array()
                                    )); ?>
                                </ul>
                            <?php endif ?>                                
                        </div><!-- /.table-info -->

                        <div class="table-footer">
                            <?php if ($table['purchase_button_show'] == 'yes') { ?>
                                <div class="purchase-button">
                                    <a href="<?php echo esc_url($a_href); ?>" class="<?php echo ($table['button_background_option']); ?> btn" <?php echo esc_attr($title);?> <?php echo esc_attr($target);?> style="<?php echo esc_attr($btn_bg_color.' '.$btn_bg_text_color);?>"><?php echo esc_html($table['purchase_button_text']);?></a>
                                </div>   
                            <?php } ?>
                        </div> <!-- /.table-footer -->
                    </div> <!-- /.table-contents -->
                </div><!-- /.pricing-table -->
            </div><!-- /.col-md-4 -->
        <?php endforeach; ?>
    </div> <!-- .pricing-wrapper -->
<?php echo ob_get_clean();