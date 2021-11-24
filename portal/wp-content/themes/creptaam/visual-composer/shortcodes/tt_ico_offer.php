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

    ob_start();
?>

<div class="tt-fund-rised-wrapper <?php echo esc_attr($tt_atts['el_class'] .' '.$css_class.' '.$tt_atts['styles']); ?>">
	<div class="row text-center">
		<div class="col-sm-4">
			<div class="fund-rised">
				<h4><?php echo esc_html__('Fund Rised', 'creptaam') ?></h4>
				<h2><?php echo esc_html(number_format($fund_rised)) ?></h2>
			</div>
		</div>
		<div class="col-sm-3">
            <?php if($tt_atts['current_discount']) : ?>
    			<div class="current-discount">
    				<h4><?php echo esc_html__('Current Discount', 'creptaam') ?></h4>
    				<h2><?php echo esc_html($tt_atts['current_discount']) ?></h2>
    			</div>
            <?php endif; ?>
		</div>
		<div class="col-sm-5">
			<div class="current-discount-end">
				<h4><?php echo esc_html__('Current Discount ends in ', 'creptaam') ?></h4>
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
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="fund-progress">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo esc_attr($fund_pursent) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                    	<div class="start-point pull-left" style="width:<?php echo esc_attr($soft_cap_persent) ?>%">
                    		<span><?php echo esc_html__( '0', 'creptaam' ) ?></span>
                    		<p><?php echo esc_html__( 'Start', 'creptaam' ) ?></p>
                    	</div>
                    	<div class="soft-cap text-center">
                    		<span><?php echo '$ ' . esc_html(creptaam_number_shorten($soft_cap, 0)); ?></span>
                    		<p><?php echo esc_html__( 'Soft Cap', 'creptaam' ) ?></p>
                    	</div>
                    	<div class="hedge-cap text-right pull-right">
                    		<span><?php echo '$ ' . esc_html(creptaam_number_shorten($fund_tirget, 0)); ?></span>
                    		<p><?php echo esc_html__( 'Hard Fund', 'creptaam' ) ?></p>
                    	</div>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div><!-- .tt-img-wrapper -->
<?php echo ob_get_clean();