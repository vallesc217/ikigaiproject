<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Bitcoin Ecosystem', 'creptaam'),
		'base' => 'tt_btc_ecosystem',
		'icon' => 'fa fa-area-chart',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays BTC Ecosystem', 'creptaam'),
		'params' => array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Ecosystem Style', 'creptaam'),
				'param_name' => 'ecosystem_bg',
				'value' => array(
					esc_html__('Ecosystem Default', 'creptaam') => 'eco-default',
					esc_html__('Ecosystem Dark', 'creptaam') => 'eco-dark',
				),
				'description' => esc_html__('Select Ecosystem Background', 'creptaam'),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select an option', 'creptaam'),
				'param_name' => 'ecosystem_options',
				'value' => array(
					esc_html__('Bicoin Rank', 'creptaam') => 'bitcoin-rank',
					esc_html__('Bitcoin Price', 'creptaam') => 'bitcoin-price',
					esc_html__('Market Cap', 'creptaam') => 'market-cap',
					esc_html__('24h Volume', 'creptaam') => '24h-value',
					esc_html__('Total Money supply', 'creptaam') => 'total-supply',
				),
				'admin_label' => true,
				'description' => esc_html__('Select an option', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Subtitle', 'creptaam'),
				'param_name' => 'subtitle',
				'admin_label' => true,
				'description' => esc_html__('Enter subtitle', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Shorten Number?', 'creptaam'),
				'param_name' => 'shorten',
				'value' => array(
					esc_html__('Yes', 'creptaam') => 'yes',
					esc_html__('No', 'creptaam') => 'no',
				),
				'description' => esc_html__('Select an option', 'creptaam'),
				'dependency' => array(
					'element' => 'ecosystem_options',
					'value' => array('bitcoin-price', 'market-cap', 'total-supply'),
				),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Decimal number', 'creptaam'),
				'param_name' => 'decimal_number',
				'value' => array(
					esc_html__('No', 'creptaam') => 0,
					esc_html__('1', 'creptaam') => 1,
					esc_html__('2', 'creptaam') => 2,
					esc_html__('3', 'creptaam') => 3,
					esc_html__('4', 'creptaam') => 4,
					esc_html__('5', 'creptaam') => 5,
					esc_html__('6', 'creptaam') => 6,
				),
				'std' => 1,
				'description' => esc_html__('Select an option to show decimal number', 'creptaam'),
				'dependency' => array(
					'element' => 'shorten',
					'value' => array('yes'),
				),
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Uplod Chart Image', 'creptaam'),
				'param_name' => 'chart_image',
				'description' => esc_html__('Upload image from media library for chart image', 'creptaam'),
				'admin_label' => true,
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
		class WPBakeryShortCode_tt_btc_ecosystem extends WPBakeryShortCode {
		}
	}

endif; // function_exists( 'vc_map' )