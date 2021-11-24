<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 

$header_background = '';

$margin_bottom = $padding_top = $padding_bottom = $overlay_color = $page_overlay = "";
if (! empty(creptaam_page_header_background())) {
    $header_background  = 'background-image: url('.esc_url(creptaam_page_header_background()).');';
    $header_background .= 'background-repeat: no-repeat;';
    $header_background .= 'background-size: cover;';
    $header_background .= 'background-position: center center;';
}

if (function_exists('rwmb_meta')) : 
    if (rwmb_meta('creptaam_page_header_margin_bottom')) :
        $margin_bottom = 'margin-bottom: '.rwmb_meta('creptaam_page_header_margin_bottom').';';
    endif;

    if (rwmb_meta('creptaam_header_padding_top')) :
        $padding_top = 'padding-top: '.rwmb_meta('creptaam_header_padding_top').';';
    endif;

    if (rwmb_meta('creptaam_header_padding_bottom')) :
        $padding_bottom = 'padding-bottom: '.rwmb_meta('creptaam_header_padding_bottom').';';
    endif;

    $breadcrumb = rwmb_meta('creptaam_page_breadcrumb_show');

    $page_overlay = rwmb_meta('creptaam_background_overlay');
endif;

// overlay option
$overlay_options = creptaam_option('page-header-overlay-option', false, 'none');

if ($page_overlay == 'inherit-theme-option' || empty($page_overlay)) :
    $overlay_color = $overlay_options;
else :
    $overlay_color = $page_overlay;
endif;
?>

<!--page title start-->
<section class="page-title" style="<?php echo esc_attr($header_background.' '.$margin_bottom.' '.$padding_top.' '.$padding_bottom); ?> "  role="banner">
    
    <?php if ($overlay_color != 'none'): ?>
        <div class="title-overlay-color <?php echo esc_attr($overlay_color); ?>"></div>
    <?php endif; ?>
    
    <div class="container">
        <?php if(is_single() || ! is_single() || is_singular('tt-service')) : ?>
            <h2><?php echo esc_html( creptaam_page_header_section_title() ); ?></h2>
		<?php endif; ?>

        <?php if (function_exists('rwmb_meta') and rwmb_meta('creptaam_page_subtitle')) : ?>
            <span><?php echo esc_html(rwmb_meta('creptaam_page_subtitle'));?></span>
        <?php endif; ?>

        <?php if (creptaam_option('blog-subtitle') and !is_page()) : ?>
			<span><?php echo esc_html(creptaam_option('blog-subtitle'));?></span>
		<?php endif; ?>

		<?php if (creptaam_option('tt-breadcrumb')) :
            if(function_exists('rwmb_meta') and empty($breadcrumb) || $breadcrumb == 'page_breadcrumb_show') : ?>
                <div class="tt-breadcrumb">
                    <?php creptaam_breadcrumbs(); ?>
                </div>
            <?php endif;
        endif; ?>
    </div><!-- .container -->
</section> <!-- page-title -->