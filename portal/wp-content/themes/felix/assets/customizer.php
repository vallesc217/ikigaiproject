<?php

/**
 * Adds sections and settings to customizer
 * @param $wp_customize
 */

function felix_true_customizer_init($wp_customize)
{
    //Panels
    $wp_customize->add_panel('panel_blog', array(
        'title' => esc_html__('Blog settings', 'felix'),
        'description' => esc_html__('Settings of the Blog', 'felix'),
    ));


    /*******************************************************************
     * Main page settings
     *******************************************************************/

    $tmp_sectionname = "felix";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Location sidebar', 'felix'),
        'priority' => 30,
        'panel' => 'panel_blog'));
    $tmp_tabel = 'sidebar_position';
    $tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
    $wp_customize->add_setting($tmp_settingname, array('default' => 's2',
        'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Location sidebar', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'radio',
        'choices' => array(
            's1' => esc_html__('Sidebar Left', 'felix'),
            's2' => esc_html__('Sidebar Right', 'felix'),
        )));

    /*----------------------------------------------------------------
     * Blog list sitting
     -----------------------------------------------------------------*/
    $tmp_sectionname = "felix_blog_list";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Blog list', 'felix'),
        'priority' => 30,
        'panel' => 'panel_blog'));

    $tmp_tabel = 'text';
    $tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
    $wp_customize->add_setting($tmp_settingname, array('default' => esc_html__('Get start now', 'felix'),
        'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Button text Get start now', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'
    ));

    $tmp_tabel = 'limit_word';
    $tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
    $wp_customize->add_setting($tmp_settingname, array('default' => 40,
        'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Limint word in post blog list', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'
    ));


    /*******************************************************************
     * Social networks
     *******************************************************************/
    $tmp_sectionname = "sotial_networks";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Social networks', 'felix'),
        'priority' => 31,
        'description' => esc_html__('Enter url desired social networks so that they appear on the site', 'felix')));

    /*short*/

    $tmp_settingname = $tmp_sectionname . '_control_social_shortcode';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__(' Insert Social shortcode or another ', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'description' => esc_html__('its show in footer example shortcode [felix_social_links url="https://pinterest.com/" class="fa fa-pinterest"]', 'felix'),
        'settings' => $tmp_settingname,
        'type' => 'textarea'
    ));


    /*facebook*/
    $tmp_settingname = $tmp_sectionname . '_control_facebook';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Facebook  url', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    /*twitter*/
    $tmp_settingname = $tmp_sectionname . '_control_twitter';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Twitter url', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    /*youtube-play*/
    $tmp_settingname = $tmp_sectionname . '_control_youtube';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('youtube url', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    /*pinterest*/
    $tmp_settingname = $tmp_sectionname . '_control_pinterest';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('pinterest url', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));


    /*******************************************************************
     * Social networks
     *******************************************************************/
    $tmp_sectionname = "felix_mail";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Setting email', 'felix'),
        'priority' => 31,
        'description' => ''));

    /*short*/

    $tmp_settingname = $tmp_sectionname . '_email';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__(' Insert your email', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'description' => esc_html__('can specify one email', 'felix'),
        'settings' => $tmp_settingname,
        'type' => 'text'
    ));


    /*******************************************************************
     * mailchimp
     *******************************************************************/
    $tmp_sectionname = "mail";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Email sitting', 'felix'),
        'priority' => 31,
    ));
    $tmp_settingname = $tmp_sectionname . '_email';
    $wp_customize->add_setting($tmp_settingname, array('default' => "",
        'sanitize_callback' => 'sanitize_email'));
    $wp_customize->add_control('_control', array(
        'label' => esc_html__('Enter email', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'description' => esc_html__('can specify  one email', 'felix'),
        'type' => 'text'));


    /*******************************************************************
     * logo
     *******************************************************************/


    $tmp_sectionname = "logo";


    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Logo', 'felix'),
        'priority' => 30,
        'description' => esc_html__('Upload a logo to replace the default site name and description in the header', 'felix')));


    /**
     * Small logo
     */
    $tmp_settingname = $tmp_sectionname . '_small';

    $wp_customize->add_setting($tmp_settingname, array('default' =>
        '',
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        $tmp_settingname, array(
            'label' => esc_html__(' Small logo', 'felix'),
            'section' => $tmp_sectionname . "_section",
            'settings' => $tmp_settingname,
        )));

    /**
     * Big logo
     */
    $tmp_settingname = $tmp_sectionname . '_big';

    $wp_customize->add_setting($tmp_settingname, array('default' =>
        '',
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        $tmp_settingname, array(
            'label' => esc_html__('Big logo ', 'felix'),
            'section' => $tmp_sectionname . "_section",
            'settings' => $tmp_settingname,
        )));
    /**
     * Loader logo
     */
    $tmp_settingname = $tmp_sectionname . '_loader';

    $wp_customize->add_setting($tmp_settingname, array('default' =>
        '',
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        $tmp_settingname, array(
            'label' => esc_html__('Loader logo ', 'felix'),
            'section' => $tmp_sectionname . "_section",
            'settings' => $tmp_settingname,
        )));


    /*******************************************************************
     * Map style
     *******************************************************************/

    $tmp_sectionname = "felix_map";
    $tmp_default = "";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Map style', 'felix'),
        'priority' => 30,
        'description' => esc_html__('Map style JSON config (see https://snazzymaps.com, http://www.mapstylr.com/showcase/ )', 'felix')));
    $tmp_tabel = 'stylemap_json';
    $tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
    $tmp_settingtitle = esc_html__('stylemap_json', 'felix');
    $wp_customize->add_setting($tmp_settingname, array('default' => $tmp_default,
        'sanitize_callback' => 'felix_sanitize_temp'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('stylemap json', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'textarea'));


    $tmp_settingname = $tmp_sectionname . '_google_key';

    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_attr'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Insert you google map api key', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'description' => esc_html__('(see https://developers.google.com/maps/documentation/javascript/get-api-key#key )', 'felix'),
        'type' => 'text',
    ));


    /******************************************************************
     * Colors
     */

    $colors = array();
    if (function_exists('felix_get_style_color'))
        $colors = felix_get_style_color();

    foreach ($colors as $k => $v) {
        $grb = felix_Hex2RGB($v);
        if ($grb[0] == $grb[1])
            continue; //gray
        $tmp_sectionname = 'colors';
        $tmp_settingname = $tmp_sectionname . '_m_' . $v;
        $label = $v;
        if ($v == 'F56659')
            $label = esc_html__('primary ', 'felix');
        if ($v == 'D99675')
            $label = esc_html__('form control error border ', 'felix');

        if ($v == 'FF6548')
            $label = esc_html__('btn hover btn focus', 'felix');

        if ($v == '4D606F')
            $label = esc_html__('text chart (in shortcode)', 'felix');


        if ($v == '323C46')
            $label = esc_html__('chart number (in shortcode)', 'felix');

        if ($v == 'F78243')
            $label = esc_html__('widget link hover', 'felix');


        if ($v == 'D4B068')
            continue;


        $wp_customize->add_setting($tmp_settingname, array('default' => "#" . esc_html($v),
            'sanitize_callback' => 'felix_sanitize_temp'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $tmp_settingname,
            array(
                'label' => esc_html__('Color ', 'felix') . esc_html($label) . '',
                'section' => $tmp_sectionname,
                'settings' => $tmp_settingname,
            )));
    }


    /*******************************************************************
     * Performans
     *******************************************************************/

    $tmp_sectionname = "felix_performans";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Performance', 'felix'),
        'priority' => 31,
        'description' => esc_html__('', 'felix')));

    $tmp_settingname = $tmp_sectionname . '_preloader';

    $wp_customize->add_setting($tmp_settingname, array('default' => true,
        'sanitize_callback' => 'wp_validate_boolean'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Enable preloader ?', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'checkbox',
    ));


    $tmp_settingname = $tmp_sectionname . '_scroll';

    $wp_customize->add_setting($tmp_settingname, array('default' => false,
        'sanitize_callback' => 'wp_validate_boolean'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Enable smoothscroll?', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'checkbox',
    ));


    $tmp_settingname = $tmp_sectionname . '_logo_top';

    $wp_customize->add_setting($tmp_settingname, array('default' => false,
        'sanitize_callback' => 'wp_validate_boolean'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__(' click on logo scroll top on page full wight?', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'checkbox',
    ));


    /*******************************************************************
     * contact form shortcode
     *******************************************************************/

    $tmp_sectionname = "felix_c_form_s";


    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Contact form shortcode', 'felix'),
        'priority' => 31,
        'description' => esc_html__('', 'felix')));
    $tmp_settingname = $tmp_sectionname . '_txt';

    $wp_customize->add_setting($tmp_settingname, array('default' => esc_html__('Send request', 'felix'),
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Contact form text', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));

    $tmp_settingname = $tmp_sectionname . '_val';

    $wp_customize->add_setting($tmp_settingname, array('default' => '[felix_contact_form]',
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Contact form shortcode', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'textarea',
    ));

    $tmp_settingname = $tmp_sectionname . '_modal_title';
    $wp_customize->add_setting($tmp_settingname, array('default' => esc_html__('Get start now', 'felix'),
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('modal title', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));

    $tmp_settingname = $tmp_sectionname . '_susses_title';
    $wp_customize->add_setting($tmp_settingname, array('default' => esc_html__('Thank you', 'felix'),
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Modal susses title', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));


    /*
     *
     */
    $tmp_settingname = $tmp_sectionname . '_susses_sub_title';
    $wp_customize->add_setting($tmp_settingname, array('default' => esc_html__('Your message is successfully sent...', 'felix'),
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Modal susses subtitle', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));

    /*
     *
     */
    $tmp_settingname = $tmp_sectionname . '_error_title';
    $wp_customize->add_setting($tmp_settingname, array('default' => esc_html__('Sorry', 'felix'),
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Modal error title', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));
    /*
     *
     */
    $tmp_settingname = $tmp_sectionname . '_error_sub_title';
    $wp_customize->add_setting($tmp_settingname, array('default' => esc_html__('Something went wrong', 'felix'),
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Modal error subtitle', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));

    /*********************************************************
     * Footer
     **************************************************************/
    $tmp_sectionname = "footer";


    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Footer', 'felix'),
        'priority' => 31,
        'description' => esc_html__('', 'felix')));
    $tmp_settingname = $tmp_sectionname . '_copyright';

    $wp_customize->add_setting($tmp_settingname, array('default' => sprintf(esc_html__(' %s  felix. All rights reserved by  %s', 'felix'), '© ' . date('Y'),
        '<a href="http://themeforest.net/user/murren20" target="_blank">' . esc_html__('Murren20', 'felix') . '</a>'),
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Footer copyright', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'textarea',
    ));

    /**
     * footer img
     */
    $tmp_settingname = $tmp_sectionname . '_img';

    $wp_customize->add_setting($tmp_settingname, array('default' =>
        '',
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        $tmp_settingname, array(
            'label' => esc_html__('Footer img', 'felix'),
            'section' => $tmp_sectionname . "_section",
            'settings' => $tmp_settingname,
        )));

    /*******************************************************************
     * mailchimp
     *******************************************************************/
    $tmp_sectionname = "felix_mailchimp";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Mailchimp / Subscribe ', 'felix'),
        'priority' => 31,
        'description' => esc_html__('Specify api key and ID list', 'felix')));
    $tmp_settingname = $tmp_sectionname . '_api_control';
    $wp_customize->add_setting($tmp_settingname, array('default' => "",
        'sanitize_callback' => 'esc_attr'));
    $wp_customize->add_control('_control', array(
        'label' => esc_html__('API key', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    $tmp_settingname = $tmp_sectionname . 'id_list_control';
    $wp_customize->add_setting($tmp_settingname, array('default' => "",
        'sanitize_callback' => 'esc_attr'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('ID list', 'felix'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));
}

function felix_sanitize_to_int($value)
{
    return (int)$value;
}


function felix_sanitize_temp($value)
{
    return $value;
}


/**
 *Plug in  script to customize
 */

add_action('customize_register', 'felix_true_customizer_init');


function felix_color_hack($css)
{
    $css = str_ireplace("322F44", "33244A", $css);
    $css = str_ireplace("47A5F5", "009ECC", $css);
    $css = str_ireplace("45C3E8", "009ECC", $css);
    $css = str_ireplace("7CCB18", "AAC600", $css);
    $css = str_ireplace("62B50A", "AAC600", $css);
    $css = str_ireplace("006EC6", "0081DB", $css);
    $css = str_ireplace(array(
        "7CCB18",
        "1B2027",
        "191A22",
        "1F1C2D",
        "191A22"), array(
        "97C900",
        "030102",
        "011222",
        "011222"), $css);
    //green
    $css = str_ireplace("AAC600", "97C900", $css);
    //orange
    $css = str_ireplace(array(
        "FF9C00",
        "FFAC00",
        "FF5700",
        "FFCB00"), "FF9100", $css);
    //dark red
    $css = str_ireplace(array(
        "D82E26",
        "CC130A",
        "A1201A"), "D82E26", $css);
    //light red
    $css = str_ireplace(array(
        "E51616",
        "F54100",
        "E73931"), "FF9100", $css);
    return $css;


}

function felix_Hex2RGB($color)
{
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6) {
        return array(
            0,
            0,
            0);
    }
    $felix_rgb = array();
    for ($x = 0; $x < 3; $x++) {
        $felix_rgb[$x] = hexdec(substr($color, (2 * $x), 2));
    }
    return $felix_rgb;
}