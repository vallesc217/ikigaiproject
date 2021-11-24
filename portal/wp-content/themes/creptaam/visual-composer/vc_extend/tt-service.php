<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Services', 'creptaam'),
		'base' => 'tt_service',
		'icon' => 'fa fa-linode',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays Services', 'creptaam'),
		'params' => array(

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Post Limit', 'creptaam'),
				'param_name' => 'post_limit',
				'std' => '-1',
				'admin_label' => true,
				'description' => esc_html__('Enter number of post to show, default is -1', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show or Hide content', 'creptaam'),
				'param_name' => 'show_hide_content',
				'value' => array(
					esc_html__('Show', 'creptaam') => 'show',
					esc_html__('Hide', 'creptaam') => 'hide',
				),
				'admin_label' => true,
				'std' => 'show',
				'description' => esc_html__('You can show or hide content.', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Content Limit', 'creptaam'),
				'param_name' => 'content_limit',
				'std' => '15',
				'admin_label' => true,
				'dependency' => array(
					'element' => 'show_hide_content',
					'value' => array('show'),
				),
				'description' => esc_html__('Enter content limit (in word)', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select grid column', 'creptaam'),
				'param_name' => 'grid_column',
				'value' => array(
					esc_html__('2 Columns', 'creptaam') => '6',
					esc_html__('3 Columns', 'creptaam') => '4',
					esc_html__('4 Columns', 'creptaam') => '3',
				),
				'admin_label' => true,
				'std' => '4',
				'description' => esc_html__('Select grid column', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Order by', 'creptaam'),
				'param_name' => 'orderby',
				'value' => array(
					esc_html__('Date', 'creptaam') => 'date',
					esc_html__('Order by post ID', 'creptaam') => 'ID',
					esc_html__('Author', 'creptaam') => 'author',
					esc_html__('Title', 'creptaam') => 'title',
					esc_html__('Last modified date', 'creptaam') => 'modified',
					esc_html__('Post parent ID', 'creptaam') => 'parent',
					esc_html__('Number of comments', 'creptaam') => 'comment_count',
					esc_html__('Menu order', 'creptaam') => 'menu_order',
					esc_html__('Meta value', 'creptaam') => 'meta_value',
					esc_html__('Meta value number', 'creptaam') => 'meta_value_num',
					esc_html__('Random order', 'creptaam') => 'rand',
				),
				'admin_label' => true,
				'std' => 'date',
				'description' => esc_html__('Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Sort order', 'creptaam'),
				'param_name' => 'order',
				'value' => array(
					esc_html__('ASC', 'creptaam') => 'ASC',
					esc_html__('DESC', 'creptaam') => 'DESC',
				),
				'admin_label' => true,
				'std' => 'DESC',
				'description' => esc_html__('You can change default order, Default is DESC', 'creptaam'),
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
		class WPBakeryShortCode_TT_Service extends WPBakeryShortCode {
		}
	}
endif;