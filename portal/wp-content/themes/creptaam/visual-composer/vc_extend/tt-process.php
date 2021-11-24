<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Earning Stat.', 'creptaam'),
		'base' => 'tt_process',
		'icon' => 'fa fa-ellipsis-h',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Show earning statistics', 'creptaam'),
		'params' => array(

			array(
				'type' => 'param_group',
				'heading' => esc_html__('Earning Statistics', 'creptaam'),
				'param_name' => 'process_info',
				'description' => esc_html__('Enter earning statistics info', 'creptaam'),
				'group' => 'Earning Statistics',
				'params' => array(

					array(
						'type' => 'textfield',
						'heading' => esc_html__('Earning Month Title', 'creptaam'),
						'param_name' => 'process_title',
						'admin_label' => true,
						'description' => esc_html__('Enter your earning month title', 'creptaam'),
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Earning Month Title Color', 'creptaam'),
						'param_name' => 'title_color_option',
						'group' => 'Color Options',
						'value' => array(
							esc_html__('Default color', 'creptaam') => '',
							esc_html__('Theme color', 'creptaam') => 'theme-color',
							esc_html__('Custom color', 'creptaam') => 'custom-color',
						),
						'admin_label' => true,
						'description' => esc_html__('If you change default earning month title color then select custom color', 'creptaam'),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Earning Month Title color', 'creptaam'),
						'param_name' => 'process_title_color',
						'description' => esc_html__('change Title color', 'creptaam'),
						'dependency' => array(
							'element' => 'title_color_option',
							'value' => array('custom-color'),
						),
					),

					array(
						'type' => 'textarea',
						'heading' => esc_html__('Invest and Return', 'creptaam'),
						'param_name' => 'process_content',
						'description' => esc_html__('Enter invest and return details here.', 'creptaam'),
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
		class WPBakeryShortCode_TT_Process extends WPBakeryShortCode {
		}
	}

endif; // function_exists( 'vc_map' )