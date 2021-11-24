<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$page_sidebar = creptaam_option( 'page-layout', false, 'right-sidebar' );

if ( $page_sidebar == 'right-sidebar' and is_active_sidebar( 'creptaam-page-sidebar' )) : ?>
	<div class="sidebar-sticky col-md-4">
		<div class="tt-sidebar-wrapper right-sidebar" role="complementary">
			<?php dynamic_sidebar( 'creptaam-page-sidebar' ); ?>
		</div>
	</div>
<?php elseif ( $page_sidebar == 'left-sidebar' and is_active_sidebar( 'creptaam-page-sidebar' )) : ?>
	<div class="sidebar-sticky col-md-4 col-md-pull-8">
		<div class="tt-sidebar-wrapper left-sidebar" role="complementary">
			<?php dynamic_sidebar( 'creptaam-page-sidebar' ); ?>
		</div>
	</div>
<?php endif;