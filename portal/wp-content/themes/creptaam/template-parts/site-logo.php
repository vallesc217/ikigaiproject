<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php
    if (creptaam_option('logo-type', false, true)) : 

        $fallback_logo = get_template_directory_uri() . '/images/logo.png';
        $default_logo = creptaam_option('logo', 'url', $fallback_logo);
        
        // site logo default value
        $site_logo = $default_logo;
        $site_mobile_logo = $default_logo;
        $site_sticky_logo = $default_logo;
        $site_sticky_mobile_logo = $default_logo;

        // mobile logo
        if (creptaam_option('mobile-logo', 'url')) :
            $site_mobile_logo = creptaam_option('mobile-logo', 'url', $fallback_logo);
        endif;

        // Sticky logo
        if (creptaam_option('sticky-logo', 'url')) :
            $site_sticky_logo = creptaam_option('sticky-logo', 'url', $fallback_logo);
        endif;

        // Sticky Mobile
        if (creptaam_option('sticky-mobile-logo', 'url')) :
            $site_sticky_mobile_logo = creptaam_option('sticky-mobile-logo', 'url', $fallback_logo);
        endif;

        if (function_exists('rwmb_meta') && rwmb_meta('creptaam_page_logo', 'type=image_advanced')) :
            $page_logo = rwmb_meta('creptaam_page_logo', 'type=image_advanced');
            foreach ($page_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="site-logo hidden-xs" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <img class="site-logo hidden-xs" src="<?php echo esc_url($site_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        <?php endif;


        if (function_exists('rwmb_meta') && rwmb_meta('creptaam_page_mobile_logo', 'type=image_advanced')) :
            $page_mobile_logo = rwmb_meta('creptaam_page_mobile_logo', 'type=image_advanced');
            foreach ($page_mobile_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="mobile-logo visible-xs" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <img class="mobile-logo visible-xs" src="<?php echo esc_url($site_mobile_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        <?php endif; 


        if (function_exists('rwmb_meta') && rwmb_meta('creptaam_page_sticky_logo', 'type=image_advanced')) :
            $page_sticky_logo = rwmb_meta('creptaam_page_sticky_logo', 'type=image_advanced');
            foreach ($page_sticky_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="sticky-logo" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <?php if (creptaam_option('sticky-logo', 'url')): ?>
                <img class="sticky-logo" src="<?php echo esc_url($site_sticky_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endif; ?>
        <?php endif;


        if (function_exists('rwmb_meta') && rwmb_meta('creptaam_page_mobile_sticky_logo', 'type=image_advanced')) :
            $page_mobile_sticky_logo = rwmb_meta('creptaam_page_mobile_sticky_logo', 'type=image_advanced');
            foreach ($page_mobile_sticky_logo as $logo) : 
                $img_src = wp_get_attachment_image_src( $logo['ID'], 'full');
            ?>
                <img class="sticky-mobile-logo" src="<?php echo esc_url($img_src['0']) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endforeach; ?>
        <?php else : ?>
            <?php if (creptaam_option('sticky-mobile-logo', 'url')): ?>
                <img class="sticky-mobile-logo" src="<?php echo esc_url($site_sticky_mobile_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <?php endif; ?>
        <?php endif; ?>

    <?php else : ?>
        <?php if (creptaam_option('text-logo')) :
            echo esc_html(creptaam_option('text-logo'));
        else :
            echo esc_html(get_bloginfo('name'));
        endif;
        ?>
    <?php endif; ?>
</a>