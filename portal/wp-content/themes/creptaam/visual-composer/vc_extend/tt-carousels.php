<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Fade Animation for title and subtitle
	$tt_css_animation = array(
		esc_html__('Select animation', 'creptaam') 	=> '',
		esc_html__('fadeIn', 'creptaam') 			=> 'fadeIn',
		esc_html__('fadeInDown', 'creptaam') 		=> 'fadeInDown',
		esc_html__('fadeInDownBig', 'creptaam') 		=> 'fadeInDownBig',
		esc_html__('fadeInLeft', 'creptaam') 		=> 'fadeInLeft',
		esc_html__('fadeInLeftBig', 'creptaam') 		=> 'fadeInLeftBig',
		esc_html__('fadeInRight', 'creptaam') 		=> 'fadeInRight',
		esc_html__('fadeInRightBig', 'creptaam') 	=> 'fadeInRightBig',
		esc_html__('fadeInUp', 'creptaam') 			=> 'fadeInUp',
		esc_html__('fadeInUpBig', 'creptaam') 		=> 'fadeInUpBig'
	);

	// animation delay
	$tt_animation_delay = array(
		esc_html__('Select delay option', 'creptaam') 	=> '',
		esc_html__('Delay 100ms', 'creptaam') 			=> 'delay-100',
		esc_html__('Delay 200ms', 'creptaam') 			=> 'delay-200',
		esc_html__('Delay 300ms', 'creptaam') 			=> 'delay-300',
		esc_html__('Delay 400ms', 'creptaam') 			=> 'delay-400',
		esc_html__('Delay 500ms', 'creptaam') 			=> 'delay-500',
		esc_html__('Delay 600ms', 'creptaam') 			=> 'delay-600',
		esc_html__('Delay 700ms', 'creptaam') 			=> 'delay-700',
		esc_html__('Delay 700ms', 'creptaam') 			=> 'delay-700',
		esc_html__('Delay 800ms', 'creptaam') 			=> 'delay-800',
		esc_html__('Delay 800ms', 'creptaam') 			=> 'delay-800',
		esc_html__('Delay 1000ms', 'creptaam') 			=> 'delay-1000',
		esc_html__('Delay 1200ms', 'creptaam') 			=> 'delay-1200',
		esc_html__('Delay 1500ms', 'creptaam') 			=> 'delay-1500',
		esc_html__('Delay 1800ms', 'creptaam') 			=> 'delay-1800'
	);

	// TT Carousel slider element
	vc_map( array(
		'name'                    => esc_html__( 'TT Carousel', 'creptaam' ),
		'base'                    => 'tt_carousels',
		'icon'                    => 'fa fa-picture-o',
		'description'             => esc_html__( 'Slider for home page, but you can use it any where in the page', 'creptaam' ),
		'as_parent'               => array( 'only' => 'tt_carousel' ),
		'content_element' 		  => true,
    	'show_settings_on_create' => false,
		'category'                => esc_html__( 'TT Elements', 'creptaam' ),
		// 'default_content'         => '[home_slide /]',
		'params'                  => array(

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Height', 'creptaam' ),
                'param_name'  => 'slider_height',
                'value'       => array(
                    esc_html__('Select', 'creptaam')  =>'',
                    esc_html__('Full Height', 'creptaam') => 'tt-full-height',
                    esc_html__('Custom', 'creptaam') => 'tt-custom-height'
				),
				'std' => 'tt-custom-height',
                'description' => esc_html__( 'Choose slider height.', 'creptaam' )
			),
			
			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for large screen', 'creptaam' ),
				'param_name' => 'custom_lg_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'std' => '750',
				'group' => esc_html__( 'Custom Height', 'creptaam' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 700px', 'creptaam' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for medium screen', 'creptaam' ),
				'param_name' => 'custom_md_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'std' => '650',
				'group' => esc_html__( 'Custom Height', 'creptaam' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 600px', 'creptaam' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for tablet', 'creptaam' ),
				'param_name' => 'custom_sm_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'std' => '600',
				'group' => esc_html__( 'Custom Height', 'creptaam' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 500px', 'creptaam' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for mobile large', 'creptaam' ),
				'param_name' => 'custom_xs_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'std' => '500',
				'group' => esc_html__( 'Custom Height', 'creptaam' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 400px', 'creptaam' )
			),

			array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Height for mobile small', 'creptaam' ),
				'param_name' => 'custom_xxs_height',
				'dependency' => array(
					'element' => 'slider_height',
					'value' => array('tt-custom-height')
				),
				'std' => '450',
				'group' => esc_html__( 'Custom Height', 'creptaam' ),
                'description' => esc_html__( 'Enter slider custom height in px. e.g: 300px', 'creptaam' )
			),
			
			// Navigation
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation visibility', 'creptaam' ),
                'param_name'  => 'navigation',
                'value'       => array(
                    esc_html__('Visible', 'creptaam')  => 'nav-visible',
                    esc_html__('Hidden', 'creptaam')  => 'nav-disable'
                ),
                'std'		  => 'nav-visible',
                'description' => esc_html__( 'Enable or disable navigation from here', 'creptaam' )
			),

			array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Nav Background', 'creptaam' ),
				'param_name'  => 'nav_bg',
				'dependency'  => array(
                    'element' => 'navigation',
                    'value'   => array( 'nav-visible' )
				),
				'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'You may change navigation background color ', 'creptaam' )
			),
			array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Nav Icon Color', 'creptaam' ),
				'param_name'  => 'nav_color',
				'dependency'  => array(
                    'element' => 'navigation',
                    'value'   => array( 'nav-visible' )
				),
				'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'You may change navigation icon color ', 'creptaam' )
			),
			
			array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Nav Border Radius', 'creptaam' ),
				'param_name'  => 'btn_border_radius',
				'dependency'  => array(
                    'element' => 'navigation',
                    'value'   => array( 'nav-visible' )
				),
				'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Enter button border radius. E.g: 15px', 'creptaam' )
			),
			
			array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Nav Icon Font Size', 'creptaam' ),
				'param_name'  => 'nav_font_size',
				'dependency'  => array(
                    'element' => 'navigation',
                    'value'   => array('nav-visible')
				),
				'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Enter navigation font size. E.g: 40px', 'creptaam' )
			),
			

			// Navigation
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Dots visibility', 'creptaam' ),
                'param_name'  => 'dots',
                'value'       => array(
                    esc_html__('Visible', 'creptaam')  => 'dots-visible',
                    esc_html__('Hidden', 'creptaam')  => 'dots-hidden'
                ),
                'std'		  => 'dots-hidden',
                'description' => esc_html__( 'Enable or disable slider dots from here', 'creptaam' )
			),
			
			// Slider Loop
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Loop', 'creptaam' ),
                'param_name'  => 'slider_loop',
                'value'       => array(
                    esc_html__('True', 'creptaam')  => 'loop-true',
                    esc_html__('False', 'creptaam')  => 'loop-false'
                ),
                'std'		  => 'loop-true',
                'description' => esc_html__( 'Enable or disable slider loop', 'creptaam' )
			),

			// Slider Loop
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Auto Play', 'creptaam' ),
                'param_name'  => 'auto_paly',
                'value'       => array(
                    esc_html__('True', 'creptaam')  => 'autoplay-true',
                    esc_html__('False', 'creptaam')  => 'autoplay-false'
                ),
                'std'		  => 'autoplay-true',
                'description' => esc_html__( 'Enable or disable slider autoplay', 'creptaam' )
			),

			// Slider Loop
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Mouse Drag', 'creptaam' ),
                'param_name'  => 'mouse_drag',
                'value'       => array(
                    esc_html__('True', 'creptaam')  => 'mousedrag-true',
                    esc_html__('False', 'creptaam')  => 'mousedrag-false'
                ),
                'std'		  => 'mousedrag-true',
                'description' => esc_html__( 'Enable or disable slider mouse drag', 'creptaam' )
			),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'creptaam' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'creptaam' ),
            ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'creptaam' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'creptaam' )
			)
		),
		'js_view'                 => 'VcColumnView',
	));


	vc_map( array(
		'name'            => esc_html__( 'Slide', 'creptaam' ),
		'base'            => 'tt_carousel',
		'as_child'        => array( 'only' => 'tt_carousels' ),
		'content_element' => true,
		'icon'            => 'fa fa-picture-o',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'creptaam' ),
				'param_name'  => 'slider_image',
				'description' => esc_html__( 'Select images from media library, dimension: min 1700x900', 'creptaam' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content alignment', 'creptaam' ),
                'param_name'  => 'content_alignment',
                'value'       => array(
                    esc_html__('Select content alignment', 'creptaam') => '',
                    esc_html__('Left', 'creptaam') => 'text-left',
                    esc_html__('Center', 'creptaam')  =>'text-center',
                    esc_html__('Right', 'creptaam')  =>'text-right' 
                ),
                'std'		  => 'text-left',
                'description' => esc_html__( 'Select content alignment', 'creptaam' )
			),
			
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content Max Width', 'creptaam' ),
                'param_name'  => 'content-max-width',
                'value'       => array(
                    esc_html__('Select Max Width', 'creptaam') => '',
                    esc_html__('30%', 'creptaam') => 'max-width-30',
                    esc_html__('40%', 'creptaam') => 'max-width-40',
                    esc_html__('50%', 'creptaam') => 'max-width-50',
                    esc_html__('60%', 'creptaam') => 'max-width-60',
                    esc_html__('70%', 'creptaam') => 'max-width-70',
                    esc_html__('80%', 'creptaam') => 'max-width-80',
                    esc_html__('90%', 'creptaam') => 'max-width-90',
                    esc_html__('100%', 'creptaam') => 'max-width-100',
				),
				'std' => 'max-width-60',
                'description' => esc_html__( 'Select max width of content', 'creptaam' ),
			),
			
			// SLIDER OVERLAY

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider overlay enable?', 'creptaam' ),
                'param_name'  => 'overlay_color',
                'value'       => array(
                    esc_html__('Yes', 'creptaam') => 'yes',
                    esc_html__('No', 'creptaam')  =>'no'
				),
				'std' => 'no',
                'description' => esc_html__( 'If you want to enable slider overlay color then select yes', 'creptaam' )
			),

			array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Overlay Color 1', 'creptaam' ),
				'param_name'  => 'overlay_bg2',
				'dependency'  => array(
                    'element' => 'overlay_color',
                    'value'   => array( 'yes' )
				),
				'edit_field_class'=>'vc_col-sm-6',
                'description' => esc_html__( 'Choose overlay background two ', 'creptaam' )
            ),
			
			array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Overlay Color 2', 'creptaam' ),
				'param_name'  => 'overlay_bg1',
				'dependency'  => array(
                    'element' => 'overlay_color',
                    'value'   => array( 'yes' )
				),
				'edit_field_class'=>'vc_col-sm-6',
                'description' => esc_html__( 'Choose overlay background one ', 'creptaam' )
            ),
			
			
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Overlay color opacity', 'creptaam' ),
                'param_name'  => 'overlay_color_opacity',
                'value'       => array(
                    esc_html__('Select', 'creptaam') => '',
                    esc_html__('Opacity 0.1', 'creptaam') => 'opacity-one',
                    esc_html__('Opacity 0.2', 'creptaam') => 'opacity-two',
                    esc_html__('Opacity 0.3', 'creptaam') => 'opacity-three',
                    esc_html__('Opacity 0.4', 'creptaam') => 'opacity-four',
                    esc_html__('Opacity 0.5', 'creptaam') => 'opacity-five',
                    esc_html__('Opacity 0.6', 'creptaam') => 'opacity-six',
                    esc_html__('Opacity 0.7', 'creptaam') => 'opacity-seven'
                ),
                'std'		  => 'opacity-0.3',
                'dependency'  => array(
                    'element' => 'overlay_color',
                    'value'   => array( 'yes' )
                ),
                'description' => esc_html__( 'If you want to enable slider overlay color then select yes', 'creptaam' )
			),







			// Intro title tab start
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Intro title', 'creptaam' ),
				'param_name'  	=> 'intro-title',
				'holder'		=> 'h5',
				'description' 	=> esc_html__( 'Enter intro title', 'creptaam' ),
				'group' 		=> esc_html__( 'Intro Title', 'creptaam' )
			),
			
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'creptaam' ),
				'param_name'  	=> 'intro-font-size',
				'description' 	=> esc_html__( 'Enter intro font size in px, e.g: 24px', 'creptaam' ),
				'group' 		=> esc_html__( 'Intro Title', 'creptaam' )
			),

			array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Font color', 'creptaam' ),
				'param_name'  	=> 'title-intro-color',
				'description' 	=> esc_html__( 'Enter title intro font color', 'creptaam' ),
				'group' 		=> esc_html__( 'Intro Title', 'creptaam' )
			),

			
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Margin bottom', 'creptaam' ),
				'param_name'  	=> 'intro_margin_bottom',
				'description' 	=> esc_html__( 'Enter margin bottom in px, e.g: 30px', 'creptaam' ),
				'group' 		=> esc_html__( 'Intro Title', 'creptaam' )
			),
			
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Intro title animation', 'creptaam' ),
				'param_name'  	=> 'intro_title_animation',
				'value'			=> $tt_css_animation,
				'std' => 'fadeInUp',
				'description' 	=> esc_html__( 'Select animation for intro title, e.g: fadeInDown', 'creptaam' ),
				'group' 		=> esc_html__( 'Intro Title', 'creptaam' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'creptaam' ),
				'param_name'  	=> 'intro_title_ani_delay',
				'value'			=> $tt_animation_delay,
				'std' => 'delay-200',
				'description' 	=> esc_html__( 'Select animation delay for intro title, e.g: Delay 300ms', 'creptaam' ),
				'group' 		=> esc_html__( 'Intro Title', 'creptaam' )
			),
			// Intro title tab end


			// Title tab start
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title', 'creptaam' ),
				'param_name'  	=> 'title',
				'holder'		=> 'h3',
				'std' => esc_html__('START MINING YOUR COINS WITH US.', 'creptaam'),
				'description' 	=> esc_html__( 'Enter banner title', 'creptaam' ),
				'group' 		=> esc_html__( 'Large title', 'creptaam' )
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'creptaam' ),
				'param_name'  	=> 'title-font-size',
				'description' 	=> esc_html__( 'Enter title font size in px, e.g: 60px', 'creptaam' ),
				'group' 		=> esc_html__( 'Large title', 'creptaam' )
			),

			array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Font color', 'creptaam' ),
				'param_name'  	=> 'title-font-color',
				'description' 	=> esc_html__( 'Enter title font color', 'creptaam' ),
				'group' 		=> esc_html__( 'Large title', 'creptaam' )
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Margin bottom', 'creptaam' ),
				'param_name'  	=> 'title_margin_bottom',
				'description' 	=> esc_html__( 'Enter margin bottom in px, e.g: 30px', 'creptaam' ),
				'group' 		=> esc_html__( 'Large title', 'creptaam' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Title animation', 'creptaam' ),
				'param_name'  	=> 'title_animation',
				'value'			=> $tt_css_animation,
				'std' => 'fadeInUp',
				'description' 	=> esc_html__( 'Select animation for title, e.g: fadeInUp', 'creptaam' ),
				'group' 		=> esc_html__( 'Large title', 'creptaam' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'creptaam' ),
				'param_name'  	=> 'title_ani_delay',
				'value'			=> $tt_animation_delay,
				'std' => 'delay-300',
				'description' 	=> esc_html__( 'Select animation delay for title, e.g: Delay 1200ms', 'creptaam' ),
				'group' 		=> esc_html__( 'Large title', 'creptaam' )
			),
			// Title tab End



			// Content tab start
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content visibility', 'creptaam' ),
                'param_name'  => 'content_visibility',
                'value'       => array(
                    esc_html__('Visible', 'creptaam') => 'visible',
                    esc_html__('Hidden', 'creptaam')  =>'hidden'
                ),
                'std'		  => 'visible',
                'group' 		=> esc_html__( 'Content', 'creptaam' ),
                'description' => esc_html__( 'Select content visibility option', 'creptaam' )
            ),

			array(
				'type'        	=> 'textarea_html',
				'heading'     	=> esc_html__( 'Content', 'creptaam' ),
				'param_name'  	=> 'content',
				'description' 	=> esc_html__( 'Enter banner content here', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
				'std' => esc_html__( 'Collaboratively engineer impactful niches for business technologies. Dramatically recaptiualize cross-unit.', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'creptaam' ),
				'param_name'  	=> 'content-font-size',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter content font size in px, e.g: 60px', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Font color', 'creptaam' ),
				'param_name'  	=> 'content-font-color',
				'description' 	=> esc_html__( 'Enter content font color', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Margin bottom', 'creptaam' ),
				'param_name'  	=> 'content_margin_bottom',
				'description' 	=> esc_html__( 'Enter margin bottom in px, e.g: 30px', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Padding Left', 'creptaam' ),
				'param_name'  	=> 'content_padding_left',
				'description' 	=> esc_html__( 'Enter content padding left in px, e.g: 60px', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
				),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Padding Right', 'creptaam' ),
				'param_name'  	=> 'content_padding_right',
				'description' 	=> esc_html__( 'Enter content padding right in px, e.g: 60px', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
				),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Content animation', 'creptaam' ),
				'param_name'  	=> 'content_animation',
				'value'			=> $tt_css_animation,
				'std' => 'fadeInUp',
				'description' 	=> esc_html__( 'Select animation for content, e.g: fadeInUp', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'creptaam' ),
				'param_name'  	=> 'content_ani_delay',
				'value'			=> $tt_animation_delay,
				'std' => 'delay-500',
				'description' 	=> esc_html__( 'Select animation delay for content, e.g: Delay 1200ms', 'creptaam' ),
				'group' 		=> esc_html__( 'Content', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'content_visibility',
                    'value'   => array( 'visible' )
                )
			),
			//End content tab


			// Button tab start
			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button visibility', 'creptaam' ),
                'param_name'  => 'button_visibility',
                'value'       => array(
                    esc_html__('Visible', 'creptaam') => 'visible',
                    esc_html__('Hidden', 'creptaam')  =>'hidden'
                ),
                'std'		  => 'visible',
                'group' 		=> esc_html__( 'Button', 'creptaam' ),
                'description' => esc_html__( 'Select button visibility option', 'creptaam' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Button style', 'creptaam' ),
                'param_name'  => 'button_style',
                'value'       => array(
                    esc_html__('Primary', 'creptaam') => 'btn-primary',
                    esc_html__('Outline', 'creptaam') => 'btn-outline',
                    esc_html__('Custom', 'creptaam') => 'btn-custom',
                ),
                'description' => esc_html__( 'Select a button style', 'creptaam' ),
                'group' 		=> esc_html__( 'Button', 'creptaam' ),
                'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
            ),

            array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Button Background', 'creptaam' ),
				'param_name'  	=> 'button_bg',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Choose button background', 'creptaam' ),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
                    'element' => 'button_style',
                    'value'   => array( 'btn-custom' )
                )
			),

            array(
				'type'        	=> 'colorpicker',
				'heading'     	=> esc_html__( 'Button Color', 'creptaam' ),
				'param_name'  	=> 'button_color',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Choose button color', 'creptaam' ),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
                    'element' => 'button_style',
                    'value'   => array( 'btn-custom' )
                )
			),

            array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Button text', 'creptaam' ),
				'param_name'  	=> 'button_text',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter button text', 'creptaam' ),
				'std' 		=> esc_html__( 'Get Quote', 'creptaam' ),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

            array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Border Radius', 'creptaam' ),
				'param_name'  	=> 'btn_radius',
				'value'       => array(
                    esc_html__('No Border Radius', 'creptaam') => '0px',
                    esc_html__('3px', 'creptaam') => '3px',
                    esc_html__('4px', 'creptaam') => '4px',
                    esc_html__('5px', 'creptaam') => '5px',
                    esc_html__('10px', 'creptaam') => '10px',
                    esc_html__('30px', 'creptaam') => '30px',
                ),
				'description' 	=> esc_html__( 'Enter button border radius', 'creptaam' ),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button Height', 'creptaam' ),
				'param_name'  => 'btn_height',
				'description' => esc_html__( 'Enter button border radius. E.g: 15px', 'creptaam' ),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'dependency'  => array (
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

            array(
				'type' => 'vc_link',
				'heading' => esc_html__('Button Link', 'tt-pl-textdomain'),
				'param_name' => 'link',
				'description' => esc_html__('Enter button url', 'tt-pl-textdomain'),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Button animation', 'creptaam' ),
				'param_name'  	=> 'button_animation',
				'value'			=> $tt_css_animation,
				'std' => 'fadeInUp',
				'description' 	=> esc_html__( 'Select animation for button, e.g: fadeInUp', 'creptaam' ),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'creptaam' ),
				'param_name'  	=> 'button_ani_delay',
				'value'			=> $tt_animation_delay,
				'std' => 'delay-700',
				'description' 	=> esc_html__( 'Select animation delay for button, e.g: Delay 1200ms', 'creptaam' ),
				'group' 		=> esc_html__( 'Button', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'button_visibility',
                    'value'   => array( 'visible' )
                )
			),
            //End button tab


			// extra image tab
			array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Extra Image', 'creptaam'),
                'param_name' => 'extra_image',
                'group' 		=> esc_html__( 'Extra Image', 'creptaam' ),
                'description' => esc_html__( 'Use an extra image', 'creptaam' )
            ),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Image Position', 'creptaam' ),
                'param_name'  => 'image-position',
                'value'       => array(
                    esc_html__('Select image position', 'creptaam') => '',
                    esc_html__('Left center', 'creptaam') => 'img-left-center',
                    esc_html__('Left top', 'creptaam') => 'img-left-top',
                    esc_html__('Left bottom', 'creptaam') => 'img-left-bottom',
                    esc_html__('Right center', 'creptaam') => 'img-right-center',
                    esc_html__('Right top', 'creptaam') => 'img-right-top',
                    esc_html__('Right bottom', 'creptaam') => 'img-right-bottom',
                ),
                'description' => esc_html__( 'Select image position', 'creptaam' ),
                'group' 		=> esc_html__( 'Extra Image', 'creptaam' )
			),
			
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Right Value', 'creptaam' ),
				'param_name'  	=> 'img_custom_right',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'You can add custom right value. e.g: 150px', 'creptaam' ),
				'group' 		=> esc_html__( 'Extra Image', 'creptaam' ),
				'dependency'  => array(
                    'element' => 'image-position',
                    'value'   => array( 'img-right-center', 'img-right-top', 'img-right-bottom' )
                )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Visibility', 'creptaam' ),
                'param_name'  => 'image-visibility',
                'value'       => array(
                    esc_html__('Visible all device', 'creptaam') => '',
                    esc_html__('Hidden from mobile', 'creptaam') => 'hidden-xs',
                    esc_html__('Hidden from tablet', 'creptaam') => 'hidden-sm',
                    esc_html__('Hidden from mobile and tablet', 'creptaam') => 'hidden-xs hidden-sm',
                    esc_html__('Hidden from laptop', 'creptaam') => 'hidden-md',
                    esc_html__('Hidden from desktop', 'creptaam') => 'hidden-lg',
                ),
                'description' => esc_html__( 'Select image position', 'creptaam' ),
                'group' 		=> esc_html__( 'Extra Image', 'creptaam' )
            ),

            array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Image animation', 'creptaam' ),
				'param_name'  	=> 'image_animation',
				'value'			=> $tt_css_animation,
				'std' => 'fadeInUp',
				'description' 	=> esc_html__( 'Select animation for image, e.g: fadeInUp', 'creptaam' ),
				'group' 		=> esc_html__( 'Extra Image', 'creptaam' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'creptaam' ),
				'param_name'  	=> 'image_ani_delay',
				'value'			=> $tt_animation_delay,
				'std' => 'delay-900',
				'description' 	=> esc_html__( 'Select animation delay for image, e.g: Delay 1200ms', 'creptaam' ),
				'group' 		=> esc_html__( 'Extra Image', 'creptaam' )
			),
            // end image tab

			array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'creptaam' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'creptaam' ),
            ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'creptaam' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'creptaam' )
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_tt_carousels extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_carousel extends WPBakeryShortCode {
		}
	}
endif;