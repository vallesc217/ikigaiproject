<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( kratz_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
<?php wp_body_open(); ?>
	<?php do_action( 'kratz_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$kratz_header_type = kratz_get_theme_option( 'header_type' );
			if ( 'custom' == $kratz_header_type && ! kratz_is_layouts_available() ) {
				$kratz_header_type = 'default';
			}
			get_template_part( apply_filters( 'kratz_filter_get_template_part', "templates/header-{$kratz_header_type}" ) );

			// Side menu
			if ( in_array( kratz_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'kratz_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			kratz_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) || is_singular( 'attachment' ) ) {

					kratz_show_post_banner( 'background' );

					$kratz_post_thumbnail_type  = kratz_get_theme_option( 'post_thumbnail_type' );
					$kratz_post_header_position = kratz_get_theme_option( 'post_header_position' );
					$kratz_post_header_align    = kratz_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $kratz_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						ob_start();
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $kratz_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $kratz_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $kratz_post_header_position ) {
								kratz_show_post_title_and_meta();
							}

							// Featured image
							kratz_show_post_featured_image();

							// Post title and meta
							if ( in_array( $kratz_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								kratz_show_post_title_and_meta();
							}

							if ( 'boxed' === $kratz_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
						$kratz_post_header = ob_get_contents();
						ob_end_clean();
						if ( strpos( $kratz_post_header, 'post_featured' ) !== false
							|| strpos( $kratz_post_header, 'post_title' ) !== false
							|| strpos( $kratz_post_header, 'post_meta' ) !== false
						) {
							kratz_show_layout( $kratz_post_header );
						}
					}
				}

				// Widgets area above page content
				$kratz_body_style   = kratz_get_theme_option( 'body_style' );
				$kratz_widgets_name = kratz_get_theme_option( 'widgets_above_page' );
				$kratz_show_widgets = ! kratz_is_off( $kratz_widgets_name ) && is_active_sidebar( $kratz_widgets_name );
				if ( $kratz_show_widgets ) {
					if ( 'fullscreen' != $kratz_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					kratz_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $kratz_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}
				}

				// Content area
				?>
				<div class="content_wrap<?php echo 'fullscreen' == $kratz_body_style ? '_fullscreen' : ''; ?>">

					<div class="content">
						<?php
						// Widgets area inside page content
						kratz_create_widgets_area( 'widgets_above_content' );
