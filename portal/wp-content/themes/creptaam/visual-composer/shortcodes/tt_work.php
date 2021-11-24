<?php
	if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

	$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	$tax_terms = get_terms( 'tt-work-cat' );
	wp_enqueue_style( 'isotope-css' );
    wp_enqueue_script( 'isotope' );
    ob_start();
?>
		
<div class="work-container <?php echo esc_attr($tt_atts['el_class']);?>">
	<?php if ($tt_atts['filter_visibility'] == 'visible') : ?>
		<div class="row">
			<div class="col-md-12">
				<div class="tt-filter-wrap <?php echo esc_attr($tt_atts['filter_style'].' '.$tt_atts['filter_alignment'].' '.$tt_atts['filter_color']); ?> ">
					<ul class="tt-filter list-inline">
						<li><button class="active" data-filter="*"><?php echo esc_html($tt_atts['default_text']);?></button></li>
						<?php foreach ( $tax_terms as $terms ) :
		                    if (! empty( $terms ) && ! is_wp_error( $terms )) : ?>
		    					<li><button data-filter=".<?php echo esc_attr($terms->slug); ?>"><?php echo esc_html($terms->name); ?></button>
		    					</li>
		                    <?php endif;
						endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="tt-grid row">
		<?php
		$args = array(
			'post_type'      => 'tt-work',
			'posts_per_page' => $tt_atts['post_limit'],
			'post_status'    => 'publish'
		);

		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

			<!-- the loop -->
			<?php while ( $query->have_posts() ) : $query->the_post(); 

			$terms = wp_get_post_terms( get_the_ID(), 'tt-work-cat' );
            
			$term = array();

            if (! empty( $terms ) && ! is_wp_error( $terms )) :
				foreach ( $terms as $t ) :
					$term[ ] = $t->slug;
				endforeach;
            endif;


        	$tt_attachment_id = get_post_thumbnail_id(get_the_ID());
			$tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, 'full' );
    	
			?>
				<div class="tt-item work-item col-md-<?php echo esc_attr($tt_atts['grid_column']);?> col-sm-6 col-xs-12 <?php echo esc_attr(implode( ' ', $term )); ?>">
					<div class="work-wrapper <?php echo esc_attr($tt_atts['work_style']); ?>">
                        <div class="tt-overlay-theme-color"></div>
                        <?php echo get_the_post_thumbnail( get_the_ID(), 'creptaam-work-thumbnail', array( 'class' => 'img-responsive', 'alt' => get_the_title()));
						?>

                    	<?php if ($tt_atts['work_style'] == 'style-one') : ?>

							<div class="work-info">
	                        	<?php if ($tt_atts['title_visibility'] == 'visible') : ?>
                                	<h3 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php endif; ?>

                                <div class="project-meta">
                                    <?php if ($tt_atts['category_visibility'] == 'visible') : 
	                                    creptaam_work_cat();
                                    endif; ?>
                                </div>
                            </div>
                            
                            <ul class="work-external-link">
								<?php if ($tt_atts['popup_button_visibility'] == 'visible') : ?>
                                	<li><a class="tt-lightbox" href="<?php echo esc_url($tt_image_attr[0]); ?>"><i class="fa fa-search"></i></a></li>
                                <?php endif; ?>

								<?php if ($tt_atts['link_button_visibility'] == 'visible') : ?>
                                	<li><a href="<?php the_permalink(); ?>"><i class="fa fa-external-link"></i></a></li>
								<?php endif; ?>
                            </ul>
                    	<?php endif; ?>

                    	<?php if($tt_atts['work_style'] == 'style-two') : ?>
							<?php if($tt_atts['popup_button_visibility'] == 'visible' || $tt_atts['link_button_visibility'] == 'visible') : ?>
							<div class="work-link">
                                <ul class="list-inline">
                                    <?php if ($tt_atts['popup_button_visibility'] == 'visible') : ?>
                                    	<li><a class="tt-lightbox" href="<?php echo esc_url($tt_image_attr[0]); ?>"><i class="fa fa-search"></i></a></li>
                                    <?php endif; ?>

                                    <?php if ($tt_atts['link_button_visibility'] == 'visible'): ?>
                                    	<li><a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a></li>
									<?php endif; ?>
                                </ul>
                            </div>
                        <?php endif;
                        endif; ?>

                    </div> <!-- .work -->
					
					<?php if($tt_atts['work_style'] == 'style-two') : ?>
						<div class="info-wrapper" >
                            <div class="info">
                                <?php if ($tt_atts['title_visibility'] == 'visible') : ?>
                                	<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
								<?php endif; ?>
                                
                                <?php if ($tt_atts['category_visibility'] == 'visible') : ?>
                                	<?php creptaam_work_cat(); ?>
                                <?php endif; ?>
                            </div> <!-- .info -->
                        </div> <!-- .info-wrapper -->
                    <?php endif; ?>

				</div> <!-- .tt-item -->
			<?php endwhile; ?>
			<!-- end of the loop -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, work not found !', 'creptaam' ); ?></p>
		<?php endif; ?>
		
	</div> <!-- .tt-grid -->
</div> <!-- .work-container -->

<?php echo ob_get_clean();