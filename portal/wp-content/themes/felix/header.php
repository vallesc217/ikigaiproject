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
            <div class="collapse navbar-collapse" id="navbar-collapse">
				<?php $felix_defaults = array(
					'theme_location' => 'felix_topmenu',
					'menu' => '',
					'container' => 'div',
					'container_class' => '',
					'container_id' => '',
					'menu_class' => '',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>',
					'depth' => 0
				);


				if ( has_nav_menu( 'felix_topmenu' ) ) {
					wp_nav_menu( $felix_defaults );


				}
				?>

            </div>
        </div>
    </header>




