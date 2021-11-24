<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$quote = $quote_class = $author_url = "";
if (function_exists('rwmb_meta')) :
    $quote = rwmb_meta( 'creptaam_qoute' );
    $quote_class = $quote ? 'has-quote' : '';
    $author_url = rwmb_meta( 'creptaam_qoute_author_url' );
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="http://schema.org/Article">
    <header class="featured-wrapper">
        
        <?php if ( !$quote ) : ?>
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
        <?php endif; ?>

        <div class="post-thumbnail blog-quote">
            <?php if ($quote) : ?>
                <blockquote>
                    <p><?php echo esc_html($quote);?></p>
                    <?php if ($author_url) : ?>
                        <small><a href="<?php echo esc_url($author_url)?>"><?php echo esc_html(rwmb_meta( 'creptaam_qoute_author' )); ?></a></small>
                        <?php else : ?>
                            <small><?php echo esc_html(rwmb_meta( 'creptaam_qoute_author' )); ?></small>
                        <?php 
                    endif; ?>
                </blockquote>
                <div class="post-overlay"></div>
            <?php endif; ?>
        </div>
    </header><!-- .entry-header -->

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