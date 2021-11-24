<?php
/* Gutenberg support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kratz_gutenberg_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kratz_gutenberg_theme_setup9', 9 );
	function kratz_gutenberg_theme_setup9() {

		// Add wide and full blocks support
		add_theme_support( 'align-wide' );

		// Add editor styles to backend
		add_theme_support( 'editor-styles' );
		if ( kratz_exists_gutenberg() ) {
			if ( ! kratz_get_theme_setting( 'gutenberg_add_context' ) ) {
				add_editor_style( kratz_get_file_url( 'plugins/gutenberg/gutenberg-preview.css' ) );
			}
		} else {
			add_editor_style( kratz_get_file_url( 'css/editor-style.css' ) );
		}

		if ( kratz_exists_gutenberg() ) {
			add_action( 'wp_enqueue_scripts', 'kratz_gutenberg_frontend_scripts', 1100 );
			add_action( 'wp_enqueue_scripts', 'kratz_gutenberg_responsive_styles', 2000 );
			add_filter( 'kratz_filter_merge_styles', 'kratz_gutenberg_merge_styles' );
			add_filter( 'kratz_filter_merge_styles_responsive', 'kratz_gutenberg_merge_styles_responsive' );
		}
		add_action( 'enqueue_block_editor_assets', 'kratz_gutenberg_editor_scripts' );
		add_filter( 'kratz_filter_localize_script_admin',	'kratz_gutenberg_localize_script');
		add_action( 'after_setup_theme', 'kratz_gutenberg_add_editor_colors' );
		if ( is_admin() ) {
			add_filter( 'kratz_filter_tgmpa_required_plugins', 'kratz_gutenberg_tgmpa_required_plugins' );
			add_filter( 'kratz_filter_theme_plugins', 'kratz_gutenberg_theme_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kratz_gutenberg_tgmpa_required_plugins' ) ) {
	function kratz_gutenberg_tgmpa_required_plugins( $list = array() ) {
		if ( kratz_storage_isset( 'required_plugins', 'gutenberg' ) ) {
			if ( kratz_storage_get_array( 'required_plugins', 'gutenberg', 'install' ) !== false && version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ) {
				$list[] = array(
					'name'     => kratz_storage_get_array( 'required_plugins', 'gutenberg', 'title' ),
					'slug'     => 'gutenberg',
					'required' => false,
				);
			}
			
		}
		return $list;
	}
}

// Filter theme-supported plugins list
if ( ! function_exists( 'kratz_gutenberg_theme_plugins' ) ) {
	function kratz_gutenberg_theme_plugins( $list = array() ) {
		$group = ! empty( $list['gutenberg']['group'] )
					? $list['gutenberg']['group']
					: kratz_storage_get_array( 'required_plugins', 'gutenberg', 'group' ); 
		foreach ( $list as $k => $v ) {
			if ( in_array( $k, array( 'coblocks', 'kadence-blocks' ) ) ) {
				if ( empty( $v['group'] ) ) {
					$list[ $k ]['group'] = $group;
				}
				if ( empty( $list[ $k ]['logo'] ) ) {
					$list[ $k ]['logo'] = kratz_get_file_url( "plugins/gutenberg/logo-{$k}.png" );
				}
			}
		}
		return $list;
	}
}


// Check if Gutenberg is installed and activated
if ( ! function_exists( 'kratz_exists_gutenberg' ) ) {
	function kratz_exists_gutenberg() {
		return function_exists( 'register_block_type' );
	}
}

// Return true if Gutenberg exists and current mode is preview
if ( ! function_exists( 'kratz_gutenberg_is_preview' ) ) {
	function kratz_gutenberg_is_preview() {
		return kratz_exists_gutenberg() 
				&& (
					kratz_gutenberg_is_block_render_action()
					||
					kratz_is_post_edit()
					);
	}
}

// Return true if current mode is "Block render"
if ( ! function_exists( 'kratz_gutenberg_is_block_render_action' ) ) {
	function kratz_gutenberg_is_block_render_action() {
		return kratz_exists_gutenberg() 
				&& kratz_check_url( 'block-renderer' ) && ! empty( $_GET['context'] ) && 'edit' == $_GET['context'];
	}
}

// Return true if content built with "Gutenberg"
if ( ! function_exists( 'kratz_gutenberg_is_content_built' ) ) {
	function kratz_gutenberg_is_content_built($content) {
		return kratz_exists_gutenberg() 
				&& has_blocks( $content );	// This condition is equval to: strpos($content, '<!-- wp:') !== false;
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'kratz_gutenberg_frontend_scripts' ) ) {
	function kratz_gutenberg_frontend_scripts() {
		if ( kratz_is_on( kratz_get_theme_option( 'debug_mode' ) ) ) {
			$kratz_url = kratz_get_file_url( 'plugins/gutenberg/gutenberg.css' );
			if ( '' != $kratz_url ) {
				wp_enqueue_style( 'kratz-gutenberg', $kratz_url, array(), null );
			}
		}
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'kratz_gutenberg_responsive_styles' ) ) {
	function kratz_gutenberg_responsive_styles() {
		if ( kratz_is_on( kratz_get_theme_option( 'debug_mode' ) ) ) {
			$kratz_url = kratz_get_file_url( 'plugins/gutenberg/gutenberg-responsive.css' );
			if ( '' != $kratz_url ) {
				wp_enqueue_style( 'kratz-gutenberg-responsive', $kratz_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'kratz_gutenberg_merge_styles' ) ) {
	function kratz_gutenberg_merge_styles( $list ) {
		$list[] = 'plugins/gutenberg/gutenberg.css';
		return $list;
	}
}

// Merge responsive styles
if ( ! function_exists( 'kratz_gutenberg_merge_styles_responsive' ) ) {
	function kratz_gutenberg_merge_styles_responsive( $list ) {
		$list[] = 'plugins/gutenberg/gutenberg-responsive.css';
		return $list;
	}
}


// Load required styles and scripts for Gutenberg Editor mode
if ( ! function_exists( 'kratz_gutenberg_editor_scripts' ) ) {
	function kratz_gutenberg_editor_scripts() {
		kratz_admin_scripts(true);
		kratz_admin_localize_scripts();
		// Editor styles
		wp_enqueue_style( 'kratz-gutenberg-editor', kratz_get_file_url( 'plugins/gutenberg/gutenberg-editor.css' ), array(), null );
		if ( kratz_get_theme_setting( 'gutenberg_add_context' ) ) {
			wp_enqueue_style( 'kratz-gutenberg-preview', kratz_get_file_url( 'plugins/gutenberg/gutenberg-preview.css' ), array(), null );
		}
		// Editor scripts
		wp_enqueue_script( 'kratz-gutenberg-preview', kratz_get_file_url( 'plugins/gutenberg/gutenberg-preview.js' ), array( 'jquery' ), null, true );
	}
}

// Add plugin's specific variables to the scripts
if ( ! function_exists( 'kratz_gutenberg_localize_script' ) ) {
	function kratz_gutenberg_localize_script( $arr ) {
		// Color scheme
		$arr['color_scheme'] = kratz_get_theme_option( 'color_scheme' );
		// Sidebar position on the single posts
		$arr['sidebar_position'] = 'inherit';
		$arr['expand_content'] = 'inherit';
		$post_type = 'post';
		if ( kratz_gutenberg_is_preview() && ! empty( $_GET['post'] ) ) {
			$post_type = kratz_get_edited_post_type();
			$meta = get_post_meta( $_GET['post'], 'kratz_options', true );
			if ( 'page' != $post_type && ! empty( $meta['sidebar_position_single'] ) ) {
				$arr['sidebar_position'] = $meta['sidebar_position_single'];
			} elseif ( 'page' == $post_type && ! empty( $meta['sidebar_position'] ) ) {
				$arr['sidebar_position'] = $meta['sidebar_position'];
			}
			if ( isset( $meta['expand_content'] ) ) {
				$arr['expand_content'] = $meta['expand_content'];
			}
		}
		if ( 'inherit' == $arr['sidebar_position'] ) {
			if ( 'page' != $post_type ) {
				$arr['sidebar_position'] = kratz_get_theme_option( 'sidebar_position_single' );
				if ( 'inherit' == $arr['sidebar_position'] ) {
					$arr['sidebar_position'] = kratz_get_theme_option( 'sidebar_position_blog' );
				}
			}
			if ( 'inherit' == $arr['sidebar_position'] ) {
				$arr['sidebar_position'] = kratz_get_theme_option( 'sidebar_position' );
			}
		}
		if ( 'inherit' == $arr['expand_content'] ) {
			$arr['expand_content'] = kratz_get_theme_option( 'expand_content_single' );
			if ( 'inherit' == $arr['expand_content'] && 'post' == $post_type ) {
				$arr['expand_content'] = kratz_get_theme_option( 'expand_content_blog' );
			}
			if ( 'inherit' == $arr['expand_content'] ) {
				$arr['expand_content'] = kratz_get_theme_option( 'expand_content' );
			}
		}
		$arr['expand_content'] = (int) $arr['expand_content'];
		return $arr;
	}
}

// Save CSS with custom colors and fonts to the gutenberg-editor-style.css
if ( ! function_exists( 'kratz_gutenberg_save_css' ) ) {
	add_action( 'kratz_action_save_options', 'kratz_gutenberg_save_css', 30 );
	add_action( 'trx_addons_action_save_options', 'kratz_gutenberg_save_css', 30 );
	function kratz_gutenberg_save_css() {

		$msg = '/* ' . esc_html__( "ATTENTION! This file was generated automatically! Don't change it!!!", 'kratz' )
				. "\n----------------------------------------------------------------------- */\n";

		// Get main styles
		$css = kratz_fgc( kratz_get_file_dir( 'style.css' ) );

		// Append supported plugins styles
		$css .= kratz_fgc( kratz_get_file_dir( 'css/__plugins.css' ) );

		// Append theme-vars styles
		$css .= kratz_customizer_get_css(
			array(
				'colors' => kratz_get_theme_setting( 'separate_schemes' ) ? false : null,
			)
		);
		
		// Append color schemes
		if ( kratz_get_theme_setting( 'separate_schemes' ) ) {
			$schemes = kratz_get_sorted_schemes();
			if ( is_array( $schemes ) ) {
				foreach ( $schemes as $scheme => $data ) {
					$css .= kratz_customizer_get_css(
						array(
							'fonts'  => false,
							'colors' => $data['colors'],
							'scheme' => $scheme,
						)
					);
				}
			}
		}

		// Append responsive styles
		$css .= kratz_fgc( kratz_get_file_dir( 'css/__responsive.css' ) );

		// Add context class to each selector
		if ( kratz_get_theme_setting( 'gutenberg_add_context' ) && function_exists( 'trx_addons_css_add_context' ) ) {
			$css = trx_addons_css_add_context(
						$css,
						array(
							'context' => '.edit-post-visual-editor ',
							'context_self' => array( 'html', 'body', '.edit-post-visual-editor' )
							)
					);
		} else {
			$css = apply_filters( 'kratz_filter_prepare_css', $css );
		}

		// Save styles to the file
		kratz_fpc( kratz_get_file_dir( 'plugins/gutenberg/gutenberg-preview.css' ), $msg . $css );
	}
}


// Add theme-specific colors to the Gutenberg color picker
if ( ! function_exists( 'kratz_gutenberg_add_editor_colors' ) ) {
	function kratz_gutenberg_add_editor_colors() {
		$scheme = kratz_get_scheme_colors();
		$groups = kratz_storage_get( 'scheme_color_groups' );
		$names  = kratz_storage_get( 'scheme_color_names' );
		$colors = array();
		foreach( $groups as $g => $group ) {
			foreach( $names as $n => $name ) {
				$c = 'main' == $g ? ( 'text' == $n ? 'text_color' : $n ) : $g . '_' . str_replace( 'text_', '', $n );
				if ( isset( $scheme[ $c ] ) ) {
					$colors[] = array(
						'name'  => ( 'main' == $g ? '' : $group['title'] . ' ' ) . $name['title'],
						'slug'  => $c,
						'color' => $scheme[ $c ]
					);
				}
			}
			// Add only one group of colors
			// Delete next condition (or add false && to them) to add all groups
			if ( 'main' == $g ) {
				break;
			}
		}
		add_theme_support( 'editor-color-palette', $colors );
	}
}

// Add plugin-specific colors and fonts to the custom CSS
if ( kratz_exists_gutenberg() ) {
	require_once KRATZ_THEME_DIR . 'plugins/gutenberg/gutenberg-styles.php';
}
