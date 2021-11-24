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
<div class="kratz_admin_notice kratz_rate_notice update-nag">
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
	<h3 class="kratz_notice_title"><a href="<?php echo esc_url( kratz_storage_get( 'theme_rate_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'kratz' ),
				$kratz_theme_obj->name . ( KRATZ_THEME_FREE ? ' ' . __( 'Free', 'kratz' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="kratz_notice_text">
		<p><?php echo wp_kses_data( __( "We are glad you chose our WP theme for your website. You've done well customizing your website and we hope that you've enjoyed working with our theme.", 'kratz' ) ); ?></p>
		<p><?php echo wp_kses_data( __( "It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you've received from us.", 'kratz' ) ); ?></p>
		<p class="kratz_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving your reviews! Every time you leave a review, our CEO Henry Rise gives $5 to homeless dog shelter! Save the planet with us!', 'kratz' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="kratz_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( kratz_storage_get( 'theme_rate_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'kratz' ), $kratz_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( kratz_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'kratz' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( kratz_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'kratz' );
			?>
		</a>
		<?php
		// Dismiss
		?>
		<a href="#" class="kratz_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="kratz_hide_notice_text"><?php esc_html_e( 'Dismiss', 'kratz' ); ?></span></a>
	</div>
</div>
