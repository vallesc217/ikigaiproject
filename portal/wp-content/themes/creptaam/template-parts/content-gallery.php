<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

global $creptaam_count;
$overlay_class = creptaam_option('overlay_class');
$gallery_class = $tt_slides = $overlay_class = "";

if (function_exists('rwmb_meta')) :
    $tt_slides = rwmb_meta('creptaam_post_gallery','type=image_advanced');
    $gallery_class = $tt_slides ? 'has-gallery-thumbnail' : '';
    $overlay_class = rwmb_meta('creptaam_overlay_class');
endif;

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
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="http://schema.org/Article">

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

    <header class="featured-wrapper">
        <div class="post-thumbnail">
            <?php if ($tt_slides) : ?>

                <?php do_action( 'creptaam_before_post_thumbnail');

                if(count($tt_slides) > 0) : ?>
                    
                    <div class="carousel slide blog-gallery-carousel">
                        <div class="carousel-inner">
                            <?php $carousel_count = 1; 
                            foreach( $tt_slides as $slide ) : ?>
                                <div class="item <?php if($carousel_count == 1) echo 'active'; ?>">

                                    <?php if(is_single()) :
                                        $images_src = wp_get_attachment_image_src( $slide['ID'], $blog_thumbnail);
                                    else :
                                        $images_src = wp_get_attachment_image_src( $slide['ID'], $blog_thumbnail);
                                    endif; ?>

                                    <img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php creptaam_alt_text();?>">
                                </div>
                            <?php
                            $carousel_count++;
                            endforeach; ?>
                        </div> <!-- .carousel-inner -->
                        
                        <!-- Controls -->
                        <a class="left carousel-control" href=".blog-gallery-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href=".blog-gallery-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div> <!-- .blog-gallery-carousel -->
                    
                    <?php if(! is_single()) :?>
                        <div class="post-overlay <?php echo esc_attr($overlay_class); ?>"></div>
                    <?php endif; ?>
                <?php endif; 
            elseif ( has_post_thumbnail() ) :
                the_post_thumbnail($blog_thumbnail, array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>

               <?php if(! is_single()) :?>
                    <div class="post-overlay <?php echo esc_attr($overlay_class); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <i class="fa fa-th-large"></i>
                        </a>
                    </div>
                <?php endif; ?>

                <?php do_action( 'creptaam_after_post_thumbnail'); ?>

            <?php endif; ?>
        </div>           
    </header><!-- .entry-header -->

    <?php if(!is_page() || is_single()) : ?>
        <div class="blog-content">
            <div class="entry-content">
                <?php if (is_single() || !has_excerpt()) :
                    the_content( '<span class="readmore">' . esc_html__( 'Read More', 'creptaam' ) . '</span>' );
                else :
                    the_excerpt();
                endif;

                wp_link_pages(array(
                    'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'creptaam') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                )); ?>
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