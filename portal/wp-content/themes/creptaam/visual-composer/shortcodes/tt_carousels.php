<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

global $creptaam_carousel;

$creptaam_carousel =  $tt_atts;

$btn_radius = $nav_bg = $nav_color = $nav_font_size = "";

if($tt_atts['btn_border_radius'] && $tt_atts['navigation'] === 'nav-visible'){
    $btn_radius = "--tt-carousel-btn-radius:".str_replace('px','',$tt_atts['btn_border_radius']).'px;';
}
if($tt_atts['nav_bg'] && $tt_atts['navigation'] === 'nav-visible'){
    $nav_bg = "--tt-carousel-nav-bg:".$tt_atts['nav_bg'].';';
}
if($tt_atts['nav_color'] && $tt_atts['navigation'] === 'nav-visible'){
    $nav_color = "--tt-carousel-nav-color:".$tt_atts['nav_color'].';';
}
if($tt_atts['nav_font_size'] && $tt_atts['navigation'] === 'nav-visible'){
    $nav_font_size = "--tt-nav-size:".str_replace('px', '', $tt_atts['nav_font_size']).'px;';
}

wp_enqueue_style('animate');
wp_enqueue_style('owl-carousel');
wp_enqueue_script('owl-carousel');

$uid = uniqid();
ob_start();

?>
<div class="tt-carousel-wrapper">
    <div 
        class="tt-carousel owl-carousel  <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['slider_height']);?>"
        data-ride="carousel" 
        data-interval="5000" 
        <?php if($tt_atts['slider_height'] === 'tt-custom-height') : ?>
            data-lg-height="<?php echo esc_attr(str_replace('px','',$tt_atts['custom_lg_height'])); ?>" 
            data-md-height="<?php echo esc_attr(str_replace('px','',$tt_atts['custom_md_height'])); ?>" 
            data-sm-height="<?php echo esc_attr(str_replace('px','',$tt_atts['custom_sm_height'])); ?>" 
            data-xs-height="<?php echo esc_attr(str_replace('px','',$tt_atts['custom_xs_height'])); ?>" 
            data-xxs-height="<?php echo esc_attr(str_replace('px','',$tt_atts['custom_xxs_height'])); ?>" 
        <?php endif; ?>
        data-navigation="<?php echo esc_attr($tt_atts['navigation']); ?>" 
        data-dots="<?php echo esc_attr($tt_atts['dots']); ?>" 
        data-slider-loop="<?php echo esc_attr($tt_atts['slider_loop']); ?>" 
        data-slider-autoplay="<?php echo esc_attr($tt_atts['auto_paly']); ?>" 
        data-slider-mousedrag="<?php echo esc_attr($tt_atts['mouse_drag']); ?>" 
        style="<?php echo esc_attr($btn_radius.' '.$nav_color.' '.$nav_bg.' '.$nav_font_size) ?>
    ">
        
        <?php echo wpb_js_remove_wpautop( $content ); ?>
        
    </div>
</div>

<?php 
$creptaam_carousel = array();
echo ob_get_clean();