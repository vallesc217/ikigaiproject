<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Market Status', 'creptaam'),
		'base' => 'tt_market_status',
		'icon' => 'fa fa-area-chart',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays cryptocurrency market at a glance', 'creptaam'),
		'params' => array(

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Data Limit', 'creptaam'),
				'param_name' => 'data_limit',
				'std' => 10,
				'admin_label' => true,
				'description' => esc_html__('Enter data limit value in number, e.g: 10', 'creptaam'),
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
		class WPBakeryShortCode_tt_market_status extends WPBakeryShortCode {
		}
	}

endif; // function_exists( 'vc_map' )