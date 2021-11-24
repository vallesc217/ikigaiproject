<?php
/**
 * The template file to display taxonomies archive
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0.57
 */

// Redirect to the template page (if exists) for output current taxonomy
if ( is_category() || is_tag() || is_tax() ) {
	$kratz_term = get_queried_object();
	global $wp_query;
	if ( ! empty( $kratz_term->taxonomy ) && ! empty( $wp_query->posts[0]->post_type ) ) {
		$kratz_taxonomy  = kratz_get_post_type_taxonomy( $wp_query->posts[0]->post_type );
		if ( $kratz_taxonomy == $kratz_term->taxonomy ) {
			$kratz_template_page_id = kratz_get_template_page_id( array(
				'post_type'  => $wp_query->posts[0]->post_type,
				'parent_cat' => $kratz_term->term_id
			) );
			if ( 0 < $kratz_template_page_id ) {
				wp_safe_redirect( get_permalink( $kratz_template_page_id ) );
				exit;
			}
		}
	}
}
// If template page is not exists - display default blog archive template
get_template_part( apply_filters( 'kratz_filter_get_template_part', kratz_blog_archive_get_template() ) );
