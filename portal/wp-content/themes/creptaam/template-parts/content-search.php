<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 

$overlay_class = "";
if (function_exists('rwmb_meta')) :
    $overlay_class = rwmb_meta('creptaam_overlay_class');
endif;
?>

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

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php do_action( 'creptaam_before_post_thumbnail'); ?>

                <?php the_post_thumbnail('creptaam-thumbnail-large', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>

                <?php do_action( 'creptaam_after_post_thumbnail'); ?>
                <?php if(has_post_thumbnail() && ! is_single()) :?>
                    <div class="post-overlay <?php echo esc_attr($overlay_class); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <i class="fa fa-th-large"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
    </header><!-- /.featured-wrapper -->
    
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
</article>