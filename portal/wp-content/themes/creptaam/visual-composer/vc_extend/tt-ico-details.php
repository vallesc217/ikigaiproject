<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT ICO Details', 'creptaam'),
		'base' => 'tt_ico_details',
		'icon' => 'fa fa-usd',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays ICO Detials', 'creptaam'),
		'params' => array(

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Label color (Optional)', 'creptaam'),
				'param_name' => 'label_color',
				'description' => esc_html__('Choose label color. Default color is: #212121', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Label Alignment', 'creptaam'),
				'param_name' => 'label_alignment',
				'value' => array(
					esc_html__('Left Alignment', 'creptaam') => 'left',
					esc_html__('Right Alignment', 'creptaam') => 'right',
				),
				'std' => 'right',
				'description' => esc_html__('You may change label alignment', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Content color (Optional)', 'creptaam'),
				'param_name' => 'content_color',
				'description' => esc_html__('Choose content color. Default color is: #828282', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Label Width (If needed)', 'creptaam'),
				'param_name' => 'label_width',
				'description' => esc_html__('Enter ICO title width for best view. Default width is : 170px', 'creptaam'),
			),

			array(
				'type' => 'param_group',
				'heading' => esc_html__('Ico Details', 'creptaam'),
				'param_name' => 'ico_details',
				'description' => esc_html__('Add ICO Details', 'creptaam'),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('ICO Title', 'creptaam'),
						'param_name' => 'ico_title',
						'admin_label' => true,
						'description' => esc_html__('Enter ico title', 'creptaam'),
					),

					array(
						'type' => 'textarea',
						'heading' => esc_html__('ICO Content', 'creptaam'),
						'param_name' => 'ico_content',
						'description' => esc_html__('Enter ICO content', 'creptaam'),
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
		class WPBakeryShortCode_TT_ICO_Details extends WPBakeryShortCode {
		}
	}

endif; // function_exists( 'vc_map' )