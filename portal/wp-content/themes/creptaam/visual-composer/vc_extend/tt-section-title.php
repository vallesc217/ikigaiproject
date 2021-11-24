<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// Section title style element
	vc_map(array(
		'name' => esc_html__('Section Title', 'creptaam'),
		'base' => 'tt_section_title',
		'icon' => 'fa fa-align-center',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('To customize section title style', 'creptaam'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title intro', 'creptaam'),
				'param_name' => 'title_intro',
				'holder' => 'span',
				'description' => esc_html__('Enter title intro text here, it will be displayed top of the title', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title intro color option', 'creptaam'),
				'param_name' => 'title_intro_color_option',
				'value' => array(
					esc_html__('Default Color', 'creptaam') => '',
					esc_html__('Theme Color', 'creptaam') => 'theme-color',
					esc_html__('Custom Color', 'creptaam') => 'custom-color',
				),
				'description' => esc_html__('If you change default title intro color then select theme color or select any custom color', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom color', 'creptaam'),
				'param_name' => 'title_intro_color',
				'description' => esc_html__('Change title intro color', 'creptaam'),
				'dependency' => array(
					'element' => 'title_intro_color_option',
					'value' => array('custom-color'),
				),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'creptaam'),
				'param_name' => 'title',
				'holder' => 'h3',
				'description' => esc_html__('Enter title here', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Alignment', 'creptaam'),
				'param_name' => 'title_alignment',
				'value' => array(
					esc_html__('Left', 'creptaam') => 'text-left',
					esc_html__('Center', 'creptaam') => 'text-center',
					esc_html__('Right', 'creptaam') => 'text-right',
				),
				'description' => esc_html__('Select title alignment', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title font size', 'creptaam'),
				'param_name' => 'title_font_size',
				'description' => esc_html__('Change title font size in px, e.g: 40px', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title line height', 'creptaam'),
				'param_name' => 'title_line_height',
				'description' => esc_html__('Change title line height in px, e.g: 48px', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title Font Weight', 'creptaam'),
				'param_name' => 'font_weight',
				'value' => array(
					esc_html__('Light 300', 'creptaam') => '300',
					esc_html__('Regular 400', 'creptaam') => '400',
					esc_html__('Medium 500', 'creptaam') => '500',
					esc_html__('Bold 700', 'creptaam') => '700',
				),
				'std' => '700',
				'description' => esc_html__('Select title text transform', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title Text Transform', 'creptaam'),
				'param_name' => 'text_transform',
				'value' => array(
					esc_html__('Default', 'creptaam') => '',
					esc_html__('Uppercase', 'creptaam') => 'uppercase',
					esc_html__('Capitalize', 'creptaam') => 'capitalize',
					esc_html__('Lowercase', 'creptaam') => 'lowercase',
				),
				'std' => 'capitalize',
				'description' => esc_html__('Select title text transform', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title color option', 'creptaam'),
				'param_name' => 'title_color_option',
				'value' => array(
					esc_html__('Default Color', 'creptaam') => '',
					esc_html__('Theme Color', 'creptaam') => 'theme-color',
					esc_html__('Custom Color', 'creptaam') => 'custom-color',
				),
				'description' => esc_html__('If you change default title color then select theme color or select any custom color', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom color', 'creptaam'),
				'param_name' => 'title_color',
				'description' => esc_html__('Change title color', 'creptaam'),
				'dependency' => array(
					'element' => 'title_color_option',
					'value' => array('custom-color'),
				),
			),

			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Sub title description', 'creptaam'),
				'param_name' => 'content',
				'holder' => 'span',
				'description' => esc_html__('Description will appear on after title bottom separator', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Description color option', 'creptaam'),
				'param_name' => 'description_color_option',
				'value' => array(
					esc_html__('Default color', 'creptaam') => '',
					esc_html__('Custom color', 'creptaam') => 'custom-color',
				),
				'description' => esc_html__('If you change default description text color then select custom color', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Description font size', 'creptaam'),
				'param_name' => 'description_font_size',
				'description' => esc_html__('Enter description font size by px (if needed). e.g. 20px', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Custom color', 'creptaam'),
				'param_name' => 'description_color',
				'description' => esc_html__('Change description text color', 'creptaam'),
				'dependency' => array(
					'element' => 'description_color_option',
					'value' => array('custom-color'),
				),
			),

			array(
				'type' => 'css_editor',
				'heading' => esc_html__('Css', 'creptaam'),
				'param_name' => 'css',
				'group' => esc_html__('Design options', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'creptaam'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'creptaam'),
			),
		),
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_TT_Section_Title extends WPBakeryShortCode {
		}
	}
endif;