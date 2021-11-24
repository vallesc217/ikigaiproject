<?php
	if ( ! defined( 'ABSPATH' ) ) :
	    exit; // Exit if accessed directly
	endif;

	// remove vc element
	vc_remove_element( 'vc_tta_tour' );

	// vc remove param
	vc_remove_param( 'vc_row', 'gap' );
	vc_remove_param( 'vc_row', 'equal_height' );
	vc_remove_param( 'vc_row', 'el_class' );
	vc_remove_param( 'vc_column', 'el_class' );
	vc_remove_param( 'vc_row', 'full_width' );
	vc_remove_param( 'vc_tta_tabs', 'style' );
	vc_remove_param( 'vc_btn', 'color' );
	vc_remove_param( 'vc_btn', 'el_class' );
	vc_remove_param( 'vc_tta_accordion', 'color' );


	// add param on row
	$row_attr = array(
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Content Width', 'creptaam'),
			'param_name' 	=> 'section_content_width',
			'value' 		=> array(
				esc_html__( 'Fixed Width', 'creptaam' ) => 'container',
				esc_html__( 'Full Width', 'creptaam' ) => 'container-fullwidth',
			),
			'description' 	=> esc_html__( 'Select content width', 'creptaam' ),
			'weight'		=> 1
		),

		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply overlay or gradient background ?', 'creptaam' ),
			'param_name'  => 'apply_overlay',
			'description' => esc_html__( 'If you want to apply overlay color then check this option', 'creptaam' ),
		),

		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Overlay color', 'creptaam'),
			'param_name' 	=> 'overlay_color_opt',
			'value' 		=> array(
				esc_html__( 'Default', 'creptaam' ) => '',
				esc_html__( 'Dark Blue', 'creptaam' ) => 'dark-blue-overlay',
				esc_html__( 'Violet Overlay', 'creptaam' ) => 'violet-overlay',
				esc_html__( 'Orange Overlay', 'creptaam' ) => 'orange-overlay',
				esc_html__( 'Pink Overlay', 'creptaam' ) => 'pink-overlay',
				esc_html__( 'Blue Overlay', 'creptaam' ) => 'blue-overlay',
				esc_html__( 'Purple Overlay', 'creptaam' ) => 'purple-overlay',
				esc_html__( 'Red Overlay', 'creptaam' ) => 'red-overlay',
				esc_html__( '---------------------------------------------------------------', 'creptaam' ) => '',
				esc_html__( 'Orange gradient background', 'creptaam' ) => 'orange-gradient-bg',
				esc_html__( 'Pink gradient background', 'creptaam' ) => 'pink-gradient-bg',
				esc_html__( 'Blue gradient background', 'creptaam' ) => 'blue-gradient-bg',
				esc_html__( 'Purple gradient background', 'creptaam' ) => 'purple-gradient-bg',
				esc_html__( 'Red gradient background', 'creptaam' ) => 'red-gradient-bg',
				esc_html__( 'Custom background color', 'creptaam' ) => 'custom-color'
			),
			'description' 	=> esc_html__( 'Select overlay color', 'creptaam' ),
			'dependency'  => array(
	            'element'   => 'apply_overlay',
	            'not_empty' => true
	        )
		),

		array(
	        'type'        =>'colorpicker',
	        'heading'     => esc_html__( 'Select color', 'creptaam' ),
	        'param_name'  => 'overlay_color',
	        'description' => esc_html__( 'Select custom color for overlay', 'creptaam' ),
	        'dependency'  => array(
	            'element'   => 'overlay_color_opt',
	            'value' 	=> 'custom-color'
	        )
	    ),

	    array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply particle effect?', 'creptaam' ),
			'param_name'  => 'apply_particle',
			'description' => esc_html__( 'If you want to apply particle effect then check this option', 'creptaam' ),
			'gropu'		  => esc_html__( 'Particle', 'creptaam' ),
		),

		array(
	        'type'        =>'colorpicker',
	        'heading'     => esc_html__( 'Select color', 'creptaam' ),
	        'param_name'  => 'particle_color',
	        'description' => esc_html__( 'Select custom color for overlay', 'creptaam' ),
	        'dependency'  => array(
	            'element'   => 'apply_particle',
	            'not_empty' => true
	        )
	    ),

	    // particle postion
	    array(
		    'type'        => 'dropdown',
		    'heading'     => esc_html__( 'Particle position', 'tt-pl-textdomain' ),
		    'param_name'  => 'tt_particle_position_opt',
		    'value'       => array(
		        esc_html__('Default ', 'tt-pl-textdomain') 	=> '',
		        esc_html__('Bellow the content', 'tt-pl-textdomain')  	=> 'tt_particle_bellow',
		        esc_html__('Above the content', 'tt-pl-textdomain')  	=> 'tt_particle_above'
		    ),
		    'dependency'  => array(
	            'element'   => 'apply_particle',
	            'not_empty' => true
	        ),
		    'description' 	=> esc_html__( 'Select particle position', 'tt-pl-textdomain' )
		),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'creptaam' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'creptaam' )
		)
	);
	vc_add_params( 'vc_row', $row_attr );



	// add param on column
	$col_attr = array(
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply box shadow ?', 'creptaam' ),
			'param_name'  => 'box_shadow',
			'description' => esc_html__( 'You can apply box shadow on content wrapper', 'creptaam' ),
		),

		array(
	        'type'        =>'colorpicker',
	        'heading'     => esc_html__( 'Select color', 'creptaam' ),
	        'param_name'  => 'shadow_bg_color',
	        'description' => esc_html__( 'Select shadow background color', 'creptaam' ),
	        'dependency'  => array(
	            'element'   => 'box_shadow',
	            'not_empty' => true
	        )
	    ),

	    array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Apply box padding ?', 'creptaam' ),
			'param_name'  => 'box_padding',
			'description' => esc_html__( 'You can apply box padding', 'creptaam' ),
			'dependency'  => array(
	            'element'   => 'box_shadow',
	            'not_empty' => true
	        )
		),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'creptaam' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'creptaam' )
		)
	);
	vc_add_params( 'vc_column', $col_attr );



	// add param on button
	$btn_attr = array(
		array(
			'type' 					=> 'dropdown',
			'heading' 				=> __( 'Color', 'creptaam' ),
			'param_name' 			=> 'color',
			'description' 			=> __( 'Select button color.', 'creptaam' ),
			'param_holder_class' 	=> 'vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
				esc_html__('Theme Primary', 'creptaam' ) => 'theme_primary_color',
				esc_html__('Theme Orange', 'creptaam' ) => 'theme_orange_color',
				esc_html__('Theme Pink', 'creptaam' ) => 'theme_pink_color',
				esc_html__('Blue', 'creptaam' ) => 'blue',
				esc_html__('Turquoise', 'creptaam' ) => 'turquoise',
				esc_html__('Pink', 'creptaam' ) => 'pink',
				esc_html__('Violet', 'creptaam' ) => 'violet',
				esc_html__('Peacoc', 'creptaam' ) => 'peacoc',
				esc_html__('Chino', 'creptaam' ) => 'chino',
				esc_html__('Mulled Wine', 'creptaam' ) => 'mulled_wine',
				esc_html__('Vista Blue', 'creptaam' ) => 'vista_blue',
				esc_html__('Grey', 'creptaam' ) => 'grey',
				esc_html__('Black', 'creptaam' ) => 'black',
				esc_html__('Orange', 'creptaam' ) => 'orange',
				esc_html__('Sky', 'creptaam' ) => 'sky',
				esc_html__('Green', 'creptaam' ) => 'green',
				esc_html__('Juicy pink', 'creptaam' ) => 'juicy_pink',
				esc_html__('Sandy brown', 'creptaam' ) => 'sandy_brown',
				esc_html__('Purple', 'creptaam' ) => 'purple',
				esc_html__('White', 'creptaam' ) => 'white'
			),
			'std' => 'theme_primary_color',
			
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array(
					'custom',
					'outline-custom',
					'gradient',
					'gradient-custom',
				),
			)
		),

		array(
			'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'creptaam' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'creptaam' )
		)
	);
	vc_add_params( 'vc_btn', $btn_attr );

	// add param on accordion
	$attributes = array(

		array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'value' => array(
				esc_html__('Theme Default', 'creptaam' ) => 'theme_default_color',
				esc_html__('Theme Dark Blue', 'creptaam' ) => 'theme_dark_blue',
				esc_html__('Theme Light Blue', 'creptaam' ) => 'theme_light_blue',

				esc_html__('Blue', 'creptaam' ) => 'blue',
				esc_html__('Turquoise', 'creptaam' ) => 'turquoise',
				esc_html__('Pink', 'creptaam' ) => 'pink',
				esc_html__('Violet', 'creptaam' ) => 'violet',
				esc_html__('Peacoc', 'creptaam' ) => 'peacoc',
				esc_html__('Chino', 'creptaam' ) => 'chino',
				esc_html__('Mulled Wine', 'creptaam' ) => 'mulled_wine',
				esc_html__('Vista Blue', 'creptaam' ) => 'vista_blue',
				esc_html__('Grey', 'creptaam' ) => 'grey',
				esc_html__('Black', 'creptaam' ) => 'black',
				esc_html__('Orange', 'creptaam' ) => 'orange',
				esc_html__('Sky', 'creptaam' ) => 'sky',
				esc_html__('Green', 'creptaam' ) => 'green',
				esc_html__('Juicy pink', 'creptaam' ) => 'juicy_pink',
				esc_html__('Sandy brown', 'creptaam' ) => 'sandy_brown',
				esc_html__('Purple', 'creptaam' ) => 'purple',
				esc_html__('White', 'creptaam' ) => 'white'
			),
			'std' => 'grey',
			'heading' => esc_html__( 'Color', 'creptaam' ),
			'description' => esc_html__( 'Select accordion color.', 'creptaam' ),
			'param_holder_class' => 'vc_colored-dropdown',
			'weight' => 2
		),

	);
	vc_add_params( 'vc_tta_accordion', $attributes );