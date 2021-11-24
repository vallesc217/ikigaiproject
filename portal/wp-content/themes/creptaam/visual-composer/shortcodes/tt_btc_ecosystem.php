<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    // image sources
     $chart_image_src = wp_get_attachment_image_src($tt_atts['chart_image'], 'full');
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
    ob_start(); 

?>

    <div class="ecosystem-wrapper <?php echo esc_attr($tt_atts[ 'el_class' ].' '.$tt_atts['ecosystem_bg'].' '.$css_class);?>">
        <?php
        $now_ping = "https://api.coinmarketcap.com/v1/ticker/bitcoin";

        $now_ping_get = wp_remote_get( esc_url($now_ping), array( 'timeout' => 30 ) );

        if (!is_wp_error( $now_ping_get )) :
            $bit_coin_data = json_decode( $now_ping_get['body'] );

            foreach ($bit_coin_data as $value) : ?>
                <?php if ($tt_atts['ecosystem_options'] == 'bitcoin-rank'): ?>
                    <div class="btc-info">
                        <h3><?php echo esc_html($value->rank); ?></h3>
                        <span><?php echo esc_html($tt_atts['subtitle'])?></span>
                    </div>
                    <?php if ($chart_image_src[0]) : ?>
                        <div class="btc-chart-img">
                            <img src="<?php echo esc_url($chart_image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($tt_atts['ecosystem_options'] == 'bitcoin-price'): ?>
                    <div class="btc-info">
                        
                        <?php $updown = $value->percent_change_24h;

                        if ($tt_atts['shorten'] == 'yes'): ?>
                            <h3>$<?php echo esc_html(creptaam_number_shorten($value->price_usd, 1));
                                if ($updown > 0) : ?>
                                    <i class="fa fa-caret-up" aria-hidden="true"></i>
                                <?php else : ?>
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                <?php endif; ?>
                            </h3>
                        <?php else : ?>
                            <h3>$<?php echo esc_html($value->price_usd);
                                if ($updown > 0) : ?>
                                    <i class="fa fa-caret-up" aria-hidden="true"></i>
                                <?php else : ?>
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                <?php endif; ?>
                            </h3>
                        <?php endif; ?>
                        
                        <span><?php echo esc_html($tt_atts['subtitle'])?></span>
                    </div>
                    <?php if ($chart_image_src[0]) : ?>
                        <div class="btc-chart-img">
                            <img src="<?php echo esc_url($chart_image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($tt_atts['ecosystem_options'] == 'market-cap'): ?>
                    <div class="btc-info">
                        <?php if ($tt_atts['shorten'] == 'yes'): ?>
                            <h3>$<?php echo esc_html(creptaam_number_shorten($value->market_cap_usd, 1)); ?></h3>
                        <?php else : ?>
                            <h3>$<?php echo esc_html($value->market_cap_usd); ?></h3>
                        <?php endif; ?>
                        <span><?php echo esc_html($tt_atts['subtitle'])?></span>
                    </div>
                    <?php if ($chart_image_src[0]) : ?>
                        <div class="btc-chart-img">
                            <img src="<?php echo esc_url($chart_image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($tt_atts['ecosystem_options'] == '24h-value'): ?>
                    <div class="btc-info">
                        <?php if ($tt_atts['shorten'] == 'yes'): ?>
                            <h3>$<?php echo esc_html(creptaam_number_shorten($value->{'24h_volume_usd'}, 1)); ?></h3>
                        <?php else : ?>
                            <h3>$<?php echo esc_html($value->{'24h_volume_usd'}); ?></h3>
                        <?php endif; ?>
                        <span><?php echo esc_html($tt_atts['subtitle'])?></span>
                    </div>
                    <?php if ($chart_image_src[0]) : ?>
                        <div class="btc-chart-img">
                            <img src="<?php echo esc_url($chart_image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($tt_atts['ecosystem_options'] == 'total-supply'): ?>
                    <div class="btc-info">
                        
                        <?php if ($tt_atts['shorten'] == 'yes'): ?>
                            <h3>$<?php echo esc_html(creptaam_number_shorten($value->total_supply, 1)); ?></h3>
                        <?php else : ?>
                            <h3>$<?php echo esc_html($value->total_supply); ?></h3>
                        <?php endif; ?>

                        <span><?php echo esc_html($tt_atts['subtitle'])?></span>
                    </div>
                    
                    <?php if ($chart_image_src[0]) : ?>
                        <div class="btc-chart-img">
                            <img src="<?php echo esc_url($chart_image_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                        </div>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endforeach;
        endif; ?>

    </div> <!-- .pricing-wrapper -->
<?php echo ob_get_clean();