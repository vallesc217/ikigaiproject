<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Latest Posts', 'creptaam'),
		'base' => 'tt_latest_posts',
		'icon' => 'fa fa-qrcode',
		'category' => esc_html__('TT Elements', 'creptaam'),
		'description' => esc_html__('Displays latest post', 'creptaam'),
		'params' => array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Post style', 'creptaam'),
				'param_name' => 'post_style',
				'value' => array(
					esc_html__('Style one (With thumb)', 'creptaam') => 'style-one',
					esc_html__('Style two (Whithout thumb)', 'creptaam') => 'style-two',
				),
				'admin_label' => true,
				'description' => esc_html__('Select recent post style', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Posts Source', 'creptaam'),
				'param_name' => 'post_source',
				'value' => array(
					esc_html__('From all post', 'creptaam') => "most-recent",
					esc_html__('By Category', 'creptaam') => "by-category",
					esc_html__('By Tag', 'creptaam') => "by-tag",
					esc_html__('By Post ID', 'creptaam') => "by-id",
					esc_html__('By Author', 'creptaam') => "by-author",
				),
				'admin_label' => true,
				'description' => esc_html__('Select posts source that you like to show.', 'creptaam'),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Post from category', 'creptaam'),
				'param_name' => 'taxonomies',
				'settings' => array(
					'multiple' => true,
					'values' => creptaam_category_list(),
					'unique_values' => true,
					'display_inline' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__('Enter categories name to show post from specific category, multiple category allowed', 'creptaam'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-category'),
				),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Post from tag', 'creptaam'),
				'param_name' => 'tags',
				'settings' => array(
					'multiple' => true,
					'values' => creptaam_tag_list(),
					'unique_values' => true,
					'display_inline' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__('Enter tags name to show post from specific tag, multiple tag allowed', 'creptaam'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-tag'),
				),
			),

			array(
				'type' => 'autocomplete',
				'heading' => esc_html__('Post from author', 'creptaam'),
				'param_name' => 'authors',
				'settings' => array(
					'multiple' => true,
					'values' => creptaam_autor_list(),
					'unique_values' => true,
					'display_inline' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__('Enter author name to show post from specific author, multiple author allowed', 'creptaam'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-author'),
				),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Post from ID', 'creptaam'),
				'param_name' => 'post_id',
				'description' => esc_html__('Enter the post IDs you would like to display separated by comma', 'creptaam'),
				'dependency' => array(
					'element' => 'post_source',
					'value' => array('by-id'),
				),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Post Limit', 'creptaam'),
				'param_name' => 'post_limit',
				'std' => '3',
				'admin_label' => true,
				'description' => esc_html__('Enter number of post to show', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title Limit', 'creptaam'),
				'param_name' => 'title_limit',
				'admin_label' => true,
				'description' => esc_html__('Enter title limit (in word)', 'creptaam'),
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
				'std' => 'hide',
				'description' => esc_html__('You can show or hide content.', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Content Limit', 'creptaam'),
				'param_name' => 'content_limit',
				'std' => '10',
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
				'type' => 'textfield',
				'heading' => esc_html__('Post offset', 'creptaam'),
				'param_name' => 'offset',
				'description' => esc_html__('number of post to displace or pass over. The offset parameter is ignored when total item => -1 (show all posts) is used.', 'creptaam'),
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
				'type' => 'autocomplete',
				'heading' => esc_html__('Exclude', 'creptaam'),
				'param_name' => 'exclude',
				'description' => esc_html__('Exclude posts by title.', 'creptaam'),
				'settings' => array(
					'values' => creptaam_post_data(),
					'multiple' => true,
				),
				'param_holder_class' => 'vc_grid-data-type-not-ids',
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
		class WPBakeryShortCode_tt_Latest_Posts extends WPBakeryShortCode {
		}
	}
endif;