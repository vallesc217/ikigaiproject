<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// TT Work element
	vc_map(array(
		'name' => esc_html__('TT Works', 'creptaam'),
		'base' => 'tt_work',
		'icon' => 'fa fa-th',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('To showcase your work with grid view', 'creptaam'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Work style', 'creptaam'),
				'param_name' => 'work_style',
				'value' => array(
					esc_html__('Style one', 'creptaam') => 'style-one',
					esc_html__('Style two', 'creptaam') => 'style-two',
				),
				'std' => 'style-one',
				'description' => esc_html__('Select work style', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Post Limit', 'creptaam'),
				'param_name' => 'post_limit',
				'admin_label' => true,
				'value' => -1,
				'description' => esc_html__('Put the number of posts to show, -1 for no limit', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Grid column', 'creptaam'),
				'param_name' => 'grid_column',
				'value' => array(
					esc_html__('3 Columns', 'creptaam') => 4,
					esc_html__('4 Columns', 'creptaam') => 3,
				),
				'std' => '4',
				'description' => esc_html__('Select post grid column', 'creptaam'),
			),

			// Filter style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Filter visibility ', 'creptaam'),
				'param_name' => 'filter_visibility',
				'value' => array(
					esc_html__('Visible', 'creptaam') => 'visible',
					esc_html__('Hidden', 'creptaam') => 'hidden',
				),
				'std' => 'visible',
				'admin_label' => true,
				'group' => esc_html__('Filter style', 'creptaam'),
				'description' => esc_html__('If you do not like to show filter then select hidden', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Default filter text', 'creptaam'),
				'param_name' => 'default_text',
				'std' => esc_html__('All', 'creptaam'),
				'group' => esc_html__('Filter style', 'creptaam'),
				'description' => esc_html__('Change default filter text', 'creptaam'),
				'dependency' => array(
					'element' => 'filter_visibility',
					'value' => array('visible'),
				),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Filter style', 'creptaam'),
				'param_name' => 'filter_style',
				'value' => array(
					esc_html__('Square', 'creptaam') => 'filter-square',
					esc_html__('Round', 'creptaam') => 'filter-round',
					esc_html__('Rounded', 'creptaam') => 'filter-rounded',
					esc_html__('Outline', 'creptaam') => 'filter-outline',
					esc_html__('Transparent', 'creptaam') => 'filter-transparent',
				),
				'std' => 'filter-circle',
				'admin_label' => true,
				'group' => esc_html__('Filter style', 'creptaam'),
				'description' => esc_html__('Select filter style', 'creptaam'),
				'dependency' => array(
					'element' => 'filter_visibility',
					'value' => array('visible'),
				),
			),

			// Filter alignment
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Filter alignment', 'creptaam'),
				'param_name' => 'filter_alignment',
				'value' => array(
					esc_html__('Left', 'creptaam') => 'text-left',
					esc_html__('Center', 'creptaam') => 'text-center',
					esc_html__('Right', 'creptaam') => 'text-right',
				),
				'std' => 'text-center',
				'admin_label' => true,
				'group' => esc_html__('Filter style', 'creptaam'),
				'description' => esc_html__('Select filter alignment', 'creptaam'),
				'dependency' => array(
					'element' => 'filter_visibility',
					'value' => array('visible'),
				),
			),

			// Filter color
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Filter color', 'creptaam'),
				'param_name' => 'filter_color',
				'value' => array(
					esc_html__('Default color', 'creptaam') => 'default-color',
					esc_html__('Dark color', 'creptaam') => 'dark-color',
				),
				'std' => 'default-color',
				'admin_label' => true,
				'group' => esc_html__('Filter style', 'creptaam'),
				'description' => esc_html__('Select filter color', 'creptaam'),
				'dependency' => array(
					'element' => 'filter_visibility',
					'value' => array('visible'),
				),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title visibility', 'creptaam'),
				'param_name' => 'title_visibility',
				'value' => array(
					esc_html__('Visible', 'creptaam') => 'visible',
					esc_html__('Hidden', 'creptaam') => 'hidden',
				),
				'std' => 'visible',
				'group' => esc_html__('Visibility', 'creptaam'),
				'description' => esc_html__('If do not like to show title then select hidden', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Category visibility', 'creptaam'),
				'param_name' => 'category_visibility',
				'value' => array(
					esc_html__('Visible', 'creptaam') => 'visible',
					esc_html__('Hidden', 'creptaam') => 'hidden',
				),
				'std' => 'visible',
				'group' => esc_html__('Visibility', 'creptaam'),
				'description' => esc_html__('If do not like to show category then select hidden', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Popup button visibility', 'creptaam'),
				'param_name' => 'popup_button_visibility',
				'value' => array(
					esc_html__('Visible', 'creptaam') => 'visible',
					esc_html__('Hidden', 'creptaam') => 'hidden',
				),
				'std' => 'visible',
				'group' => esc_html__('Visibility', 'creptaam'),
				'description' => esc_html__('If do not like to show popup image button then select hidden', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Link button visibility', 'creptaam'),
				'param_name' => 'link_button_visibility',
				'value' => array(
					esc_html__('Visible', 'creptaam') => 'visible',
					esc_html__('Hidden', 'creptaam') => 'hidden',
				),
				'std' => 'visible',
				'group' => esc_html__('Visibility', 'creptaam'),
				'description' => esc_html__('If do not like to show link button then select hidden', 'creptaam'),
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
		class WPBakeryShortCode_tt_Work extends WPBakeryShortCode {
		}
	}
endif;