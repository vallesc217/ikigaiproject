<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	// Section title style element
	vc_map(array(
		'name' => esc_html__('TT Video Embed', 'creptaam'),
		'base' => 'tt_video_embed',
		'icon' => 'fa fa-align-center',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Add Video from media or youtube', 'creptaam'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Upload Video Background Image', 'creptaam'),
				'param_name' => 'video_bg',
				'description' => esc_html__('Upload a image from media library for video background', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Play Icon Color', 'creptaam'),
				'param_name' => 'icon_color',
				'description' => esc_html__('change icon color', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Play Icon Background Color', 'creptaam'),
				'param_name' => 'icon_bg',
				'description' => esc_html__('change icon background color', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Pest Video url', 'creptaam'),
				'param_name' => 'tt_video_url',
				'description' => esc_html__('You can add any video from youtube, vimeo and any others website. Just copy video url and pest here', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Border Width', 'creptaam'),
				'param_name' => 'border_width',
				'description' => esc_html__('Enter box border width in px. eg. 10px', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-4',
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Border Color', 'creptaam'),
				'param_name' => 'border_color',
				'description' => esc_html__('Change border color', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-4',
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Border radius', 'creptaam'),
				'param_name' => 'border_radius',
				'description' => esc_html__('Enter box border radius. eg. 20px', 'creptaam'),
				'edit_field_class' => 'vc_col-sm-4',
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
		class WPBakeryShortCode_TT_Video_Embed extends WPBakeryShortCode {
		}
	}
endif;