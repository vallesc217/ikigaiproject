<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// Client carousel element
	vc_map(array(
		'name' => esc_html__('TT Sponsors', 'creptaam'),
		'base' => 'tt_sponsors',
		'icon' => 'fa fa-users',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays sponsors logo', 'creptaam'),
		'params' => array(

			array(
				'type' => 'attach_images',
				'heading' => esc_html__('Images', 'creptaam'),
				'param_name' => 'images',
				'description' => esc_html__('Select images from media library. You shoud resize images from photoshop before uplod. Logo height will be 110px and width will be auto for best view.', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('On click action', 'creptaam'),
				'param_name' => 'on_click_action',
				'value' => array(
					esc_html__('Do nothing', 'creptaam') => '',
					esc_html__('Open custom link', 'creptaam') => 'custom_link',
				),
				'admin_label' => true,
				'description' => esc_html__('Define action for onclick event if needed.', 'creptaam'),
			),

			array(
				'type' => 'exploded_textarea',
				'heading' => esc_html__('Custom links', 'creptaam'),
				'param_name' => 'links',
				'description' => esc_html__('Enter links for each logo here. Divide links with linebreaks (Enter)', 'creptaam'),
				'dependency' => array(
					'element' => 'on_click_action',
					'value' => array('custom_link'),
				),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Logo Height', 'creptaam'),
				'description' => esc_html__('You may change logo height. If you increase height then logo size will be increase. Default height is 110px;', 'creptaam'),
				'param_name' => 'logo_height',
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Logo Margin', 'creptaam'),
				'description' => esc_html__('You may increase or decrease logo margin', 'creptaam'),
				'param_name' => 'logo_margin',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Border?', 'creptaam'),
				'param_name' => 'logo_border',
				'value' => array(
					esc_html__('Yes', 'creptaam') => 'yes',
					esc_html__('No', 'creptaam') => 'no',
				),
				'admin_label' => true,
				'description' => esc_html__('You may allow border or not', 'creptaam'),
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
		class WPBakeryShortCode_tt_Sponsors extends WPBakeryShortCode {
		}
	}
endif;