<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$a_text = $a_href = $a_target = $a_title = "";
if (function_exists('rwmb_meta')) :
    $a_text = rwmb_meta( 'creptaam_link_text' );
    $a_href = rwmb_meta( 'creptaam_link', 'type=url' );
    $a_target = rwmb_meta( 'creptaam_link_target' );
    $a_title = rwmb_meta( 'creptaam_link_title' );
endif;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> itemscope itemtype="http://schema.org/Article">
    
    <header class="featured-wrapper"> 
        <?php if ($a_href) : ?>
            <div class="post-thumbnail blog-link">
                <a href="<?php echo esc_url($a_href); ?>" title="<?php echo esc_attr($a_title); ?>" target="<?php echo esc_attr($a_target); ?>">
                    <?php 
                        if ($a_text) :
                            echo esc_html($a_text);
                        else : 
                            echo esc_html($a_href);
                        endif; 
                    ?>
                </a> 
            </div>
        <?php else : ?>
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
    </header><!-- .entry-header -->

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