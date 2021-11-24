<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
$header_bg = creptaam_option('header-top-bg');
if($header_bg){
    $header_bg = "background-color: $header_bg";
}

if (creptaam_option('header-social-link2') || creptaam_option('header-market-status2', false, true)): ?>
    <div class="header-top header-topbar-three" style="<?php echo esc_attr($header_bg); ?>">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 col-sm-7">
                    <?php if (creptaam_option('header-market-status2', false, true) && function_exists('creptaam_header_short_price')):
                        creptaam_header_short_price(creptaam_option('market-coin-limit3'));
                    endif; ?>
                </div>
                <div class="col-md-6 col-sm-5">
                    <?php if (creptaam_option('header-social-link2') == true): ?>
                        <div class="social-links text-right">
                            <?php get_template_part('template-parts/social', 'icons');?>
                        </div> <!-- /social-links-wrap -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> <!-- .header-top -->
<?php endif; ?>