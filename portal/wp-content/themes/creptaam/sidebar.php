<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$blog_sidebar = creptaam_option('blog-sidebar', false, 'right-sidebar');

if ( $blog_sidebar == 'right-sidebar' and is_active_sidebar('creptaam-blog-sidebar')) : ?>
    <div class="sidebar-sticky col-md-4">
        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
            <?php dynamic_sidebar('creptaam-blog-sidebar'); ?>
        </div>
    </div>
<?php elseif ( $blog_sidebar == 'left-sidebar' and is_active_sidebar('creptaam-blog-sidebar')) : ?>
    <div class="sidebar-sticky col-md-4 col-md-pull-8">
        <div class="tt-sidebar-wrapper left-sidebar" role="complementary">
            <?php dynamic_sidebar('creptaam-blog-sidebar'); ?>
        </div>
    </div>
<?php endif;