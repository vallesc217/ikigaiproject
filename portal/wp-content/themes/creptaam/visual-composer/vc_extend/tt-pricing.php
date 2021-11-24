<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Pricing Table', 'creptaam'),
		'base' => 'tt_pricing',
		'icon' => 'fa fa-usd',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays pricing table', 'creptaam'),
		'params' => array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select grid column', 'creptaam'),
				'param_name' => 'grid_column',
				'value' => array(
					esc_html__('Select grid column', 'creptaam') => '',
					esc_html__('2 Columns', 'creptaam') => '6',
					esc_html__('3 Columns', 'creptaam') => '4',
					esc_html__('4 Columns', 'creptaam') => '3',
				),
				'admin_label' => true,
				'description' => esc_html__('Select grid column', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Header background color', 'creptaam'),
				'param_name' => 'pricing_header_bg',
				'description' => esc_html__('Change pricing table background color', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Header text color', 'creptaam'),
				'param_name' => 'pricing_header_text_color',
				'description' => esc_html__('Change priceing table background color', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Pricing Table Body BG', 'creptaam'),
				'param_name' => 'pricing_tbl_body_bg',
				'description' => esc_html__('You may change pricing table background color. Otherwise default color will be appear. Default color is: #293145', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Pricing Table Font Color', 'creptaam'),
				'param_name' => 'pricing_tbl_body_color',
				'description' => esc_html__('You may change pricing table font color. Otherwise default color will be appear. Default color is: #999999', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type' => 'param_group',
				'heading' => esc_html__('Table content', 'creptaam'),
				'param_name' => 'table_content',
				'description' => esc_html__('Enter table content', 'creptaam'),
				'group' => 'Table info',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Package name', 'creptaam'),
						'param_name' => 'package_name',
						'admin_label' => true,
						'group' => 'Table info',
						'description' => esc_html__('Enter package name', 'creptaam'),
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__('Currency symbol', 'creptaam'),
						'param_name' => 'currency_symbol',
						'value' => '$',
						'group' => 'Table info',
						'description' => esc_html__('Enter Package Rate Currency symbol, e.g: $ (enter only currency symbol)', 'creptaam'),
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__('Package Rate', 'creptaam'),
						'param_name' => 'package_rate',
						'admin_label' => true,
						'group' => 'Table info',
						'description' => esc_html__('Enter Package Rate, e.g: 99 (enter only number)', 'creptaam'),
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__('Package duration', 'creptaam'),
						'param_name' => 'package_duration',
						'value' => 'Day',
						'group' => 'Table info',
						'description' => esc_html__('Enter Package Duration, e.g: monthly', 'creptaam'),
					),

					array(
						'type' => 'textarea_safe',
						'heading' => esc_html__('Pricing Plan Details', 'creptaam'),
						'param_name' => 'details',
						'group' => 'Table info',
						'description' => esc_html__('Enter Yor Pricing Plan Details', 'creptaam'),
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Show purchase button ?', 'creptaam'),
						'param_name' => 'purchase_button_show',
						'value' => array(
							esc_html__('Yes', 'creptaam') => 'yes',
							esc_html__('No', 'creptaam') => 'no',
						),
						'group' => 'Table info',
						'description' => esc_html__('If you do not like to show purchase button then select no to hide', 'creptaam'),
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Button Background Color', 'creptaam'),
						'param_name' => 'button_background_option',
						'value' => array(
							esc_html__('Select Button Background Color', 'creptaam') => 'btn-primary',
							esc_html__('Theme color', 'creptaam') => 'btn-primary',
							esc_html__('Custom color', 'creptaam') => 'custom-color',
						),
						'description' => esc_html__('If you change default Button Background Color then select custom color', 'creptaam'),
						'group' => 'Table info',
						'dependency' => array(
							'element' => 'purchase_button_show', 'purchase_button_show',
							'value' => array('yes'),
						),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Select Button Background Color', 'creptaam'),
						'param_name' => 'button_color',
						'description' => esc_html__('change Button Background Color', 'creptaam'),
						'dependency' => array(
							'element' => 'button_background_option',
							'value' => array('custom-color'),
						),
						'group' => 'Table info',
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Select Button text Color', 'creptaam'),
						'param_name' => 'button_text_color',
						'description' => esc_html__('change Button text Color', 'creptaam'),
						'dependency' => array(
							'element' => 'button_background_option',
							'value' => array('custom-color'),
						),
						'group' => 'Table info',
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__('Button Text', 'creptaam'),
						'param_name' => 'purchase_button_text',
						'value' => 'Buy Now',
						'description' => esc_html__('Change Button Text', 'creptaam'),
						'group' => 'Table info',
						'dependency' => array(
							'element' => 'purchase_button_show',
							'value' => array('yes'),
						),
					),

					array(
						'type' => 'vc_link',
						'heading' => esc_html__('Button Link', 'creptaam'),
						'param_name' => 'purchase_button_link',
						'description' => esc_html__('Enter Button Link', 'creptaam'),
						'group' => 'Table info',
						'dependency' => array(
							'element' => 'purchase_button_show',
							'value' => array('yes'),
						),
					),
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
		class WPBakeryShortCode_tt_Pricing extends WPBakeryShortCode {
		}
	}

endif; // function_exists( 'vc_map' )