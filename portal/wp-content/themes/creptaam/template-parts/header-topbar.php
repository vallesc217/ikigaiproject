<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
$header_bg = creptaam_option('header-top-bg');
if($header_bg){
    $header_bg = "background-color: $header_bg";
}
?>

<?php if (creptaam_option('app-link') or creptaam_option('header-market-status')) : ?>
    <div class="header-top" style="<?php echo esc_attr($header_bg); ?>">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 col-sm-7">
                    <?php if (creptaam_option('app-link')) : ?>
                        <div class="contact-info topbar-info">
                            <?php echo wp_kses(creptaam_option('app-link', false, true), array(
                                'a'  => array(
                                    'href'   => array(),
                                    'title'  => array(),
                                    'target' => array()
                                ),
                                'br' => array(),
                                'i'  => array('class' => array()),
                                'span'  => array('class' => array()),
                                'ul' => array('class' => array()),
                                'li' => array(),
                            )); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 col-sm-5">
                    <?php if (creptaam_option('header-market-status', false, true) && function_exists('creptaam_header_short_price')):
                        creptaam_header_short_price(creptaam_option('market-coin-limit'));
                    endif; ?>
                    
                    <?php if (creptaam_option('header-social-link') == true): ?>
                        <div class="social-links text-right">
                            <?php get_template_part('template-parts/social', 'icons');?>
                        </div> <!-- /social-links-wrap -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> <!-- .header-top -->
<?php endif ?>