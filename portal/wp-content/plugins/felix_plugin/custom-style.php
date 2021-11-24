<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package felix
 */
/* HEADER ------------------------------------------- */
function felix_custom_styling()
{ ?>
    <?php if (function_exists('ot_get_option')) : ?>
    <style>
        <?php if( is_customize_preview('administrator')): ?>
        .logged-in .navbar.affix, .logged-in .navbar {
            top: 0px;
        }

        <?php endif; ?>

        <?php if ( ot_get_option( 'felix_navigationbg' ) !='' ): ?>
        .navbar.affix {
            background-color: <?php echo esc_attr( ot_get_option( 'felix_navigationbg' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_navitem' ) !='' ): ?>
        .navbar-nav > li > a {
            color: <?php echo esc_attr( ot_get_option( 'felix_navitem' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_navitemhover' ) !='' ): ?>
        .navbar-nav > li > a:hover, .navbar-nav > li > a:focus, .navbar-nav > .active > a {
            color: <?php echo esc_attr( ot_get_option( 'felix_navitemhover' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_navigationbg' ) !='' ): ?>
        @media (max-width: 767px) {
            .navbar-nav > li > a:hover, .navbar-nav > li > a:focus, .navbar-nav > .active > a {
                color: <?php echo esc_attr( ot_get_option( 'felix_navigationbg' ) ); ?>;
            }
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_sidebarwidgettitlecolor' ) !='' ): ?>
        .widget-title {

            color: <?php echo esc_attr( ot_get_option( 'felix_sidebarwidgettitlecolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_sidebarwidgetgeneralcolor' ) !='' ): ?>
        .widget ul {
            color: <?php echo esc_attr( ot_get_option( 'felix_sidebarwidgetgeneralcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_sidebarlinkcolor' ) !='' ): ?>
        .widget ul li a {
            color: <?php echo esc_attr( ot_get_option( 'felix_sidebarlinkcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_sidebarlinkhovercolor' ) !='' ): ?>
        .widget ul li a:hover {
            color: <?php echo esc_attr( ot_get_option( 'felix_sidebarlinkhovercolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_sidebarsearchsubmittextcolor' ) !='' ): ?>
        .search-form .form-control {
            color: <?php echo esc_attr( ot_get_option( 'felix_sidebarsearchsubmittextcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_sidebarsearchsubmitbgcolor' ) !='' ): ?>
        .search-submit {
            color: <?php echo esc_attr( ot_get_option( 'felix_sidebarsearchsubmitbgcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_logowidth' ) !='' &&  ot_get_option( 'felix_logowidth' ) != '100'): ?>
        .navbar-header a img {
            width: <?php echo esc_attr( ot_get_option( 'felix_logowidth' ) ); ?>px;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_logoheight' ) !='' && ot_get_option( 'felix_logoheight' ) != '60' ): ?>
        .navbar-header a img {
            height: <?php echo esc_attr( ot_get_option( 'felix_logoheight' ) ); ?>px;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogheaderbgcolor' ) !='' ): ?>
        .felix_blog .masked:after {
            background-color: <?php echo esc_attr( ot_get_option( 'felix_blogheaderbgcolor' ) ); ?>;

        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogheaderbgheight' ) !=''  &&   ot_get_option( 'felix_blogheaderbgheight' ) !='50'): ?>
        .felix_blog .inner-page {
            height: <?php echo esc_attr( ot_get_option( 'felix_blogheaderbgheight' ) ); ?>vh !important;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogheaderpaddingtop' ) !='' 
        && ot_get_option( 'felix_blogheaderpaddingtop' ) !='250'
         ): ?>
        @media (min-width: 768px) {
            .felix_blog .inner-page {

                padding-top: <?php echo esc_attr( ot_get_option( 'felix_blogheaderpaddingtop' ) ); ?>px !important;
                padding-bottom: <?php echo esc_attr( ot_get_option( 'felix_blogheaderpaddingbottom' ) ); ?>px !important;
            }
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogheadingcolor' ) !='' ): ?>
        .felix_blog .masked h1 {
            color: <?php echo esc_attr( ot_get_option( 'felix_blogheadingcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogsubtitlecolor' ) !='' ): ?>
        .felix_blog .masked .lead-text {
            color: <?php echo esc_attr( ot_get_option( 'felix_blogsubtitlecolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_m_c' ) !='' ): ?>
        .masked:after {
            background-color: <?php echo esc_attr( ot_get_option( 'felix_m_c' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option('felix_mask') == 'off') : ?>
        .masked:after {
            display: none;
        }

        .navbar.affix-top {
            padding: 60px 0px;
        }

        .masked {
            position: inherit;
        }

        <?php endif; ?>
        <?php if ( ot_get_option('felix_mask_c_page_header') == 'off') : ?>
        .custom-page-header {
            background-image: none !important;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_heading_color' ) !='' ): ?>
        .home .masthead h1 {
            color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_heading_color' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_slogan_color' ) !='' ): ?>
        .home .masthead p.lead-text {
            color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_slogan_color' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_buttonbg_color' ) !='' ): ?>
        .home .masthead a.btn {
            background-color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_buttonbg_color' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_buttonbg_hover_color' ) !='' ): ?>
        .home .masthead a.btn:hover {
            background-color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_buttonbg_hover_color' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_button_title_color' ) !='' ): ?>
        .home .masthead a.btn {
            color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_button_title_color' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_button_title_hover_color' ) !='' ): ?>
        .home .masthead a.btn:hover {
            color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_button_title_hover_color' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_video_button_background_color' ) !='' ): ?>
        .home .masthead a.play-home {
            color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_video_button_background_color' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_frontpage_header_video_button_background_hover_color' ) !='' ): ?>
        .home .masthead a.text-white.play-home:hover, .home .masthead .play-home:hover .fa {
            color: <?php echo esc_attr( ot_get_option( 'felix_frontpage_header_video_button_background_hover_color' ) ); ?> !important;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_singleheadingcolor' ) !='' ): ?>
        .single .inner-page h1 {
            color: <?php echo esc_attr( ot_get_option( 'felix_singleheadingcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_singleheaderparagraphcolor' ) !='' ): ?>
        .single .lead p {
            color: <?php echo esc_attr( ot_get_option( 'felix_singleheaderparagraphcolor' ) ); ?> !important;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_singleheaderbgheight' ) !='' && ot_get_option( 'felix_singleheaderbgheight' ) !='50' ): ?>
        .single .masthead-inner {
            height: <?php echo esc_attr( ot_get_option( 'felix_singleheaderbgheight' ) ); ?>vh !important;
        }

        <?php endif; ?>
        <?php if ((    ot_get_option( 'felix_singleheaderpaddingtop' ) !=''
          and ot_get_option( 'felix_singleheaderpaddingtop' ) !='250')
        ||( ot_get_option( 'felix_singleheaderpaddingbottom' ) !=''
        &&  ot_get_option( 'felix_singleheaderpaddingbottom' ) !='200' )):
         ?>
        @media (min-width: 768px) {

            .felix_blog .inner-page {
                padding-top: <?php echo esc_attr( ot_get_option( 'felix_singleheaderpaddingtop' ) ); ?>px !important;
                padding-bottom: <?php echo esc_attr( ot_get_option( 'felix_singleheaderpaddingbottom' ) ); ?>px !important;
            }
        }

        <?php endif; ?>

        <?php if ( ot_get_option( 'felix_archiveheadingcolor' ) !='' ): ?>
        .archive .inner-page h1 {
            color: <?php echo esc_attr( ot_get_option( 'felix_archiveheadingcolor' ) ); ?>;
        }

        <?php endif; ?>

        <?php if ( ot_get_option( 'felix_archiveheadingcolor_desc' ) !='' ): ?>
        .archive .inner-page .lead-text{
            color: <?php echo esc_attr( ot_get_option( 'felix_archiveheadingcolor_desc' ) ); ?>;
        }

        <?php endif; ?>

        <?php if ( ot_get_option( 'felix_archiveheaderbgheight' ) !='' &&  ot_get_option( 'felix_archiveheaderbgheight' ) !='50' ): ?>
        .archive .masthead {

            height: <?php echo esc_attr( ot_get_option( 'felix_archiveheaderbgheight' ) ); ?>vh !important;
        }

        <?php endif; ?>
        <?php if ((
         ot_get_option( 'felix_archiveheaderpaddingtop' ) !=''  &&   ot_get_option( 'felix_archiveheaderpaddingtop' ) !='250'

         )

         ||( ot_get_option( 'felix_archiveheaderpaddingbottom' ) !='' && ot_get_option( 'felix_archiveheaderpaddingbottom' ) !='200' )): ?>
        @media (min-width: 768px) {

            .archive .masthead {
                padding-top: <?php echo esc_attr( ot_get_option( 'felix_archiveheaderpaddingtop' ) ); ?>px !important;
                padding-bottom: <?php echo esc_attr( ot_get_option( 'felix_archiveheaderpaddingbottom' ) ); ?>px !important;
            }
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_errorpageheadbg' ) !='' ): ?>
        .error404 .masthead-inner {
            background: transparent url( <?php echo esc_attr( ot_get_option( 'felix_errorpageheadbg' ) ); ?>) no-repeat fixed center top / cover !important;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_errorheaderbgcolor' ) !='' ): ?>
        .error404 .masthead-inner {
            background-color: <?php echo esc_attr( ot_get_option( 'felix_errorheaderbgcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_errorheadingcolor' ) !='' ): ?>
        .error404 .masthead-inner h1 .text-primary {
            color: <?php echo esc_attr( ot_get_option( 'felix_errorheadingcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_error_heading_fontsize' ) !=''  &&  ot_get_option( 'felix_error_heading_fontsize' ) !='65'): ?>
        .error404 .masthead-inner h1 {
            font-size: <?php echo esc_attr( ot_get_option( 'felix_error_heading_fontsize' ) ); ?>px;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_errorheaderparagraphcolor' ) !='' ): ?>
        .error404 .masthead-inner p {
            color: <?php echo esc_attr( ot_get_option( 'felix_errorheaderparagraphcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_errorheaderbgheight' ) !='' && ot_get_option( 'felix_errorheaderbgheight' ) !='0' ): ?>
        .error404 .masthead-inner {
            height: <?php echo esc_attr( ot_get_option( 'felix_errorheaderbgheight' ) ); ?>vh !important;
        }

        <?php endif; ?>
        <?php if ((
        ot_get_option( 'felix_errorheaderpaddingtop' ) !=''  &&   ot_get_option( 'felix_errorheaderpaddingtop' ) != '250'

        )||( ot_get_option( 'felix_errorheaderpaddingbottom' ) !='' && ot_get_option( 'felix_errorheaderpaddingbottom' )  !='200' )): ?>
        @media (min-width: 768px) {
            .error404 .masthead-blog {
                padding-top: <?php echo esc_attr( ot_get_option( 'felix_errorheaderpaddingtop' ) ); ?>px !important;
                padding-bottom: <?php echo esc_attr( ot_get_option( 'felix_errorheaderpaddingbottom' ) ); ?>px !important;
            }
        }

        <?php endif; ?>

        <?php if ( ot_get_option( 'felix_searchpageheadbg' ) !='' ): ?>
        .search .masthead-inner {
            background: transparent url( <?php echo esc_attr( ot_get_option( 'felix_searchpageheadbg' ) ); ?>) no-repeat scroll center top / cover !important;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_searchheadingcolor' ) !='' ): ?>
        .search .inner-page h1 {
            color: <?php echo esc_attr( ot_get_option( 'felix_searchheadingcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_search_heading_fontsize' ) !=''  && ot_get_option( 'felix_search_heading_fontsize' ) !='0' ): ?>
        .search .masthead-inner h1 {
            font-size: <?php echo esc_attr( ot_get_option( 'felix_search_heading_fontsize' ) ); ?>px;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_searchheaderbgheight' ) !='' && ot_get_option( 'felix_searchheaderbgheight' ) !='50' ): ?>
        .search .masthead-inner {
            height: <?php echo esc_attr( ot_get_option( 'felix_searchheaderbgheight' ) ); ?>vh !important;
        }

        <?php endif; ?>
        <?php if (( ot_get_option( 'felix_searchheaderpaddingtop' ) !=''
         && ot_get_option( 'felix_searchheaderpaddingtop' ) !='250')
        ||( ot_get_option( 'felix_searchheaderpaddingbottom' ) !='' &&
          ot_get_option( 'felix_searchheaderpaddingbottom' ) !='200'
         )): ?>

        @media (min-width: 768px) {
            .search .masthead-inner {
                padding-top: <?php echo esc_attr( ot_get_option( 'felix_searchheaderpaddingtop' ) ); ?>px !important;
                padding-bottom: <?php echo esc_attr( ot_get_option( 'felix_searchheaderpaddingbottom' ) ); ?>px !important;
            }
        }

        <?php endif; ?>

        <?php if ( ot_get_option( 'felix_blogbreadcrubmscolor' ) !='' ): ?>
        .breadcrumbs li a {
            color: <?php echo esc_attr( ot_get_option( 'felix_blogbreadcrubmscolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogbreadcrubmshovercolor' ) !='' ): ?>
        .breadcrumbs a:hover {
            color: <?php echo esc_attr( ot_get_option( 'felix_blogbreadcrubmshovercolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogbreadcrubmscurrentcolor' ) !='' ): ?>
        .breadcrumbs .active {
            color: <?php echo esc_attr( ot_get_option( 'felix_blogbreadcrubmscurrentcolor' ) ); ?>;
        }

        <?php endif; ?>
        <?php if ( ot_get_option( 'felix_blogbreadcrubmsfontsize' ) !='' && ot_get_option( 'felix_blogbreadcrubmsfontsize' ) !='15' ): ?>
        .breadcrumbs {
            font-size: <?php echo esc_attr( ot_get_option( 'felix_blogbreadcrubmsfontsize' ) ); ?>px;
        }

        <?php endif; ?>
    
        <?php
          /*
         * Typography
         */
         $felix_tipigrof = ot_get_option( 'felix_tipigrof', array() ); ?>
        <?php if($felix_tipigrof) { ?>
        body {
            color: <?php echo esc_attr( $felix_tipigrof['font-color'] ) ; ?>;
            font-family: <?php echo esc_attr( $felix_tipigrof['font-family'] ) ; ?>  !important;
            font-size: <?php echo esc_attr( $felix_tipigrof['font-size'] ) ; ?>;
            font-style: <?php echo esc_attr( $felix_tipigrof['font-style'] ) ; ?>;
            font-variant: <?php echo esc_attr( $felix_tipigrof['font-variant'] ) ; ?>;
            font-weight: <?php echo esc_attr( $felix_tipigrof['font-weight'] ) ; ?>;
            letter-spacing: <?php echo esc_attr( $felix_tipigrof['letter-spacing'] ) ; ?>;
            line-height: <?php echo esc_attr( $felix_tipigrof['line-height'] ) ; ?>;
            text-decoration: <?php echo esc_attr( $felix_tipigrof['text-decoration'] ) ; ?>;
            text-transform: <?php echo esc_attr( $felix_tipigrof['text-transform'] ) ; ?>;
        }

        <?php } ?>
        <?php

         $felix_tipigrof1 = ot_get_option( 'felix_tipigrof1', array() ); ?>
        <?php if( $felix_tipigrof1 ) { ?>
        h1 {
            color: <?php echo esc_attr( $felix_tipigrof1['font-color'] ) ; ?>;
            font-family: <?php echo esc_attr( $felix_tipigrof1['font-family'] ) ; ?>  !important;
            font-size: <?php echo esc_attr( $felix_tipigrof1['font-size'] ) ; ?>;
            font-style: <?php echo esc_attr( $felix_tipigrof1['font-style'] ) ; ?>;
            font-variant: <?php echo esc_attr( $felix_tipigrof1['font-variant'] ) ; ?>;
            font-weight: <?php echo esc_attr( $felix_tipigrof1['font-weight'] ) ; ?>;
            letter-spacing: <?php echo esc_attr( $felix_tipigrof1['letter-spacing'] ) ; ?>;
            line-height: <?php echo esc_attr( $felix_tipigrof1['line-height'] ) ; ?>;
            text-decoration: <?php echo esc_attr( $felix_tipigrof1['text-decoration'] ) ; ?>;
            text-transform: <?php echo esc_attr( $felix_tipigrof1['text-transform'] ) ; ?>;
        }

        <?php } ?>

        <?php $felix_tipigrof2 = ot_get_option( 'felix_tipigrof2', array() ); ?>
        <?php if($felix_tipigrof2) { ?>
        h2 {
            color: <?php echo esc_attr( $felix_tipigrof2['font-color'] ) ; ?>;
            font-family: <?php echo esc_attr( $felix_tipigrof2['font-family'] ) ; ?> !important;
            font-size: <?php echo esc_attr( $felix_tipigrof2['font-size'] ) ; ?>;
            font-style: <?php echo esc_attr( $felix_tipigrof2['font-style'] ) ; ?>;
            font-variant: <?php echo esc_attr( $felix_tipigrof2['font-variant'] ) ; ?>;
            font-weight: <?php echo esc_attr( $felix_tipigrof2['font-weight'] ) ; ?>;
            letter-spacing: <?php echo esc_attr( $felix_tipigrof2['letter-spacing'] ) ; ?>;
            line-height: <?php echo esc_attr( $felix_tipigrof2['line-height'] ) ; ?>;
            text-decoration: <?php echo esc_attr( $felix_tipigrof2['text-decoration'] ) ; ?>;
            text-transform: <?php echo esc_attr( $felix_tipigrof2['text-transform'] ) ; ?>;
        }

        <?php } ?>

        <?php $felix_tipigrof3 = ot_get_option( 'felix_tipigrof3', array() ); ?>
        <?php if($felix_tipigrof3) { ?>
        h3 {
            color: <?php echo esc_attr( $felix_tipigrof3['font-color'] ) ; ?>;
            font-family: <?php echo esc_attr( $felix_tipigrof3['font-family'] ) ; ?>  !important;
            font-size: <?php echo esc_attr( $felix_tipigrof3['font-size'] ) ; ?>;
            font-style: <?php echo esc_attr( $felix_tipigrof3['font-style'] ) ; ?>;
            font-variant: <?php echo esc_attr( $felix_tipigrof3['font-variant'] ) ; ?>;
            font-weight: <?php echo esc_attr( $felix_tipigrof3['font-weight'] ) ; ?>;
            letter-spacing: <?php echo esc_attr( $felix_tipigrof3['letter-spacing'] ) ; ?>;
            line-height: <?php echo esc_attr( $felix_tipigrof3['line-height'] ) ; ?>;
            text-decoration: <?php echo esc_attr( $felix_tipigrof3['text-decoration'] ) ; ?>;
            text-transform: <?php echo esc_attr( $felix_tipigrof3['text-transform'] ) ; ?>;
        }

        <?php } ?>

        <?php $felix_tipigrof4 = ot_get_option( 'felix_tipigrof4', array() ); ?>
        <?php if($felix_tipigrof4) { ?>
        h4 {
            color: <?php echo esc_attr( $felix_tipigrof4['font-color'] ) ; ?>;
            font-family: <?php echo esc_attr( $felix_tipigrof4['font-family'] ) ; ?>  !important;
            font-size: <?php echo esc_attr( $felix_tipigrof4['font-size'] ) ; ?>;
            font-style: <?php echo esc_attr( $felix_tipigrof4['font-style'] ) ; ?>;
            font-variant: <?php echo esc_attr( $felix_tipigrof4['font-variant'] ) ; ?>;
            font-weight: <?php echo esc_attr( $felix_tipigrof4['font-weight'] ) ; ?>;
            letter-spacing: <?php echo esc_attr( $felix_tipigrof4['letter-spacing'] ) ; ?>;
            line-height: <?php echo esc_attr( $felix_tipigrof4['line-height'] ) ; ?>;
            text-decoration: <?php echo esc_attr( $felix_tipigrof4['text-decoration'] ) ; ?>;
            text-transform: <?php echo esc_attr( $felix_tipigrof4['text-transform'] ) ; ?>;
        }

        <?php } ?>

        <?php $felix_tipigrof5 = ot_get_option( 'felix_tipigrof5', array() ); ?>
        <?php if($felix_tipigrof5) { ?>
        h5 {
            color: <?php echo esc_attr( $felix_tipigrof5['font-color'] ) ; ?>;
            font-family: <?php echo esc_attr( $felix_tipigrof5['font-family'] ) ; ?>  !important;
            font-size: <?php echo esc_attr( $felix_tipigrof5['font-size'] ) ; ?>;
            font-style: <?php echo esc_attr( $felix_tipigrof5['font-style'] ) ; ?>;
            font-variant: <?php echo esc_attr( $felix_tipigrof5['font-variant'] ) ; ?>;
            font-weight: <?php echo esc_attr( $felix_tipigrof5['font-weight'] ) ; ?>;
            letter-spacing: <?php echo esc_attr( $felix_tipigrof5['letter-spacing'] ) ; ?>;
            line-height: <?php echo esc_attr( $felix_tipigrof5['line-height'] ) ; ?>;
            text-decoration: <?php echo esc_attr( $felix_tipigrof5['text-decoration'] ) ; ?>;
            text-transform: <?php echo esc_attr( $felix_tipigrof5['text-transform'] ) ; ?>;
        }

        <?php } ?>

        <?php $felix_tipigrof6 = ot_get_option( 'felix_tipigrof6', array() ); ?>
        <?php if($felix_tipigrof6) { ?>
        h6 {
            color: <?php echo esc_attr( $felix_tipigrof6['font-color'] ) ; ?>;
            font-family: <?php echo esc_attr( $felix_tipigrof6['font-family'] ) ; ?>  !important;
            font-size: <?php echo esc_attr( $felix_tipigrof6['font-size'] ) ; ?>;
            font-style: <?php echo esc_attr( $felix_tipigrof6['font-style'] ) ; ?>;
            font-variant: <?php echo esc_attr( $felix_tipigrof6['font-variant'] ) ; ?>;
            font-weight: <?php echo esc_attr( $felix_tipigrof6['font-weight'] ) ; ?>;
            letter-spacing: <?php echo esc_attr( $felix_tipigrof6['letter-spacing'] ) ; ?>;
            line-height: <?php echo esc_attr( $felix_tipigrof6['line-height'] ) ; ?>;
            text-decoration: <?php echo esc_attr( $felix_tipigrof6['text-decoration'] ) ; ?>;
            text-transform: <?php echo esc_attr( $felix_tipigrof6['text-transform'] ) ; ?>;
        }

        <?php } ?>



        <?php if (ot_get_option('additionalcss') != '') {
            echo wp_kses_post(ot_get_option('additionalcss'));
        } ?>


    </style>

    <?php if (ot_get_option('additionaljs') != ''): ?>
        <script type="text/javascript">
            <?php if (ot_get_option('additionaljs')) {
                echo wp_kses_post(ot_get_option('additionaljs'));
            } ?>
        </script>
    <?php endif; ?>

<?php endif; ?>
<?php }

add_action('wp_head', 'felix_custom_styling');