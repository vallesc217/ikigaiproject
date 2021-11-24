<?php get_header(); ?>
<main id="home" class="custom-page-header masthead masthead-inner masked">
	<div class="inner-page rel-1">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<h1 class="wow fadeInDown"><?php
						the_archive_title();
						?></h1>
					<p class="lead-text">
						<?php

						the_archive_description();

						?>
					</p>
				</div>
			</div>
		</div>
	</div>
</main>
<div class="breadcrumbs-place">

	<?php if (function_exists('ot_get_option') && ot_get_option('felix__breadcrubms') != 'off') : ?>
		<div class="breadcrumbs">
			<div class="container">
				<ul>
					<li><a href="<?php echo esc_url(get_home_url('/')); ?>"> <?php esc_html_e('Home', 'felix') ?>
						</a></li>
					<?php if (!is_home()) { ?>
						<li class="active">
							<a href="<?php  echo esc_url('#'); ?>"><?php
								$cat_id = get_query_var('cat');
								if ($cat_id > 0) {
									$cat = get_category($cat_id);
									echo esc_html($cat->name);

								} elseif (is_archive()) {
									echo esc_html(get_the_time("F Y"));
								}
								?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
</div>

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

						get_template_part('partials/content', get_post_format());
						?>


					<?php endwhile;
					wp_reset_postdata();


				else :
					// If no content, include the "No posts found" template.
					get_template_part('content', 'none');
				endif; ?>

				<?php

				$felix_class = felix_get_global_class();
				$felix_class->felix_pagenavi();
				ob_start();
				the_posts_pagination();
				wp_link_pages();
				ob_get_clean();
				?>

			</div>
			<?php
			if ($positin_sidebar == 'right')
				get_sidebar();
			?>
		</div>

	</div>

	<!-- Footer -->


	<?php get_footer(); ?>
