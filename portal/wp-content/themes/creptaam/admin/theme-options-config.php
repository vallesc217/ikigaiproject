<?php

    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // ReduxFramework  Config File
    // For full documentation, please visit: https://docs.reduxframework.com
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // This is your option name where all the Redux data is stored.
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    $opt_name = "creptaam_theme_option";


    /**
     * SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => TRUE,
        // Show the sections below the admin menu item or not
        'menu_title'           => sprintf( esc_html__( '%s Options', 'creptaam' ), $theme->get( 'Name' ) ),
        'page_title'           => sprintf( esc_html__( '%s Theme Options', 'creptaam' ), $theme->get( 'Name' ) ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => FALSE,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => TRUE,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => TRUE,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => FALSE,
        // Show the time the page took to load, etc
        'update_notice'        => TRUE,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => TRUE,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => '40',
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => TRUE,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => FALSE,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => TRUE,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => TRUE,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => TRUE,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'        => sprintf( esc_html__( '%s Theme Options', 'creptaam' ), $theme->get( 'Name' ) ),
        // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => TRUE,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => TRUE,
                'rounded' => FALSE,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // START SECTIONS
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    // General Settings
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-cogs',
        'title'  => esc_html__('General Settings', 'creptaam'),
        'fields' => array(
            array(
                'id'       => 'tt-breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__('Breadcrumb', 'creptaam'),
                'subtitle' => esc_html__('Show or Hide Your website Breadcrumb', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'rtl',
                'type'     => 'switch',
                'title'    => esc_html__('RTL', 'creptaam'),
                'subtitle' => esc_html__('Enable or Disabled RTL', 'creptaam'),
                'on'       => esc_html__('Enable', 'creptaam'),
                'off'      => esc_html__('Disabled', 'creptaam'),
                'default'  => FALSE,
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Logo settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-slideshare',
        'title'  => esc_html__('Logo Settings', 'creptaam'),
        'fields' => array(
            array(
                'id'       => 'logo-type',
                'type'     => 'switch',
                'title'    => esc_html__('Logo Type', 'creptaam'),
                'subtitle' => esc_html__('You can set text or image logo', 'creptaam'),
                'on'       => esc_html__('Image Logo', 'creptaam'),
                'off'      => esc_html__('Text Logo', 'creptaam'),
                'default'  => TRUE,
            ),
            array(
                'id'       => 'text-logo',
                'type'     => 'text',
                'required' => array('logo-type', '=', '0'),
                'title'    => esc_html__('Logo Text', 'creptaam'),
                'subtitle' => esc_html__('Change your logo text', 'creptaam')
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Logo.', 'creptaam'),
                'subtitle' => esc_html__('Change Site logo dimension: 210px &times; 50px', 'creptaam')
            ),
            array(
                'id'       => 'mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Mobile Logo.', 'creptaam'),
                'subtitle' => esc_html__('Change site mobile logo dimension: 210px &times; 50px', 'creptaam')
            ),
            array(
                'id'       => 'sticky-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Sticky Logo.', 'creptaam'),
                'subtitle' => esc_html__('Change site sticky logo dimension: 210px &times; 50px', 'creptaam')
            ),
            array(
                'id'       => 'sticky-mobile-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('logo-type', '=', '1'),
                'title'    => esc_html__('Site Sticky Mobile Logo.', 'creptaam'),
                'subtitle' => esc_html__('Change site sticky mobile logo dimension: 210px &times; 50px', 'creptaam')
            ),
            array(
                'id'             => 'logo-margin',
                'type'           => 'spacing',
                'output'         => array('.navbar-brand'),
                'mode'           => 'margin',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Logo Margin Option', 'creptaam'),
                'subtitle'       => esc_html__('You can change logo margin if needed.', 'creptaam'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'creptaam')
            )
        )
    ));

    // Header settings
    Redux::setSection( $opt_name, array(
        'icon'   => 'el el-website',
        'title'  => esc_html__( 'Header Settings', 'creptaam' ),
        'fields' => array(
            array(
                'id'       => 'header-style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Header styles', 'creptaam' ),
                'subtitle' => esc_html__( 'Select Header Style.', 'creptaam' ),
                'options'  => array(
                    'header-default'   => array(
                        'alt' => esc_html__('Header Default', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/header-default.jpg'
                    ),
                    'header-transparent'   => array(
                        'alt' => esc_html__('Header Transparent', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/header-transparent.jpg'
                    ),
                    'no-header'   => array(
                        'alt' => esc_html__('No Header', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/no-header.jpg'
                    )
                ),
                'default'  => 'header-default'
            ),

            array(
                'id'       => 'menu-position',
                'type'     => 'select',
                'title'    => esc_html__('Menu Position', 'creptaam'),
                'options'  => array(
                    'navbar-left' => esc_html__('Navbar Left', 'creptaam'),
                    'navbar-center' => esc_html__('Navbar Center', 'creptaam'),
                    'navbar-right' => esc_html__('Navbar Right', 'creptaam')
                ),
                'desc'     => esc_html__('Select menu position', 'creptaam'),
                'default'  => 'navbar-center'
            ),

            array(
                'id'             => 'navbar-margin',
                'type'           => 'spacing',
                'output'         => array('.main-menu-wrapper'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Main menu margin option', 'creptaam'),
                'subtitle'       => esc_html__('You can change main menu margin if needed.', 'creptaam'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'creptaam')
            ),

            array(
                'id'             => 'navbar-height',
                'type'           => 'spacing',
                'output'         => array('.navbar'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'title'          => esc_html__('Navbar Padding Option', 'creptaam'),
                'subtitle'       => esc_html__('You can change navbar padding if needed.', 'creptaam'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'creptaam')
            ),

            // menu background color
            array(
                'id'       => 'menu-bg-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu background color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for menu background.', 'creptaam' )
            ),

            // menu color
            array(
                'id'       => 'menu-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu font color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for menu.', 'creptaam' )
            ),

            // menu hover color
            array(
                'id'       => 'menu-hover-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu hover font color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for menu hover.', 'creptaam' )
            ),

            // mobile menu background color
            array(
                'id'       => 'mobile-menu-bg-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Mobile menu background color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for mobile menu background.', 'creptaam' )
            ),

            // mobile menu color
            array(
                'id'       => 'mobile-menu-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Mobile menu font color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for mobile menu.', 'creptaam' )
            ),

            // sticky menu visibility
            array(
                'id'       => 'sticky-menu-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Sticky menu visibility', 'creptaam'),
                'subtitle' => esc_html__('Visible or Hidden sticky menu', 'creptaam'),
                'on'       => esc_html__('Visible', 'creptaam'),
                'off'      => esc_html__('Hidden', 'creptaam'),
                'default'  => TRUE,
            ),

            // sticky menu background color
            array(
                'id'       => 'sticky-menu-bg-color',
                'type'     => 'color',
                'required' => array('sticky-menu-visibility', '=', '1'),
                'title'    => esc_html__( 'Sticky menu background color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for sticky menu background.', 'creptaam' )
            ),

            // sticky menu color
            array(
                'id'       => 'sticky-menu-color',
                'type'     => 'color',
                'required' => array('sticky-menu-visibility', '=', '1'),
                'title'    => esc_html__( 'Sticky menu font color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for sticky menu.', 'creptaam' )
            ),

            // sticky menu hover color
            array(
                'id'       => 'sticky-menu-hover-color',
                'type'     => 'color',
                'required' => array('sticky-menu-visibility', '=', '1'),
                'title'    => esc_html__( 'Sticky menu font hover color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for sticky menu hover.', 'creptaam' )
            )
        )
    ));

    

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Header topbar
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-website-alt',
        'title'  => esc_html__('Header Topbar', 'creptaam'),
        'subsection'       => true,
        'fields' => array(
            // header top wrapper
            array(
                'id'       => 'header-top-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Header Topbar Visibility', 'creptaam'),
                'subtitle' => esc_html__('Visible or Hidden header topbar', 'creptaam'),
                'on'       => esc_html__('Visible', 'creptaam'),
                'off'      => esc_html__('Hidden', 'creptaam'),
                'default'  => FALSE,
            ),

            array(
                'id'       => 'topbar-style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Topbar styles', 'creptaam' ),
                'required' => array('header-top-visibility', '=', '1'),
                'subtitle' => esc_html__( 'Select topbar Style.', 'creptaam' ),
                'options'  => array(
                    'topbar-one'   => array(
                        'alt' => esc_html__('Topbar One', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/topbar-one.jpg'
                    ),
                    'topbar-two'   => array(
                        'alt' => esc_html__('Topbar two', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/topbar-two.jpg'
                    ),
                    'topbar-three'   => array(
                        'alt' => esc_html__('Topbar three', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/topbar-three.jpg'
                    )
                ),
                'default'  => 'topbar-one'
            ),

            // for topbar one
            array(
                'id'       => 'app-link',
                'type'     => 'editor',
                'required' => array('topbar-style', '=', 'topbar-one'),
                'title'    => esc_html__('App Link', 'creptaam'),
                'subtitle' => esc_html__('Change header contact info', 'creptaam'),
                'default'  => wp_kses('Download the bitcoin app <span class="download-link"><a href="#">Download App</a></span>', array(
                    'span'   => array(
                        'class' => array()
                    ),
                    'i'   => array(
                        'class' => array()
                    ),
                    'a'          => array(
                        'class'  => array(),
                        'href'   => array(),
                        'title'  => array(),
                        'target' => array()
                    ),
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    'ul'     => array(),
                    'li'     => array(),
                    'p'      => array()
                ))
            ),

            array(
                'id'       => 'header-market-status',
                'type'     => 'switch',
                'required' => array('topbar-style', '=', 'topbar-one'),
                'title'    => esc_html__('Header Market Status', 'creptaam'),
                'subtitle' => esc_html__('Show or Hide market status', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'market-coin-limit',
                'type'     => 'text',
                'title'    => esc_html__('Market Coin Limit', 'creptaam'),
                'subtitle' => esc_html__('Change default coin limit', 'creptaam'),
                'required' => array('header-market-status', '=', '1'),
                'default'  => '2'
            ),

            array(
                'id'       => 'header-social-link',
                'type'     => 'switch',
                'required' => array('topbar-style', '=', 'topbar-one'),
                'title'    => esc_html__('Header soicial link', 'creptaam'),
                'subtitle' => esc_html__('Show or Hide social link', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => FALSE
            ),

            array(
                'id'       => 'header-top-bg',
                'type'     => 'color',
                'title'    => esc_html__('Topbar Background', 'creptaam'),
                'subtitle' => esc_html__('You may change header topbar background color', 'creptaam'),
                'required' => array('header-top-visibility', '=', '1'),
            ),
            //end for topbar one

            // for topbar two
            array(
                'id'       => 'market-coin-limit2',
                'type'     => 'text',
                'title'    => esc_html__('Market Coin Limit', 'creptaam'),
                'subtitle' => esc_html__('Change default coin limit', 'creptaam'),
                'required' => array('topbar-style', '=', 'topbar-two'),
                'default'  => '20'
            ),

            // for topbar three
            array(
                'id'       => 'header-market-status2',
                'type'     => 'switch',
                'required' => array('topbar-style', '=', 'topbar-three'),
                'title'    => esc_html__('Header Market Status', 'creptaam'),
                'subtitle' => esc_html__('Show or Hide market status', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE
            ),

            array(
                'id'       => 'market-coin-limit3',
                'type'     => 'text',
                'title'    => esc_html__('Market Coin Limit', 'creptaam'),
                'subtitle' => esc_html__('Change default coin limit', 'creptaam'),
                'required' => array('header-market-status2', '=', '1'),
                'default'  => '4'
            ),

            array(
                'id'       => 'header-social-link2',
                'type'     => 'switch',
                'required' => array('topbar-style', '=', 'topbar-three'),
                'title'    => esc_html__('Header soicial link', 'creptaam'),
                'subtitle' => esc_html__('Show or Hide social link', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Header search
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-search',
        'title'  => esc_html__('Header CTA / Search', 'creptaam'),
        'subsection'       => true,
        'fields' => array(
            // header search visibility
            array(
                'id'       => 'search-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Search visibility', 'creptaam'),
                'subtitle' => esc_html__('Visible or Hidden search button', 'creptaam'),
                'on'       => esc_html__('Visible', 'creptaam'),
                'off'      => esc_html__('Hidden', 'creptaam'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'search-bg-color',
                'type'     => 'background',
                'output'   => array('.top-search'),
                'title'    => esc_html__( 'Search Background color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for search background color.', 'creptaam' ),
                'required' => array('search-visibility', '=', '1'),
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-size'       => false,
                'preview'               => false
            ),

            array(
                'id'       => 'cta-btn-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('CTA button visibility', 'creptaam'),
                'subtitle' => esc_html__('Visible or Hidden CTA button', 'creptaam'),
                'on'       => esc_html__('Visible', 'creptaam'),
                'off'      => esc_html__('Hidden', 'creptaam'),
                'default'  => FALSE,
            ),

            array(
                'id'       => 'cta-btn-text',
                'type'     => 'text',
                'title'    => esc_html__('CTA Button Text', 'creptaam'),
                'subtitle' => esc_html__('Change CTA button text', 'creptaam'),
                'required' => array('cta-btn-visibility', '=', '1'),
                'default'  => wp_kses('<i class="fa fa-phone"></i> +0123 456 789', array(
                            'i'   => array(
                                'class' => array()
                            )
                        ))
            ),

            array(
                'id'       => 'cta-btn-link',
                'type'     => 'text',
                'title'    => esc_html__('CTA Button link', 'creptaam'),
                'default' => '#',
                'required' => array('cta-btn-visibility', '=', '1'),
            ),

            array(
                'id'       => 'cta-btn-bg',
                'type'     => 'background',
                'output'   => array('.cta-button a'),
                'title'    => esc_html__( 'CTA Button Background', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for cta background color.', 'creptaam' ),
                'required' => array('cta-btn-visibility', '=', '1'),
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-size'       => false,
                'preview'               => false
            )
        )
    ));



    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Page header image settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-picture',
        'title'  => esc_html__('Page Header Image', 'creptaam'),
        'fields' => array(
            array(
                'id'       => 'page-header-visibility',
                'type'     => 'select',
                'title'    => esc_html__('Page header visibility', 'creptaam'),
                'subtitle' => esc_html__('Visible or Hidden all page header section', 'creptaam'),
                'options'  => array(
                    'header-section-show' => esc_html__('Page Header Section Show', 'creptaam'),
                    'header-section-hide' => esc_html__('Page Header Section Hide', 'creptaam')
                ),
                'desc'     => esc_html__('Will show/hide background image, title and breadcrumb', 'creptaam'),
                'default'  => 'header-section-show'
            ),

            array(
                'id'             => 'header-bg-padding',
                'type'           => 'spacing',
                'output'         => array('.page-title'),
                'mode'           => 'padding',
                'units'          => 'px',
                'units_extended' => 'false',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'          => esc_html__('Header background padding option', 'creptaam'),
                'subtitle'       => esc_html__('You can change header padding if needed.', 'creptaam'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'creptaam')
            ),

            array(
                'id'             => 'header-bg-margin',
                'type'           => 'spacing',
                'output'         => array('.page-title'),
                'mode'           => 'margin',
                'units'          => 'px',
                'units_extended' => 'false',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'          => esc_html__('Header background margin option', 'creptaam'),
                'subtitle'       => esc_html__('You can change header margin if needed.', 'creptaam'),
                'desc'           => esc_html__('Change top, right, bottom and left value in px, e.g: 10', 'creptaam')
            ),

            array(
                'id'       => 'page-title-color',
                'type'     => 'color',
                'preview'  => 'true',
                'required' => array('page-header-bg-option', '=', 'header-background-image'),
                'title'    => esc_html__('Page title text color', 'creptaam'),
                'desc'     => esc_html__('Page title, subtitle and breadcrumb text color option', 'creptaam')
            ),

            
            array(
                'id'       => 'page-header-overlay-option',
                'type'     => 'select',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Page header background overlay option', 'creptaam'),
                'options'  => array(
                    'none' => esc_html__('None', 'creptaam'),
                    'header-overlay-color' => esc_html__( 'Theme Default Overlay', 'creptaam' ),
                    'violet-overlay' => esc_html__( 'Violet Overlay', 'creptaam' ),
                    'orange-overlay' => esc_html__( 'Orange Overlay', 'creptaam' ),
                    'pink-overlay' => esc_html__( 'Pink Overlay', 'creptaam' ),
                    'blue-overlay' => esc_html__( 'Blue Overlay', 'creptaam' ),
                    'purple-overlay' => esc_html__( 'Purple Overlay', 'creptaam' ),
                    'red-overlay' => esc_html__( 'Red Overlay', 'creptaam' )
                ),
                'desc'     => esc_html__('Select a header background option', 'creptaam'),
                'default'  => 'header-overlay-color'
            ),

            array(
                'id'       => 'service-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Service Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            ),
            array(
                'id'       => 'page-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Page Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            ),
            array(
                'id'       => 'blog-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Blog Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            ),
            array(
                'id'       => 'author-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Author Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            ),
            array(
                'id'       => 'category-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Category Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            ),
            array(
                'id'       => 'tag-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Tag Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            ),
            array(
                'id'       => 'search-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Search Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            ),
            array(
                'id'       => 'archive-header-image',
                'type'     => 'media',
                'preview'  => 'true',
                'required'       => array('page-header-visibility', '=', 'header-section-show'),
                'title'    => esc_html__('Archive Header Background.', 'creptaam'),
                'desc'     => esc_html__('Upload image from media library, dimension: 1920px x 250px', 'creptaam')
            )
        )
    ));

    
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Presets settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-brush',
        'title'  => esc_html__('Preset color', 'creptaam'),
        'fields' => array(
            
            array(
                'id'       => 'body-bg-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Background color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for the theme body color (default: #fff).', 'creptaam' ),
                'default'  => '#fff',
            ),

            array(
                'id'       => 'accent-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Site Accent Color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for the theme accent color (default: #ffc100).', 'creptaam' ),
                'default'  => '#ffc100',
            ),

            array(
                'id'       => 'link-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Site Link Color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for all link (default: #ffc100).', 'creptaam' ),
                'default'  => '#ffc100',
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Typography
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-font',
        'title'  => esc_html__('Typography', 'creptaam'),
        'fields' => array(
            
            // body typography
            array(
                'id'       => 'body-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'creptaam' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'creptaam' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'default'  => array(
                    'color'       => '#565656',
                    'font-size'   => '16px',
                    'font-family' => 'Open Sans',
                    'font-weight' => '400',
                    'line-height' => '30px'
                ),
            ),

            // Heading all typography
            array(
                'id'       => 'heading-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading Font', 'creptaam' ),
                'subtitle' => esc_html__( 'This settings for all heading font (h1, h2, h3, h4, h5, h6)', 'creptaam' ),
                'google'   => true,
                'all_styles' => true,
                'text-align' => false,
                'font-size' => false,
                'line-height' => false,
                'default'  => array(
                    'color'       => '#212121',
                    'font-family' => 'Josefin Sans',
                    'font-weight' => '700',
                ),
            ),

            // only H1 typography
            array(
                'id'       => 'h1-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H1 (Heading one)', 'creptaam' ),
                'subtitle' => esc_html__( 'This settings only for H1', 'creptaam' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '50px',
                    'line-height' => '65px'
                ),
            ),

            // only H2 typography
            array(
                'id'       => 'h2-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H2 (Heading two)', 'creptaam' ),
                'subtitle' => esc_html__( 'This settings only for H2', 'creptaam' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '40px',
                    'line-height' => '55px'
                ),
            ),

            // only H3 typography
            array(
                'id'       => 'h3-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H3 (Heading three)', 'creptaam' ),
                'subtitle' => esc_html__( 'This settings only for H3', 'creptaam' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '25px',
                    'line-height' => '35px'
                ),
            ),

            // only H4 typography
            array(
                'id'       => 'h4-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H4 (Heading four)', 'creptaam' ),
                'subtitle' => esc_html__( 'This settings only for H4', 'creptaam' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '20px',
                    'line-height' => '28px'
                ),
            ),

            // only H5 typography
            array(
                'id'       => 'h5-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H5 (Heading five)', 'creptaam' ),
                'subtitle' => esc_html__( 'This settings only for H5', 'creptaam' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '14px',
                    'line-height' => '22px'
                ),
            ),

            // only H6 typography
            array(
                'id'       => 'h6-typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'H6 (Heading six)', 'creptaam' ),
                'subtitle' => esc_html__( 'This settings only for H6', 'creptaam' ),
                'font-family' => false,
                'google'   => false,
                'text-align' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'font-weight' => false,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '12px',
                    'line-height' => '18px'
                )
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Blog settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Blog Settings', 'creptaam'),
        'fields' => array(

            array(
                'id'       => 'blog-title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Page Title', 'creptaam'),
                'subtitle' => esc_html__('Enter Blog page title here, if leave blank then site title will appear', 'creptaam')
            ),

            array(
                'id'       => 'blog-subtitle',
                'type'     => 'text',
                'title'    => esc_html__('Blog Page Subtitle', 'creptaam'),
                'subtitle' => esc_html__('Enter Blog page subtitle here, if leave blank then site title will appear', 'creptaam')
            ),

            array(
                'id'       => 'blog-page-search',
                'type'     => 'switch',
                'title'    => esc_html__('Blog page header search', 'creptaam'),
                'subtitle' => esc_html__('Show or Hide blog page header search', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'blog-overlay',
                'type'     => 'switch',
                'title'    => esc_html__('Blog overlay visibility', 'creptaam'),
                'subtitle' => esc_html__('Show or Hide blog overlay', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'blog-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Blog sidebar layout', 'creptaam'),
                'subtitle' => esc_html__('Select blog sidebar layout', 'creptaam'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => 'No sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'left-sidebar'  => array(
                        'alt' => 'Left sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'right-sidebar'
            ),

            array(
                'id'       => 'blog-column',
                'type'     => 'select',
                'title'    => esc_html__('Article show per row', 'creptaam'),
                'subtitle' => esc_html__('Change number of article per row', 'creptaam'),
                'desc' => esc_html__('NB. Column 3 will work when (Blog sidebar layout = No sidebar) selected.', 'creptaam'),
                'options'  => array(
                    '1' => 'Column 1',
                    '2' => 'Column 2',
                    '3' => 'Column 3'
                ),
                'default'  => '2'
            ),            

            array(
                'id'       => 'tt-post-meta',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Post meta options', 'creptaam' ),
                'subtitle' => esc_html__( 'Check to show post meta', 'creptaam' ),
                'options'  => array(
                    'post-author'       => esc_html__( 'Post Author', 'creptaam' ),
                    'post-date'         => esc_html__( 'Post Date', 'creptaam' ),
                    'post-category'     => esc_html__( 'Post Category', 'creptaam' ),
                    'post-comment'      => esc_html__( 'Post Comment', 'creptaam' ),
                    'post-view'         => esc_html__( 'Post Views', 'creptaam' ), 
                ),
                'default'  => array(
                    'post-author'  => '0',
                    'post-date' => '0',
                    'post-category'   => '1',
                    'post-comment' => '0',
                    'post-view' => '0',
                )
            ),

            array(
                'id'       => 'show-share-button',
                'type'     => 'switch',
                'title'    => esc_html__('Share button', 'creptaam'),
                'subtitle' => esc_html__('Show or hide share button', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE
            ),
            
            array(
                'id'       => 'tt-share-button',
                'type'     => 'checkbox',
                'required' => array( 'show-share-button', '=', '1' ),
                'title'    => esc_html__( 'Share button', 'creptaam' ),
                'subtitle' => esc_html__( 'Check to show share button', 'creptaam' ),
                'options'  => array(
                    'facebook' => esc_html__( 'Facebook', 'creptaam' ),
                    'twitter'  => esc_html__( 'Twitter', 'creptaam' ),
                    'google'   => esc_html__( 'Google+', 'creptaam' ),
                    'linkedin' => esc_html__( 'Linkedin', 'creptaam' )
                ),
                'default'  => array(
                    'facebook' => '1',
                    'twitter'  => '1',
                    'google'   => '1',
                    'linkedin' => '1'
                )
            ),

            array(
                'id'       => 'blog-page-nav',
                'type'     => 'switch',
                'title'    => esc_html__('Blog Pagination or Navigation', 'creptaam'),
                'subtitle' => esc_html__('Blog pagination style, posts pagination or newer / older posts', 'creptaam'),
                'on'       => esc_html__('Pagination', 'creptaam'),
                'off'      => esc_html__('Navigation', 'creptaam'),
                'default'  => TRUE
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Page settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-file-edit',
        'title'  => esc_html__('Page Settings', 'creptaam'),
        'fields' => array(

            array(
                'id'       => 'page-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__('Page Sidebar', 'creptaam'),
                'subtitle' => esc_html__('Select page sidebar', 'creptaam'),
                'options'  => array(
                    'no-sidebar'    => array(
                        'alt' => 'No sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'left-sidebar'  => array(
                        'alt' => 'Left sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right sidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'right-sidebar'
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Shop settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    if (class_exists('WooCommerce')) :
        Redux::setSection( $opt_name, array(
            'icon'   => 'el-icon-shopping-cart',
            'title'  => esc_html__('Shop Settings', 'creptaam'),
            'fields' => array(

                array(
                    'id'       => 'shop-sidebar',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Shop Sidebar', 'creptaam'),
                    'subtitle' => esc_html__('Select shop sidebar', 'creptaam'),
                    'options'  => array(
                        'no-sidebar'    => array(
                            'alt' => 'No sidebar',
                            'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                        ),
                        'left-sidebar'  => array(
                            'alt' => 'Left sidebar',
                            'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                        ),
                        'right-sidebar' => array(
                            'alt' => 'Right sidebar',
                            'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                        )
                    ),
                    'default'  => 'no-sidebar'
                ),

                array(
                    'id'       => 'product-per-page',
                    'type'     => 'text',
                    'title'    => esc_html__('Product per page', 'creptaam'),
                    'subtitle' => esc_html__('Change number of products per page', 'creptaam'),
                    'default'  => '6'
                ),

                array(
                    'id'       => 'product-column',
                    'type'     => 'select',
                    'title'    => esc_html__('Product per row', 'creptaam'),
                    'subtitle' => esc_html__('Change number of products per row', 'creptaam'),
                    'options'  => array(
                        '2' => 'Column 2',
                        '3' => 'Column 3',
                        '4' => 'Column 4'
                    ),
                    'default'  => '3'
                ),

                array(
                    'id'       => 'shopping-cart-visibility',
                    'type'     => 'switch',
                    'title'    => esc_html__('Shopping cart visibility', 'creptaam'),
                    'subtitle' => esc_html__('Show or hide shopping cart icon from navigation', 'creptaam'),
                    'on'       => esc_html__('Show', 'creptaam'),
                    'off'      => esc_html__('Hide', 'creptaam'),
                    'default'  => TRUE,
                )
            )
        ));
    endif;



    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Preloader settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-repeat-alt',
        'title'  => esc_html__('Preloader Settings', 'creptaam'),
        'fields' => array(
            array(
                'id'       => 'page-preloader',
                'type'     => 'switch',
                'title'    => esc_html__('Page Preloader', 'creptaam'),
                'subtitle' => esc_html__('You can enable or disable page preloader from here.', 'creptaam'),
                'on'       => esc_html__('Enable', 'creptaam'),
                'off'      => esc_html__('Disable', 'creptaam'),
                'default'  => TRUE,
            ),

            array(
                'id'       => 'loader-bg-color',
                'type'     => 'color',
                'required' => array( 'page-preloader', '=', '1' ),
                'title'    => esc_html__( 'Preloader background color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for preloader background (default: #ffffff).', 'creptaam' ),
                'default'  => '#ffffff',
            ),

            array(
                'id'       => 'tt-loader',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array( 'page-preloader', '=', '1' ),
                'title'    => esc_html__('Animation file', 'creptaam'),
                'subtitle' => esc_html__('Upload loader gif animation file', 'creptaam')
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // 404 page Style
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-inbox-box',
        'title'  => esc_html__('404 Page', 'creptaam'),
        'fields' => array(
            array(
                'id'        => '404_text',
                'type'      => 'text',
                'title'     => esc_html__('404 Text', 'creptaam'),
                'desc'      => esc_html__('Change 404 text', 'creptaam'),
                'default'   => esc_html__('404', 'creptaam')
            ),
            array(
                'id'        => '404_subtext',
                'type'      => 'text',
                'title'     => esc_html__('404 Subtext', 'creptaam'),
                'desc'      => esc_html__('Change 404 subtext', 'creptaam'),
                'default'   => esc_html__('OOPS! PAGE NOT FOUND', 'creptaam')
            ),
            array(
                'id'        => '404_desc',
                'type'      => 'text',
                'title'     => esc_html__('404 Description', 'creptaam'),
                'desc'      => esc_html__('Change 404 description', 'creptaam'),
                'default'   => esc_html__('Sorry, we couldn\'t find the content you were looking for.', 'creptaam')
            ),
            array(
                'id'        => '404_button_text',
                'type'      => 'text',
                'title'     => esc_html__('Button text', 'creptaam'),
                'desc'      => esc_html__('Change button text, leave blank to hide button', 'creptaam'),
                'default'   => esc_html__('Go Back Home', 'creptaam')
            )
        )
    ));



    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Marquee settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-photo',
        'title'  => esc_html__('Marquee Price Settings', 'creptaam'),
        'fields' => array(
            array(
                'id'       => 'marquee-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Currency marquee visibility', 'creptaam'),
                'subtitle' => esc_html__('Show or hide marquee', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => FALSE,
            ),

            array(
                'id'       => 'marquee-position',
                'type'     => 'select',
                'required' => array('marquee-visibility', '=', 1 ),
                'title'    => esc_html__('Marquee Position', 'creptaam'),
                'options'  => array(
                    'marquee-top' => esc_html__('Header Top', 'creptaam'),
                    'marquee-bottom' => esc_html__('Footer Bottom', 'creptaam')
                ),
                'desc'     => esc_html__('Select marquee position', 'creptaam'),
                'default'  => 'marquee-bottom'
            ),

            array(
                'id'       => 'marquee-limit',
                'type'     => 'text',
                'required' => array('marquee-visibility', '=', 1 ),
                'title'    => esc_html__('Item Limit', 'creptaam'),
                'subtitle' => esc_html__('Enter item limit, e.g: 20', 'creptaam'),
                'default'  => '20'
            ),

            array(
                'id'       => 'marquee-bg-color',
                'type'     => 'background',
                'output'   => array('.creptaam-price-ticker'),
                'required' => array('marquee-visibility', '=', 1 ),
                'title'    => esc_html__( 'Background color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for marquee background color (default: #ffffff).', 'creptaam' ),
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-size'       => false,
                'preview'               => false,
                'default'  => array(
                    'background-color'  => '#ffffff'
                )
            ),

            array(
                'id'       => 'marquee-text-color',
                'type'     => 'color',
                'output'    => array('.creptaam-price-ticker li'),
                'required' => array('marquee-visibility', '=', 1 ),
                'title'    => esc_html__( 'Text color', 'creptaam' ),
                'subtitle' => esc_html__( 'Pick color for marquee text color (default: #828282).', 'creptaam' ),
                'default'  => '#828282'
            )
        )
    ));

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Footer settings
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-photo',
        'title'  => esc_html__('Footer Settings', 'creptaam'),
        'fields' => array(
            // footer style
            array(
                'id'       => 'footer-style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Footer styles', 'creptaam' ),
                'subtitle' => esc_html__( 'Select Footer Style.', 'creptaam' ),
                'options'  => array(
                    'footer-default'   => array(
                        'alt' => esc_html__('Footer default', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/footer-default.jpg'
                    ),
                    'footer-three-column'   => array(
                        'alt' => esc_html__('Footer Three Column', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/footer-three-column.jpg'
                    ),
                    'footer-four-column'   => array(
                        'alt' => esc_html__('Footer Four Column', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/footer-four-column.jpg'
                    ),
                    'footer-onepage'   => array(
                        'alt' => esc_html__('Footer onepage', 'creptaam'),
                        'img' => get_template_directory_uri() . '/images/footer-onepage.jpg'
                    )
                ),
                'default'  => 'footer-default'
            ),
            array(
                'id'       => 'footer-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('footer-style', '=', array('footer-default', 'footer-onepage')),
                'title'    => esc_html__('Footer Logo.', 'creptaam'),
                'subtitle' => esc_html__('Change footer logo dimension: 150px &times; 30px', 'creptaam')
            ),
            array(
                'id'       => 'footer-retina-logo',
                'type'     => 'media',
                'preview'  => 'true',
                'required' => array('footer-style', '=', array('footer-default', 'footer-onepage')),
                'title'    => esc_html__('Footer Retina Logo (High Density)', 'creptaam'),
                'subtitle' => esc_html__('Change Footer Retina logo dimension: 300px &times; 600px', 'creptaam'),
                'desc'     => esc_html__('Add a 300px &times; 60px pixels image that will be used as the logo in the header section. For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable', 'creptaam'),
            ),
            array(
                'id'       => 'footer-about-text',
                'type'     => 'editor',
                'required' => array('footer-style', '=', array('footer-default')),
                'title'    => esc_html__('Footer About Text', 'creptaam'),
                'subtitle' => esc_html__('Write footer about text here.', 'creptaam')
            ),
            array(
                'id'       => 'social-icon-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Social Icon Visibility', 'creptaam'),
                'subtitle' => esc_html__('Show or hide social icon from footer', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE,
            ),
            array(
                'id'       => 'footer-text',
                'type'     => 'editor',
                'title'    => esc_html__('Footer Copyright Text', 'creptaam'),
                'subtitle' => esc_html__('Write footer copyright text here.', 'creptaam')
            ),
            array(
                'id'       => 'totop-visibility',
                'type'     => 'switch',
                'title'    => esc_html__('Back To Top Button', 'creptaam'),
                'subtitle' => esc_html__('Show or hide back to top button', 'creptaam'),
                'on'       => esc_html__('Show', 'creptaam'),
                'off'      => esc_html__('Hide', 'creptaam'),
                'default'  => TRUE,
            ),
            array(
                'id'       => 'footer-bg',
                'type'     => 'color',
                'title'    => esc_html__('Footer Background', 'creptaam'),
                'subtitle' => esc_html__('You may change footer background color', 'creptaam'),
            )
        )
    ));


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // Social icon
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    Redux::setSection( $opt_name, array(
        'icon'   => 'el-icon-share',
        'title'  => esc_html__('Social Icon', 'creptaam'),
        'fields' => array(

            array(
                'id'       => 'facebook-link',
                'type'     => 'text',
                'title'    => esc_html__('Facebook Link', 'creptaam'),
                'subtitle' => esc_html__('Enter facebook page or profile link. Leave blank to hide icon.', 'creptaam'),
                'default'  => "#"
            ),
            array(
                'id'       => 'twitter-link',
                'type'     => 'text',
                'title'    => esc_html__('Twitter Link', 'creptaam'),
                'subtitle' => esc_html__('Enter twitter link. Leave blank to hide icon.', 'creptaam'),
                'default'  => "#"
            ),
            array(
                'id'       => 'google-plus-link',
                'type'     => 'text',
                'title'    => esc_html__('Google Plus Link', 'creptaam'),
                'subtitle' => esc_html__('Enter google plus page or profile link. Leave blank to hide icon.', 'creptaam'),
                'default'  => "#"
            ),
            array(
                'id'       => 'youtube-link',
                'type'     => 'text',
                'title'    => esc_html__('Youtube Link', 'creptaam'),
                'subtitle' => esc_html__('Enter youtube chanel link. Leave blank to hide icon.', 'creptaam'),
            ),
            array(
                'id'       => 'pinterest-link',
                'type'     => 'text',
                'title'    => esc_html__('Pinterest Link', 'creptaam'),
                'subtitle' => esc_html__('Enter pinterest link. Leave blank to hide icon.', 'creptaam'),
                'default'  => "#"
            ),
            array(
                'id'       => 'flickr-link',
                'type'     => 'text',
                'title'    => esc_html__('Flickr Link', 'creptaam'),
                'subtitle' => esc_html__('Enter flicker link. Leave blank to hide icon.', 'creptaam'),
            ),
            array(
                'id'       => 'linkedin-link',
                'type'     => 'text',
                'title'    => esc_html__('Linkedin Link', 'creptaam'),
                'subtitle' => esc_html__('Enter linkedin profile link. Leave blank to hide icon.', 'creptaam'),
            ),
            array(
                'id'       => 'vimeo-link',
                'type'     => 'text',
                'title'    => esc_html__('Vimeo Link', 'creptaam'),
                'subtitle' => esc_html__('Enter vimeo chanel link. Leave blank to hide icon.', 'creptaam'),
            ),
            array(
                'id'       => 'instagram-link',
                'type'     => 'text',
                'title'    => esc_html__('Instagram Link', 'creptaam'),
                'subtitle' => esc_html__('Enter instagram page or profile link. Leave blank to hide icon.', 'creptaam'),
            ),
            array(
                'id'       => 'dribbble-link',
                'type'     => 'text',
                'title'    => esc_html__('Dribbble Link', 'creptaam'),
                'subtitle' => esc_html__('Enter dribbble profile link. Leave blank to hide icon.', 'creptaam'),
            ),
            array(
                'id'       => 'behance-link',
                'type'     => 'text',
                'title'    => esc_html__('Behance Link', 'creptaam'),
                'subtitle' => esc_html__('Enter behance profile link. Leave blank to hide icon.', 'creptaam'),
            ),
        )
    ));


    /*
     * <--- END SECTIONS
     */