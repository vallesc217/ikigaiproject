<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'kratz_storage_get' ) ) {
	function kratz_storage_get( $var_name, $default = '' ) {
		global $KRATZ_STORAGE;
		return isset( $KRATZ_STORAGE[ $var_name ] ) ? $KRATZ_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'kratz_storage_set' ) ) {
	function kratz_storage_set( $var_name, $value ) {
		global $KRATZ_STORAGE;
		$KRATZ_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'kratz_storage_empty' ) ) {
	function kratz_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $KRATZ_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $KRATZ_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $KRATZ_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $KRATZ_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'kratz_storage_isset' ) ) {
	function kratz_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $KRATZ_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $KRATZ_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $KRATZ_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $KRATZ_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'kratz_storage_inc' ) ) {
	function kratz_storage_inc( $var_name, $value = 1 ) {
		global $KRATZ_STORAGE;
		if ( empty( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = 0;
		}
		$KRATZ_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'kratz_storage_concat' ) ) {
	function kratz_storage_concat( $var_name, $value ) {
		global $KRATZ_STORAGE;
		if ( empty( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = '';
		}
		$KRATZ_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'kratz_storage_get_array' ) ) {
	function kratz_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $KRATZ_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $KRATZ_STORAGE[ $var_name ][ $key ] ) ? $KRATZ_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $KRATZ_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $KRATZ_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'kratz_storage_set_array' ) ) {
	function kratz_storage_set_array( $var_name, $key, $value ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$KRATZ_STORAGE[ $var_name ][] = $value;
		} else {
			$KRATZ_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'kratz_storage_set_array2' ) ) {
	function kratz_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $KRATZ_STORAGE[ $var_name ][ $key ] ) ) {
			$KRATZ_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$KRATZ_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$KRATZ_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'kratz_storage_merge_array' ) ) {
	function kratz_storage_merge_array( $var_name, $key, $value ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$KRATZ_STORAGE[ $var_name ] = array_merge( $KRATZ_STORAGE[ $var_name ], $value );
		} else {
			$KRATZ_STORAGE[ $var_name ][ $key ] = array_merge( $KRATZ_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'kratz_storage_set_array_after' ) ) {
	function kratz_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			kratz_array_insert_after( $KRATZ_STORAGE[ $var_name ], $after, $key );
		} else {
			kratz_array_insert_after( $KRATZ_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'kratz_storage_set_array_before' ) ) {
	function kratz_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			kratz_array_insert_before( $KRATZ_STORAGE[ $var_name ], $before, $key );
		} else {
			kratz_array_insert_before( $KRATZ_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'kratz_storage_push_array' ) ) {
	function kratz_storage_push_array( $var_name, $key, $value ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $KRATZ_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $KRATZ_STORAGE[ $var_name ][ $key ] ) ) {
				$KRATZ_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $KRATZ_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'kratz_storage_pop_array' ) ) {
	function kratz_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $KRATZ_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $KRATZ_STORAGE[ $var_name ] ) && is_array( $KRATZ_STORAGE[ $var_name ] ) && count( $KRATZ_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $KRATZ_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $KRATZ_STORAGE[ $var_name ][ $key ] ) && is_array( $KRATZ_STORAGE[ $var_name ][ $key ] ) && count( $KRATZ_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $KRATZ_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'kratz_storage_inc_array' ) ) {
	function kratz_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( empty( $KRATZ_STORAGE[ $var_name ][ $key ] ) ) {
			$KRATZ_STORAGE[ $var_name ][ $key ] = 0;
		}
		$KRATZ_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'kratz_storage_concat_array' ) ) {
	function kratz_storage_concat_array( $var_name, $key, $value ) {
		global $KRATZ_STORAGE;
		if ( ! isset( $KRATZ_STORAGE[ $var_name ] ) ) {
			$KRATZ_STORAGE[ $var_name ] = array();
		}
		if ( empty( $KRATZ_STORAGE[ $var_name ][ $key ] ) ) {
			$KRATZ_STORAGE[ $var_name ][ $key ] = '';
		}
		$KRATZ_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'kratz_storage_call_obj_method' ) ) {
	function kratz_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $KRATZ_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $KRATZ_STORAGE[ $var_name ] ) ? $KRATZ_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $KRATZ_STORAGE[ $var_name ] ) ? $KRATZ_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'kratz_storage_get_obj_property' ) ) {
	function kratz_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $KRATZ_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $KRATZ_STORAGE[ $var_name ]->$prop ) ? $KRATZ_STORAGE[ $var_name ]->$prop : $default;
	}
}
