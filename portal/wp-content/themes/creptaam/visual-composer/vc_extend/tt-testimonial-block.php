<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('Testimonial Block', 'creptaam'),
		'base' => 'tt_testimonial_block',
		'icon' => 'fa fa-quote-left',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Show off testimonial block', 'creptaam'),
		'params' => array(

			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Client Testimonial', 'creptaam'),
				'param_name' => 'content',
				'description' => esc_html__('Enter testimonial quote', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Client Name', 'creptaam'),
				'param_name' => 'client_name',
				'admin_label' => true,
				'description' => esc_html__('Enter client name', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Client Organization/Designation', 'creptaam'),
				'param_name' => 'client_org',
				'description' => esc_html__('Enter Organization name or designation', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'creptaam'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Client name text color', 'creptaam'),
				'param_name' => 'client_text_color',
				'group' => 'Color Options',
				'description' => esc_html__('Change client text color', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Client Organization/Designation text color', 'creptaam'),
				'param_name' => 'client_org_text_color',
				'group' => 'Color Options',
				'description' => esc_html__('Change client organization/designation text color', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Client quote text color', 'creptaam'),
				'param_name' => 'client_quote_text_color',
				'group' => 'Color Options',
				'description' => esc_html__('Change client quote text color', 'creptaam'),
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
		class WPBakeryShortCode_tt_Testimonial_Block extends WPBakeryShortCode {
		}
	}
endif;