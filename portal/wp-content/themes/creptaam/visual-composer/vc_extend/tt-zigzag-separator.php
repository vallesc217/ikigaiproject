<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// TT ZigZag Separator
	vc_map(array(
		'name' => esc_html__('TT ZigZag Separator', 'creptaam'),
		'base' => 'tt_zigzag_separator',
		'icon' => 'fa fa-envelope',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Section zigzag separator', 'creptaam'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Uplod Separator Image', 'creptaam'),
				'param_name' => 'separator_image',
				'description' => esc_html__('Upload image from media library as a section separator image', 'creptaam'),
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'creptaam'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'creptaam'),
			)
		),
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_tt_zigzag_separator extends WPBakeryShortCode {
		}
	}
endif;