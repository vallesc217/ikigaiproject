<?php get_header(); ?>
<main id="home" class="custom-page-header masthead masthead-inner masked">
    <div class="inner-page rel-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="wow fadeInDown"><?php printf( esc_html( esc_html__( 'Search Results for: %s', 'felix' ) ), get_search_query() ); ?></h1>

                </div>
            </div>
        </div>
    </div>
</main>
<div class="breadcrumbs-place">

	<?php if ( function_exists( 'ot_get_option' ) && ot_get_option( 'felix_search_breadcrubms_visibility' ) != 'off' ) : ?>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="<?php echo esc_url( get_home_url( '/' ) ); ?>"> <?php esc_html_e( 'Home', 'felix' ) ?>
                        </a></li>
                    <li class="active">
						<?php printf( esc_html( esc_html__( 'Search Results for: %s', 'felix' ) ), get_search_query() ); ?></li>

                </ul>
            </div>
        </div>
	<?php endif; ?>
</div>

<!-- Content -->

<div class="content-inner">
    <div class="container">

        <div class="row">
			<?php

			$positin_sidebar = "";

			if ( get_theme_mod( 'felix_sidebar_position', 's2' ) == 's1' ) {
				$positin_sidebar = 'left';
			} else {
				$positin_sidebar = 'right';
			}

			if ( isset( $_GET['showas'] ) && $_GET['showas'] == 'left' ) {
				$positin_sidebar = 'left';
			} elseif ( isset( $_GET['showas'] ) && $_GET['showas'] == 'right' ) {
				$positin_sidebar = 'right';
			}

			if ( $positin_sidebar == 'left' ) {
				get_sidebar();
			}
			?>
            <div class="primary col-lg-9">

				<?php if ( have_posts() ) : ?>
					<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						get_template_part( 'partials/content', get_post_format() );
						?>


					<?php endwhile;
					wp_reset_postdata();


				else :
					?>
                    <article <?php post_class( 'post' ); ?>>

                        <header class="post-header">
                            <h2><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'felix' ); ?></p>
                            </h2>

                        </header>

                        <div class="post-entry text-left">
							<?php get_search_form(); ?>
                        </div>

                    </article>
					<?php

				endif; ?>

	            <?php

	            $felix_class = felix_get_global_class();
	            $felix_class->felix_pagenavi();
	            ob_start();
	            the_posts_pagination();
	            wp_link_pages();
	            ob_get_clean();
	            ?>

            </div>
			<?php
			if ( $positin_sidebar == 'right' ) {
				get_sidebar();
			}
			?>
        </div>

    </div>

    <!-- Footer -->


	<?php get_footer(); ?>


