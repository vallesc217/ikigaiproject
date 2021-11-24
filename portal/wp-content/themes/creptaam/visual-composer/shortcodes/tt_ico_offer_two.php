<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
    
    $fund_tirget = $tt_atts['fund_tirget'];
    $fund_rised = $tt_atts['fund_rised'];
    $soft_cap = $tt_atts['soft_cap'];
    $fund_pursent = $fund_rised / $fund_tirget * 100;
    $soft_cap_persent = ($soft_cap / $fund_tirget * 100);

    // link
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);
    $image_src = wp_get_attachment_image_src($tt_atts['payment_img'], 'full');
    ob_start();
?>

<div class="tt-fund-rised-wrapper ico-offer-two-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '.$css_class.' '.$tt_atts['styles']); ?>">
	<div class="row">
        <?php if($tt_atts['styles'] == 'potrate') : ?>
            <div class="col-md-12">
                <div class="current-discount-end">
                    <h4><?php echo esc_html__('ICO Ends in', 'creptaam') ?></h4>
                    <?php 
                        $countdown_date = $tt_atts['countdown_time'];
                        $current_date =  date("Y/m/d"); 
                        $countdown_date_marge = str_replace('/', '', $countdown_date);
                        $current_date_marge = str_replace('/', '', $current_date);
                    ?>
                    <?php if($countdown_date == $current_date || $countdown_date_marge < $current_date_marge) : ?>
                        <p class="warning"><?php echo esc_html__('Current discount time\'s up', 'creptaam') ?></p>
                    <?php else : ?>
                        <div class="countdown-wrapper">
                            <ul class="countdown list-inline" data-countdown="<?php echo esc_attr($tt_atts['countdown_time']); ?>"></ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-<?php echo esc_attr($tt_atts['styles'] == 'potrate' ? '5 col-md-push-7 text-right' : '2') ?>">
            <div class="fund-rised">
                <?php if($tt_atts['styles'] != 'potrate') : ?>
                    <h4><?php echo esc_html__('Fund Rised', 'creptaam') ?></h4>
                <?php endif; ?>
                <h2><?php echo '$' . esc_html(creptaam_number_shorten($fund_rised, 0)); ?></h2>
                <?php if($tt_atts['styles'] == 'potrate') : ?>
                    <h5><?php echo esc_html__('Fund Rised', 'creptaam') ?></h5>
                <?php endif; ?>
            </div>
        </div>
		<div class="col-md-<?php echo esc_attr($tt_atts['styles'] == 'potrate' ? '7 col-md-pull-5' : '3') ?>">
			<div class="token-distribute">
                <?php if($tt_atts['styles'] != 'potrate') : ?>
                    <h4><?php echo esc_html__('Token Distributed', 'creptaam') ?></h4>
                <?php endif; ?>
				<h2><?php echo esc_html(number_format($tt_atts['distributed_token'])) ?></h2>
                <?php if($tt_atts['styles'] == 'potrate') : ?>
                    <h5><?php echo esc_html__('Token Distributed', 'creptaam') ?></h5>
                <?php endif; ?>
			</div>
		</div>

        <div class="col-md-<?php echo esc_attr($tt_atts['styles'] == 'potrate' ? '12' : '7') ?>">
            <div class="fund-progress">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo esc_attr($fund_pursent) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="start-point pull-left text-center" style="width:<?php echo esc_attr($soft_cap_persent) ?>%">
                            <p><?php echo esc_html__( 'Tokens', 'creptaam' ) ?></p>
                        </div>
                        <div class="soft-cap text-center">
                            <span><?php echo '$ ' . esc_html(creptaam_number_shorten($soft_cap, 0)); ?></span>
                            <p class="cap-heading"><?php echo esc_html__( 'Soft Cap', 'creptaam' ) ?></p>
                        </div>
                        <div class="hard-cap text-right pull-right">
                            <span><?php echo '$ ' . esc_html(creptaam_number_shorten($fund_tirget, 0)); ?></span>
                            <p class="cap-heading"><?php echo esc_html__( 'Hard Cap', 'creptaam' ) ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php if(($tt_atts['styles'] == 'potrate' && $a_href) || $image_src[0]) : ?>
            <div class="col-md-12 text-center ico-offer-bottom">
                <?php if($tt_atts['styles'] == 'potrate' && $a_href) : ?>
                    <div class="ico-button">
                        <a href="<?php echo esc_attr($a_href) ?>" class="btn btn-bitcoin"><?php esc_html_e('Buy Bitcoin Tocken', 'creptaam') ?></a>
                    </div>
                <?php endif; ?>
                <?php if($image_src[0]) : ?>
                    <img src="<?php echo esc_attr($image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                <?php endif; ?>
            </div>
        <?php endif; ?>

	</div>

</div><!-- .tt-img-wrapper -->
<?php echo ob_get_clean();