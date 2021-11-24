<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'KRATZ_THEME_FREE' ) ) {
	define( 'KRATZ_THEME_FREE', false );
}
if ( ! defined( 'KRATZ_THEME_FREE_WP' ) ) {
	define( 'KRATZ_THEME_FREE_WP', false );
}

// If this theme is a part of Envato Elements
if ( ! defined( 'KRATZ_THEME_IN_ENVATO_ELEMENTS' ) ) {
	define( 'KRATZ_THEME_IN_ENVATO_ELEMENTS', false );
}

// If this theme uses multiple skins
if ( ! defined( 'KRATZ_ALLOW_SKINS' ) ) {
	define( 'KRATZ_ALLOW_SKINS', false );
}
if ( ! defined( 'KRATZ_DEFAULT_SKIN' ) ) {
	define( 'KRATZ_DEFAULT_SKIN', 'default' );
}



// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
//-------------------------------------------------------------------------
$GLOBALS['KRATZ_STORAGE'] = array(

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-themerex',

	// Generate Personal token from Envato to automatic upgrade theme
	'upgrade_token_url'  => '//build.envato.com/create-token/?default=t&purchase:download=t&purchase:list=t',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => '//kratz.themerex.net',
	'theme_doc_url'      => '//kratz.themerex.net/doc',
	
	'theme_rate_url'     => '//themeforest.net/download',

	'theme_custom_url' => '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash',

	'theme_download_url' => '//themeforest.net/item/kratz-digital-agency-wordpress-theme/25103796',            // ThemeREX


	'theme_support_url'  => '//themerex.net/support/',                              // ThemeREX


	'theme_video_url'    => '//www.youtube.com/channel/UCnFisBimrK2aIE-hnY70kCA',   // ThemeREX

	'theme_privacy_url'  => '//themerex.net/privacy-policy/',                       // ThemeREX

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By size
		'xxl'        => array( 'max' => 1679 ),
		'xl'         => array( 'max' => 1439 ),
		'lg'         => array( 'max' => 1279 ),
		'md_over'    => array( 'min' => 1024 ),
		'md'         => array( 'max' => 1023 ),
		'sm'         => array( 'max' => 767 ),
		'sm_wp'      => array( 'max' => 600 ),
		'xs'         => array( 'max' => 479 ),
		// By device
		'wide'       => array(
			'min' => 2160
		),
		'desktop'    => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook'   => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'     => array(
			'min' => 768,
			'max' => 1279,
		),
		'not_mobile' => array(
			'min' => 768
		),
		'mobile'     => array(
			'max' => 767
		),
	),
);



// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$kratz_theme_required_plugins_group = esc_html__( 'Core', 'kratz' );
$kratz_theme_required_plugins = array(
	// Section: "CORE" (required plugins)
	// DON'T COMMENT OR REMOVE NEXT LINES!
	'trx_addons'         => array(
								'title'       => esc_html__( 'ThemeREX Addons', 'kratz' ),
								'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'kratz' ),
								'required'    => true,
								'logo'        => 'logo.png',
								'group'       => $kratz_theme_required_plugins_group,
							),
);

// Section: "PAGE BUILDERS"
$kratz_theme_required_plugins_group = esc_html__( 'Page Builders', 'kratz' );
$kratz_theme_required_plugins['elementor'] = array(
	'title'       => esc_html__( 'Elementor', 'kratz' ),
	'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'kratz' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $kratz_theme_required_plugins_group,
);
$kratz_theme_required_plugins['gutenberg'] = array(
	'title'       => esc_html__( 'Gutenberg', 'kratz' ),
	'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'kratz' ),
	'required'    => false,
	'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
	'logo'        => 'logo.png',
	'group'       => $kratz_theme_required_plugins_group,
);
if ( ! KRATZ_THEME_FREE ) {
	$kratz_theme_required_plugins['js_composer']          = array(
		'title'       => esc_html__( 'WPBakery PageBuilder', 'kratz' ),
		'description' => esc_html__( "Popular PageBuilder which allows you to create excellent pages", 'kratz' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'logo.jpg',
		'group'       => $kratz_theme_required_plugins_group,
	);
	$kratz_theme_required_plugins['vc-extensions-bundle'] = array(
		'title'       => esc_html__( 'WPBakery PageBuilder extensions bundle', 'kratz' ),
		'description' => esc_html__( "Many shortcodes for the WPBakery PageBuilder", 'kratz' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'logo.png',
		'group'       => $kratz_theme_required_plugins_group,
	);
}



// Section: "SOCIALS & COMMUNITIES"
$kratz_theme_required_plugins_group = esc_html__( 'Socials and Communities', 'kratz' );

$kratz_theme_required_plugins['trx_socials']   = array(
	'title'       => esc_html__( 'TRX Socials', 'kratz' ),
	'description' => esc_html__( "Displays the latest photos from your profile on Instagram", 'kratz' ),
	'required'    => false,
	'group'       => $kratz_theme_required_plugins_group,
);
$kratz_theme_required_plugins['mailchimp-for-wp'] = array(
	'title'       => esc_html__( 'MailChimp for WP', 'kratz' ),
	'description' => esc_html__( "Allows visitors to subscribe to newsletters", 'kratz' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $kratz_theme_required_plugins_group,
);



// Section: "CONTENT"
$kratz_theme_required_plugins_group = esc_html__( 'Content', 'kratz' );
$kratz_theme_required_plugins['contact-form-7'] = array(
	'title'       => esc_html__( 'Contact Form 7', 'kratz' ),
	'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'kratz' ),
	'required'    => false,
	'logo'        => 'logo.jpg',
	'group'       => $kratz_theme_required_plugins_group,
);
if ( ! KRATZ_THEME_FREE ) {

	$kratz_theme_required_plugins['trx_updater']   = array(
		'title'       => esc_html__( 'ThemeREX Updater', 'kratz' ),
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $kratz_theme_required_plugins_group,
	);
	$kratz_theme_required_plugins['essential-grid']             = array(
		'title'       => esc_html__( 'Essential Grid', 'kratz' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $kratz_theme_required_plugins_group,
	);
	$kratz_theme_required_plugins['revslider']                  = array(
		'title'       => esc_html__( 'Revolution Slider', 'kratz' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $kratz_theme_required_plugins_group,
	);

}



// Add plugins list to the global storage
$GLOBALS['KRATZ_STORAGE']['required_plugins'] = $kratz_theme_required_plugins;



// THEME-SPECIFIC BLOG LAYOUTS
//----------------------------------------------
$kratz_theme_blog_styles = array(
	'excerpt' => array(
		'title'   => esc_html__( 'Standard', 'kratz' ),
		'archive' => 'index-excerpt',
		'item'    => 'content-excerpt',
		'styles'  => 'excerpt',
	),
	'classic' => array(
		'title'   => esc_html__( 'Classic', 'kratz' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'classic',
	),
);
if ( ! KRATZ_THEME_FREE ) {
	$kratz_theme_blog_styles['masonry']   = array(
		'title'   => esc_html__( 'Masonry', 'kratz' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'masonry',
	);
	$kratz_theme_blog_styles['portfolio'] = array(
		'title'   => esc_html__( 'Portfolio', 'kratz' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio',
		'columns' => array( 2, 3, 4 ),
		'styles'  => 'portfolio',
	);
	$kratz_theme_blog_styles['gallery']   = array(
		'title'   => esc_html__( 'Gallery', 'kratz' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio-gallery',
		'columns' => array( 2, 3, 4 ),
		'styles'  => array( 'portfolio', 'gallery' ),
	);
	$kratz_theme_blog_styles['chess']     = array(
		'title'   => esc_html__( 'Chess', 'kratz' ),
		'archive' => 'index-chess',
		'item'    => 'content-chess',
		'columns' => array( 1, 2, 3 ),
		'styles'  => 'chess',
	);
}

// Add list of blog styles to the global storage
$GLOBALS['KRATZ_STORAGE']['blog_styles'] = $kratz_theme_blog_styles;


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'kratz_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'kratz_customizer_theme_setup1', 1 );
	function kratz_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		kratz_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',                    // none  - use separate options for the main and the child-theme
																		// child - duplicate theme options from the main theme to the child-theme only
																		// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',                     // Refresh method for preview area in the Appearance - Customize:
																		// auto - refresh preview area on change each field with Theme Options
																		// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                          // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,                       // Place 'comment' field after the 'name' and 'email'

				'show_author_avatar'     => true,                       // Display author's avatar in the post meta

				'icons_selector'         => 'internal',                 // Icons selector in the shortcodes:
																		// vc (default) - standard VC (very slow) or Elementor's icons selector (not support images and svg)
																		// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',                    // Type of icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present icons
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',                    // Type of socials icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present social networks
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,                       // Check if exists a .min version of .css and .js and return path to it
																		// instead the path to the original file
																		// (if debug_mode is on and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,                      // Show any menu if no menu selected in the location 'main_menu'
																		// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,                      // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,                       // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,                      // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,                      // Allow to use theme-specific image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,                       // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,                      // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																		// In the Page Options this styles are present always
																		// (can be removed if filter 'kratz_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,                      // Add arrows on the single attachment page to navigate to the prev/next attachment

				'gutenberg_safe_mode'    => array(),                    // 'vc', 'elementor' - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'gutenberg_add_context'  => false,                      // Add context to the Gutenberg editor styles with our method (if true - use if any problem with editor styles) or use native Gutenberg way via add_editor_style() (if false - used by default)

				'allow_gutenberg_blocks' => true,                       // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,                       // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx'        => 'replace',                  // Add our breakpoints to the Responsive section of each element
																		// 'add' - add our breakpoints after Elementor's
																		// 'replace' - add our breakpoints instead Elementor's
																		// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		
		kratz_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Montserrat',
					'family' => 'sans-serif',
					'styles' => '200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i',     // Parameter 'style' used only for the Google fonts
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		kratz_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		kratz_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'kratz' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.7rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '',
					'margin-top'      => '0em',
					'margin-bottom'   => '0.9em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '5rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-2.6px',
					'margin-top'      => '1.0417em',
					'margin-bottom'   => '0.35em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '4rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.0952em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.7px',
					'margin-top'      => '1.0952em',
					'margin-bottom'   => '0.5em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '2.667rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.1515em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.3px',
					'margin-top'      => '1.4545em',
					'margin-bottom'   => '0.7em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '2rem',
					'font-weight'     => '200',
					'font-style'      => 'normal',
					'line-height'     => '1.3077em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1px',
					'margin-top'      => '1.7em',
					'margin-bottom'   => '0.8em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1.600rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.35em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.8px',
					'margin-top'      => '1.7em',
					'margin-bottom'   => '0.8em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1.200rem',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.4706em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '2em',
					'margin-bottom'   => '0.8em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'kratz' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1.8em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '17px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '17px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'kratz' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'kratz' ),
					'font-family'     => 'inherit',
					'font-size'       => '15px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'kratz' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'kratz' ),
					'font-family'     => 'inherit',
					'font-size'       => '13px',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '600',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'kratz' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '16px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'kratz' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'kratz' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '15px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		kratz_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'kratz' ),
					'description' => esc_html__( 'Colors of the main content area', 'kratz' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'kratz' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'kratz' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'kratz' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'kratz' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'kratz' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'kratz' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'kratz' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'kratz' ),
				),
			)
		);
		kratz_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'kratz' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'kratz' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'kratz' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'kratz' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'kratz' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'kratz' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'kratz' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'kratz' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'kratz' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'kratz' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'kratz' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'kratz' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'kratz' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'kratz' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'kratz' ),
					'description' => esc_html__( 'Color of the links inside this block', 'kratz' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'kratz' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'kratz' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'kratz' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'kratz' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'kratz' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'kratz' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'kratz' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'kratz' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'kratz' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'kratz' ),
				),
			)
		);
		$schemes = array(

			// Color scheme: 'default'
			'default' => array(
				'title'    => esc_html__( 'Default', 'kratz' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#ffffff',//
					'bd_color'         => '#f7f3ee',//

					// Text and links colors
					'text'             => '#93929b',//
					'text_light'       => '#3d3855',//
					'text_dark'        => '#3d3855',//
					'text_link'        => '#f25985',//
					'text_hover'       => '#3d3855',//
					'text_link2'       => '#f0f0f0',//
					'text_hover2'      => '#8be77c',
					'text_link3'       => '#3d3855',//
					'text_hover3'      => '#eec432',
                    'text_link4'       => '#eae0d4',//
					'text_hover4'      => '#3d3855',//


					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#3d3855',//
					'alter_bg_hover'   => '#f7f3ee',//
					'alter_bd_color'   => '#302c44',//
					'alter_bd_hover'   => '#eae0d4',//
					'alter_text'       => '#93929b',//
					'alter_light'      => '#93929b',//
					'alter_dark'       => '#eae0d4',//
					'alter_link'       => '#6cc1bd',//
					'alter_hover'      => '#eae0d4',//
					'alter_link2'      => '#d6d6d6',//
					'alter_hover2'     => '#6cc1bd',//
					'alter_link3'      => '#6cc1bd',//
					'alter_hover3'     => '#ddb837',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#3d3855',//
					'extra_bg_hover'   => '#3d3855',//
					'extra_bd_color'   => '#eae0d4',//
					'extra_bd_hover'   => '#3d3d3d',
					'extra_text'       => '#93929b',//
					'extra_light'      => '#3d3855',//
					'extra_dark'       => '#eae0d4',//
					'extra_link'       => '#6cc1bd',//
					'extra_hover'      => '#434861',//
					'extra_link2'      => '#c3bdba',//
					'extra_hover2'     => '#8be77c',
					'extra_link3'      => '#5d586b',//
					'extra_hover3'     => '#b1b0bb',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#f7f3ee',//
					'input_bg_hover'   => '#f7f3ee',//
					'input_bd_color'   => '#e7eaed',
					'input_bd_hover'   => '#eae0d4',//
					'input_text'       => '#3d3855',//
					'input_light'      => '#a7a7a7',
					'input_dark'       => '#3d3855',//

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#67bcc1',
					'inverse_bd_hover' => '#5aa4a9',
					'inverse_text'     => '#eae0d4',//
					'inverse_light'    => '#eae0d4',//
					'inverse_dark'     => '#3d3855',//
					'inverse_link'     => '#3d3855',//
					'inverse_hover'    => '#3d3855',//
				),
			),

			// Color scheme: 'dark'
			'dark'    => array(
				'title'    => esc_html__( 'Dark', 'kratz' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#ffffff',//
					'bd_color'         => '#f7f3ee',//

					// Text and links colors
					'text'             => '#93929b',//
					'text_light'       => '#3d3855',//
					'text_dark'        => '#3d3855',//
					'text_link'        => '#f25985',//
					'text_hover'       => '#3d3855',//
					'text_link2'       => '#eae0d4',//
					'text_hover2'      => '#8be77c',
					'text_link3'       => '#eae0d4',//
					'text_hover3'      => '#eec432',
                    'text_link4'       => '#eae0d4',//
					'text_hover4'      => '#3d3855',//

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#3d3855',//
					'alter_bg_hover'   => '#f7f3ee',//
					'alter_bd_color'   => '#302c44',//
					'alter_bd_hover'   => '#ffffff',//
					'alter_text'       => '#93929b',//
					'alter_light'      => '#93929b',//
					'alter_dark'       => '#eae0d4',//
					'alter_link'       => '#6cc1bd',//
					'alter_hover'      => '#eae0d4',//
					'alter_link2'      => '#8be77c',
					'alter_hover2'     => '#eae0d4',//
					'alter_link3'      => '#eae0d4',//
					'alter_hover3'     => '#ddb837',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#3d3855',//
					'extra_bg_hover'   => '#eae0d4',//
					'extra_bd_color'   => '#eae0d4',//
					'extra_bd_hover'   => '#eae0d4',//
					'extra_text'       => '#93929b',//
					'extra_light'      => '#3d3855',//
					'extra_dark'       => '#eae0d4',//
					'extra_link'       => '#6cc1bd',//
					'extra_hover'      => '#434861',//
					'extra_link2'      => '#c3bdba',//
					'extra_hover2'     => '#8be77c',
					'extra_link3'      => '#5d586b',//
					'extra_hover3'     => '#b1b0bb',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#f2f2f1',//
					'input_bg_hover'   => '#f7f3ee',//
					'input_bd_color'   => '#2e2d32',
					'input_bd_hover'   => '#eae0d4',//
					'input_text'       => '#3d3855',//
					'input_light'      => '#6f6f6f',
					'input_dark'       => '#3d3855',//

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#e36650',
					'inverse_bd_hover' => '#cb5b47',
					'inverse_text'     => '#eae0d4',//
					'inverse_light'    => '#f25985',//
					'inverse_dark'     => '#3d3855',//
					'inverse_link'     => '#3d3855',//
					'inverse_hover'    => '#3d3855',//
				),
			),
		);
		kratz_storage_set( 'schemes', $schemes );
		kratz_storage_set( 'schemes_original', $schemes );
		
		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		kratz_storage_set(
			'schemes_simple', array(
				'text_link'        => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
					'inverse_bd_color' => 0.85,
					'inverse_bd_hover' => 0.7,
				),
				'text_hover'       => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'       => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2'      => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'       => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3'      => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
				'inverse_bd_color' => array(),
				'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		kratz_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_03'       => array(
					'color' => 'bg_color',
					'alpha' => 0.3,
				),
				'bg_color_05'       => array(
					'color' => 'bg_color',
					'alpha' => 0.5,
				),
				'bg_color_04'       => array(
					'color' => 'bg_color',
					'alpha' => 0.4,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_09' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_05' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.5,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'alter_link_04'     => array(
					'color' => 'alter_link',
					'alpha' => 0.4,
				),
                'alter_link_09'     => array(
                    'color' => 'alter_link',
                    'alpha' => 0.9,
                ),
                'extra_bg_hover_04' => array(
                    'color' => 'extra_bg_hover',
                    'alpha' => 0.4,
                ),
                'extra_bg_hover_02' => array(
                    'color' => 'extra_bg_hover',
                    'alpha' => 0.2,
                ),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'extra_dark_02'     => array(
					'color' => 'extra_dark',
					'alpha' => 0.2,
				),
				'extra_dark_03'     => array(
					'color' => 'extra_dark',
					'alpha' => 0.3,
				),
				'extra_dark_04'     => array(
					'color' => 'extra_dark',
					'alpha' => 0.4,
				),
				'extra_dark_06'     => array(
					'color' => 'extra_dark',
					'alpha' => 0.6,
				),
				'extra_dark_09'     => array(
					'color' => 'extra_dark',
					'alpha' => 0.9,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_dark_09'      => array(
					'color' => 'text_dark',
					'alpha' => 0.9,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_link_09'      => array(
					'color' => 'text_link',
					'alpha' => 0.9,
				),
				'text_hover_07'      => array(
					'color' => 'text_hover',
					'alpha' => 0.7,
				),
				'text_04'      => array(
					'color' => 'text',
					'alpha' => 0.4,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 1,
					'saturation' => -3,
					'brightness' => 8,
				),
			)
		);

		// Parameters to set order of schemes in the css
		kratz_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		kratz_storage_set(
			'theme_thumbs', apply_filters(
				'kratz_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'kratz-thumb-huge'        => array(
						'size'  => array( 1170, 693, true ),
						'title' => esc_html__( 'Huge image', 'kratz' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'kratz-thumb-big'         => array(
						'size'  => array( 760, 428, true ),
						'title' => esc_html__( 'Large image', 'kratz' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'kratz-thumb-med'         => array(
						'size'  => array( 370, 208, true ),
						'title' => esc_html__( 'Medium image', 'kratz' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Small square image (for avatars in comments, etc.)
					'kratz-thumb-tiny'        => array(
						'size'  => array( 90, 90, true ),
						'title' => esc_html__( 'Small square avatar', 'kratz' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'kratz-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'kratz' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'kratz-thumb-masonry'     => array(
						'size'  => array( 370, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'kratz' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
                    'kratz-thumb-med-extra'         => array(
                        'size'  => array( 377, 210, true ),
                        'title' => esc_html__( 'Medium Extra', 'kratz' ),
                        'subst' => 'trx_addons-thumb-medium-extra',
                    ),
                    'kratz-thumb-med-services'         => array(
                        'size'  => array( 397, 290, true ),
                        'title' => esc_html__( 'Medium Services', 'kratz' ),
                        'subst' => 'trx_addons-thumb-medium-services',
                    ),
                    'kratz-thumb-med-team'         => array(
                        'size'  => array( 288, 230, true ),
                        'title' => esc_html__( 'Medium Team', 'kratz' ),
                        'subst' => 'trx_addons-thumb-medium-team',
                    ),
                    'kratz-thumb-hovered'         => array(
                        'size'  => array( 480, 290, true ),
                        'title' => esc_html__( 'Hovered', 'kratz' ),
                        'subst' => 'trx_addons-thumb-hovered',
                    ),
                    'kratz-thumb-portfolio'         => array(
                        'size'  => array( 793, 470, true ),
                        'title' => esc_html__( 'Portfolio', 'kratz' ),
                        'subst' => 'trx_addons-thumb-portfolio',
                    ),
                    'kratz-thumb-portfolio-top'         => array(
                        'size'  => array( 1270, 633, true ),
                        'title' => esc_html__( 'Portfolio Top', 'kratz' ),
                        'subst' => 'trx_addons-thumb-portfolio-top',
                    ),
                    'kratz-thumb-portfolio-gallery'         => array(
                        'size'  => array( 377, 468, true ),
                        'title' => esc_html__( 'Portfolio Gallery', 'kratz' ),
                        'subst' => 'trx_addons-thumb-portfolio-gallery',
                    ),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'kratz_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'kratz_importer_set_options', 9 );
	function kratz_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( kratz_get_protocol() . '://demofiles.themerex.net/kratz/' );
			// Required plugins
			$options['required_plugins'] = array_keys( kratz_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate at once when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 1;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Kratz Demo', 'kratz' );
			$options['files']['default']['domain_dev']  = esc_url( kratz_get_protocol() . '://kratz.themerex.net' );       // Developers domain
			$options['files']['default']['domain_demo'] = esc_url( kratz_get_protocol() . '://kratz.themerex.net' );       // Demo-site domain
			
			// The array with theme-specific banners, displayed during demo-content import.
			// If array with banners is empty - the banners are uploaded directly from demo-content server.
			$options['banners'] = array();
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'kratz_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'kratz_ocdi_set_options', 9 );
	function kratz_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( kratz_get_protocol() . '://demofiles.themerex.net/kratz/' );
			// Required plugins
			$options['required_plugins'] = array_keys( kratz_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Kratz OCDI Demo', 'kratz' );
			$options['files']['ocdi']['domain_demo'] = esc_url( kratz_get_protocol() . '://kratz.themerex.net' );
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'kratz_create_theme_options' ) ) {

	function kratz_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = esc_html__( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'kratz' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( (array)kratz_storage_get( 'schemes' ) ) < 2;

		kratz_storage_set(

			'options', array(

				// 'Logo & Site Identity'
				//---------------------------------------------
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'kratz' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'kratz' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'kratz' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'kratz' ) ),
					'class'    => 'kratz_column-1_2 kratz_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'kratz' ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'kratz' ) ),
					'class'    => 'kratz_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'kratz' ),
					'desc'    => wp_kses(
									__( 'Zoom the logo (set 1 to leave original size).', 'kratz' )
									. ' <br>'
									. __( 'Attention! For this parameter to affect images, their max-height should be specified in "em" instead of "px" when creating a header.', 'kratz' )
									. ' <br>'
									. __( 'In this case maximum size of logo depends on the actual size of the picture.', 'kratz' )
									, 'kratz_kses_content'
								),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'kratz' ) ),
					'class'      => 'kratz_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'kratz' ) ),
					'class' => 'kratz_column-1_2 kratz_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'kratz' ) ),
					'class'      => 'kratz_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'kratz' ) ),
					'class' => 'kratz_column-1_2 kratz_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'kratz' ) ),
					'class'      => 'kratz_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_side'                     => array(
					'title' => esc_html__( 'Logo for the side menu', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu', 'kratz' ) ),
					'class' => 'kratz_column-1_2 kratz_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_side_retina'              => array(
					'title'      => esc_html__( 'Logo for the side menu on Retina', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'kratz' ) ),
					'class'      => 'kratz_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'image',
				),



				// 'General settings'
				//---------------------------------------------
				'general'                       => array(
					'title'    => esc_html__( 'General', 'kratz' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'kratz' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'kratz' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'qsetup'   => esc_html__( 'General', 'kratz' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => kratz_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'kratz' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1270,
					'min'        => 1000,
					'max'        => 1600,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',               // SASS variable's name to preview changes 'on fly'
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),
				'page_boxed_extra'             => array(
					'title'      => esc_html__( 'Boxed page extra spaces', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Width of the extra side space on boxed pages', 'kratz' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'std'        => 60,
					'min'        => 0,
					'max'        => 150,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page_boxed_extra',   // SASS variable's name to preview changes 'on fly'
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'kratz' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'kratz' ),
					
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'kratz' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_position_ss'       => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'kratz' ),
					'desc'     => wp_kses_data( __( "Select position to move sidebar (if it's not hidden) on the small screen - above or below the content", 'kratz' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_ss_single'
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'kratz' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_widgets_single'
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'kratz' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'kratz' ) ),
					'std'        => 397,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'kratz' ) ),
					'std'        => 80,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'kratz' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'general_widgets_info'          => array(
					'title' => esc_html__( 'Additional widgets', 'kratz' ),
					'desc'  => '',
					'type'  => KRATZ_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page'            => array(
					'title'    => esc_html__( 'Widgets at the top of the page', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content'         => array(
					'title'    => esc_html__( 'Widgets above the content', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content'         => array(
					'title'    => esc_html__( 'Widgets below the content', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page'            => array(
					'title'    => esc_html__( 'Widgets at the bottom of the page', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'kratz' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'kratz' ),
					'desc'  => '',
					'type'  => KRATZ_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'kratz' ) ),
					'std'   => 0,
					'type'  => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'kratz'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'kratz') ),
					"std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'kratz'), 'kratz_kses_content' ),
					"type"  => "text"
				),



				// 'Header'
				//---------------------------------------------
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'kratz' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'std'      => 'default',
					'options'  => kratz_get_list_header_footer_types(),
					'type'     => KRATZ_THEME_FREE || ! kratz_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'kratz' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'kratz' ), 'kratz_kses_content' ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => 'header-custom-elementor-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight'             => array(
					'title'    => esc_html__( 'Header fullheight', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill the whole screen. Used only if the header has a background image', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'std'      => 0,
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_zoom'                   => array(
					'title'   => esc_html__( 'Header zoom', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Zoom the header title. 1 - original size', 'kratz' ) ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),

				'header_widgets_info'           => array(
					'title' => esc_html__( 'Header widgets', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Here you can place a widget slider, advertising banners, etc.', 'kratz' ) ),
					'type'  => 'info',
				),
				'header_widgets'                => array(
					'title'    => esc_html__( 'Header widgets', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select set of widgets to show in the header on each page', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
						'desc'    => wp_kses_data( __( 'Select set of widgets to show in the header on this page', 'kratz' ) ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => 'select',
				),
				'header_columns'                => array(
					'title'      => esc_html__( 'Header columns', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'dependency' => array(
						'header_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => kratz_get_list_range( 0, 6 ),
					'type'       => 'select',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'kratz' ) ),
					'type'  => KRATZ_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'kratz' ),
						'left'  => esc_html__( 'Left', 'kratz' ),
						'right' => esc_html__( 'Right', 'kratz' ),
					),
					'type'     => KRATZ_THEME_FREE || ! kratz_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'kratz' ) ),
					'std'   => 1,
					'type'  => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'kratz' ),
					'desc'  => '',
					'type'  => KRATZ_THEME_FREE ? 'hidden' : 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'kratz' ),
					'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'kratz' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'std'      => 0,
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'kratz' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'kratz' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'kratz' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'kratz' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'kratz' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'kratz' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'kratz' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'kratz' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),



				// 'Footer'
				//---------------------------------------------
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'kratz' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kratz' ),
					),
					'std'      => 'default',
					'options'  => kratz_get_list_header_footer_types(),
					'type'     => KRATZ_THEME_FREE || ! kratz_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'kratz' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'kratz' ), 'kratz_kses_content' ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kratz' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => 'footer-custom-elementor-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kratz' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kratz' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => kratz_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kratz' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'kratz' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'kratz' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'kratz' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'kratz' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! kratz_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'kratz' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by ThemeREX. All rights reserved.', 'kratz' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),



				// 'Mobile version'
				//---------------------------------------------
				'mobile'                        => array(
					'title'    => esc_html__( 'Mobile', 'kratz' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 55,
					'type'     => 'section',
				),

				'mobile_header_info'            => array(
					'title' => esc_html__( 'Header on the mobile device', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_mobile'            => array(
					'title'    => esc_html__( 'Header style', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => kratz_get_list_header_footer_types( true ),
					'type'     => KRATZ_THEME_FREE || ! kratz_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_mobile'           => array(
					'title'      => esc_html__( 'Select custom layout', 'kratz' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'kratz' ), 'kratz_kses_content' ),
					'dependency' => array(
						'header_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_mobile'        => array(
					'title'    => esc_html__( 'Header position', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_sidebar_info'           => array(
					'title' => esc_html__( 'Sidebar on the mobile device', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_mobile'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on mobile devices', 'kratz' ) ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_mobile'         => array(
					'title'   => esc_html__( 'Expand content', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden on mobile devices', 'kratz' ) ),
					'refresh' => false,
					'dependency' => array(
						'sidebar_position_mobile' => array( 'hide', 'inherit' ),
					),
					'std'     => 'inherit',
					'options'  => kratz_get_list_checkbox_values( true ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_footer_info'           => array(
					'title' => esc_html__( 'Footer on the mobile device', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'footer_type_mobile'           => array(
					'title'    => esc_html__( 'Footer style', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => kratz_get_list_header_footer_types( true ),
					'type'     => KRATZ_THEME_FREE || ! kratz_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style_mobile'          => array(
					'title'      => esc_html__( 'Select custom layout', 'kratz' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'kratz' ), 'kratz_kses_content' ),
					'dependency' => array(
						'footer_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets_mobile'        => array(
					'title'      => esc_html__( 'Footer widgets', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'kratz' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns_mobile'        => array(
					'title'      => esc_html__( 'Footer columns', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'kratz' ) ),
					'dependency' => array(
						'footer_type_mobile'    => array( 'default' ),
						'footer_widgets_mobile' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => kratz_get_list_range( 0, 6 ),
					'type'       => 'select',
				),



				// 'Blog'
				//---------------------------------------------
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'kratz' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),


				// Blog - Posts page
				//---------------------------------------------
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'kratz' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'kratz' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'kratz' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'kratz' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'kratz' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'kratz' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'kratz' ),
						'fullpost' => esc_html__( 'Full post', 'kratz' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'kratz' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 46,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'kratz' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'kratz' ) ),
					'std'     => 2,
					'options' => kratz_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'kratz' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'kratz' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'kratz' ),
						'links'    => esc_html__( 'Older/Newest', 'kratz' ),
						'more'     => esc_html__( 'Load more', 'kratz' ),
						'infinite' => esc_html__( 'Infinite scroll', 'kratz' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Post animation', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'open_full_post_in_blog'        => array(
					'title'      => esc_html__( 'Open full post in blog', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Allow to open the full version of the post directly in the blog feed. Attention! Applies only to 1 column layouts!', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'open_full_post_hide_author'    => array(
					'title'      => esc_html__( 'Hide author bio', 'kratz' ),
					'desc'       => wp_kses_data( __( "Hide author bio after post content when open the full version of the post directly in the blog feed.", 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'open_full_post_in_blog' => array( 1 ),
					),
					'std'        => 1,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'open_full_post_hide_related'   => array(
					'title'      => esc_html__( 'Hide related posts', 'kratz' ),
					'desc'       => wp_kses_data( __( "Hide related posts after post content when open the full version of the post directly in the blog feed.", 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'open_full_post_in_blog' => array( 1 ),
					),
					'std'        => 1,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => kratz_get_list_header_footer_types( true ),
					'type'     => KRATZ_THEME_FREE || ! kratz_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'kratz' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'kratz' ), 'kratz_kses_content' ),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_blog'        => array(
					'title'    => esc_html__( 'Header fullheight', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => kratz_get_list_checkbox_values( true ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_blog'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'kratz' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => kratz_get_list_checkbox_values( true ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'kratz' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'kratz' ),
					'type'    => 'switch',
				),
				'sidebar_position_ss_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'kratz' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'kratz' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'kratz' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'kratz' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'kratz' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => kratz_get_list_checkbox_values( true ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_widgets_info'             => array(
					'title' => esc_html__( 'Additional widgets', 'kratz' ),
					'desc'  => '',
					'type'  => KRATZ_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the top of the page', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'kratz' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content_blog'    => array(
					'title'   => esc_html__( 'Widgets above the content', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'kratz' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content_blog'    => array(
					'title'   => esc_html__( 'Widgets below the content', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'kratz' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the bottom of the page', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'kratz' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'kratz' ),
					'desc'  => wp_kses_data( __( "Select or upload an image used as placeholder for posts without a featured image. Placeholder is used on the blog stream page only (no placeholder in single post), and only in those styles of it where non-using featured image doesn't seem appropriate.", 'kratz' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'kratz' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'kratz' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'kratz' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'kratz' ),
						'columns' => esc_html__( 'Mini-cards', 'kratz' ),
					),
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'kratz' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'kratz' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=0|date=1|author=1|views=0|likes=1|comments=1|share=0|edit=0',
					'options'    => kratz_get_list_meta_parts(),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checklist',
				),


				// Blog - Single posts
				//---------------------------------------------
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'kratz' ) ),
					'type'  => 'section',
				),

				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_single'            => array(
					'title'    => esc_html__( 'Header style', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => kratz_get_list_header_footer_types( true ),
					'type'     => KRATZ_THEME_FREE || ! kratz_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_single'           => array(
					'title'      => esc_html__( 'Select custom layout', 'kratz' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'kratz' ), 'kratz_kses_content' ),
					'dependency' => array(
						'header_type_single' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_single'        => array(
					'title'    => esc_html__( 'Header position', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_single'      => array(
					'title'    => esc_html__( 'Header fullheight', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'kratz' ) ),
					'std'      => 'inherit',
					'options'  => kratz_get_list_checkbox_values( true ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_single'            => array(
					'title'      => esc_html__( 'Header fullwidth', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'kratz' ) ),
					'dependency' => array(
						'header_type_single' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => kratz_get_list_checkbox_values( true ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'kratz' ) ),
					'std'     => 'right',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'options' => array(),
					'type'    => 'switch',
				),
				'sidebar_position_ss_single'=> array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the single posts on the small screen - above or below the content', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kratz' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_single'           => array(
					'title'   => esc_html__( 'Expand content', 'kratz' ),
					'desc'    => wp_kses_data( __( 'Expand the content width on the single posts if the sidebar is hidden', 'kratz' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => kratz_get_list_checkbox_values( true ),
					'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_title_info'      => array(
					'title' => esc_html__( 'Featured image and title', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'kratz' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'kratz' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'kratz' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'boxed',
					'options'    => array(
						'fullwidth'   => esc_html__( 'Fullwidth', 'kratz' ),
						'boxed'       => esc_html__( 'Boxed', 'kratz' ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'kratz' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 )
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'kratz' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'kratz' ),
						'on_thumb'   => esc_html__( 'On the post thumbnail', 'kratz' ),
						'default'    => esc_html__( 'Default', 'kratz' ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'kratz' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'kratz'),
						'tl' => esc_html__('Top Left', 'kratz'),
						'tc' => esc_html__('Top Center', 'kratz'),
						'tr' => esc_html__('Top Right', 'kratz'),
						'ml' => esc_html__('Middle Left', 'kratz'),
						'mc' => esc_html__('Middle Center', 'kratz'),
						'mr' => esc_html__('Middle Right', 'kratz'),
						'bl' => esc_html__('Bottom Left', 'kratz'),
						'bc' => esc_html__('Bottom Center', 'kratz'),
						'br' => esc_html__('Bottom Right', 'kratz'),
						'bs' => esc_html__('Bottom Stick Out', 'kratz'),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'kratz' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'kratz' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'kratz' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_single'             => array(
					'title'      => esc_html__( 'Post meta', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'kratz' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'kratz' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=0|date=1|author=1|comments=1|likes=1|views=0|share=0|edit=0',
					'options'    => kratz_get_list_meta_parts(),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'kratz' ) ),
					'std'   => 1,
					'type'  => ! kratz_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'kratz' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'kratz' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'kratz' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'classic',
					'options'    => array(
						'modern'  => esc_html__( 'Modern', 'kratz' ),
						'classic' => esc_html__( 'Classic', 'kratz' ),
						'wide'    => esc_html__( 'Wide', 'kratz' ),
						'list'    => esc_html__( 'List', 'kratz' ),
						'short'   => esc_html__( 'Short', 'kratz' ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'inside'        => esc_html__( 'Inside the content (fullwidth)', 'kratz' ),
						'inside_left'   => esc_html__( 'At left side of the content', 'kratz' ),
						'inside_right'  => esc_html__( 'At right side of the content', 'kratz' ),
						'below_content' => esc_html__( 'After the content', 'kratz' ),
						'below_page'    => esc_html__( 'After the content & sidebar', 'kratz' ),
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'related_position_inside'       => array(
					'title'      => esc_html__( 'Before # paragraph', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Before what paragraph should related posts appear? If 0 - randomly.', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'inside_left', 'inside_right' ),
					),
					'std'        => 2,
					'options'    => kratz_get_list_range( 0, 9 ),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'kratz' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'min'        => 1,
					'max'        => 9,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'slider',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'kratz' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page?', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'below_content', 'below_page' ),
					),
					'std'        => 2,
					'options'    => kratz_get_list_range( 1, 6 ),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'kratz'),
						'side'    => esc_html__('Side', 'kratz'),
						'outside' => esc_html__('Outside', 'kratz'),
						'top'     => esc_html__('Top', 'kratz'),
						'bottom'  => esc_html__('Bottom', 'kratz')
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'kratz'),
						'bottom'  => esc_html__('Bottom', 'kratz')
					),
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'kratz' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kratz' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'text',
				),
				'posts_navigation_info'      => array(
					'title' => esc_html__( 'Posts navigation', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'posts_navigation'           => array(
					'title'   => esc_html__( 'Show posts navigation', 'kratz' ),
					'desc'    => wp_kses_data( __( "Show posts navigation on the single post's pages", 'kratz' ) ),
					'std'     => 'links',
					'options' => array(
						'none'   => esc_html__('None', 'kratz'),
						'links'  => esc_html__('Prev/Next links', 'kratz'),
						'scroll' => esc_html__('Infinite scroll', 'kratz')
					),
					'type'    => KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'posts_navigation_fixed'     => array(
					'title'      => esc_html__( 'Fixed posts navigation', 'kratz' ),
					'desc'       => wp_kses_data( __( "Make posts navigation fixed position. Display it when the content of the article is inside the window.", 'kratz' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'links' ),
					),
					'std'        => 0,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_navigation_scroll_hide_author'  => array(
					'title'      => esc_html__( 'Hide author bio', 'kratz' ),
					'desc'       => wp_kses_data( __( "Hide author bio after post content when infinite scroll is used.", 'kratz' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 0,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_navigation_scroll_hide_related'  => array(
					'title'      => esc_html__( 'Hide related posts', 'kratz' ),
					'desc'       => wp_kses_data( __( "Hide related posts after post content when infinite scroll is used.", 'kratz' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 0,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_navigation_scroll_hide_comments' => array(
					'title'      => esc_html__( 'Hide comments', 'kratz' ),
					'desc'       => wp_kses_data( __( "Hide comments after post content when infinite scroll is used.", 'kratz' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 1,
					'type'       => KRATZ_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'posts_banners_info'      => array(
					'title' => esc_html__( 'Posts banners', 'kratz' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_banner_link'     => array(
					'title' => esc_html__( 'Header banner link', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'header_banner_img'     => array(
					'title' => esc_html__( 'Header banner image', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'header_banner_height'  => array(
					'title' => esc_html__( 'Header banner height', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Specify minimal height of the banner (in "px" or "em"). For example: 15em', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'type'       => 'text',
				),
				'header_banner_code'     => array(
					'title'      => esc_html__( 'Header banner code', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'footer_banner_link'     => array(
					'title' => esc_html__( 'Footer banner link', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'footer_banner_img'     => array(
					'title' => esc_html__( 'Footer banner image', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'footer_banner_height'  => array(
					'title' => esc_html__( 'Footer banner height', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Specify minimal height of the banner (in "px" or "em"). For example: 15em', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'type'       => 'text',
				),
				'footer_banner_code'     => array(
					'title'      => esc_html__( 'Footer banner code', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'sidebar_banner_link'     => array(
					'title' => esc_html__( 'Sidebar banner link', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'sidebar_banner_img'     => array(
					'title' => esc_html__( 'Sidebar banner image', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'sidebar_banner_code'     => array(
					'title'      => esc_html__( 'Sidebar banner code', 'kratz' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'background_banner_link'     => array(
					'title' => esc_html__( "Post's background banner link", 'kratz' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'   => '',
					'type'  => 'text',
				),
				'background_banner_img'     => array(
					'title' => esc_html__( "Post's background banner image", 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'background_banner_code'     => array(
					'title'      => esc_html__( "Post's background banner code", 'kratz' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'kratz' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'kratz' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'textarea',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),



				// 'Colors'
				//---------------------------------------------
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'kratz' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'kratz' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'kratz' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'kratz' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kratz' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'kratz' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kratz' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'menu_scheme'                   => array(
					'title'    => esc_html__( 'Sidemenu Color Scheme', 'kratz' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kratz' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes || KRATZ_THEME_FREE ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'kratz' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kratz' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'kratz' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kratz' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'kratz' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'kratz' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'kratz' ),
					'desc'        => '',
					'std'         => '$kratz_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);



		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			//---------------------------------------------
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'kratz' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'kratz' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'kratz' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'kratz' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'kratz' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'kratz' ) ),
				'class'   => 'kratz_column-1_3 kratz_new_row',
				'refresh' => false,
				'std'     => '$kratz_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= kratz_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( kratz_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'kratz' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'kratz' ),
				'desc'    => '',
				'class'   => 'kratz_column-1_3 kratz_new_row',
				'refresh' => false,
				'std'     => '$kratz_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'kratz' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'kratz' ) )
							: '',
				'class'   => 'kratz_column-1_3',
				'refresh' => false,
				'std'     => '$kratz_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'kratz' ),
					'serif'      => esc_html__( 'serif', 'kratz' ),
					'sans-serif' => esc_html__( 'sans-serif', 'kratz' ),
					'monospace'  => esc_html__( 'monospace', 'kratz' ),
					'cursive'    => esc_html__( 'cursive', 'kratz' ),
					'fantasy'    => esc_html__( 'fantasy', 'kratz' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'kratz' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'kratz' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'kratz' ) )
							: '',
				'class'   => 'kratz_column-1_3',
				'refresh' => false,
				'std'     => '$kratz_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = kratz_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'kratz' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses( sprintf( __( 'Font settings of the "%s" tag.', 'kratz' ), $tag ), 'kratz_kses_content' ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				// Skip property 'text-decoration' for the main text
				if ( 'text-decoration' == $css_prop && 'p' == $tag ) {
					continue;
				}

				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'kratz' ),
						'100'     => esc_html__( '100 (Light)', 'kratz' ),
						'200'     => esc_html__( '200 (Light)', 'kratz' ),
						'300'     => esc_html__( '300 (Thin)', 'kratz' ),
						'400'     => esc_html__( '400 (Normal)', 'kratz' ),
						'500'     => esc_html__( '500 (Semibold)', 'kratz' ),
						'600'     => esc_html__( '600 (Semibold)', 'kratz' ),
						'700'     => esc_html__( '700 (Bold)', 'kratz' ),
						'800'     => esc_html__( '800 (Black)', 'kratz' ),
						'900'     => esc_html__( '900 (Black)', 'kratz' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'kratz' ),
						'normal'  => esc_html__( 'Normal', 'kratz' ),
						'italic'  => esc_html__( 'Italic', 'kratz' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'kratz' ),
						'none'         => esc_html__( 'None', 'kratz' ),
						'underline'    => esc_html__( 'Underline', 'kratz' ),
						'overline'     => esc_html__( 'Overline', 'kratz' ),
						'line-through' => esc_html__( 'Line-through', 'kratz' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'kratz' ),
						'none'       => esc_html__( 'None', 'kratz' ),
						'uppercase'  => esc_html__( 'Uppercase', 'kratz' ),
						'lowercase'  => esc_html__( 'Lowercase', 'kratz' ),
						'capitalize' => esc_html__( 'Capitalize', 'kratz' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'kratz_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$kratz_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		kratz_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			kratz_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'kratz' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'kratz' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! kratz_check_url( 'customize.php' ) ) {
			kratz_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'kratz' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'kratz' ) ),
					'class'    => 'kratz_column-1_2 kratz_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'kratz' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'kratz_options_get_list_cpt_options' ) ) {
	function kratz_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"content_info_{$cpt}"           => array(
				'title' => esc_html__( 'Content', 'kratz' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"body_style_{$cpt}"             => array(
				'title'    => esc_html__( 'Body style', 'kratz' ),
				'desc'     => wp_kses_data( __( 'Select width of the body content', 'kratz' ) ),
				'std'      => 'inherit',
				'options'  => kratz_get_list_body_styles( true ),
				'type'     => 'select',
			),
			"boxed_bg_image_{$cpt}"         => array(
				'title'      => esc_html__( 'Boxed bg image', 'kratz' ),
				'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'kratz' ) ),
				'dependency' => array(
					"body_style_{$cpt}" => array( 'boxed' ),
				),
				'std'        => 'inherit',
				'type'       => 'image',
			),
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'kratz' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
				'std'     => 'inherit',
				'options' => kratz_get_list_header_footer_types( true ),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'kratz' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'kratz' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'kratz' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'kratz' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'kratz' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'kratz' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'kratz' ),
					1         => esc_html__( 'Yes', 'kratz' ),
					0         => esc_html__( 'No', 'kratz' ),
				),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_widgets_{$cpt}"         => array(
				'title'   => esc_html__( 'Header widgets', 'kratz' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select set of widgets to show in the header on the %s pages', 'kratz' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'select',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'kratz' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the %s list', 'kratz' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s list', 'kratz' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_{$cpt}"=> array(
				'title'    => sprintf( __( 'Sidebar position on the %s list on the small screen', 'kratz' ), $title ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'kratz' ) ),
				'std'      => 'below',
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the %s list', 'kratz' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( esc_html__( 'Select sidebar to show on the %s list', 'kratz' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"sidebar_position_single_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the single post', 'kratz' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the single posts of the %s', 'kratz' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_single_{$cpt}"=> array(
				'title'    => esc_html__( 'Sidebar position on the single post on the small screen', 'kratz' ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'kratz' ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'      => 'below',
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_single_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the single post', 'kratz' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select widgets to show in the sidebar on the single posts of the %s', 'kratz' ), $title ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"expand_content_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'kratz' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => kratz_get_list_checkbox_values( true ),
				'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
			),
			"expand_content_single_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content on the single post', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Expand the content width on the single post if the sidebar is hidden', 'kratz' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => kratz_get_list_checkbox_values( true ),
				'type'     => KRATZ_THEME_FREE ? 'hidden' : 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'kratz' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'kratz' ) ),
				'std'     => 'inherit',
				'options' => kratz_get_list_header_footer_types( true ),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'kratz' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'kratz' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => KRATZ_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'kratz' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'kratz' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'kratz' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'kratz' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => kratz_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'kratz' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'kratz' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

			"widgets_info_{$cpt}"           => array(
				'title' => esc_html__( 'Additional panels', 'kratz' ),
				'desc'  => '',
				'type'  => KRATZ_THEME_FREE ? 'hidden' : 'info',
			),
			"widgets_above_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the top of the page', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'kratz' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_above_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets above the content', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'kratz' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets below the content', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'kratz' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the bottom of the page', 'kratz' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'kratz' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KRATZ_THEME_FREE ? 'hidden' : 'select',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'kratz_options_get_list_choises' ) ) {
	add_filter( 'kratz_filter_options_get_list_choises', 'kratz_options_get_list_choises', 10, 2 );
	function kratz_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = kratz_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = kratz_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = kratz_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = kratz_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = kratz_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_ss' ) === 0 ) {
				$list = kratz_get_list_sidebars_positions_ss( strpos( $id, 'sidebar_position_ss_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = kratz_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = kratz_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = kratz_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = kratz_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = kratz_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = kratz_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = kratz_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = kratz_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = kratz_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = kratz_array_merge( array( 0 => esc_html__( '- Select category -', 'kratz' ) ), kratz_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = kratz_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = kratz_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = kratz_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
