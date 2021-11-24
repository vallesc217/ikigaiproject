<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<div class="footer-section footer-onepage text-center">
    <div class="container">
        <div class="footer-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                <img src="<?php echo esc_url(creptaam_option('footer-logo', 'url', get_template_directory_uri() . '/images/logo-white.png')); ?>" data-at2x="<?php echo esc_url(creptaam_option('footer-retina-logo', 'url', get_template_directory_uri() . '/images/logo-white2x.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            </a>
        </div> <!-- .footer-logo -->

        <div class="footer-copyright">
            <div class="copyright">
                <?php if (creptaam_option('footer-text', false, false)) : ?>
                    <?php echo wp_kses(creptaam_option('footer-text'), array(
                        'a'      => array(
                            'href'   => array(),
                            'title'  => array(),
                            'target' => array()
                        ),
                        'br'     => array(),
                        'em'     => array(),
                        'strong' => array(),
                        'ul'     => array(),
                        'li'     => array(),
                        'p'      => array(),
                        'span'   => array(
                            'class' => array()
                        )
                    )); 
                    
                    else : ?>
                    <?php printf(
                        esc_html__('Copyright &copy; %1$s | %2$s Theme by %3$s | Powered by %4$s', 'creptaam'),
                        date('Y'), 
                        esc_html__('creptaam', 'creptaam'),
                        "<a href='http://trendytheme.net'>".esc_html__('TrendyTheme', 'creptaam')."</a>",
                        "<a href='https://wordpress.org'>".esc_html__('WordPress', 'creptaam')."</a>"
                    ); ?>
                <?php endif; ?>

                <?php if ( function_exists( 'the_privacy_policy_link' ) ) :
                    the_privacy_policy_link( '&nbsp|', '' );
                endif; ?>
            </div> <!-- .copyright -->

            <?php if (creptaam_option('social-icon-visibility', false, true)) : ?>
                <div class="social-link">
                    <?php get_template_part('template-parts/social', 'icons');?>
                </div> <!-- /social-links-wrap -->
            <?php endif; ?>
        </div> <!-- .footer-copyright -->

    </div> <!-- .container -->

    <?php if (creptaam_option('totop-visibility') && creptaam_option('totop-style', false, true)): ?>
        <a href="#home" class="tt-scroll scroll-top tt-animate btt"><i class="fa fa-angle-up"></i></a>
    <?php endif; ?>
</div> <!-- .footer-section -->