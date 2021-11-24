<?php
$felix_class = felix_get_global_class();
if ( !is_single() && ( !is_page() ) ) { ?>

    <article <?php post_class( 'post' ); ?>>
        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
			<?php felix_post_thumbnail(); ?>
        </a>
        <header class="post-header">
            <h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h2>

            <ul class="post-meta">
                <li><span class="fa fa-clock-o"></span> <?php echo esc_html( get_the_date(  ) ); ?></li>
                <li><span class="fa fa-user"></span> <?php esc_html_e( 'Posted by', 'felix' ); ?> <a
                            href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
                </li>
				<?php felix_get_list_cats(); ?>
            </ul>

        </header>

        <div class="post-entry text-left">
            <p><?php echo felix_limit_excerpt( felix_words_limit() ); ?></p>


            <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn-post-read btn"
               data-text-hover="<?php echo esc_html( get_theme_mod( 'felix_blog_list_text', esc_html__( 'Read more', 'felix' ) ) ); ?>">
                    <span class="btn-text">
                  <?php echo esc_html( get_theme_mod( 'felix_blog_list_text', esc_html__( 'Read more', 'felix' ) ) ); ?>
                        </span>

            </a>

        </div>

    </article>


<?php } else { ?>

    <div <?php post_class( 'post' ); ?> >
        <div class="post-thumbnail">

			<?php felix_post_thumbnail(); ?>

        </div>
        <header class="post-header">
            <ul class="post-meta">
                <li><span class="fa fa-clock-o"></span> <?php echo esc_attr( get_the_date(  ) ); ?></li>
                <li><span class="fa fa-user"></span> <?php esc_html_e( 'Posted by', 'felix' ); ?> <a
                            href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_attr( get_the_author() ); ?></a>
                </li>
				<?php felix_get_list_cats(); ?>
            </ul>
        </header>


		<?php the_content(); ?>
        <div class="post_pagination">
			<?php wp_link_pages(); ?>
        </div>

		<?php get_template_part( 'partials/single', 'meta' ); ?>


    </div>

<?php } ?>