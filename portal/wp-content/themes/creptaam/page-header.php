<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_page_template = basename( get_page_template_slug() );

$header_page_settings = '';

$header_page_visibility = creptaam_option('page-header-visibility', false, true);

if (function_exists('rwmb_meta')) :
    $header_page_settings = rwmb_meta('creptaam_page_header_visibility');
endif;

if ($header_page_settings == 'header-inherite-option' || $header_page_settings == 'header-section-show' || empty($header_page_settings)){
	if ($header_page_visibility == 'header-section-show' || $header_page_settings == 'header-section-show') {
		if ( (is_page() and $tt_page_template != 'template-home.php') || (! is_page() && ! is_404()) ) : 
	        get_template_part( 'template-parts/page-header', 'section' );
	    endif;
	}
}
