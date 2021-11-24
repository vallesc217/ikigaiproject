<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage KRATZ
 * @since KRATZ 1.0
 */

kratz_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	kratz_blog_archive_start();

	$kratz_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$kratz_sticky_out = kratz_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $kratz_stickies ) && count( $kratz_stickies ) > 0 && get_query_var( 'paged' ) < 1;

	// Show filters
	$kratz_cat          = kratz_get_theme_option( 'parent_cat' );
	$kratz_post_type    = kratz_get_theme_option( 'post_type' );
	$kratz_taxonomy     = kratz_get_post_type_taxonomy( $kratz_post_type );
	$kratz_show_filters = kratz_get_theme_option( 'show_filters' );
	$kratz_tabs         = array();
	if ( ! kratz_is_off( $kratz_show_filters ) ) {
		$kratz_args           = array(
			'type'         => $kratz_post_type,
			'child_of'     => $kratz_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $kratz_taxonomy,
			'pad_counts'   => false,
		);
		$kratz_portfolio_list = get_terms( $kratz_args );
		if ( is_array( $kratz_portfolio_list ) && count( $kratz_portfolio_list ) > 0 ) {
			$kratz_tabs[ $kratz_cat ] = esc_html__( 'All', 'kratz' );
			foreach ( $kratz_portfolio_list as $kratz_term ) {
				if ( isset( $kratz_term->term_id ) ) {
					$kratz_tabs[ $kratz_term->term_id ] = $kratz_term->name;
				}
			}
		}
	}
	if ( count( $kratz_tabs ) > 0 ) {
		$kratz_portfolio_filters_ajax   = true;
		$kratz_portfolio_filters_active = $kratz_cat;
		$kratz_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters kratz_tabs kratz_tabs_ajax">
			<ul class="portfolio_titles kratz_tabs_titles">
				<?php
				foreach ( $kratz_tabs as $kratz_id => $kratz_title ) {
					?>
					<li><a href="<?php echo esc_url( kratz_get_hash_link( sprintf( '#%s_%s_content', $kratz_portfolio_filters_id, $kratz_id ) ) ); ?>" data-tab="<?php echo esc_attr( $kratz_id ); ?>"><?php echo esc_html( $kratz_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$kratz_ppp = kratz_get_theme_option( 'posts_per_page' );
			if ( kratz_is_inherit( $kratz_ppp ) ) {
				$kratz_ppp = '';
			}
			foreach ( $kratz_tabs as $kratz_id => $kratz_title ) {
				$kratz_portfolio_need_content = $kratz_id == $kratz_portfolio_filters_active || ! $kratz_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $kratz_portfolio_filters_id, $kratz_id ) ); ?>"
					class="portfolio_content kratz_tabs_content"
					data-blog-template="<?php echo esc_attr( kratz_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( kratz_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $kratz_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $kratz_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $kratz_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $kratz_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $kratz_cat ); ?>"
					data-need-content="<?php echo ( false === $kratz_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $kratz_portfolio_need_content ) {
						kratz_show_portfolio_posts(
							array(
								'cat'        => $kratz_id,
								'parent_cat' => $kratz_cat,
								'taxonomy'   => $kratz_taxonomy,
								'post_type'  => $kratz_post_type,
								'page'       => 1,
								'sticky'     => $kratz_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		kratz_show_portfolio_posts(
			array(
				'cat'        => $kratz_cat,
				'parent_cat' => $kratz_cat,
				'taxonomy'   => $kratz_taxonomy,
				'post_type'  => $kratz_post_type,
				'page'       => 1,
				'sticky'     => $kratz_sticky_out,
			)
		);
	}

	kratz_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'kratz_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
