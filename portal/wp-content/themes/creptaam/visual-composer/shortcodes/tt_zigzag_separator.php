<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	ob_start();

	// image sources
    $separator_image_src = wp_get_attachment_image_src($tt_atts['separator_image'], 'full');
?>

<div class="zigzag-separator-wrapper <?php echo esc_attr($tt_atts['el_class']); ?>" style="background-image: url(<?php echo esc_url($separator_image_src[0]); ?>);"></div>

<?php echo ob_get_clean();