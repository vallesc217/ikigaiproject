<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start(); 

    wp_enqueue_style('creptaam-coin-icon');
?>

    <div class="creptaam-market-status <?php echo esc_attr($tt_atts[ 'el_class' ].' '.$css_class);?>">
        
        <?php 
        $data_limit = 10;

        if ($tt_atts['data_limit']) {
            $data_limit = $tt_atts['data_limit'];
        }

        $now_ping = "https://api.coinmarketcap.com/v1/ticker/?limit=".$data_limit."";

        $now_ping_get = wp_remote_get( esc_url($now_ping), array( 'timeout' => 30 ) );

        if ($now_ping_get['response']['code'] == 200) :

            $bit_coin_data = json_decode( $now_ping_get['body'] ); ?>

            <table class="table table-striped">
                <thead> 
                    <tr>
                        <?php do_action('creptaam_before_market_status_table_head');?>
                        <th><?php esc_html_e('Rank', 'creptaam');?></th>
                        <th><?php esc_html_e('Name', 'creptaam');?></th>
                        <th><?php esc_html_e('Price', 'creptaam');?></th>
                        <th><?php esc_html_e('Volume (24h)', 'creptaam');?></th>
                        <th><?php esc_html_e('Change (24h)', 'creptaam');?></th>
                        <th><?php esc_html_e('Total Supply', 'creptaam');?></th>
                        <th><?php esc_html_e('Market Cap', 'creptaam');?></th>
                        <?php do_action('creptaam_after_market_status_table_head');?>
                    </tr> 
                </thead>

                <tbody>
                    <?php foreach ($bit_coin_data as $value) : ?>
                        
                        <tr>
                            <?php do_action('creptaam_before_market_status_table_data');?>
                            <th><?php echo esc_html($value->rank); ?></th>
                            <td><span class="creptaam-<?php echo esc_attr($value->id); ?>"></span><?php echo esc_html($value->name); ?></td>
                            <td><span class="price-usd">$<?php echo esc_html($value->price_usd); ?></span></td>
                            <td>$<?php echo esc_html($value->{'24h_volume_usd'}); ?></td>
                            <td><?php $updown = $value->percent_change_24h; ?>
                                <span class="updown-percentage <?php echo esc_attr($updown > 0 ? 'price-up' : 'price-down')?>">
                                <?php if ($updown > 0) : ?>
                                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                <?php else : ?>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                <?php endif; ?>
                                <?php echo esc_html($value->percent_change_24h); ?>%</span>
                            </td>
                            <td><?php echo esc_html($value->total_supply); ?></td>
                            <td>$<?php echo esc_html($value->market_cap_usd); ?></td>
                            <?php do_action('creptaam_after_market_status_table_data');?>
                        </tr>

                    <?php endforeach; ?>
                </tbody> 
            </table>
        <?php endif; ?>

    </div> <!-- .pricing-wrapper -->
<?php echo ob_get_clean();