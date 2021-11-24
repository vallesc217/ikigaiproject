<?php
// Add plugin-specific vars to the custom CSS
if ( ! function_exists( 'kratz_elm_add_theme_vars' ) ) {
	add_filter( 'kratz_filter_add_theme_vars', 'kratz_elm_add_theme_vars', 10, 2 );
	function kratz_elm_add_theme_vars( $rez, $vars ) {
		foreach ( array( 10, 20, 30, 40, 60 ) as $m ) {
			if ( substr( $vars['page'], 0, 2 ) != '{{' ) {
				$rez[ "page{$m}" ]    = ( $vars['page'] + $m ) . 'px';
				$rez[ "content{$m}" ] = ( $vars['page'] - $vars['gap'] - $vars['sidebar'] + $m ) . 'px';
			} else {
				$rez[ "page{$m}" ]    = "{{ data.page{$m} }}";
				$rez[ "content{$m}" ] = "{{ data.content{$m} }}";
			}
		}
		return $rez;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'kratz_elm_get_css' ) ) {
	add_filter( 'kratz_filter_get_css', 'kratz_elm_get_css', 10, 2 );
	function kratz_elm_get_css( $css, $args ) {

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			extract( $args['vars'] );
			$css['vars'] .= <<<CSS
/* Narrow: 5px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow {
	width: $page10; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow {
	width: $content10; 
}

/* Default: 10px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default {
	width: $page20;
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default {
	width: $content20;
}

/* Extended: 15px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended {
	width: $page30; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended {
	width: $content30; 
}

/* Wide: 20px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide {
	width: $page40; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide {
	width: $content40; 
}

/* Wider: 30px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider {
	width: $page60; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider {
	width: $content60; 
}

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Shape above and below rows */
.elementor-shape .elementor-shape-fill {
	fill: {$colors['bg_color']};
}

/* Divider */
.elementor-divider-separator {
	border-color: {$colors['bd_color']};
}

/*List*/
.sc_price_item_details ul > li:before{
    background-color: {$colors['alter_link']};
}

body .elementor-arrows-position-outside .elementor-swiper-button-next,
body .elementor-arrows-position-outside .elementor-swiper-button-prev,
.elementor-slick-slider .slick-next, 
.elementor-slick-slider .slick-prev{
	background-color: {$colors['extra_bg_hover_02']} !important;
}
body .elementor-arrows-position-outside .elementor-swiper-button-next .eicon-chevron-right:before,
body .elementor-arrows-position-outside .elementor-swiper-button-prev .eicon-chevron-left:before,
.elementor-slick-slider .slick-next:before, 
.elementor-slick-slider .slick-prev:before{
    color: {$colors['text_dark']};
}

body .elementor-arrows-position-outside .elementor-swiper-button-next:hover .eicon-chevron-right:before,
body .elementor-arrows-position-outside .elementor-swiper-button-prev:hover .eicon-chevron-left:before,
.elementor-slick-slider .slick-next:hover:before, 
.elementor-slick-slider .slick-prev:hover:before{
    color: {$colors['inverse_text']};
}
body .elementor-arrows-position-outside .elementor-swiper-button-next:hover,
body .elementor-arrows-position-outside .elementor-swiper-button-prev:hover,
.elementor-slick-slider .slick-next:hover, 
.elementor-slick-slider .slick-prev:hover{
    background-color: {$colors['alter_bg_color']} !important;
}

.elementor-image-gallery .gallery-item +.gallery-item:before{
    color: {$colors['extra_bg_hover_02']};
}


.elementor-widget .elementor-icon-list-icon+.elementor-icon-list-text{
    color: {$colors['text_light']};
}

.elementor-accordion .elementor-tab-title a{
    color: {$colors['alter_link2']};
}

CSS;
		}

		return $css;
	}
}

