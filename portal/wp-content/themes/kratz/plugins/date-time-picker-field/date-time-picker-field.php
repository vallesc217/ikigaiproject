<?php
/* Date Time Picker Field support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kratz_date_time_picker_field_feed_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kratz_date_time_picker_field_theme_setup9', 9 );
	function kratz_date_time_picker_field_theme_setup9() {
		add_action( 'wp_enqueue_scripts', 'kratz_date_time_picker_field_frontend_scripts', 1100 );
		add_filter( 'kratz_filter_merge_styles', 'kratz_date_time_picker_field_merge_styles' );
		if ( is_admin() ) {
			add_filter( 'kratz_filter_tgmpa_required_plugins', 'kratz_date_time_picker_field_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kratz_date_time_picker_field_tgmpa_required_plugins' ) ) {
	function kratz_date_time_picker_field_tgmpa_required_plugins( $list = array() ) {
		if ( kratz_storage_isset( 'required_plugins', 'date-time-picker-field' ) ) {
			$list[] = array(
				'name'     => kratz_storage_get_array( 'required_plugins', 'date-time-picker-field', 'title' ),
				'slug'     => 'date-time-picker-field',
				'required' => false,
			);
		}
		return $list;
	}
}
// Check if this plugin installed and activated
if ( ! function_exists( 'kratz_exists_date_time_picker_field' ) ) {
	function kratz_exists_date_time_picker_field() {
		return class_exists( 'CMoreira\\Plugins\\DateTimePicker\\Init' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'kratz_date_time_picker_field_frontend_scripts' ) ) {
	function kratz_date_time_picker_field_frontend_scripts() {
		if ( kratz_is_on( kratz_get_theme_option( 'debug_mode' ) ) ) {
			$kratz_url = kratz_get_file_url( 'plugins/date-time-picker-field/date-time-picker-field.css' );
			if ( '' != $kratz_url ) {
				wp_enqueue_style( 'kratz-date-time-picker-field', $kratz_url, array(), null );
			}
		}
	}
}
// Merge custom styles
if ( ! function_exists( 'kratz_date_time_picker_field_merge_styles' ) ) {
	function kratz_date_time_picker_field_merge_styles( $list ) {
		$list[] = 'plugins/date-time-picker-field/date-time-picker-field.css';
		return $list;
	}
}

// Add plugin-specific colors and fonts to the custom CSS
if ( kratz_exists_date_time_picker_field() ) {
	require_once KRATZ_THEME_DIR . 'plugins/date-time-picker-field/date-time-picker-field-styles.php'; 
}

// Set plugin's specific importer options
if ( !function_exists( 'kratz_date_time_picker_field_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'kratz_date_time_picker_field_importer_set_options' );
    function kratz_date_time_picker_field_importer_set_options($options=array()) {   
        if ( kratz_exists_date_time_picker_field() && in_array('date-time-picker-field', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'dtpicker';                    // Add slugs to export options for this plugin
        }
        return $options;
    }
}
