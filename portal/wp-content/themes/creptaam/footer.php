<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 
    $footer_bg = creptaam_option('footer-bg');
    if ($footer_bg) {
        $footer_bg = "background-color: $footer_bg";
    }
?>
        <footer class="footer-wrapper" style="<?php echo esc_attr($footer_bg); ?>">
            <?php 
                $tt_footer_style = creptaam_option('footer-style', false, 'footer-default');
                $page_footer = "";
                if (function_exists('rwmb_meta')) : 
                    $page_footer = rwmb_meta('creptaam_footer_style');
                endif;

                if ($page_footer == 'inherit-theme-option' || empty($page_footer)) :
                    if ($tt_footer_style == 'footer-four-column') :
                        get_footer('four-column');
                    elseif ($tt_footer_style == 'footer-three-column') :
                        get_footer('three-column');
                    elseif ($tt_footer_style == 'footer-onepage') :
                        get_footer('onepage');
                    elseif ($tt_footer_style == 'no-footer') :
                    else :
                        get_footer('default');
                    endif;
                elseif($page_footer == 'footer-four-column') :
                    get_footer('four-column');
                elseif($page_footer == 'footer-three-column') :
                    get_footer('three-column');
                elseif($page_footer == 'footer-onepage') :
                    get_footer('onepage');
                elseif($page_footer == 'no-footer') :
                else :
                    get_footer('default');
                endif; 
            ?>
        </footer>

            <?php if (creptaam_option('marquee-visibility') == true && creptaam_option('marquee-position') == 'marquee-bottom') {
                if (function_exists('creptaam_marquee_price')): ?>
                    <div class="creptaam-marquee-price marquee-price-footer">
                        <?php creptaam_marquee_price(creptaam_option('marquee-limit', false, 20)); ?>
                    </div>
                <?php endif;
            }?>
            
        </div> <!-- .wrapper -->
        <?php wp_footer(); ?>
    </body>
</html>