<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$video_class = $video_mp4 = $video_webm = $video_ogv = $embed_video = $overlay_class = "";
if (function_exists('rwmb_meta')) :
    $video_mp4 = rwmb_meta( 'creptaam_featured_mp4', 'type=file_input' );
    $video_webm = rwmb_meta( 'creptaam_featured_webm', 'type=file_input' );
    $video_ogv = rwmb_meta( 'creptaam_featured_ogv', 'type=file_input' );
    $embed_video = rwmb_meta( 'creptaam_embed_video');
    if (!empty($video_mp4) || !empty($video_webm) || !empty($video_ogv) || !empty($embed_video)) {
        $video_class = 'has-video';
    }
    $overlay_class = rwmb_meta('creptaam_overlay_class');
endif;

//remove default value from embed video
if (strpos($embed_video, 'https://') == false) {
    $embed_video = NULL;
}
global $creptaam_count;
$embed_link = get_post_meta(get_the_ID(), 'creptaam_embed_video');
$page_template = get_post_meta(get_queried_object_id(), '_wp_page_template', true);
$header_page_visibility = creptaam_option('page-header-visibility', false, true);
$blog_column = creptaam_option('blog-column', false, 2);
$blog_sidebar = creptaam_option('blog-sidebar', false, 'right-sidebar');

$blog_thumbnail = 'creptaam-thumbnail';

if ($blog_sidebar == 'no-sidebar') {
    if( $creptaam_count == 1 && is_sticky() || $blog_column == 1 || is_single() ) :
        $blog_thumbnail = 'creptaam-thumbnail-extra-large';
    elseif($blog_column == 3) :
        $blog_thumbnail = 'creptaam-thumbnail';
    endif;
} else {
    if( $creptaam_count == 1 && is_sticky() || $blog_column == 1 || is_single()) :
        if (is_active_sidebar('creptaam-blog-sidebar') ) :
            $blog_thumbnail = 'creptaam-thumbnail-large';
        else :
            $blog_thumbnail = 'creptaam-thumbnail-extra-large';
        endif;
    elseif ($blog_column == 2) :
        if (is_active_sidebar('creptaam-blog-sidebar') && !is_sticky()) :
            $blog_thumbnail = 'creptaam-thumbnail';
        elseif (is_active_sidebar('creptaam-blog-sidebar') && is_sticky()) :
            $blog_thumbnail = 'creptaam-thumbnail-large';
        else :
            $blog_thumbnail = 'creptaam-thumbnail-no-sidebar';
        endif;
    endif;
} ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="http://schema.org/Article">

    <header class="featured-wrapper">
        <div class="entry-header">
            <div class="post-meta">
                <?php creptaam_posted_on(); ?>
            </div>
            <?php if( is_single()) : ?>
                <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
            endif; ?>
        </div><!-- /.entry-header -->  

        <?php if(! is_single() && has_post_thumbnail() && $embed_link && empty($video_mp4) && empty($video_webm) && empty($video_ogv)) :?>
            
                <div class="post-thumbnail popup-wrapper">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php do_action( 'creptaam_before_post_thumbnail'); ?>
                            
                            <?php the_post_thumbnail($blog_thumbnail, array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>

                            <a class="popup-vimeo popup-play" href="<?php echo esc_url($embed_link[0]); ?>"><i class="fa fa-play"></i></a>
                        <?php do_action( 'creptaam_after_post_thumbnail'); ?>
                    <?php endif; ?>
                    
                    <?php if(! is_single()) : ?>
                        <div class="post-overlay <?php echo esc_attr($overlay_class); ?>">
                            <a href="<?php the_permalink(); ?>"></a>
                        </div>
                    <?php endif; ?>
                </div><!-- .post-thumbnail -->   
        <?php else : 
            if (function_exists('rwmb_meta')) :
                if ( !empty($embed_video) or !empty($video_mp4) or !empty($video_webm) or !empty($video_ogv) ) : ?>
                    
                        <div class="post-thumbnail blog-video">
                            <?php do_action( 'creptaam_before_post_thumbnail'); ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php if ($embed_video and (empty($video_mp4) or empty($video_webm) or empty($video_ogv))) :
                                        echo rwmb_meta( 'creptaam_embed_video');
                                    elseif (!empty($video_mp4) or !empty($video_webm) or !empty($video_ogv)) : ?>
                                        <video preload="auto" controls="controls">
                                            <?php if (!empty($video_mp4)) : ?>
                                                <source src="<?php echo esc_url($video_mp4); ?>" type="video/mp4"/>
                                            <?php endif; ?>

                                            <?php if (!empty($video_webm)) : ?>
                                                <source src="<?php echo esc_url($video_webm); ?>" type="video/webm"/>
                                            <?php endif; ?>

                                            <?php if (!empty($video_ogv)) : ?>
                                                <source src="<?php echo esc_url($video_ogv); ?>" type="video/ogv"/>
                                            <?php endif; ?>
                                        </video>
                                    <?php endif; ?>
                                </div>
                            <?php do_action( 'creptaam_after_post_thumbnail'); ?>
                        </div>
                    
                <?php endif;
            endif;
        endif; ?>
    </header>
    
    <?php if(!is_page() || is_single()) : ?>
        <div class="blog-content">
            <div class="entry-content">
                <?php 
                    if (is_single() || !has_excerpt()) :
                        the_content( '<span class="readmore">' . esc_html__( 'Read More', 'creptaam' ) . '</span>' );
                    else :
                        the_excerpt();
                    endif;

                    wp_link_pages(array(
                        'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'creptaam') . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ));
                ?>
            </div><!-- .entry-content -->
        </div><!-- /.blog-content -->
    <?php endif; ?>


    <?php if (is_single()): 
        $tags_list = get_the_tag_list('', esc_html__(', ', 'creptaam')); ?>

        <?php if ($tags_list || function_exists('creptaam_post_share')): ?>
            <footer class="entry-footer clearfix">
                <?php if ($tags_list) : ?>
                    <div class="post-tags">
                        <span class="tags-links">
                            <?php printf(esc_html__('%1$s', 'creptaam'), $tags_list); ?>
                        </span>
                    </div> <!-- .post-tags -->
                <?php endif; ?>
                
                <?php if (function_exists('creptaam_post_share') && creptaam_option('show-share-button', false, true)): ?>
                    <?php creptaam_post_share(); ?>
                <?php endif; ?>
            </footer>
        <?php endif; ?>
    <?php endif; ?>
</article>