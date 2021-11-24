<?php
/**
 * Child-Theme functions and definitions
 */

function kratz_child_scripts() {
    wp_enqueue_style( 'kratz-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'kratz_child_scripts' );
 
?>