<?php get_header();?>

<main id="home" class="custom-page-header masthead masthead-inner masked" >
    <div class="inner-page rel-1">
        <div class="container ">
            <div class="row">
                <div class=" col-lg-6 ">
                    <h1 class="wow fadeInDown"><?php the_title(); ?></h1>


                        <?php if (have_posts()) : ?>
                            <?php
                            // Start the Loop.
                            while (have_posts()) : the_post();

                                ?>
                                <p class="lead-text"><?php
                                    echo wp_kses_post(get_post_meta(get_the_ID(), '_felix_short_description', true));
                                    ?></p>
                            <?php endwhile;

                        else :

                        endif; ?>


                </div>
            </div>
        </div>
    </div>
</main>
<?php if ( function_exists('ot_get_option') && ot_get_option('felix__breadcrubms') != 'off') : ?>
<div class="breadcrumbs">
    <div class="container">


        <ul>
            <li><a href="<?php echo esc_url(get_home_url('/')); ?>"> <?php esc_html_e('Home', 'felix') ?>
                </a></li>

            <li class="active"><a href="<?php  echo esc_url('#'); ?>"><?php  the_title(); ?></a></li>
        </ul>
    </div>
</div>
<?php endif; ?>

<!-- Content -->

<div class="content-inner">

    <div class="container">
        <div class="row">
            <?php

            $positin_sidebar = "";

            if (get_theme_mod('felix_sidebar_position', 's2') == 's1') {
                $positin_sidebar = 'left';
            } else {
                $positin_sidebar = 'right';
            }

            if (isset($_GET['showas']) && $_GET['showas'] == 'left') {
                $positin_sidebar = 'left';
            } elseif (isset($_GET['showas']) && $_GET['showas'] == 'right') {
                $positin_sidebar = 'right';
            }

            if ($positin_sidebar == 'left')
                get_sidebar();
            ?>
            <div class="primary col-lg-9">

                <?php if (have_posts()) : ?>
                    <?php
                    // Start the Loop.
                    while (have_posts()) : the_post();

                        ?>
                        <?php get_template_part('partials/content', get_post_format()); ?>

                    <?php endwhile;


                else :

                endif; ?>
                <section class="section-add-comment section-primary">

                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif; ?>



                </section>
            </div>
            <?php
            if ($positin_sidebar == 'right')
                get_sidebar();
            ?>
        </div>
    </div>



    <?php get_footer(); ?>
