<div class="front_page_section front_page_section_about<?php
	$kratz_scheme = kratz_get_theme_option( 'front_page_about_scheme' );
	if ( ! empty( $kratz_scheme ) && ! kratz_is_inherit( $kratz_scheme ) ) {
		echo ' scheme_' . esc_attr( $kratz_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( kratz_get_theme_option( 'front_page_about_paddings' ) );
?>"
		<?php
		$kratz_css      = '';
		$kratz_bg_image = kratz_get_theme_option( 'front_page_about_bg_image' );
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
	$kratz_anchor_icon = kratz_get_theme_option( 'front_page_about_anchor_icon' );
	$kratz_anchor_text = kratz_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $kratz_anchor_icon ) || ! empty( $kratz_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $kratz_anchor_icon ) ? ' icon="' . esc_attr( $kratz_anchor_icon ) . '"' : '' )
									. ( ! empty( $kratz_anchor_text ) ? ' title="' . esc_attr( $kratz_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( kratz_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' kratz-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$kratz_css           = '';
			$kratz_bg_mask       = kratz_get_theme_option( 'front_page_about_bg_mask' );
			$kratz_bg_color_type = kratz_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $kratz_bg_color_type ) {
				$kratz_bg_color = kratz_get_theme_option( 'front_page_about_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$kratz_caption = kratz_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $kratz_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $kratz_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $kratz_caption, 'kratz_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$kratz_description = kratz_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $kratz_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $kratz_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $kratz_description ), 'kratz_kses_content' ); ?></div>
				<?php
			}

			// Content
			$kratz_content = kratz_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $kratz_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $kratz_content ) ? 'filled' : 'empty'; ?>">
				<?php
					$kratz_page_content_mask = '%%CONTENT%%';
				if ( strpos( $kratz_content, $kratz_page_content_mask ) !== false ) {
					$kratz_content = preg_replace(
						'/(\<p\>\s*)?' . $kratz_page_content_mask . '(\s*\<\/p\>)/i',
						sprintf(
							'<div class="front_page_section_about_source">%s</div>',
							apply_filters( 'the_content', get_the_content() )
						),
						$kratz_content
					);
				}
					kratz_show_layout( $kratz_content );
				?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
