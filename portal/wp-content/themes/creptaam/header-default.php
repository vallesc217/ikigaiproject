<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<div class="header-wrapper navbar-fixed-top">
	<?php if (creptaam_option('marquee-visibility') == true && creptaam_option('marquee-position') == 'marquee-top') {
        if (function_exists('creptaam_marquee_price')): ?>
            <div class="creptaam-marquee-price">
                <?php creptaam_marquee_price(creptaam_option('marquee-limit', false, 20)); ?>
            </div>
        <?php endif;
    } ?>

    <?php get_template_part('template-parts/site', 'navigation');?>
    
    <?php if(creptaam_option('search-visibility', false, true)) {
        get_template_part('template-parts/header', 'search');
    } ?>
</div> <!-- .header-wrapper -->