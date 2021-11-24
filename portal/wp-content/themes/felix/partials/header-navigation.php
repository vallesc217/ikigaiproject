<nav class="navigation closed clearfix">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <!-- navigation menu -->
            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
			<?php
			$felix_defaults = array(
				'theme_location' => 'felix_topmenu',
				'menu' => '',
				'container' => 'div',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => 'felix_topmenu',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul id="%1$s" class="%2$s nav sf-menu">%3$s</ul>',
				'depth' => 0,
				'walker' => new felix_top_menu_walker()

			);
			echo '11111111111111111111111111111';
			var_dump(has_nav_menu( 'felix_topmenu' ));

			if ( has_nav_menu( 'felix_topmenu' ) ) {
				wp_nav_menu( $felix_defaults );
			}

			?>

        </div>

    </div>
    <!-- Add Scroll Bar -->
    <div class="swiper-scrollbar"></div>
</nav>
