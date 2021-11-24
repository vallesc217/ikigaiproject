<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.10
 */

// Footer menu
$kratz_menu_footer = kratz_get_nav_menu( 'menu_footer' );
if ( ! empty( $kratz_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php
			kratz_show_layout(
				$kratz_menu_footer,
				'<nav class="menu_footer_nav_area sc_layouts_menu sc_layouts_menu_default"'
					. ' itemscope itemtype="//schema.org/SiteNavigationElement"'
					. '>',
				'</nav>'
			);
			?>
		</div>
	</div>
	<?php
}
