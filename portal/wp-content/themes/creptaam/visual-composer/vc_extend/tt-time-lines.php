<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) {

	$tt_timeline_array = array(
		"name" => esc_html__("TT Time Lines", "creptaam"),
		"base" => "tt_time_lines",
		'controls' => "full",
		"icon" => "about-us-icon",
		"description" => esc_html__('Showing time lines', "creptaam"),
		'as_parent' => array('only' => 'tt_time_line'),
		"content_element" => TRUE,
		"show_settings_on_create" => FALSE,
		'category' => esc_html__('TT Elements', 'creptaam'),
		'default_content' => '[tt_time_line]Contents[/tt_time_line]',
		"params" => array(

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Year Color', 'creptaam'),
				'param_name' => 'year_color',
				'description' => esc_html__('Choose year color', 'creptaam'),
				'value' => '#ebad00',
				'edit_vc_class' => 'vc_col-sm-6',
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Month Color', 'creptaam'),
				'param_name' => 'month_color',
				'description' => esc_html__('Choose month color', 'creptaam'),
				'value' => '#212121',
				'edit_vc_class' => 'vc_col-sm-6',
			),

			array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => __("Initial Slide Number", "creptaam"),
				"description" => __("Enter The number of initial slide", "creptaam"),
				"param_name" => "initial_slide",
				'std' => NULL,
			),

			array(
				'type' => 'css_editor',
				'heading' => esc_html__('Css', 'creptaam'),
				'param_name' => 'css',
				'group' => esc_html__('Design options', 'creptaam'),
				'edit_vc_class' => 'vc_col-sm-6',
			),

			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", "creptaam"),
				"param_name" => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "creptaam"),
			),
		),
		"js_view" => 'VcColumnView',
	);

	vc_map($tt_timeline_array);

	$tt_time_line_array = array(
		"name" => esc_html__("Add Time Lines", "creptaam"),
		"base" => "tt_time_line",
		'as_child' => array('only' => 'tt_time_lines'),
		'content_element' => TRUE,
		"params" => array(

			array(
				"type" => "textarea_html",
				"heading" => esc_html__("Content", "creptaam"),
				"param_name" => "content",
				"description" => esc_html__("Enter client testimonial here", "creptaam"),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select Year', 'creptaam'),
				'param_name' => 'year',
				'value' => array(
					esc_html__('Blank', 'creptaam') => '',
					esc_html__('2017', 'creptaam') => esc_html__('2017', 'creptaam'),
					esc_html__('2018', 'creptaam') => esc_html__('2018', 'creptaam'),
					esc_html__('2019', 'creptaam') => esc_html__('2019', 'creptaam'),
					esc_html__('2020', 'creptaam') => esc_html__('2020', 'creptaam'),
					esc_html__('2021', 'creptaam') => esc_html__('2021', 'creptaam'),
					esc_html__('2022', 'creptaam') => esc_html__('2022', 'creptaam'),
					esc_html__('2023', 'creptaam') => esc_html__('2023', 'creptaam'),
					esc_html__('2024', 'creptaam') => esc_html__('2024', 'creptaam'),
					esc_html__('2025', 'creptaam') => esc_html__('2025', 'creptaam'),
					esc_html__('2026', 'creptaam') => esc_html__('2026', 'creptaam'),
					esc_html__('2027', 'creptaam') => esc_html__('2027', 'creptaam'),
					esc_html__('2028', 'creptaam') => esc_html__('2028', 'creptaam'),
					esc_html__('2029', 'creptaam') => esc_html__('2029', 'creptaam'),
					esc_html__('2029', 'creptaam') => esc_html__('2029', 'creptaam'),
					esc_html__('2030', 'creptaam') => esc_html__('2030', 'creptaam'),
				),
				'std' => '',
				'admin_label' => true,
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select Month', 'creptaam'),
				'param_name' => 'month',
				'value' => array(
					esc_html__('January', 'creptaam') => esc_html__('January', 'creptaam'),
					esc_html__('February', 'creptaam') => esc_html__('February', 'creptaam'),
					esc_html__('March', 'creptaam') => esc_html__('March', 'creptaam'),
					esc_html__('April', 'creptaam') => esc_html__('April', 'creptaam'),
					esc_html__('May', 'creptaam') => esc_html__('May', 'creptaam'),
					esc_html__('June', 'creptaam') => esc_html__('June', 'creptaam'),
					esc_html__('July', 'creptaam') => esc_html__('July', 'creptaam'),
					esc_html__('Augest', 'creptaam') => esc_html__('Augest', 'creptaam'),
					esc_html__('September', 'creptaam') => esc_html__('September', 'creptaam'),
					esc_html__('October', 'creptaam') => esc_html__('October', 'creptaam'),
					esc_html__('November', 'creptaam') => esc_html__('November', 'creptaam'),
					esc_html__('December', 'creptaam') => esc_html__('December', 'creptaam'),
				),
				'std' => esc_html__('January', 'creptaam'),
				'admin_label' => true,
			),

			array(
				"type" => "checkbox",
				"admin_label" => true,
				"weight" => 10,
				"heading" => __("Active This Item", "creptaam"),
				"description" => __("Check if you would like to active this item", "creptaam"),
				"value" => array('Current Year' => 'current-year'),
				"param_name" => "active_item",
			),

			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", "creptaam"),
				"param_name" => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "creptaam"),
			),
		),
	);

	vc_map($tt_time_line_array);

	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_TT_Time_Lines extends WPBakeryShortCodesContainer {

		}
	}

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_TT_Time_Line extends WPBakeryShortCode {

		}
	}

}