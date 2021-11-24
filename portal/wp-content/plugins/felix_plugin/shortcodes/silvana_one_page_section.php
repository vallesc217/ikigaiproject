<?php
/**
 * Created by PhpStorm.
 * User: Pro
 * Date: 15.04.2016
 * Time: 11:24
 */

/*
 * map
 */


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_felix_one_page_section extends WPBakeryShortCodesContainer
    {
    }
    class WPBakeryShortCode_felix_section_content extends WPBakeryShortCodesContainer
    {
    }

}



add_shortcode('felix_section_content', 'felix__section_content_func');

/**
 * @param $atts
 * @param $content
 * @return string
 */
function felix__section_content_func($atts, $content)
{
    $atts = shortcode_atts(
        array(
            'id' => '',
            'title' => '',
            'class' => ''

        ), $atts
    );
    $res = ' <section class="'.esc_attr($atts['class']).'" id="' . esc_attr($atts['id']) . '" data-title="' .
        esc_attr($atts['title']) . '" ">';
    $res .= do_shortcode($content) . ' </section>';

    return $res;

}

