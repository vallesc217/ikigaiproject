<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// Section title style element
	vc_map(array(
		'name' => esc_html__('TT ICO Offer', 'creptaam'),
		'base' => 'tt_ico_offer',
		'icon' => 'fa fa-align-center',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Add ICO Offer Box', 'creptaam'),
		'params' => array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Styles', 'creptaam'),
				'param_name' => 'styles',
				'value' => array(
					esc_html__('Default', 'creptaam') => '',
					esc_html__('Light', 'creptaam') => 'style-light',
				),
				'admin_label' => true,
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Fund Tirget', 'creptaam'),
				'param_name' => 'fund_tirget',
				'description' => esc_html__('Enter amount of tirget fund. Do not use comma (,) seperator. e.g. 10000000', 'creptaam'),
				'admin_label' => true,
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Fund Rised', 'creptaam'),
				'param_name' => 'fund_rised',
				'description' => esc_html__('Enter amount of rised fund. Do not use comma (,) seperator. e.g. 5000000', 'creptaam'),
				'admin_label' => true,
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Soft Cap', 'creptaam'),
				'param_name' => 'soft_cap',
				'description' => esc_html__('Enter soft cap amount. Do not use comma (,) seperator. e.g. 3000000', 'creptaam'),
				'admin_label' => true,
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Current Discount', 'creptaam'),
				'param_name' => 'current_discount',
				'description' => esc_html__('Enter current discount rate by %. e.g. 35%', 'creptaam'),
				'admin_label' => true,
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Countdown Date', 'creptaam'),
				'param_name' => 'countdown_time',
				'admin_label' => true,
				'description' => esc_html__('Add your countdown time here. Formate YYYY/MM/DD. e.g. 2019/12/31', 'creptaam'),
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
		class WPBakeryShortCode_TT_ICO_Offer extends WPBakeryShortCode {
		}
	}
endif;