<?php
if (!defined('ABSPATH')):
	exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')):

	vc_map(array(
		'name' => esc_html__('TT Icon Block', 'creptaam'),
		'base' => 'tt_icon_blocks',
		'icon' => 'fa fa-bell',
		'description' => esc_html__('Show off text with icon', 'creptaam'),
		'as_parent' => array('only' => 'tt_icon_block'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__('TT Elements', 'creptaam'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select gid column', 'creptaam'),
				'param_name' => 'grid_column',
				'value' => array(
					esc_html__('No Columns', 'creptaam') => '12',
					esc_html__('2 Columns', 'creptaam') => '6',
					esc_html__('3 Columns', 'creptaam') => '4',
					esc_html__('4 Columns', 'creptaam') => '3',
				),
				'std' => '12',
				'admin_label' => true,
				'description' => esc_html__('Select grid column', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Choose Block Style', 'creptaam'),
				'param_name' => 'featured_block_style',
				'value' => array(
					esc_html__('Default Block Style', 'creptaam') => 'default-block',
					esc_html__('Outline Block Style', 'creptaam') => 'outline-block',
					esc_html__('Dark Block Style', 'creptaam') => 'dark-block',
					esc_html__('Documentary Style', 'creptaam') => 'document-block',
				),
				'admin_label' => true,
				'description' => esc_html__('Select Featured Block Style', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Spacing Options', 'creptaam'),
				'param_name' => 'box_space',
				'value' => array(
					esc_html__('Yes', 'creptaam') => '',
					esc_html__('No', 'creptaam') => 'no-gutters',
				),
				'admin_label' => true,
				'description' => esc_html__('Select Featured Block Style', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Block height', 'creptaam'),
				'param_name' => 'block_height',
				'description' => esc_html__('Enter block height in px, e.g: 350px', 'creptaam'),
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
		'js_view' => 'VcColumnView',
	));

	// Icon block element
	vc_map(array(
		'name' => esc_html__('Add icon and details', 'creptaam'),
		'base' => 'tt_icon_block',
		'icon' => 'fa fa-align-center',
		'as_child' => array('only' => 'tt_icon_blocks'),
		'content_element' => true,
		'class' => 'repeatable-content-wrap',
		'params' => array(


			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'creptaam'),
				'param_name' => 'title',
				'holder' => 'h3',
				'description' => esc_html__('Enter title here', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title font size', 'creptaam'),
				'param_name' => 'title_size',
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Enter title font size here, e.g: 20px', 'creptaam'),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title bottom margin', 'creptaam'),
				'param_name' => 'title_margin',
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__('Enter title bottom margin, e.g: 20px', 'creptaam'),
			),

			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content', 'creptaam'),
				'param_name' => 'content',
				'description' => esc_html__('Enter content here.', 'creptaam'),
			),

			array(
				'type' => 'dropdown',
				'class' => '',
				'heading' => esc_html__('Choose Icon Type', 'creptaam'),
				'param_name' => 'icon_type',
				'value' => array(
					esc_html__('Icon', 'creptaam') => 'icon',
					esc_html__('Image', 'creptaam') => 'image',
					esc_html__('Disable Icon', 'creptaam') => 'disable',
				),
				'std' => 'yes',
				'description' => esc_html__('If you do not like to show icon then select no', 'creptaam'),
				'group' => 'Settings',
			),

			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Upload Icon Image', 'creptaam'),
				'param_name' => 'icon_image',
				'description' => esc_html__('Upload icon image from media library', 'creptaam'),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array('image'),
				),
				'group' => 'Settings',
			),

			array(
				'type' => 'dropdown',
				'class' => '',
				'heading' => esc_html__('Icon Style', 'creptaam'),
				'param_name' => 'icon_style',
				'value' => array(
					esc_html__('Default Style', 'creptaam') => 'icon-default',
					esc_html__('Square Style', 'creptaam') => 'icon-square',
					esc_html__('Round Style', 'creptaam') => 'icon-round',
					esc_html__('Circle Style', 'creptaam') => 'icon-circle',
				),
				'std' => 'icon-default',
				'description' => esc_html__('Select an icon style', 'creptaam'),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array('icon'),
				),
				'group' => 'Settings',
			),

			array(
				'type' => 'dropdown',
				'class' => '',
				'heading' => esc_html__('Select icon font', 'creptaam'),
				'param_name' => 'icon_font',
				'value' => array(
					esc_html__('select option', 'creptaam') => '',
					esc_html__('Fontawesome', 'creptaam') => 'fontawesome-icon',
					esc_html__('Material', 'creptaam') => 'material-icon',
					esc_html__('Flaticon', 'creptaam') => 'flat-icon',
				),
				'description' => esc_html__('There are two icon types fontawesome and flaticons, choose your type', 'creptaam'),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array('icon'),
				),
				'group' => 'Settings',
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Fontawesome', 'creptaam'),
				'param_name' => 'fontawesome_icon',
				'settings' => array(
					'type' => 'fontawesome',
				),
				'description' => esc_html__('Fontawesome list. Pickup your choice.', 'creptaam'
				),
				'dependency' => array(
					'element' => 'icon_font',
					'value' => array('fontawesome-icon'),
				),
				'group' => 'Settings',
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Material', 'creptaam'),
				'param_name' => 'material_icon',
				'settings' => array(
					'type' => 'material',
				),
				'description' => esc_html__('Material icon list. Pickup your choice.', 'creptaam'
				),
				'dependency' => array(
					'element' => 'icon_font',
					'value' => array('material-icon'),
				),
				'group' => 'Settings',
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Flaticon', 'creptaam'),
				'param_name' => 'flat_icon',
				'settings' => array(
					'type' => 'flaticon',
				),
				'description' => esc_html__('Flaticon list. Pickup your choice.', 'creptaam'
				),
				'dependency' => array(
					'element' => 'icon_font',
					'value' => array('flat-icon'),
				),
				'group' => 'Settings',
			),
			array(
				'type' => 'dropdown',
				'class' => '',
				'heading' => esc_html__('Icon position', 'creptaam'),
				'param_name' => 'icon_position',
				'value' => array(
					esc_html__('Select alginment', 'creptaam') => '',
					esc_html__('Left', 'creptaam') => 'icon-position-left',
					esc_html__('Right', 'creptaam') => 'icon-position-right',
					esc_html__('Top Center', 'creptaam') => 'icon-position-center',
					esc_html__('Top Left', 'creptaam') => 'icon-position-top-left',

				),
				'std' => 'icon-position-top-left',
				'description' => esc_html__('Change icon alignment using this option.', 'creptaam'),
				'group' => 'Settings',
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon size', 'creptaam'),
				'param_name' => 'icon_size',
				'description' => esc_html__('Enter icon size, e.g: 40px', 'creptaam'),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array('icon'),
				),
				'group' => 'Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Set custom link ?', 'creptaam'),
				'param_name' => 'custom_link',
				'value' => array(
					esc_html__('No', 'creptaam') => 'no',
					esc_html__('Yes', 'creptaam') => 'yes',
				),
				'description' => esc_html__('If you want to set custom link then select yes, the link will appear on title', 'creptaam'),
				'group' => 'Settings',
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Link', 'creptaam'),
				'param_name' => 'link',
				'description' => esc_html__('Enter link or select page as link', 'creptaam'),
				'dependency' => array(
					'element' => 'custom_link',
					'value' => array('yes'),
				),
				'group' => 'Settings',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Text', 'creptaam'),
				'param_name' => 'btn_text',
				'description' => esc_html__('Enter button text', 'creptaam'),
				'dependency' => array(
					'element' => 'custom_link',
					'value' => array('yes'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select Button Style', 'creptaam'),
				'param_name' => 'btn_style',
				'value' => array(
					esc_html__('Primary Button', 'creptaam') => 'btn-primary',
					esc_html__('Pink Button', 'creptaam') => 'btn-pink',
					esc_html__('Orange Button', 'creptaam') => 'btn-orange',
					esc_html__('White Button', 'creptaam') => 'btn-white',
					esc_html__('Custom', 'creptaam') => 'custom',
				),
				'description' => esc_html__('Choose button style', 'creptaam'),
				'dependency' => array(
					'element' => 'custom_link',
					'value' => array('yes'),
				),
				'std' => 'btn-primary',
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Icon color', 'creptaam'),
				'param_name' => 'icon_color_option',
				'value' => array(
					esc_html__('Default Color', 'creptaam') => '',
					esc_html__('Theme Color', 'creptaam') => 'theme-color',
					esc_html__('Custom Color', 'creptaam') => 'custom-color',
					esc_html__('Gradient', 'creptaam') => 'gradient',
					esc_html__('Gradient Custom', 'creptaam') => 'gradient-custom',
				),
				'description' => esc_html__('If you change default icon color then select custom color', 'creptaam'),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array('icon'),
				),
				'group' => 'Appearance Settings',
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Select color', 'creptaam'),
				'param_name' => 'icon_color',
				'description' => esc_html__('change icon color', 'creptaam'),
				'dependency' => array(
					'element' => 'icon_color_option',
					'value' => array('custom-color'),
				),
				'group' => 'Appearance Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Gradient Color 1', 'creptaam'),
				'param_name' => 'gradient_color_1',
				'description' => esc_html__('Select first color for gradient.', 'creptaam'),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => getVcShared('colors-dashed'),
				'std' => 'turquoise',
				'dependency' => array(
					'element' => 'icon_color_option',
					'value' => array('gradient'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Appearance Settings',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Gradient Color 2', 'creptaam'),
				'param_name' => 'gradient_color_2',
				'description' => esc_html__('Select second color for gradient.', 'creptaam'),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => getVcShared('colors-dashed'),
				'std' => 'blue',
				// must have default color grey
				'dependency' => array(
					'element' => 'icon_color_option',
					'value' => array('gradient'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Appearance Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Opacity for Color 1', 'creptaam'),
				'description' => esc_html__('Change the gradient color opacity', 'creptaam'),
				'param_name' => 'gradient_opacity_1',
				'value' => array(
					esc_html__('Select opacity', 'creptaam') => '',
					esc_html__('.1', 'creptaam') => '.1',
					esc_html__('.2', 'creptaam') => '.2',
					esc_html__('.3', 'creptaam') => '.3',
					esc_html__('.4', 'creptaam') => '.4',
					esc_html__('.5', 'creptaam') => '.5',
					esc_html__('.6', 'creptaam') => '.6',
					esc_html__('.7', 'creptaam') => '.7',
					esc_html__('.8', 'creptaam') => '.8',
					esc_html__('.9', 'creptaam') => '.9',
					esc_html__('1', 'creptaam') => '1',
				),
				'std' => '1',
				'dependency' => array(
					'element' => 'icon_color_option',
					'value' => array('gradient'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Appearance Settings',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Opacity for Color 2', 'creptaam'),
				'description' => esc_html__('Change the gradient color opacity', 'creptaam'),
				'param_name' => 'gradient_opacity_2',
				'value' => array(
					esc_html__('Select opacity', 'creptaam') => '',
					esc_html__('.1', 'creptaam') => '.1',
					esc_html__('.2', 'creptaam') => '.2',
					esc_html__('.3', 'creptaam') => '.3',
					esc_html__('.4', 'creptaam') => '.4',
					esc_html__('.5', 'creptaam') => '.5',
					esc_html__('.6', 'creptaam') => '.6',
					esc_html__('.7', 'creptaam') => '.7',
					esc_html__('.8', 'creptaam') => '.8',
					esc_html__('.9', 'creptaam') => '.9',
					esc_html__('1', 'creptaam') => '1',
				),
				'std' => '1',
				'dependency' => array(
					'element' => 'icon_color_option',
					'value' => array('gradient'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Appearance Settings',
			),

			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Gradient Color 1', 'creptaam'),
				'param_name' => 'gradient_custom_color_1',
				'description' => esc_html__('Select first color for gradient.', 'creptaam'),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => '#dd3333',
				'dependency' => array(
					'element' => 'icon_color_option',
					'value' => array('gradient-custom'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Appearance Settings',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Gradient Color 2', 'creptaam'),
				'param_name' => 'gradient_custom_color_2',
				'description' => esc_html__('Select second color for gradient.', 'creptaam'),
				'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
				'value' => '#eeee22',
				'dependency' => array(
					'element' => 'icon_color_option',
					'value' => array('gradient-custom'),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => 'Appearance Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Title color', 'creptaam'),
				'param_name' => 'title_color_option',
				'value' => array(
					esc_html__('Default color', 'creptaam') => '',
					esc_html__('Theme color', 'creptaam') => 'theme-color',
					esc_html__('Custom color', 'creptaam') => 'custom-color',
				),
				'group' => 'Appearance Settings',
				'description' => esc_html__('If you change default title color then select custom color', 'creptaam'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Select color', 'creptaam'),
				'param_name' => 'title_color',
				'description' => esc_html__('change title color', 'creptaam'),
				'dependency' => array(
					'element' => 'title_color_option',
					'value' => array('custom-color'),
				),
				'group' => 'Appearance Settings',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Box Background color', 'creptaam'),
				'param_name' => 'box_bg_color_options',
				'value' => array(
					esc_html__('Default color', 'creptaam') => '',
					esc_html__('Theme color', 'creptaam') => 'theme-color',
					esc_html__('Custom color', 'creptaam') => 'custom-color',
				),
				'group' => 'Appearance Settings',
				'description' => esc_html__('Box background will work when "Block Style = Default block style" be set up', 'creptaam'),
			),





			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Select color', 'creptaam'),
				'param_name' => 'box_bg_color',
				'description' => esc_html__('change box background color', 'creptaam'),
				'dependency' => array(
					'element' => 'box_bg_color_options',
					'value' => array('custom-color'),
				),
				'group' => 'Appearance Settings',
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

	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_tt_Icon_Blocks extends WPBakeryShortCodesContainer {
		}
	}

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_tt_Icon_Block extends WPBakeryShortCode {
		}
	}
endif;
