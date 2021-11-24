<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// Upcoming event element
	vc_map(array(
		'name' => esc_html__('Upcoming Event', 'creptaam'),
		'base' => 'tt_upcoming_event',
		'icon' => 'fa fa-calendar',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Display upcoming event', 'creptaam'),
		'params' => array(

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Event Limit', 'creptaam'),
				'param_name' => 'event_limit',
				'value' => 3,
				'admin_label' => true,
				'description' => esc_html__('Events show at most 6 posts, you can change the value', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Grid Column', 'creptaam'),
				'param_name' => 'grid_column',
				'value' => array(
					esc_html__('2 columns', 'creptaam') => '6',
					esc_html__('3 columns', 'creptaam') => '4',
					esc_html__('4 columns', 'creptaam') => '3',
				),
				'std' => '4',
				'admin_label' => true,
				'description' => esc_html__('Select grid column', 'creptaam'),
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
		class WPBakeryShortCode_tt_Upcoming_Event extends WPBakeryShortCode {
		}
	}
endif;