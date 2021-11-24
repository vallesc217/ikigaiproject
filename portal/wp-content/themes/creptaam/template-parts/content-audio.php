<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
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
        <div class="post-thumbnail blog-audio">
            <?php if (function_exists('rwmb_meta')) :
                $audio_mp3 = rwmb_meta( 'creptaam_featured_mp3', 'type=file_input' );
                $audio_ogg = rwmb_meta( 'creptaam_featured_ogg', 'type=file_input' );
                $audio_wav = rwmb_meta( 'creptaam_featured_wav', 'type=file_input' );
                $embed_audio = rwmb_meta( 'creptaam_embed_audio', 'type=oembed' );
                        
                if ( !empty($embed_audio) or !empty($audio_mp3) or !empty($audio_ogg) or !empty($audio_wav) ) : ?>
                    
                    <?php do_action( 'creptaam_before_post_thumbnail');

                        if ($embed_audio and (empty($audio_mp3) or empty($audio_ogg) or empty($audio_wav))) :

                            echo rwmb_meta( 'creptaam_embed_audio', 'type=oembed' );

                        elseif (!empty($audio_mp3) or !empty($audio_ogg) or !empty($audio_wav)) : ?>

                        <audio preload="auto" controls="controls">

                            <?php if (!empty($audio_mp3)) : ?>
                                <source src="<?php echo esc_url($audio_mp3); ?>" type="audio/mpeg"/>
                            <?php endif; ?>

                            <?php if (!empty($audio_ogg)) : ?>
                                <source src="<?php echo esc_url($audio_ogg); ?>" type="audio/ogg"/>
                            <?php endif; ?>

                            <?php if (!empty($audio_wav)) : ?>
                                <source src="<?php echo esc_url($audio_wav); ?>" type="audio/wav"/>
                            <?php endif; ?>
                            
                        </audio>

                    <?php endif; ?>

                    <?php do_action( 'creptaam_after_post_thumbnail'); ?>
                <?php endif;
            endif; ?>
        </div> <!-- .blog-audio -->
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