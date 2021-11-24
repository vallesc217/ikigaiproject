<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Loader -->
<?php if ( get_theme_mod( 'felix_performans_preloader', true ) ) { ?>
    <div class="loader">

        <div class="loader-brand">

			<?php
			$control_color = get_theme_mod( 'Color_them_control_color' );
			$theme = ( empty( $control_color ) ) ? "brand" : 'brand-' . $control_color;
			$img = get_theme_mod( 'logo_loader' );
			if ( isset( $img{5} ) ) {
				$logo = $img;
				?>
                <img alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="img-responsive center-block"
                     src="<?php echo esc_url( $logo ); ?>">
				<?php
			}

			?>


        </div>
    </div>
<?php } ?>

<div id="layout" class="layout">


    <header id="top" class="navbar js-navbar-affix affix-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'felix' ) ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<?php

				if ( get_theme_mod( 'felix_performans_logo_top', false ) == true ) {
					$url = is_front_page() || is_page_template( 'template-fullwidth.php' ) ? '#layout' : get_home_url( '/' );
				} else {
					$url = get_home_url( '/' );
				}
				?>
                <a href="<?php echo esc_url( $url ); ?>" class="brand js-target-scroll">
					<?php

					$img = get_theme_mod( 'logo_big' );
					if ( isset( $img{5} ) ) {
						$logo = $img;
						?>
                        <img class="brand-img-white" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="129"
                             src="<?php echo esc_url( $logo ); ?> ">

						<?php
					}


					$img = get_theme_mod( 'logo_small' );
					if ( isset( $img{5} ) ) {
						$logo = $img;
						?>
                        <img alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                             class="brand-img" width="100"
                             src="<?php echo esc_url( $logo ); ?>">
						<?php
					} else {

						?>

                        <span class="brand-text">
                            <?php echo esc_html( get_option( 'blogname' ) ); ?>
                                </span>

						<?php


					}

					?>


                </a>
            </div>

        </div>
    </header>

    <main id="home" class="masthead-inner masthead-blog" data-stellar-ratio="0.8">
        <div class="opener">
            <div class="container rel-1">
                <div class="row">
                    <div class="text-center col-lg-6 col-lg-offset-3">

						<?php if ( function_exists( 'get_option_tree' ) && get_option_tree( 'felix_error_heading' ) != '' ) : ?>
                            <h1 class="lead-heading"><?php echo wp_kses_post( get_option_tree( 'ninetheme_bobby_error_heading' ) ); ?></h1>
                            <h1>
                                <?php echo wp_kses_post( get_option_tree( 'felix_error_heading' ) ); ?>
                            </h1>

						<?php else : ?>
                            <h1><?php esc_html_e( '404', 'felix' ) ?></i></h1>
						<?php endif; ?>


						<?php if ( function_exists( 'get_option_tree' ) && get_option_tree( 'felix_error_slogan' ) != '' ) : ?>
                            <p class="lead text-muted blog-muted"></p>
                            <div class="lead">
                                <p class="lead-text">  <?php echo wp_kses_post( get_option_tree( 'felix_error_slogan' ) ); ?></p>
                            </div>
						<?php else : ?>
                            <div class="lead">
                                <p class="lead-text">  <?php esc_html_e( ' Oops! The Page you requested was not found!', 'felix' ) ?><?php echo esc_html_e( ' Back to Home', 'felix' ) ?></p>
                            </div>
						<?php endif; ?>

                        <div class="post-entry text-left">
							<?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




<?php wp_footer(); ?>
</body>
</html>