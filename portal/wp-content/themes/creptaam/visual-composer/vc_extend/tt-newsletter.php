<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// TT Newsletter element
	vc_map(array(
		'name' => esc_html__('TT Newsletter', 'creptaam'),
		'base' => 'tt_newsletter',
		'icon' => 'fa fa-envelope',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Newsletter subscribe form', 'creptaam'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Styles', 'creptaam'),
				'param_name' => 'styles',
				'value' => array(
					esc_html__('Style-1', 'creptaam') => 'style-one',
					esc_html__('Style-2', 'creptaam') => 'style-two',
				),
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'creptaam'),
				'param_name' => 'el_class',
				'admin_label' => true,
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'creptaam'),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__('Css', 'creptaam'),
				'param_name' => 'css',
				'group' => esc_html__('Design options', 'creptaam'),
			),
		),
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_tt_newsletter extends WPBakeryShortCode {
		}
	}
endif;