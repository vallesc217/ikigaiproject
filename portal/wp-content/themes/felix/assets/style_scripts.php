<?php

/**
 * We print the scripts and styles in the frontend
 */


add_action( 'wp_enqueue_scripts', 'felix_style_scripts', 500 );


/**
 *
 */
function felix_style_scripts() {
	global $post, $felix_class;
	//color theme in css

	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . "/css/bootstrap.min.css" );
	wp_enqueue_style( 'font-awesome-min', get_template_directory_uri() . "/css/font-awesome.min.css" );
	wp_enqueue_style( 'ionicons-min', get_template_directory_uri() . "/css/ionicons.min.css" );
	wp_enqueue_style( 'animate', get_template_directory_uri() . "/css/animate.css" );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . "/css/magnific-popup.css" );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . "/css/owl.carousel.css" );
	wp_enqueue_style( 'owl-transitions', get_template_directory_uri() . "/css/owl.transitions.css" );


	wp_enqueue_style( 'felix-style-old', get_template_directory_uri() . "/css/style.css" );

	if ( function_exists( 'felix_enqueue_url_base_style' ) ) {
		wp_enqueue_style( 'felix-style',  felix_enqueue_url_base_style() );
	}


	wp_enqueue_style( 'felix-style-wp', get_stylesheet_directory_uri() . '/style.css' );


//************************************* Fonts ***********************************************/
	wp_enqueue_style( 'felix-fonts-google-Lora', $felix_class->felix_google_fonts_url( 'Lora:400,400i,700,700i&amp;subset=cyrillic' ) );
	wp_enqueue_style( 'felix-fonts-google-Montserrat', $felix_class->felix_google_fonts_url( 'Montserrat:400,700' ) );


	if ( is_customize_preview() && function_exists( 'felix_css_generator_custumize' ) ) {

		wp_add_inline_style( 'felix-style', felix_css_generator_custumize() );
	}


//cat image bg
	if ( function_exists( 'felix_taxonomy_image' ) ) {
		$bg = felix_taxonomy_image();
	}
	if ( !isset( $bg{8} ) ) {
		$bg = get_header_image();
	}

//single page bg

	if ( is_single() || is_page() ) {

		$image_id = get_post_meta( $post->ID, '_felix_image_id', true );
		//if isset id img
		if ( $image_id && get_post( $image_id ) ) {
			$image = wp_get_attachment_image_src( $image_id, 'full' );


			if ( isset( $image[0] ) ) {
				$bg = $image[0];
			}

		}

	}


	$css = '';

	if ( isset( $bg{8} ) ) {
		$css .= '.masthead-inner {
        background: url(' . esc_url( $bg ) . ') 50%  no-repeat !important; 
        background-size: cover !important; 
        }';
	}

	$footer_bg = get_theme_mod( 'footer-img' );
	if ( isset( $footer_bg{8} ) ) {
		$footer_bg = esc_url( $footer_bg );
		$css .= 'footer.footer{
        background: url(' . esc_url( $footer_bg ) . ') 50%  no-repeat !important; 
        background-size: cover !important; 
        }';
	}


	if ( strlen( get_theme_mod( 'colors-m-D4B068' ) ) > 2 ) {
		if ( get_option( 'felix-color' ) ) {
			wp_add_inline_style( 'felix-style-wp', wp_kses_post( get_option( 'felix-color' ) ) );
		}
	}

	wp_add_inline_style( 'felix-style-old', $css );
	/*---------------------------------------- JS --------------------------------------------------------------------------*/
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1', true );

	if ( get_theme_mod( 'felix-performans-scroll', false ) == true ) {
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '1', true );
	}

	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.min.js"', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'felix-interface', get_template_directory_uri() . '/js/interface.js', array( 'jquery' ), '1', true );


	if ( get_theme_mod( 'felix_map_google_key' ) != '' ) {
		wp_enqueue_script( 'mapsgoogle', '//maps.google.com/maps/api/js?key=' . get_theme_mod( 'felix_map_google_key' ), array( 'jquery' ), '1', true );

	} else {
		wp_enqueue_script( 'mapsgoogle', '//maps.google.com/maps/api/js?key=AIzaSyAQ0FBrS86laigd1gOb6NniK5MkwRZAZ5k', array( 'jquery' ), '1', true );

	}


	wp_enqueue_script( 'felix-gmap', get_template_directory_uri() . '/js/gmap.js', array( 'jquery' ), '1', true );


	wp_enqueue_script( 'comment-reply' );


	wp_localize_script( 'felix-interface', 'felix_obj', array(
		'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
		'theme-url' => esc_url( get_template_directory_uri() ),


	) );


}


/**
 * init admin scripts and style
 */
function felix_style_scripts_admin() {
	//Geocoding google

	wp_enqueue_style( 'felix-admins', get_template_directory_uri() . '/css/admins.css' );
	wp_enqueue_style( 'felix-ionicons', get_template_directory_uri() . '/css/ionicons.min.css' );;
	wp_enqueue_script( 'felix-admins', get_template_directory_uri() . '/js/admin/admin.js', array( 'jquery' ), '1', true );
	wp_localize_script( 'felix-admins', 'felix_admin_obj',
		array(
			'version' => sanitize_text_field( esc_html( get_bloginfo( "version" ) ) )
		)
	);
	$T = get_the_tags();
}

add_action( 'admin_enqueue_scripts', 'felix_style_scripts_admin' );

