<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    global $tt_time_line_array;
    $year_color = $month_color = "";
    if($tt_time_line_array['year_color']) {
        $year_color = "color: ".$tt_time_line_array['year_color'];
    }
    if($tt_time_line_array['month_color']) {
        $month_color = "color: ".$tt_time_line_array['month_color'];
    }
    ob_start();
?>
    <div class="swiper-slide <?php echo esc_attr($tt_atts['el_class'].' '.$tt_atts['active_item'] ? $tt_atts['active_item'] : '');?>">
            <?php if($tt_atts['year']) : ?>
                <h3 style="<?php echo esc_attr($year_color); ?>"><?php echo esc_html($tt_atts['year']);?></h3>
            <?php endif; ?>
          <h4 style="<?php echo esc_attr($month_color); ?>"><?php echo esc_html($tt_atts['month']);?></h4>
          <?php echo wpb_js_remove_wpautop($content, true); ?>
      </div>
<?php echo ob_get_clean();