<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<?php if (creptaam_option('header-top-visibility')):

    $tt_topbar_style = creptaam_option('topbar-style', false, 'topbar-one');

    $page_topbar = "";
    if (function_exists('rwmb_meta')) : 
        $page_topbar = rwmb_meta('creptaam_topbar_style');
    endif;

    if ($page_topbar == 'inherit-theme-option' || empty($page_topbar)) :
        if ($tt_topbar_style == 'topbar-two' ) :
            get_template_part('template-parts/header', 'topbar-two');
        elseif ($tt_topbar_style == 'topbar-three') :
            get_template_part('template-parts/header', 'topbar-three');
        else :
            get_template_part('template-parts/header', 'topbar');
        endif;
    elseif($page_topbar == 'topbar-two' ) :
        get_template_part('template-parts/header', 'topbar-two');
    elseif($page_topbar == 'topbar-three') :
        get_template_part('template-parts/header', 'topbar-three');
    else :
        get_template_part('template-parts/header', 'topbar');
    endif;
endif; ?>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="attr-nav">
            <ul>
                <?php if (creptaam_option('search-visibility', false, true)): ?>
                    <li class="search"><a href="#"><i class="fa fa-times"></i><i class="fa fa-search"></i></a></li>
                <?php endif; ?>
                
                <?php if (creptaam_option('shopping-cart-visibility', false, true)):
                    if (class_exists('woocommerce')): ?>
                        <li class="tt-cart-count">
                            <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e( 'View your shopping cart', 'creptaam' ); ?>"><i class="fa fa-shopping-bag"></i><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                        </li>
                    <?php endif;
                endif; ?>

                <li class="side-menu visible-sm visible-xs"><a href="#"><i class="fa fa-bars"></i></a></li>

                <?php if (creptaam_option('cta-btn-visibility') && creptaam_option('cta-btn-text')): ?>
                    <li class="cta-button hidden-sm hidden-xs">
                        <a href="<?php echo esc_url(creptaam_option('cta-btn-link')); ?>"><?php echo wp_kses(creptaam_option('cta-btn-text'), array(
                            'i'   => array(
                                'class' => array()
                            )
                        )) ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="navbar-brand">
                <h1><?php get_template_part('template-parts/site', 'logo');?></h1>
            </div> <!-- .navbar-brand -->
        </div> <!-- .navbar-header -->

        <div class="main-menu-wrapper hidden-xs hidden-sm clearfix">
            <div class="main-menu">
                <?php $menu_position = creptaam_option('menu-position', false, 'navbar-right');

                $nav_class = "navbar-right";
                if (function_exists('rwmb_meta')) : 
                    $nav_class = rwmb_meta('creptaam_menu_position');
                endif;

                if ($nav_class == 'inherit-theme-option' || empty($nav_class)) :
                    $nav_class = $menu_position;
                else :
                    $nav_class;
                endif; 

                wp_nav_menu( apply_filters( 'creptaam_primary_wp_nav_menu', array(
                    'container'      => false,
                    'theme_location' => 'primary',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav '.$nav_class.'">%3$s</ul>',
                    'walker'         => new creptaam_Navwalker(),
                    'fallback_cb'    => 'creptaam_Navwalker::fallback'
                )));
                ?>
            </div>
        </div> <!-- /navbar-collapse -->
    </div><!-- .container-->
    
    <div class="body-overlay hidden-lg hidden-md"></div>
    <div class="side hidden-lg hidden-md">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="visible-xs visible-sm">
            <div class="mobile-menu navbar-collapse">
                <?php wp_nav_menu( apply_filters( 'creptaam_primary_wp_nav_menu', array(
                        'container'      => false,
                        'theme_location' => 'primary',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
                        'walker'         => new creptaam_Mobile_Navwalker(),
                        'fallback_cb'    => 'creptaam_Mobile_Navwalker::fallback'
                    ))); 
                ?>
            </div> <!-- /.navbar-collapse -->
        </div>

        <?php if (is_active_sidebar('creptaam-toogle-menu-sidebar' ) ): ?>
            <div class="tt-sidebar-wrapper toogle-menu-sidebar" role="complementary">
                <?php dynamic_sidebar('creptaam-toogle-menu-sidebar' );?>
            </div>
        <?php endif ?>
    </div> <!-- .side -->
</nav>