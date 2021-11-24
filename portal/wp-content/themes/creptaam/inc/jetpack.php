<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Add theme support for Infinite Scroll.
// See: https://jetpack.me/support/infinite-scroll/
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'tt_jetpack_setup' ) ) :
	function tt_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'tt_infinite_scroll_render',
			'footer'    => 'page',
		) );
	} // end function tt_jetpack_setup
	add_action( 'after_setup_theme', 'tt_jetpack_setup' );
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom render function for Infinite Scroll.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if ( ! function_exists( 'tt_infinite_scroll_render' ) ) :
	function tt_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	} // end function tt_infinite_scroll_render
endif;