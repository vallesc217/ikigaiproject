<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$shop_sidebar = creptaam_option('shop-sidebar', false, 'right-sidebar');

if ( $shop_sidebar == 'right-sidebar' and is_active_sidebar('creptaam-shop-sidebar')) : ?>
    <div class="sidebar-sticky col-md-4">
        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
            <?php dynamic_sidebar('creptaam-shop-sidebar'); ?>
        </div>
    </div>
<?php elseif ( $shop_sidebar == 'left-sidebar' and is_active_sidebar('creptaam-shop-sidebar')) : ?>
    <div class="sidebar-sticky col-md-4 col-md-pull-8">
        <div class="tt-sidebar-wrapper left-sidebar" role="complementary">
            <?php dynamic_sidebar('creptaam-shop-sidebar'); ?>
        </div>
    </div>
<?php endif;