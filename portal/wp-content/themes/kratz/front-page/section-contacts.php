<div class="front_page_section front_page_section_contacts<?php
	$kratz_scheme = kratz_get_theme_option( 'front_page_contacts_scheme' );
	if ( ! empty( $kratz_scheme ) && ! kratz_is_inherit( $kratz_scheme ) ) {
		echo ' scheme_' . esc_attr( $kratz_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( kratz_get_theme_option( 'front_page_contacts_paddings' ) );
?>"
		<?php
		$kratz_css      = '';
		$kratz_bg_image = kratz_get_theme_option( 'front_page_contacts_bg_image' );
		if ( ! empty( $kratz_bg_image ) ) {
			$kratz_css .= 'background-image: url(' . esc_url( kratz_get_attachment_url( $kratz_bg_image ) ) . ');';
		}
		if ( ! empty( $kratz_css ) ) {
			echo ' style="' . esc_attr( $kratz_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$kratz_anchor_icon = kratz_get_theme_option( 'front_page_contacts_anchor_icon' );
	$kratz_anchor_text = kratz_get_theme_option( 'front_page_contacts_anchor_text' );
if ( ( ! empty( $kratz_anchor_icon ) || ! empty( $kratz_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_contacts"'
									. ( ! empty( $kratz_anchor_icon ) ? ' icon="' . esc_attr( $kratz_anchor_icon ) . '"' : '' )
									. ( ! empty( $kratz_anchor_text ) ? ' title="' . esc_attr( $kratz_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_contacts_inner
	<?php
	if ( kratz_get_theme_option( 'front_page_contacts_fullheight' ) ) {
		echo ' kratz-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$kratz_css      = '';
			$kratz_bg_mask  = kratz_get_theme_option( 'front_page_contacts_bg_mask' );
			$kratz_bg_color_type = kratz_get_theme_option( 'front_page_contacts_bg_color_type' );
			if ( 'custom' == $kratz_bg_color_type ) {
				$kratz_bg_color = kratz_get_theme_option( 'front_page_contacts_bg_color' );
			} elseif ( 'scheme_bg_color' == $kratz_bg_color_type ) {
				$kratz_bg_color = kratz_get_scheme_color( 'bg_color', $kratz_scheme );
			} else {
				$kratz_bg_color = '';
			}
			if ( ! empty( $kratz_bg_color ) && $kratz_bg_mask > 0 ) {
				$kratz_css .= 'background-color: ' . esc_attr(
					1 == $kratz_bg_mask ? $kratz_bg_color : kratz_hex2rgba( $kratz_bg_color, $kratz_bg_mask )
				) . ';';
			}
			if ( ! empty( $kratz_css ) ) {
				echo ' style="' . esc_attr( $kratz_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_contacts_content_wrap content_wrap">
			<?php

			// Title and description
			$kratz_caption     = kratz_get_theme_option( 'front_page_contacts_caption' );
			$kratz_description = kratz_get_theme_option( 'front_page_contacts_description' );
			if ( ! empty( $kratz_caption ) || ! empty( $kratz_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $kratz_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_contacts_caption front_page_block_<?php echo ! empty( $kratz_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $kratz_caption, 'kratz_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description
				if ( ! empty( $kratz_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_contacts_description front_page_block_<?php echo ! empty( $kratz_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $kratz_description ), 'kratz_kses_content' );
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$kratz_content = kratz_get_theme_option( 'front_page_contacts_content' );
			$kratz_layout  = kratz_get_theme_option( 'front_page_contacts_layout' );
			if ( 'columns' == $kratz_layout && ( ! empty( $kratz_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_columns front_page_section_contacts_columns columns_wrap">
					<div class="column-1_3">
				<?php
			}

			if ( ( ! empty( $kratz_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_content front_page_section_contacts_content front_page_block_<?php echo ! empty( $kratz_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $kratz_content, 'kratz_kses_content' );
				?>
				</div>
				<?php
			}

			if ( 'columns' == $kratz_layout && ( ! empty( $kratz_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div><div class="column-2_3">
				<?php
			}

			// Shortcode output
			$kratz_sc = kratz_get_theme_option( 'front_page_contacts_shortcode' );
			if ( ! empty( $kratz_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_contacts_output front_page_block_<?php echo ! empty( $kratz_sc ) ? 'filled' : 'empty'; ?>">
				<?php
					kratz_show_layout( do_shortcode( $kratz_sc ) );
				?>
				</div>
				<?php
			}

			if ( 'columns' == $kratz_layout && ( ! empty( $kratz_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>

		</div>
	</div>
</div>
