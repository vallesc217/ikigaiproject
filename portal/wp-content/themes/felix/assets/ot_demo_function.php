<?php
/**
 * Theme Mode
 */
/**
 * Show Settings Pages
 */
add_filter('ot_show_pages', '__return_false');

/**
 * Show New Layout
 */
add_filter('ot_show_new_layout', '__return_false');

/*******************************************************/

/*******************************************************/
/*
 * google_fonts_api_key
 */


add_filter('ot_google_fonts_api_key','felix_ot_google_fonts_api_key');

function felix_ot_google_fonts_api_key($key) {
    return ot_get_option('google_fonts_api_key','AIzaSyBSMah19otro4eCNjhCScE1zs4MTam3udM');
}





/**
 * Initialize the custom Theme Options.
 */
add_action('init', 'felix_custom_theme_options');
/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.3.0
 */
function felix_custom_theme_options()
{
    /* OptionTree is not loaded yet, or this is not an admin request */
    if (!function_exists('ot_settings_id') || !is_admin())
        return false;
    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option(ot_settings_id(), array());
    $custom_settings = array(
        'contextual_help' => array(
            'sidebar' => ''
        ),
        'sections' => array(
            array(
                'id' => 'general',
                'title' =>  esc_html__(  'General Config', 'felix')
            ),
            array(
                'id' => 'css',
                'title' =>  esc_html__(  'Custom CSS & JS', 'felix')
            ),

            array(
                'id' => 'mask',
                'title' =>  esc_html__(  'Image mask', 'felix')
            ),
            array(
                'id' => 'google_fonts',
                'title' =>  esc_html__(  'Google Fonts', 'felix')
            ),
            array(
                'id' => 'typography',
                'title' =>  esc_html__(  'Typography', 'felix')
            ),
            array(
                'id' => 'navigation',
                'title' =>  esc_html__(  'Navigation', 'felix')
            ),

            array(
                'id' => 'sidebars_settings',
                'title' =>  esc_html__(  'Theme Sidebars Color Options', 'felix')
            ),


            array(
                'id' => 'frontheader_color',
                'title' =>  esc_html__(  'Frontpage Header Color Options', 'felix')
            ),

            array(
                'id' => 'header',
                'title' =>  esc_html__(  'Blog/Page Header Options', 'felix')
            ),
            array(
                'id' => 'header_color',
                'title' =>  esc_html__(  'Blog/Page Header Color Options', 'felix')
            ),

            array(
                'id' => 'single_header',
                'title' =>  esc_html__(  'Single Page Header Options', 'felix')
            ),
            array(
                'id' => 'archive_page',
                'title' =>  esc_html__(  'Archive Page Header Options', 'felix')
            ),
            array(
                'id' => 'error_page',
                'title' =>  esc_html__(  '404 Page Header Options', 'felix')
            ),
            array(
                'id' => 'search_page',
                'title' =>  esc_html__(  'Search Page Header Options', 'felix')
            ),
            array(
                'id' => 'breadcrubms',
                'title' =>  esc_html__(  'Blog/Page Breadcrubms Options', 'felix')
            ),

        ),
        'settings' => array(


            array(
                'id' => 'additionalcss',
                'label' =>  esc_html__(  'additional css', 'felix'),
                'desc' =>  esc_html__(  'You can add additional css ', 'felix'),
                'std' => '',
                'type' => 'css',
                'section' => 'css',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),

            array(
                'id' => 'additionaljs',
                'label' =>  esc_html__(  'additional javascript', 'felix'),
                'desc' =>  esc_html__(  'You can add additional javascript ', 'felix'),
                'std' => '',
                'type' => 'css',
                'section' => 'css',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),

            array(
                'id' => 'felix_mask',
                'label' =>  esc_html__(  'Background Black mask', 'felix'),
                'desc' => sprintf( esc_html__(  'Background Image Black mask %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'mask',
                'operator' => 'and'
            ),

            array(
                'id' => 'felix_m_c',
                'label' =>  esc_html__(  'Mask color', 'felix'),
                'desc' =>  esc_html__(  'Please select color with opacity', 'felix'),
                'type' => 'colorpicker-opacity',
                'std' => '',
                'section' => 'mask'
            ),


            /**
             * FRONTPAGE COLOR SETTINGS.
             */
            array(
                'id' => 'felix_frontpage_header_heading_color',
                'label' =>  esc_html__(  'Frontpage heading color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),
            array(
                'id' => 'felix_frontpage_header_slogan_color',
                'label' =>  esc_html__(  'Frontpage paragraph / slogan color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),
            array(
                'id' => 'felix_frontpage_header_buttonbg_color',
                'label' =>  esc_html__(  'Frontpage button background color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),
            array(
                'id' => 'felix_frontpage_header_buttonbg_hover_color',
                'label' =>  esc_html__(  'Frontpage button background hover color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),
            array(
                'id' => 'felix_frontpage_header_button_title_color',
                'label' =>  esc_html__(  'Frontpage button title color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),

            array(
                'id' => 'felix_frontpage_header_button_title_hover_color',
                'label' =>  esc_html__(  'Frontpage button title hover color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),
            array(
                'id' => 'felix_frontpage_header_video_button_background_color',
                'label' =>  esc_html__(  'Frontpage video button background color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),
            array(
                'id' => 'felix_frontpage_header_video_button_background_hover_color',
                'label' =>  esc_html__(  'Frontpage video button background hover color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'frontheader_color'
            ),


            /*** GENERAL SETTINGS. **/


            array(
                'id' => 'felix_logowidth',
                'label' =>  esc_html__(  'Logo image width', 'felix'),
                'desc' =>  esc_html__(  'Blog Pages width', 'felix'),
                'std' => '100',
                'type' => 'numeric-slider',
                'min_max_step' => '0,1000',
                'section' => 'general',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_logoheight',
                'label' =>  esc_html__(  'Logo image height', 'felix'),
                'desc' =>  esc_html__(  'Blog Pages height', 'felix'),
                'std' => '60',
                'type' => 'numeric-slider',
                'min_max_step' => '0,1000',
                'section' => 'general',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),

            /**
             * GOOGLE FONTS SETTINGS.
             */
            array(
                'id' => 'google_fonts_api_key',
                'label' => esc_html__( 'Google Fonts API key', 'felix' ),
                'desc' => 'Add Google Fonts API key https://console.developers.google.com/apis/library/webfonts.googleapis.com/',
                'type' => 'text',
                'section' => 'google_fonts',

            ),



            /**
             * GOOGLE FONTS SETTINGS.
             */
            array(
                'id' => 'body_google_fonts',
                'label' =>  esc_html__(  'Google Fonts', 'felix'),
                'desc' => 'Add Google Font and after the save settings follow these steps Dashbofelix > Appearance > Theme Options > Typography',
                'std' => '',
                'type' => 'google-fonts',
                'section' => 'google_fonts',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            /**
             * TYPOGRAPHY SETTINGS.
             */
            array(
                'id' => 'felix_tipigrof',
                'label' =>  esc_html__(  'Typography', 'felix'),
                'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'felix'),
                'std' => '',
                'type' => 'typography',
                'section' => 'typography',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_tipigrof1',
                'label' =>  esc_html__(  'Typography h1', 'felix'),
                'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'felix'),
                'std' => '',
                'type' => 'typography',
                'section' => 'typography',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_tipigrof2',
                'label' =>  esc_html__(  'Typography h2', 'felix'),
                'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'felix'),
                'std' => '',
                'type' => 'typography',
                'section' => 'typography',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_tipigrof3',
                'label' =>  esc_html__(  'Typography h3', 'felix'),
                'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'felix'),
                'std' => '',
                'type' => 'typography',
                'section' => 'typography',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_tipigrof4',
                'label' =>  esc_html__(  'Typography h4', 'felix'),
                'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'felix'),
                'std' => '',
                'type' => 'typography',
                'section' => 'typography',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_tipigrof5',
                'label' =>  esc_html__(  'Typography h5', 'felix'),
                'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'felix'),
                'std' => '',
                'type' => 'typography',
                'section' => 'typography',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_tipigrof6',
                'label' =>  esc_html__(  'Typography h6', 'felix'),
                'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'felix'),
                'std' => '',
                'type' => 'typography',
                'section' => 'typography',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            /**
             * NAVIGATION SETTINGS.
             */


            array(
                'id' => 'felix_navigationbg',
                'label' =>  esc_html__(  'Theme navigation background color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color with opacity', 'felix'),
                'type' => 'colorpicker-opacity',
                'std' => '',
                'section' => 'navigation'
            ),
            array(
                'id' => 'felix_navitem',
                'label' =>  esc_html__(  'Theme navigation menu item color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'navigation'
            ),
            array(
                'id' => 'felix_navitemhover',
                'label' =>  esc_html__(  'Theme navigation menu item hover color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'navigation'
            ),


            array(
                'id' => 'felix_sidebarwidgetgeneralcolor',
                'label' =>  esc_html__(  'Theme Sidebar widget general color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'felix_sidebarwidgettitlecolor',
                'label' =>  esc_html__(  'Theme Sidebar widget title color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'felix_sidebarlinkcolor',
                'label' =>  esc_html__(  'Theme Sidebar link title color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'felix_sidebarlinkhovercolor',
                'label' =>  esc_html__(  'Theme Sidebar link title hover color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'felix_sidebarsearchsubmittextcolor',
                'label' =>  esc_html__(  'Theme Sidebar search submit text color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'sidebars_settings'
            ),
            array(
                'id' => 'felix_sidebarsearchsubmitbgcolor',
                'label' =>  esc_html__(  'Theme Sidebar search submit color', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'sidebars_settings'
            ),

            /**
             * BLOG/PAGE HEADER SETTINGS.
             */
            array(
                'id' => 'felix_mask_c_page_header',
                'label' =>  esc_html__(  'Pages header background image visibility', 'felix'),
                'desc' => sprintf( esc_html__(  'Heading visibility %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),

            array(
                'id' => 'felix_blogheaderbgcolor',
                'label' =>  esc_html__(  'Blog Pages Header Section background color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker-opacity',
                'std' => '',
                'section' => 'header'
            ),

            array(
                'id' => 'felix_blogheaderbgheight',
                'label' =>  esc_html__(  'Blog Pages Header height', 'felix'),
                'desc' =>  esc_html__(  'Blog Pages Header height', 'felix'),
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_blogheaderpaddingtop',
                'label' =>  esc_html__(  'Header padding top', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '250',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_blogheaderpaddingbottom',
                'label' =>  esc_html__(  'Header padding bottom', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '200',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),

            /**
             * SINGLE HEADER SETTINGS.
             */


            array(
                'id' => 'felix_singleheaderbgheight',
                'label' =>  esc_html__(  'Single Pages Header height', 'felix'),
                'desc' =>  esc_html__(  'Single Pages Header height', 'felix'),
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'single_header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_singleheaderpaddingtop',
                'label' =>  esc_html__(  'Header padding top', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '250',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'single_header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_singleheaderpaddingbottom',
                'label' =>  esc_html__(  'Header padding bottom', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '200',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'single_header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_singleheadingcolor',
                'label' =>  esc_html__(  'Single Pages Heading color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'single_header'
            ),
            array(
                'id' => 'felix_singleheaderparagraphcolor',
                'label' =>  esc_html__(  'Single Pages dslogan color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'single_header'
            ),
            array(
                'id' => 'felix_single_breadcrubms_visibility',
                'label' =>  esc_html__(  'Breadcrubms visibility', 'felix'),
                'desc' => sprintf( esc_html__(  'Breadcrubms visibility %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'single_header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),


            /**
             * ARCHIVE HEADER SETTINGS.
             */

 

            array(
                'id' => 'felix_archiveheaderbgheight',
                'label' =>  esc_html__(  'Archive Pages Header height', 'felix'),
                'desc' =>  esc_html__(  'Archive Pages Header height', 'felix'),
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'archive_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_archiveheaderpaddingtop',
                'label' =>  esc_html__(  'Header padding top', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '250',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'archive_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_archiveheaderpaddingbottom',
                'label' =>  esc_html__(  'Header padding bottom', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '200',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'archive_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),


          
            array(
                'id' => 'felix_archiveheadingcolor',
                'label' =>  esc_html__(  'Archive Pages Heading color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'archive_page'
            ),
            array(
                'id' => 'felix_archiveheadingcolor_desc',
                'label' =>  esc_html__(  'Archive Pages description  color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'archive_page'
            ),


            array(
                'id' => 'felix_archive_breadcrubms_visibility',
                'label' =>  esc_html__(  'Breadcrubms visibility', 'felix'),
                'desc' => sprintf( esc_html__(  'Breadcrubms visibility %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'archive_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),


            /**
             * 404 PAGE HEADER SETTINGS.
             */
            array(
                'id' => 'felix_errorpageheadbg',
                'label' =>  esc_html__(  '404 Header Section background image', 'felix'),
                'desc' =>  esc_html__(  'You can upload your image for parallax header', 'felix'),
                'std' => '',
                'type' => 'upload',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),

            array(
                'id' => 'felix_errorheaderbgcolor',
                'label' =>  esc_html__(  '404 Pages Header Section background color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'error_page'
            ),

            array(
                'id' => 'felix_errorheaderbgheight',
                'label' =>  esc_html__(  '404 Pages Header height', 'felix'),
                'desc' =>  esc_html__(  '404 Pages Header height', 'felix'),
                'std' => '',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_errorheaderpaddingtop',
                'label' =>  esc_html__(  'Header padding top', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '250',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_errorheaderpaddingbottom',
                'label' =>  esc_html__(  'Header padding bottom', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '200',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),

            array(
                'id' => 'felix_error_heading_visibility',
                'label' =>  esc_html__(  '404 Page Heading visibility', 'felix'),
                'desc' => sprintf( esc_html__(  'error Heading visibility %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_error_heading',
                'label' =>  esc_html__(  '404 Page Heading', 'felix'),
                'desc' =>  esc_html__(  'Enter Error Heading', 'felix'),
                'std' => '404 Page',
                'type' => 'text',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'felix_error_heading_fontsize',
                'label' =>  esc_html__(  '404 Page Heading font size', 'felix'),
                'desc' =>  esc_html__(  'Enter 404 Page Heading font size', 'felix'),
                'std' => '65',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_errorheadingcolor',
                'label' =>  esc_html__(  '404 Pages Heading color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'error_page'
            ),


            array(
                'id' => 'felix_error_slogan_visibility',
                'label' =>  esc_html__(  '404 Page slogan visibility', 'felix'),
                'desc' => sprintf( esc_html__(  '404 Page slogan visibility %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_error_slogan',
                'label' =>  esc_html__(  '404 Page Slogan', 'felix'),
                'desc' =>  esc_html__(  'Enter 404 Page Slogan', 'felix'),
                'std' => 'Oops! That page can’t be found.',
                'type' => 'text',
                'section' => 'error_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'felix_errorheaderparagraphcolor',
                'label' =>  esc_html__(  '404 Pages paragraph/slogan color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'error_page'
            ),
            


            /**
             * SEARCH PAGE HEADER SETTINGS.
             */
            array(
                'id' => 'felix_searchpageheadbg',
                'label' =>  esc_html__(  'Search Header Section background image', 'felix'),
                'desc' =>  esc_html__(  'You can upload your image for parallax header', 'felix'),
                'std' => '',
                'type' => 'upload',
                'section' => 'search_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),

            array(
                'id' => 'felix_searchheaderbgcolor',
                'label' =>  esc_html__(  'Search Pages Header Section background color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'search_page'
            ),

            array(
                'id' => 'felix_searchheaderbgheight',
                'label' =>  esc_html__(  'Search Pages Header height', 'felix'),
                'desc' =>  esc_html__(  'Search Pages Header height', 'felix'),
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'search_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_searchheaderpaddingtop',
                'label' =>  esc_html__(  'Header padding top', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '250',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'search_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_searchheaderpaddingbottom',
                'label' =>  esc_html__(  'Header padding bottom', 'felix'),
                'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'felix'),
                'std' => '200',
                'type' => 'numeric-slider',
                'min_max_step' => '0,500',
                'section' => 'search_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),


            array(
                'id' => 'felix_search_heading_fontsize',
                'label' =>  esc_html__(  'Search Page Heading font size', 'felix'),
                'desc' =>  esc_html__(  'Enter Search Page Heading font size', 'felix'),
                'std' => '',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'search_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_searchheadingcolor',
                'label' =>  esc_html__(  'Search Pages Heading color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'search_page'
            ),



            array(
                'id' => 'felix_search_breadcrubms_visibility',
                'label' =>  esc_html__(  'Breadcrubms visibility', 'felix'),
                'desc' => sprintf( esc_html__(  'Breadcrubms visibility %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'search_page',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),


            /**
             * BLOG/PAGE HEADING COLOR SETTINGS.
             */
            array(
                'id' => 'felix_blogheadingcolor',
                'label' =>  esc_html__(  'Blog Pages Heading color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'header_color'
            ),
            array(
                'id' => 'felix_blogsubtitlecolor',
                'label' =>  esc_html__(  'Blog Pages  Heading Subtitle  color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'header_color'
            ),
            /**
             * BREADCRUBMS SETTINGS.
             */
            array(
                'id' => 'felix_breadcrubms',
                'label' =>  esc_html__(  'Breadcrubms visibility', 'felix'),
                'desc' => sprintf( esc_html__(  'Breadcrubms visibility %s or %s.', 'felix'), '<code>on</code>', '<code>off</code>'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'breadcrubms',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'felix_blogbreadcrubmscolor',
                'label' =>  esc_html__(  'Blog Pages Breadcrubms color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'breadcrubms'
            ),
            array(
                'id' => 'felix_blogbreadcrubmshovercolor',
                'label' =>  esc_html__(  'Blog Pages Breadcrubms hover color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'breadcrubms'
            ),
            array(
                'id' => 'felix_blogbreadcrubmscurrentcolor',
                'label' =>  esc_html__(  'Blog Pages Breadcrubms current page text color ', 'felix'),
                'desc' =>  esc_html__(  'Please select color', 'felix'),
                'type' => 'colorpicker',
                'std' => '',
                'section' => 'breadcrubms'
            ),
            array(
                'id' => 'felix_blogbreadcrubmsfontsize',
                'label' =>  esc_html__(  'Breadcrubms font size', 'felix'),
                'desc' =>  esc_html__(  'Blog/Pages Header Breadcrubms font size', 'felix'),
                'std' => '15',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100',
                'section' => 'breadcrubms',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'operator' => 'and'
            ),

        )
    );
    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters(ot_settings_id() . '_args', $custom_settings);
    /* settings are not the same update the DB */
    if ($saved_settings !== $custom_settings) {
        update_option(ot_settings_id(), $custom_settings);
    }
    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;
}