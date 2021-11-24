<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Team', 'creptaam'),
		'base' => 'tt_team',
		'icon' => 'fa fa-qrcode',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays Team', 'creptaam'),
		'params' => array(

			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Upload Team Photo', 'creptaam'),
				'param_name' => 'team_img',
				'description' => esc_html__('Upload a image from media library', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Name', 'creptaam'),
				'param_name' => 'team_name',
				'std' => 'John Doe',
				'edit_field_class' => 'vc_col-sm-7',
				'admin_label' => true,
				'description' => esc_html__('Enter team member\'s name', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Title Color', 'creptaam'),
				'param_name' => 'title_color',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-5',
				'description' => esc_html__('You may change color, if needed.', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Designation', 'creptaam'),
				'param_name' => 'team_desig',
				'std' => 'General Manager',
				'edit_field_class' => 'vc_col-sm-7',
				'admin_label' => true,
				'description' => esc_html__('Enter team member\'s designation', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Designation Color', 'creptaam'),
				'param_name' => 'desig_color',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-5',
				'description' => esc_html__('You may change color, if needed.', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Contact / Email / Social Link', 'creptaam'),
				'param_name' => 'contact_no',
				'std' => '352-834-5649',
				'edit_field_class' => 'vc_col-sm-5',
				'description' => esc_html__('Enter team\'s contact number', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Contact Color', 'creptaam'),
				'param_name' => 'contact_color',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-3',
				'description' => esc_html__('Change color.', 'creptaam'),
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Background Color', 'creptaam'),
				'param_name' => 'contact_bg',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-4',
				'description' => esc_html__('Change bg color', 'creptaam'),
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
		class WPBakeryShortCode_TT_Team extends WPBakeryShortCode {
		}
	}
endif;