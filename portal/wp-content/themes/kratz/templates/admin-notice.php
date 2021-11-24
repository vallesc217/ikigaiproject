<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.1
 */

$kratz_theme_obj = wp_get_theme();
?>
<div class="kratz_admin_notice kratz_welcome_notice update-nag">
	<?php
	// Theme image
	$kratz_theme_img = kratz_get_file_url( 'screenshot.jpg' );
	if ( '' != $kratz_theme_img ) {
		?>
		<div class="kratz_notice_image"><img src="<?php echo esc_url( $kratz_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'kratz' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="kratz_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'kratz' ),
				$kratz_theme_obj->name . ( KRATZ_THEME_FREE ? ' ' . __( 'Free', 'kratz' ) : '' ),
				$kratz_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="kratz_notice_text">
		<p class="kratz_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $kratz_theme_obj->description ) );
			?>
		</p>
		<p class="kratz_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'kratz' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="kratz_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=kratz_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'kratz' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="kratz_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="kratz_hide_notice_text"><?php esc_html_e( 'Dismiss', 'kratz' ); ?></span></a>
	</div>
</div>
