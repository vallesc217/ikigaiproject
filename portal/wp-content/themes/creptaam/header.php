<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
    <?php wp_head(); ?>
</head>

<body id="home" <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="100" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <div class="wrapper">
        <?php if (creptaam_option('page-preloader', false, true)) : ?>
            <div id="preloader" style="background-color: <?php echo esc_attr(creptaam_option('loader-bg-color', false, '#ffffff'));?>">
                <div id="status">
                    <div class="status-mes" style="background-image: url(<?php echo esc_url(creptaam_option('tt-loader', 'url', get_template_directory_uri() . '/images/preloader.gif'));?>);"></div>
                </div>
            </div>
        <?php endif;

        $tt_header_style = creptaam_option('header-style', false, 'header-default');

        $page_header = "";
        if (function_exists('rwmb_meta')) : 
            $page_header = rwmb_meta('creptaam_header_style');
        endif;

        if ($page_header == 'inherit-theme-option' || empty($page_header)) :
            if ($tt_header_style == 'header-default' || $tt_header_style == 'header-transparent') :
                get_header('default');
            elseif ($tt_header_style == 'no-header') :
            else :
                get_header('default');
            endif;
        elseif($page_header == 'header-default' || $page_header == 'header-transparent' ) :
            get_header('default');
        elseif($page_header == 'no-header') :
        else :
            get_header('default');
        endif; 

        get_template_part( 'page', 'header' );