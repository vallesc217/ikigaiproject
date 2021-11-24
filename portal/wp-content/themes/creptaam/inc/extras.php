<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Adds custom classes to the array of body classes.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_body_classes' ) ) :

	function creptaam_body_classes( $classes ) {
		
		// header style classes
		$page_header = '';
		if (function_exists('rwmb_meta')) :
			$page_header = rwmb_meta('creptaam_header_style');
		endif;

		if ($page_header == 'header-default' ) :
			$classes[] = 'header-default';
        elseif ($page_header == 'header-transparent') :
			$classes[] = 'header-transparent';
        elseif ($page_header == 'no-header') :
        	$classes[] = 'no-header';
		else :
			$classes[] = creptaam_option('header-style', false, 'header-default');
		endif;
		
		if (function_exists('rwmb_meta')) :
			$header_page_topbar = rwmb_meta('creptaam_header_topbar');
			$header_option = creptaam_option('header-top-visibility', false, false);

			if ($header_page_topbar == 'header-topbar-show' || $header_page_topbar == 'inherit-theme-option' && $header_option == true) :
				$classes[] = 'has-header-topbar';
			endif;
		endif;

		// blog page header search
		if (!is_page() && creptaam_option('blog-page-search') == true && creptaam_is_woocommerce() == false) {
			$classes[] = 'has-header-blog-search';
		}

		if (creptaam_option('blog-page-search') && creptaam_is_woocommerce() == true) :
            $classes[] = 'has-header-blog-search';
        endif;

        // has marquee price
        if (creptaam_option('marquee-visibility') && creptaam_option('marquee-position') == 'marquee-bottom') :
        	$classes[] = 'has-marquee-footer';
        endif;

		// footer style classes
		$page_footer = '';
		if (function_exists('rwmb_meta')) :
			$page_footer = rwmb_meta('creptaam_footer_style');
		endif;

		if ($page_footer == 'footer-default') :
			$classes[] = 'footer-default';
		elseif ($page_footer == 'footer-three-column') :
			$classes[] = 'footer-three-column';
		elseif ($page_footer == 'footer-single-column') :
			$classes[] = 'footer-single-column';
		else :
			$classes[] = creptaam_option('footer-style', false, 'footer-default');
		endif;
		
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) :
			$classes[ ] = 'group-blog';
		endif;

		// logo class
		if (creptaam_option('logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('creptaam_page_logo', 'type=image_advanced')) {
			$classes[] = 'has-site-logo';
		}
		if (creptaam_option('mobile-logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('creptaam_page_mobile_logo', 'type=image_advanced')) {
			$classes[] = 'has-mobile-logo';
		}
		if (creptaam_option('sticky-logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('creptaam_page_sticky_logo', 'type=image_advanced')) {
			$classes[] = 'has-sticky-logo';
		}
		if (creptaam_option('sticky-mobile-logo', 'url') || function_exists('rwmb_meta') && rwmb_meta('creptaam_page_mobile_sticky_logo', 'type=image_advanced')) {
			$classes[] = 'has-sticky-mobile-logo';
		}

		// page header section class
		$header_page_settings = '';
		if (function_exists('rwmb_meta')) :
			$header_page_settings = rwmb_meta('creptaam_page_header_visibility');
		endif;

		if ($header_page_settings == 'header-section-show') :
			$classes[] = 'header-section-show';
		elseif($header_page_settings == 'header-section-hide'):
			$classes[] = 'header-section-hide';
		else :
			$classes[] = creptaam_option('page-header-visibility', false, true);
		endif;
		
		return $classes;
	}
	add_filter( 'body_class', 'creptaam_body_classes' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_page_menu_args' ) ) :

	function creptaam_page_menu_args( $args ) {

		$args[ 'show_home' ] = TRUE;

		return $args;
	}

	add_filter( 'wp_page_menu_args', 'creptaam_page_menu_args' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets the authordata global when viewing an author archive.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_setup_author' ) ) :
	function creptaam_setup_author() {
		global $wp_query;

		if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
			$GLOBALS[ 'authordata' ] = get_userdata( $wp_query->post->post_author );
		}
	}

	add_action( 'wp', 'creptaam_setup_author' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break button in editor
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_wp_page_pagination' ) ) :

	function creptaam_wp_page_pagination( $mce_buttons ) {
		if ( get_post_type() == 'post' or get_post_type() == 'page' ) {
			$pos = array_search( 'wp_more', $mce_buttons, TRUE );
			if ( $pos !== FALSE ) {
				$buttons     = array_slice( $mce_buttons, 0, $pos + 1 );
				$buttons[ ]  = 'wp_page';
				$mce_buttons = array_merge( $buttons, array_slice( $mce_buttons, $pos + 1 ) );
			}
		}

		return $mce_buttons;
	}

	add_filter( 'mce_buttons', 'creptaam_wp_page_pagination' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get site url by replacing 'http://site_url/' for one page menu
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_get_site_url' ) ) :

	function creptaam_get_site_url($output) {

		global $post;
		$front_id = get_option('page_on_front');
		
		if(is_object($post)) :
			$output = str_replace( 'http://site_url/', get_permalink($front_id), $output);	
			$output = str_replace( get_permalink($post->ID).'#', '#', $output );
		endif;

	    return $output;
	}
	add_filter( 'walker_nav_menu_start_el', 'creptaam_get_site_url', 10, 4);
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux News Flash Remove 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! class_exists( 'reduxNewsflash' ) ):
	class reduxNewsflash {
		public function __construct( $parent, $params ) {

		}
	}
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux Ads Remove
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

add_filter( 'redux/' . 'creptaam_theme_option' . '/aURL_filter', '__return_empty_string' );



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Cart contents update when products are added to the cart via AJAX
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('creptaam_header_add_to_cart_fragment')) :
    function creptaam_header_add_to_cart_fragment( $fragments ) {
        ob_start(); ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'View your shopping cart', 'creptaam' ); ?>"><i class="fa fa-shopping-bag"></i><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
        <?php
        $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'creptaam_header_add_to_cart_fragment' );
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Product per row
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_product_per_row' ) ) :
	function creptaam_product_per_row() {
		$product_per_row = 3;

		if (creptaam_option('product-column')) :
			return creptaam_option('product-column', false, true); // products per row
		else :
			return $product_per_row;
		endif;
	}
	add_filter('loop_shop_columns', 'creptaam_product_per_row');
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Product per page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_shop_per_page')) :
	function creptaam_shop_per_page(){
		$product_per_page = 6;

		if (creptaam_option('product-per-page')) :
			return creptaam_option('product-per-page', false, true); // products per page
		else :
			return $product_per_page;
		endif;
	}
	add_filter( 'loop_shop_per_page', 'creptaam_shop_per_page');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Before cart markup
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_before_cart_div' ) ):

    function creptaam_before_cart_div( ) {
        echo '<div class="creptaam-shop creptaam-cart">';
    }

    add_action( 'woocommerce_before_cart', 'creptaam_before_cart_div' );
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  after cart markup
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_after_cart_div' ) ):

    function creptaam_after_cart_div( ) {
        echo '</div>';
    }

    add_action( 'woocommerce_after_cart', 'creptaam_after_cart_div' );
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom excerpt length
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_excerpt_length')) :
	function creptaam_excerpt_length() {
	    return 15;
	}
	add_filter( 'excerpt_length', 'creptaam_excerpt_length', 999);
endif;