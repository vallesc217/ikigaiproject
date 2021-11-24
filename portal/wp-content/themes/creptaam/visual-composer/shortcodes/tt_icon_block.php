<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    
    global $tt_icon_block_attr;

    ob_start();

    $icon_font = $icon = $icon_color = $title_color = $block_height = $title_size = $title_margin = $icon_size = $block_bg_class =  $blog_bg_custom = "";

    // icon
    if ($tt_atts['icon_font'] == 'fontawesome-icon') :
        $icon_font = "fontawesome-icon";
        $icon = $tt_atts['fontawesome_icon'];
    elseif ($tt_atts['icon_font'] == 'material-icon') :
        $icon_font = "material-icon";
        $icon = $tt_atts['material_icon'];
    elseif ($tt_atts['icon_font'] == 'flat-icon') :
        $icon_font = "flat-icon";
        $icon = $tt_atts['flat_icon'];
    endif;

    // color
    if ($tt_atts['icon_color_option'] == 'custom-color') :
        $icon_color = 'color:'.$tt_atts['icon_color'].';';
    endif;

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].';';
    endif;

    $colors = array(
        'blue' => '#5472d2',
        'turquoise' => '#00c1cf',
        'pink' => '#fe6c61',
        'violet' => '#8d6dc4',
        'peacoc' => '#4cadc9',
        'chino' => '#cec2ab',
        'mulled-wine' => '#50485b',
        'vista-blue' => '#75d69c',
        'orange' => '#f7be68',
        'sky' => '#5aa1e3',
        'green' => '#6dab3c',
        'juicy-pink' => '#f4524d',
        'sandy-brown' => '#f79468',
        'purple' => '#b97ebb',
        'black' => '#2a2a2a',
        'grey' => '#ebebeb',
        'white' => '#ffffff',
    );

    $gradient_1 = $tt_atts['gradient_color_1'];
    $gradient_2 = $tt_atts['gradient_color_2'];

    $gradient_custom_color_1 = $tt_atts['gradient_custom_color_1'];
    $gradient_custom_color_2 = $tt_atts['gradient_custom_color_2'];

    // block height
    if ($tt_icon_block_attr['block_height']) {
        $block_height = 'min-height:'.$tt_icon_block_attr['block_height'].';';
    }

    if ($tt_icon_block_attr['featured_block_style'] ==  'default-block') {
        $block_bg_class = $tt_atts['box_bg_color_options'];
        if($tt_atts['box_bg_color_options'] == 'custom-color' && $tt_atts['box_bg_color']){
            $blog_bg_custom = "background-color:". $tt_atts['box_bg_color'].';';
        }
        
    }

    // link
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $inner_wrapper = 'col-xs-12 col-sm-6 col-md-'.$tt_icon_block_attr['grid_column'];

    if ($tt_icon_block_attr['featured_block_style'] == 'animated-carousel') {
        $inner_wrapper = 'featured-item';
    }

    if ($tt_icon_block_attr['grid_column'] == '12') {
        $inner_wrapper = 'col-sm-12 col-xs-12 col-md-'.$tt_icon_block_attr['grid_column'];
    }

    if ($tt_atts['icon_size']) {
        $icon_size = 'font-size:'.$tt_atts['icon_size'].';';
    }

    if ($tt_atts['title_size']) {
        $title_size = 'font-size:'.$tt_atts['title_size'].';';
    }

    if ($tt_atts['title_margin']) {
        $title_margin = 'margin-bottom:'.$tt_atts['title_margin'].';';
    }

    $image_src = wp_get_attachment_image_src($tt_atts['icon_image'], 'full');

    wp_enqueue_style( 'vc_material' );

    $uid = uniqid();

    if ($tt_atts['icon_color_option'] == 'gradient' || $tt_atts['icon_color_option'] == 'gradient-custom') :
        
        $gradient_color_1 = 'rgba('.creptaam_hex2rgb($colors[ $gradient_1 ]).', '.$tt_atts['gradient_opacity_1'].')';
        $gradient_color_2 = 'rgba('.creptaam_hex2rgb($colors[ $gradient_2 ]).', '.$tt_atts['gradient_opacity_2'].')';

        if ( 'gradient-custom' === $tt_atts['icon_color_option'] ) {
            $gradient_color_1 = $gradient_custom_color_1;
            $gradient_color_2 = $gradient_custom_color_2;
        }

        $gradient_css = array();
        $gradient_css[] = 'background: ' . $gradient_color_1;

        $gradient_css[] = 'background: -moz-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ')';
        $gradient_css[] = 'background: -webkit-gradient(left top, left bottom, color-stop(30%, ' . $gradient_color_1 . '), color-stop(100%, ' . $gradient_color_2 . '))';
        $gradient_css[] = 'background: -webkit-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . '100%)';
        $gradient_css[] = 'background: -o-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
        $gradient_css[] = 'background: -ms-linear-gradient(top, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
        $gradient_css[] = 'background: linear-gradient(to bottom, ' . $gradient_color_1 . ' 30%, ' . $gradient_color_2 . ' 100%)';
        $gradient_css[] = 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' . $gradient_color_1 . ', endColorstr=' . $gradient_color_2 . ', GradientType=0 )';
        echo '<style type="text/css">.tt-icon-color-' . $uid . '{' . implode( ';', $gradient_css ) . ';' . '}</style>';
    endif; 
    ?>

    <div class="icon-block-grid <?php echo esc_attr($inner_wrapper.' '.$tt_atts['el_class'].' '.$css_class); ?>" style="<?php echo esc_attr($block_height); ?>">
        <div class="icon-block <?php echo esc_attr($tt_atts['icon_style'].' '.$tt_atts['icon_position'].' '.$block_bg_class); ?>" style="<?php echo esc_attr($blog_bg_custom) ?>">
            <?php if ($tt_atts['icon_type'] != 'disable') : ?>
                <div class="tt-icon <?php echo esc_attr($icon_font);?>">
                    <?php if($tt_atts['icon_type'] == 'icon') : ?>
                        <?php if ($tt_atts['custom_link'] == 'yes') : ?>
                            <a href="<?php echo esc_attr($a_href)?>"><i class="tt-icon-color-<?php echo esc_attr($uid.' '.$icon.' '.$tt_atts['icon_color_option']); ?>" style="<?php echo esc_attr($icon_color.' '.$icon_size)?>"></i></a>
                        <?php else : ?>
                            <i class="tt-icon-color-<?php echo esc_attr($uid.' '.$icon.' '.$tt_atts['icon_color_option']); ?>" style="<?php echo esc_attr($icon_color.' '.$icon_size)?>"></i>
                        <?php endif; ?>
                    <?php elseif($tt_atts['icon_type'] == 'image') : ?>
                        <?php if ($tt_atts['custom_link'] == 'yes') : ?>
                            <a href="<?php echo esc_attr($a_href)?>">
                                <img src="<?php echo esc_attr($image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                            </a>
                        <?php else : ?>
                            <img src="<?php echo esc_attr($image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                        <?php endif; ?>
                        
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="tt-content">
                <h3 class="<?php echo esc_attr($tt_atts['title_color_option']); ?>" style="<?php echo esc_attr($title_color.' '.$title_size.' '.$title_margin)?>">
                    <?php if ($tt_atts['custom_link'] == 'yes') : ?>
                        <a class="<?php echo esc_attr($tt_atts['title_color_option']); ?>" href="<?php echo esc_attr($a_href)?>" style="<?php echo esc_attr($title_color)?>"><?php echo esc_html($tt_atts['title'])?></a>
                    <?php else : ?>
                        <?php echo esc_html($tt_atts['title'])?>
                    <?php endif; ?>
                </h3>
                <?php echo wpb_js_remove_wpautop($content, true);?>
                <?php if($tt_atts['btn_text']) : ?>
                    <a href="<?php echo esc_attr($a_href)?>" class="btn <?php echo esc_attr($tt_atts['btn_style']); ?>"><?php echo esc_html($tt_atts['btn_text']); ?></a>
                <?php endif; ?>
            </div>
        </div> <!-- .icon-block -->
    </div> <!-- .icon-block-grid -->
<?php echo ob_get_clean();