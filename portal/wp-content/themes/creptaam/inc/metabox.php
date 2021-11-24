<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register meta boxes
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (! function_exists('creptaam_register_meta_boxes')) :

	function creptaam_register_meta_boxes( $meta_boxes ) {
		/**
		 * Prefix of meta keys (optional)
		 */

		$prefix = 'creptaam_';

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format quote
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		$meta_boxes[] = array(
			'id' => 'tt-post-format-quote',
			// Meta box title - Will appear at the drag and drop handle bar. Required.
			'title' => esc_html__( 'Post Quote Settings', 'creptaam' ),
			// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
			'pages' => array( 'post'),
			// Where the meta box appear: normal (default), advanced, side. Optional.
			'context' => 'normal',
			// Order of meta box: high (default), low. Optional.
			'priority' => 'high',
			// Auto save: true, false (default). Optional.
			'autosave' => true,

			// List of meta fields
			'fields' => array(
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Qoute Text', 'creptaam' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute",
					'desc'  => esc_html__( 'Write Your Qoute Here', 'creptaam' ),
					'type'  => 'textarea',
					// Default value (optional)
					'std'   => ''
				),
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Qoute Author/Company', 'creptaam' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute_author",
					'desc'  => esc_html__( 'Write Qoute Author or Company name', 'creptaam' ),
					'type'  => 'text',
					// Default value (optional)
					'std'   => ''
				),
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Author/Company URL', 'creptaam' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute_author_url",
					'desc'  => esc_html__( 'Write Qoute Author or Company URL', 'creptaam' ),
					'type'  => 'text',
					// Default value (optional)
					'std'   => ''
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format link
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-link',
			'title' => esc_html__( 'Post Link Settings', 'creptaam' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Link text', 'creptaam' ),
					'id'    => "{$prefix}link_text",
					'desc'  => esc_html__( 'Write Your Link Text, leave blank to show only url', 'creptaam' ),
					'type'  => 'text',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Link URL*', 'creptaam' ),
					'id'    => "{$prefix}link",
					'desc'  => esc_html__( 'Write Your Link, e.g: http://yourlink.com', 'creptaam' ),
					'type'  => 'text',
					'std'   => ''
				),

				array(
					'name'     => esc_html__( 'Link title', 'creptaam' ),
					'id'       => "{$prefix}link_title",
					'desc'     => esc_html__( 'Write link title, appear as link title attribute', 'creptaam' ),
					'type'     => 'text',
					'std'      => ''
				),

				array(
					'name'     => esc_html__( 'Link target', 'creptaam' ),
					'id'       => "{$prefix}link_target",
					'type'     => 'select',
					'options'  => array(
						'_self' => esc_html__( 'Self', 'creptaam' ),
						'_blank' => esc_html__( 'New Window', 'creptaam' )
					),
					'std'         => 'self'
				)
			)
		);

		
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format audio
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-audio',
			'title' => esc_html__( 'Post Audio Settings', 'creptaam' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Featured Audio (.mp3)', 'creptaam' ),
					'id'    => "{$prefix}featured_mp3",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.mp3', 'creptaam' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Audio (.ogg)', 'creptaam' ),
					'id'    => "{$prefix}featured_ogg",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.ogg', 'creptaam' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Audio (.wav)', 'creptaam' ),
					'id'    => "{$prefix}featured_wav",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.wav', 'creptaam' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Embed Audio', 'creptaam' ),
					'id'    => "{$prefix}embed_audio",
					'desc'  => esc_html__( 'Input URL for sounds, audios from Youtube, Soundcloud and all supported sites by WordPress, Supported list: http://codex.wordpress.org/Embeds', 'creptaam' ),
					'type'  => 'oembed',
					'std'   => ''
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format video
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-overlay-color',
			'title' => esc_html__( 'Post Overlay Color Settings', 'creptaam' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'        => esc_html__( 'Select thumbnail overlay color', 'creptaam' ),
					'id'          => "{$prefix}overlay_class",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'default' => esc_html__( 'Default', 'creptaam' ),
						'overlay-one' => esc_html__( 'Overlay One', 'creptaam' ),
						'overlay-two' => esc_html__( 'Overlay Two', 'creptaam' ),
						'overlay-three' => esc_html__( 'Overlay Three', 'creptaam' ),
						'overlay-four' => esc_html__( 'Overlay Four', 'creptaam' ),
						'overlay-five' => esc_html__( 'Overlay Five', 'creptaam' ),
						'overlay-six' => esc_html__( 'Overlay Six', 'creptaam' ),
						'overlay-seven' => esc_html__( 'Overlay Seven', 'creptaam' ),
						'overlay-eight' => esc_html__( 'Overlay Eight', 'creptaam' ),
						'overlay-nine' => esc_html__( 'Overlay Nine', 'creptaam' ),
						'overlay-ten' => esc_html__( 'Overlay Ten', 'creptaam' ),
						'overlay-eleven' => esc_html__( 'Overlay Eleven', 'creptaam' ),
						'overlay-twelve' => esc_html__( 'Overlay Twelve', 'creptaam' ),
						'overlay-thirteen' => esc_html__( 'Overlay Thirteen', 'creptaam' ),
						'overlay-fourteen' => esc_html__( 'Overlay Fourteen', 'creptaam' ),
						'overlay-fifteen' => esc_html__( 'Overlay Fifteen', 'creptaam' ),
						'no-overlay' => esc_html__( 'None', 'creptaam' )
					),
					// Default selected value
					'std'         => 'default',
					// Placeholder
					'placeholder' => esc_html__( 'Select an overlay color', 'creptaam' ),
				)
			)
		);

		$meta_boxes[] = array(
			'id' => 'tt-post-format-video',
			'title' => esc_html__( 'Post Video Settings', 'creptaam' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Featured Video (.mp4)', 'creptaam' ),
					'id'    => "{$prefix}featured_mp4",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.mp4', 'creptaam' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Video (.webm)', 'creptaam' ),
					'id'    => "{$prefix}featured_webm",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.webm', 'creptaam' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Video (.ogv)', 'creptaam' ),
					'id'    => "{$prefix}featured_ogv",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.ogv', 'creptaam' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Embed Video', 'creptaam' ),
					'id'    => "{$prefix}embed_video",
					'desc'  => esc_html__( 'Input URL for video, vides from youtube, vimeo and all supported sites by WordPress, Supported list: http://codex.wordpress.org/Embeds', 'creptaam' ),
					'type'  => 'oembed',
					'std'   => ''
				)

			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format gallery
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-gallery',
			'title' => esc_html__( 'Post Gallery Settings', 'creptaam' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'             => esc_html__( 'Upload image from media library', 'creptaam' ),
					'id'               => "{$prefix}post_gallery",
					'type'             => 'image_advanced',
					'max_file_uploads' => 6,
				)			
			)
		);
		

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for page logo
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-logo-settings',
			'title' => esc_html__( 'Page Logo Settings', 'creptaam' ),
			'pages' => array( 'page'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(

				// logo
				array(
					'name'             => esc_html__( 'Page Logo', 'creptaam' ),
					'id'               => "{$prefix}page_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'creptaam' ),
				),

				// logo sticky
				array(
					'name'             => esc_html__( 'Page sticky Logo ', 'creptaam' ),
					'id'               => "{$prefix}page_sticky_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'creptaam' ),
				),

				// mobile logo
				array(
					'name'             => esc_html__( 'Page Mobile Logo', 'creptaam' ),
					'id'               => "{$prefix}page_mobile_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'creptaam' ),
				),

				// mobile logo
				array(
					'name'             => esc_html__( 'Page Mobile Sticky Logo', 'creptaam' ),
					'id'               => "{$prefix}page_mobile_sticky_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'This logo option only for this page, dimension: 210px &times; 50px', 'creptaam' ),
				)
			)
		);
		

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for page header
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-meta-settings',
			'title' => esc_html__( 'Page Settings', 'creptaam' ),
			'pages' => array( 'page', 'product', 'tt-service'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(

				// header visibility option
				array(
					'name'        => esc_html__( 'Enable/Disable Page Header', 'creptaam' ),
					'id'          => "{$prefix}page_header_visibility",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'header-inherite-option' => esc_html__( 'Inherit from theme option', 'creptaam' ),
						'header-section-show' => esc_html__( 'Header Section Show', 'creptaam' ),
						'header-section-hide' => esc_html__( 'Header Section Hide', 'creptaam' )
					),
					// Default selected value
					'std'         => 'header-inherite-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select header visibility option', 'creptaam' )
				),

				array(
					'name'             => esc_html__( 'Subtitle', 'creptaam' ),
					'id'               => "{$prefix}page_subtitle",
					'type'             => 'text',
					'desc'  		   => esc_html__( 'Enter page subtitle', 'creptaam' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider_1', 'creptaam' ),
					'id'               => "{$prefix}breadcumb_divider_one",
					'type'             => 'divider'
				),

				// Section padding
				array(
					'name'             => esc_html__( 'Padding top', 'creptaam' ),
					'id'               => "{$prefix}header_padding_top",
					'type'             => 'text',
					'desc'  		   => esc_html__( 'Enter page header section top padding in px', 'creptaam' ),
				),

				array(
					'name'             => esc_html__( 'Padding bottom', 'creptaam' ),
					'id'               => "{$prefix}header_padding_bottom",
					'type'             => 'text',
					'desc'  => esc_html__( 'Enter page header section bottom padding in px', 'creptaam' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider_2', 'creptaam' ),
					'id'               => "{$prefix}breadcumb_divider_two",
					'type'             => 'divider'
				),

				// Background image
				array(
					'name'             => esc_html__( 'Background image', 'creptaam' ),
					'id'               => "{$prefix}page_header_image",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'Upload background image, dimension: 1920px x 450px', 'creptaam' ),
				),

				// Background overlay option
				array(
					'name'             	=> esc_html__( 'Background overlay color', 'creptaam' ),
					'id'               	=> "{$prefix}background_overlay",
					'type'             	=> 'select_advanced',
					'options'     		=> array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'creptaam' ),
	                    'header-overlay-color' => esc_html__( 'Theme Default Overlay', 'creptaam' ),
	                    'violet-overlay' => esc_html__( 'Violet Overlay', 'creptaam' ),
	                    'orange-overlay' => esc_html__( 'Orange Overlay', 'creptaam' ),
	                    'pink-overlay' => esc_html__( 'Pink Overlay', 'creptaam' ),
	                    'blue-overlay' => esc_html__( 'Blue Overlay', 'creptaam' ),
	                    'purple-overlay' => esc_html__( 'Purple Overlay', 'creptaam' ),
	                    'red-overlay' => esc_html__( 'Red Overlay', 'creptaam' )
					),
					'std'				=> 'inherit-theme-option',
					'desc'  => esc_html__( 'Select background overlay option', 'creptaam' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider_4', 'creptaam' ),
					'id'               => "{$prefix}breadcumb_divider_four",
					'type'             => 'divider'
				),

				// Hide breadcrumb
				array(
					'name'             	=> esc_html__( 'Show/hide breadcrumb', 'creptaam' ),
					'id'               	=> "{$prefix}page_breadcrumb_show",
					'type'             	=> 'radio',
					'options'     		=> array(
						'page_breadcrumb_show' => esc_html__( 'Show', 'creptaam' ),
						'page_breadcrumb_hide' => esc_html__( 'Hide', 'creptaam' )
					),
					'std'				=> 'page_breadcrumb_show',
					'desc'  => esc_html__( 'Select breadcrumb show/hide option', 'creptaam' ),
				),

				// Divider
				array(
					'name'             => esc_html__( 'Divider_5', 'creptaam' ),
					'id'               => "{$prefix}breadcumb_divider_five",
					'type'             => 'divider'
				),

				// Page Header Margin Bottom
				array(
					'name'             => esc_html__( 'Page Header Margin Bottom', 'creptaam' ),
					'id'               => "{$prefix}page_header_margin_bottom",
					'type'             => 'text',
					'desc'  => esc_html__( 'Enter margin bottom value in px', 'creptaam' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for header style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-header-style',
			'title' => esc_html__( 'Page Header Styles', 'creptaam' ),
			'pages' => array( 'page', 'product'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Header style', 'creptaam' ),
					'id'          => "{$prefix}header_style",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'creptaam' ),
						'header-default' => esc_html__( 'Header Default', 'creptaam' ),
						'header-transparent' => esc_html__( 'Header Transparent', 'creptaam' ),
						'no-header' => esc_html__( 'No Header', 'creptaam' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select header style', 'creptaam' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for header topbar
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-header-topbar',
			'title' => esc_html__( 'Header Topbar', 'creptaam' ),
			'pages' => array( 'page' ),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Topbar style', 'creptaam' ),
					'id'          => "{$prefix}topbar_style",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'creptaam' ),
						'topbar-one' => esc_html__( 'Topbar one', 'creptaam' ),
						'topbar-two' => esc_html__( 'Topbar two', 'creptaam' ),
						'topbar-three' => esc_html__( 'Topbar three', 'creptaam' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select header topbar style', 'creptaam' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for header style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-menu-position',
			'title' => esc_html__( 'Menu Position', 'creptaam' ),
			'pages' => array( 'page', 'product'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Menu Position', 'creptaam' ),
					'id'          => "{$prefix}menu_position",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'creptaam' ),
						'navbar-left' => esc_html__( 'Navbar Left', 'creptaam' ),
						'navbar-center' => esc_html__( 'Navbar Center', 'creptaam' ),
						'navbar-right' => esc_html__( 'Navbar Right', 'creptaam' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select menu position', 'creptaam' ),
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for footer style
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-footer-style',
			'title' => esc_html__( 'Page Footer Styles', 'creptaam' ),
			'pages' => array( 'page', 'product'),
			'context' => 'side',
			'priority' => 'low',
			'fields' => array(
				array(
					'name'        => esc_html__( 'Footer style', 'creptaam' ),
					'id'          => "{$prefix}footer_style",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'inherit-theme-option' => esc_html__( 'Inherit from theme option', 'creptaam' ),
						'footer-default' => esc_html__( 'Footer Default', 'creptaam' ),
						'footer-three-column' => esc_html__( 'Footer Three Column', 'creptaam' ),
						'footer-single-column' => esc_html__( 'Footer Single Column', 'creptaam' ),
						'no-footer' => esc_html__( 'No Footer', 'creptaam' )
					),
					// Default selected value
					'std'         => 'inherit-theme-option',
					// Placeholder
					'placeholder' => esc_html__( 'Select footer style', 'creptaam' ),
					'desc'     => esc_html__( 'This settings apply only for this page', 'creptaam' )
				)
			)
		);

		return $meta_boxes;
	}

	add_filter( 'rwmb_meta_boxes', 'creptaam_register_meta_boxes' );

endif;