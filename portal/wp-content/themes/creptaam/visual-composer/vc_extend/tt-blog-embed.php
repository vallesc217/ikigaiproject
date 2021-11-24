<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Blog Embed', 'creptaam'),
		'base' => 'tt_blog_embed',
		'icon' => 'fa fa-qrcode',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Full Blog Embed', 'creptaam'),
		'params' => array(

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Posts per page', 'creptaam'),
				'std' => 7,
				'param_name' => 'posts_per_page',
				'description' => esc_html__('Enter a number to show posts in a page', 'creptaam'),
			),

			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Blog Page URL', 'creptaam'),
				'param_name' => 'blog_page_url',
				'description' => esc_html__('Choose blog page link', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Change "VIEW ALL THE BITCON NEWS" text', 'creptaam'),
				'std' => esc_html__('VIEW ALL THE BITCON NEWS', 'creptaam'),
				'param_name' => 'button_text',
				'description' => esc_html__('You can change "VIEW ALL THE BITCON NEWS" button text', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Button Font Color', 'creptaam'),
				'param_name' => 'btn_color',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('You may change button font color', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Button Background Color', 'creptaam'),
				'param_name' => 'btn_bg',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('You may change button background color', 'creptaam'),
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
				'admin_label' => true,
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'creptaam'),
			),
		),
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_TT_Blog_Embed extends WPBakeryShortCode {
		}
	}
endif;