<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// CREPTAAM FUNCTIONS AND DEFINITIONS
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( ! defined( 'CREPTAAM_THEME_NAME' ) ) {
        define( 'CREPTAAM_THEME_NAME', wp_get_theme()->get( 'Name' ) );
    }
    
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // admin-init, metabox, bootstrap-navwalker, jetpack
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

	require get_template_directory() . "/admin/admin-init.php";
	require get_template_directory() . "/inc/metabox.php";
	require get_template_directory() . "/inc/tt-navwalker.php";
    require get_template_directory() . "/inc/tt-mobile-navwalker.php";

    if (class_exists('Vc_Manager')) {
        require get_template_directory() . "/visual-composer/visual-composer.php";
    }

if (!function_exists('creptaam_theme_setup')) :

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets up theme defaults and registers support for various WordPress features.
// Note that this function is hooked into the after_setup_theme hook, which
// runs before the init hook. The init hook is too late for some features, such
// as indicating support for post thumbnails.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    function creptaam_theme_setup(){
       
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Make theme available for translation.
        // Translations can be filed in the /languages/ directory.
        // If you're building a theme based on creptaam, use a find and replace
        // to change 'creptaam' to the name of your theme in all the template files
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        load_theme_textdomain('creptaam', get_template_directory() . '/languages');
        

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Add default posts and comments RSS feed links to head.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('automatic-feed-links');

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Supporting title tag
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('title-tag');

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Supporting custom header
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('custom-header');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Supporting custom background
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('custom-background');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // WooCommerce support
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('woocommerce');



        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Gutenberg support
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support(
            'gutenberg',
            array( 'wide-images' => true )
        );

        add_theme_support( 'align-wide' );

        // responsive-embeds
        add_theme_support( 'responsive-embeds' );



        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Thumbnails on posts and pages.
        // See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-          
        add_theme_support('post-thumbnails');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // default post thumbnail size
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        set_post_thumbnail_size(1120);

        add_image_size('creptaam-thumbnail', 340, 210, TRUE);
        add_image_size('creptaam-thumbnail-no-sidebar', 535, 350, TRUE);
        add_image_size('creptaam-work-thumbnail', 800, 600, TRUE);
        add_image_size('creptaam-event-thumbnail', 345, 300, TRUE);
        add_image_size('creptaam-event-thumbnail-large', 830, 350, TRUE);
        add_image_size('creptaam-thumbnail-large', 730, 350, TRUE);
        add_image_size('creptaam-thumbnail-extra-large', 1120, 500, TRUE);
        

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // This theme uses wp_nav_menu() in one locations.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        register_nav_menus(array(
           'primary' => esc_html__('Primary Menu', 'creptaam')
        ) );


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ));


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Formats.
        // See: https://codex.wordpress.org/Post_Formats
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-          
        add_theme_support('post-formats', array('aside', 'status', 'image', 'audio', 'video', 'gallery', 'quote', 'link', 'chat' ));

    }

    add_action('after_setup_theme', 'creptaam_theme_setup');

endif; // creptaam_theme_setup


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set the content width in pixels, based on the theme's design and stylesheet.
// Priority 0 to make it available to lower priority callbacks.
// @global int $content_width
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_content_width')) :
    function creptaam_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'creptaam_content_width', 1140 );
    }
    add_action( 'after_setup_theme', 'creptaam_content_width', 0 );
endif;
    

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register widget area.
// @link https://codex.wordpress.org/Function_Reference/register_sidebar
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_widgets_init')) :

    function creptaam_widgets_init() {

    	do_action('creptaam_before_register_sidebar');

        register_sidebar( apply_filters( 'creptaam_blog_sidebar', array(
            'name'          => esc_html__('Blog Sidebar', 'creptaam'),
            'id'            => 'creptaam-blog-sidebar',
            'description'   => esc_html__('Appears in the blog sidebar.', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_home_sidebar', array(
            'name'          => esc_html__('Home Blog Sidebar', 'creptaam'),
            'id'            => 'creptaam-home-sidebar',
            'description'   => esc_html__('Appears in the home sidebar.', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_page_sidebar', array(
            'name'          => esc_html__('Page Sidebar Area', 'creptaam'),
            'id'            => 'creptaam-page-sidebar',
            'description'   => esc_html__('Appears in the Page sidebar.', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_service_sidebar', array(
            'name'          => esc_html__('Service Sidebar Area', 'creptaam'),
            'id'            => 'creptaam-service-sidebar',
            'description'   => esc_html__('Appears in the service sidebar.', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="widget creptaam-page-sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_work_sidebar', array(
            'name'          => esc_html__('Work Sidebar Area', 'creptaam'),
            'id'            => 'creptaam-work-sidebar',
            'description'   => esc_html__('Appears in the work sidebar.', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="widget creptaam-page-sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_toggle_menu_sidebar', array(
            'name'          => esc_html__('Offcanvas Sidebar', 'creptaam'),
            'id'            => 'creptaam-toogle-menu-sidebar',
            'description'   => esc_html__('This widget created for offcanvas sidebar only', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_footer_default_sidebar', array(
            'name'          => esc_html__('Footer Default Sidebar', 'creptaam'),
            'id'            => 'creptaam-footer-default',
            'description'   => esc_html__('Appears in the footer', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="col-md-6 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_footer_three_column', array(
            'name'          => esc_html__('Footer Sidebar Three Column', 'creptaam'),
            'id'            => 'creptaam-footer-three-column',
            'description'   => esc_html__('Appears in the footer', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-6 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'creptaam_footer_four_column', array(
            'name'          => esc_html__('Footer Sidebar Four Column', 'creptaam'),
            'id'            => 'creptaam-footer-four-column',
            'description'   => esc_html__('Appears in the footer', 'creptaam'),
            'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        if (class_exists('WooCommerce')) {
            register_sidebar( apply_filters( 'creptaam_shop_sidebar', array(
                'name'          => esc_html__('Shop Sidebar Area', 'creptaam'),
                'id'            => 'creptaam-shop-sidebar',
                'description'   => esc_html__('Appears in the shop sidebar sidebar.', 'creptaam'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )));
        }

        do_action('creptaam_after_register_sidebar');
    }

    add_action('widgets_init', 'creptaam_widgets_init');
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Google Font If Redux framework is not activated.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function creptaam_fonts_url() {
    $font_url = '';

    $josefin_sans = esc_html_x( 'on', 'Josefin Sans font: on or off', 'creptaam' );
    $open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'creptaam' );

    if ( 'off' !== $josefin_sans || $open_sans) {
        $font_families = array();

        if ( 'off' !== $josefin_sans ) {
            $font_families[] = 'Josefin Sans:400,700';
        }

        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return esc_url_raw( $font_url );
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Enqueue scripts and styles.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_scripts')) :
    
    function creptaam_scripts() {

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Styles
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

        if (! creptaam_option( 'body-typography', false, true )) :
            wp_enqueue_style('google-font', creptaam_fonts_url(), array(), NULL);
        endif;

        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');
        wp_enqueue_style('flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css', array(), NULL);
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
        wp_enqueue_style('swipper', get_template_directory_uri() . '/css/swipper.min.css', array(), NULL);
        wp_enqueue_style('magnific', get_template_directory_uri() . '/css/magnific-popup.css', array(), NULL);
        wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), NULL);
        wp_register_style('animate', get_template_directory_uri() . '/css/animate.css', array(), NULL);
        wp_enqueue_style('stylesheet', get_stylesheet_uri());

        if (creptaam_option('rtl')) {
            wp_enqueue_style('creptaam-rtl', get_template_directory_uri() . '/rtl.css', array(), NULL);
        }

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // scripts
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', TRUE);
        wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('sticky', get_template_directory_uri() . '/js/sticky-sidebar.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('inview', get_template_directory_uri() . '/js/jquery.inview.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('coundown-timer', get_template_directory_uri() . '/js/coundown-timer.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('particles', get_template_directory_uri() . '/js/particles.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script( 'jquery-masonry' );
        wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script('creptaam-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), NULL, TRUE);
        wp_localize_script( 'creptaam-scripts', 'creptaamJSObject', apply_filters( 'creptaam_js_object', array(
            'creptaam_sticky_menu' => creptaam_option('sticky-menu-visibility', false, true),
            'creptaam_default_font' => creptaam_option('body-typography', 'font-family'),
            // count down
            'count_day'              => esc_html__('Days', 'creptaam'),
            'count_hour'             => esc_html__('Hour', 'creptaam'),
            'count_minutes'          => esc_html__('Minutes', 'creptaam'),
            'count_second'           => esc_html__('Seconds', 'creptaam'),
		) ) );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'creptaam_scripts');
endif;


if (!function_exists('creptaam_editor_styles')) :
    function creptaam_editor_styles() {
        wp_enqueue_style('google-font', creptaam_fonts_url(), array(), NULL);
        wp_enqueue_style( 'creptaam-editor-style', get_template_directory_uri() . '/css/editor-style.css');
    }
endif;
add_action( 'enqueue_block_editor_assets', 'creptaam_editor_styles', 999 );




//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom template tags for this theme.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/template-tags.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom functions that act independently of the theme templates.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/extras.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Jetpack compatibility file.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/jetpack.php";