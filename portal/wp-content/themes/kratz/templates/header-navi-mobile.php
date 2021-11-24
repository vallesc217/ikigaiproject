<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr( kratz_get_theme_option( 'menu_mobile_fullscreen' ) > 0 ? 'fullscreen' : 'narrow' ); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close theme_button_close"><span class="theme_button_close_icon"></span></a>
		<?php

		// Logo
		set_query_var( 'kratz_logo_args', array( 'type' => 'mobile' ) );
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'kratz_logo_args', array() );

		// Mobile menu
		$kratz_menu_mobile = kratz_get_nav_menu( 'menu_mobile' );
		if ( empty( $kratz_menu_mobile ) ) {
			$kratz_menu_mobile = apply_filters( 'kratz_filter_get_mobile_menu', '' );
			if ( empty( $kratz_menu_mobile ) ) {
				$kratz_menu_mobile = kratz_get_nav_menu( 'menu_main' );
				if ( empty( $kratz_menu_mobile ) ) {
					$kratz_menu_mobile = kratz_get_nav_menu();
				}
			}
		}
		if ( ! empty( $kratz_menu_mobile ) ) {
			$kratz_menu_mobile = str_replace(
				array( 'menu_main',   'id="menu-',        'sc_layouts_menu_nav', 'sc_layouts_menu ', 'sc_layouts_hide_on_mobile', 'hide_on_mobile' ),
				array( 'menu_mobile', 'id="menu_mobile-', '',                    ' ',                '',                          '' ),
				$kratz_menu_mobile
			);
			if ( strpos( $kratz_menu_mobile, '<nav ' ) === false ) {
				$kratz_menu_mobile = sprintf( '<nav class="menu_mobile_nav_area" itemscope itemtype="https://schema.org/SiteNavigationElement">%s</nav>', $kratz_menu_mobile );
			}
			kratz_show_layout( apply_filters( 'kratz_filter_menu_mobile_layout', $kratz_menu_mobile ) );
		}

		// Search field
		do_action(
			'kratz_action_search',
			array(
				'style' => 'normal',
				'class' => 'search_mobile',
				'ajax'  => false
			)
		);

		// Social icons
		kratz_show_layout( kratz_get_socials_links(), '<div class="socials_mobile">', '</div>' );
		?>
	</div>
</div>
