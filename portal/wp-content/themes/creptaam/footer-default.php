<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<div class="footer-section footer-default">

    <?php if (is_active_sidebar('creptaam-footer-default' )): ?>
        <div class="primary-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <img src="<?php echo esc_url(creptaam_option('footer-logo', 'url', get_template_directory_uri() . '/images/logo-white.png')); ?>" data-at2x="<?php echo esc_url(creptaam_option('footer-retina-logo', 'url', get_template_directory_uri() . '/images/logo-white2x.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
                            </a>
                        </div> <!-- .footer-logo -->

                        <div class="footer-about-text">
                            <?php echo wp_kses(creptaam_option('footer-about-text'), array(
                                'a'          => array(
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
                            )); ?>
                        </div>

                        <?php if (creptaam_option('social-icon-visibility', false, true)) : ?>
                            <div class="social-links-wrap">
                                <?php get_template_part('template-parts/social', 'icons');?>
                            </div> <!-- /social-links-wrap -->
                        <?php endif; ?>
                    </div> <!-- .col-md-4 -->

                    <div class="col-md-8">
                        <div class="tt-sidebar-wrapper footer-sidebar row" role="complementary">
                            <?php dynamic_sidebar('creptaam-footer-default' );?>
                        </div>
                    </div> <!-- .col-md-8 -->
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .primary-footer -->
    <?php endif ?>

    <div class="secondary-footer text-center">
        <div class="container">
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
                        esc_html__('Creptaam', 'creptaam'),
                        "<a href='http://trendytheme.net'>".esc_html__('TrendyTheme', 'creptaam')."</a>",
                        "<a href='https://wordpress.org'>".esc_html__('WordPress', 'creptaam')."</a>"
                    ); ?>
                <?php endif; ?>

                <?php if ( function_exists( 'the_privacy_policy_link' ) ) :
                    the_privacy_policy_link( '&nbsp|', '' );
                endif; ?>
            </div> <!-- .copyright -->

            <?php if (creptaam_option('totop-visibility') && creptaam_option('totop-style', false, true)): ?>
                <a href="#home" class="tt-scroll scroll-top hidden-xs"><i class="fa fa-angle-up"></i></a>
            <?php endif; ?>

        </div> <!-- .container -->
    </div> <!-- .secondary-footer -->
</div> <!-- .footer-section -->