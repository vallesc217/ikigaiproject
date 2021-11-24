<?php

/**********New version**************/




/*
* felix_header_slider
*/


add_shortcode( 'felix_header_slider', 'felix_header_slider_func' );
function felix_header_slider_func( $atts, $content ) {
	ob_start();
	$content = !empty( $content ) ? $content : "";

	$atts = shortcode_atts(
		array(
			'section_id' => '',
			'alias_slider' => '',
			'css' => '',


		), $atts
	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );

	?>


	<div class="content <?php  echo esc_attr($css_class); ?>">
		<div class="vc_row wpb_row vc_row-fluid">
			<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<section>
							<main <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>  <?php if ( isset( $img_src[0] ) ) {
								$img = wp_get_attachment_image_src( $img_src, 'full' );

								?>
								style="background: url(<?php echo esc_url( $img[0] ); ?>) 50% 0 no-repeat; background-size: cover;"
								<?php
							} ?> class=" masthead main-slideshow  masthead  " data-stellar-ratio="0.8">
								<div class="mouse"></div>

								<div class="wpb_text_column wpb_content_element ">
									<div class="wpb_wrapper">
										<?php

										if ( $alias_slider != '' ) {
											echo do_shortcode( '[rev_slider alias="' . $alias_slider . '"][/rev_slider]' );
										} ?>

									</div>
								</div>


							</main>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}









/*
* felix_video_header
*/

add_shortcode( 'felix_video_header', 'felix_header_video_func' );
function felix_header_video_func( $atts, $content ) {
	ob_start();
	$content = !empty( $content ) ? $content : "";
	$atts = shortcode_atts(
		array(
			'section_id' => '',
			'slideshow' => 0,
			'h' => esc_html__( 'Welcome to Felix', 'felix' ),
			'tb' => esc_html__( 'Start with us', 'felix' ),
			'tbh' => esc_html__( 'Send request', 'felix' ),
			'tb_u' => '#request',
			'img_src' => '',
			'poster' => '',
			'v_mp4' => get_template_directory_uri() . '/video/video.mp4',
			'v_webm' => get_template_directory_uri() . '/video/video.webm',
			'title_color' => '',
			'last_word_color' => '',
			'description_color' => '',

		), $atts
	);


	$arr = explode( ' ', $atts['h'] );
	$arr_h = array_pop( $arr );

	extract( $atts );
	if ( $img_src != '' ) {
		$poster = wp_get_attachment_image_src( $img_src, 'full' );
	}

	?>

	<style>
		<?php if($title_color!=''){ ?>.masthead-image h1 {
			color: <?php echo esc_attr($title_color)  ; ?>;
		}

		<?php } ?>

		<?php if($last_word_color!=''){ ?>.masthead-image h1 .text-primary {
			color: <?php echo esc_attr($last_word_color)  ; ?>;
		}

		<?php } ?>
		<?php if($description_color!=''){ ?>
		.masthead-image p.lead-text {
			color: <?php echo esc_attr($description_color)  ; ?>;
		}

		<?php } ?>


	</style>


	<main <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?><?php if ( isset( $img_src[0] ) ) {
		$img = wp_get_attachment_image_src( $img_src, 'full' );

		?>
		style="background: url(<?php echo esc_url( $img[0] ); ?>) 50% 0 no-repeat; background-size: cover;"
		<?php
	} ?> class="masthead masthead-video masked" data-stellar-ratio="0.8"
	     data-stellar-background-ratio="0.4">
		<div class="mouse"></div>
		<video class="video" autoplay loop
		       muted <?php if ( isset( $poster[0] ) ) { ?> poster="<?php echo esc_url( $poster[0] ); ?>" <?php } ?>>
			<source src="<?php echo esc_url( $v_mp4 ); ?>" type="video/mp4">
			<source src="<?php echo esc_url( $v_webm ); ?>" type="video/webm">
		</video>
		<div class="opener">
			<div class="container rel-1">
				<div class="row">
					<div class="text-center col-lg-8 col-lg-offset-2">
						<h1><?php echo wp_kses_post( $h ); ?></h1>

							<p class="lead-text"><?php echo wp_kses_post( $content ); ?></p>

						<a href="<?php echo esc_url( $tb_u ); ?>" class="btn" data-toggle="modal" target="_blank" data-wow-delay="1s"


						>
					<?php echo esc_html( $tb ); ?>


											</a>
										</div>
									</div>
								</div>
							</div>
						</main>

	<?php
	return ob_get_clean();
}

/**
 *  felix_header
 */
add_shortcode( 'felix_header', 'felix_header_func' );
function felix_header_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'title'      => esc_html__( 'felix innovations', 'felix' ),
			'desc'       => esc_html__( 'Present your product, app, service and more', 'felix' ),
			'video'      => 'http://www.youtube.com/watch?v=ANwf8AE3_d0',
			'tb'         => esc_html__( 'Get start now', 'felix' ),
			'tb_u'       => '#request',
			'css'        => '',
			'type'       => '',
			'poster'     => get_template_directory_uri() . '/video/poster.jpg',
			'section_id' => '',
			'textb'      => esc_html__( 'Watch video', 'felix' ),

		), $atts
	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );


	?>
		<main id="home" class="masthead masked <?php  echo esc_attr($css_class); ?>" data-stellar-background-ratio="0.8">
	      <div class="opener rel-1">
	        <div class="container">
	          <h1 class="wow fadeInDown"><?php echo esc_html( $title ); ?></h1>
	          <p class="lead-text"><?php echo esc_html( $desc ); ?></p>
	          <div class="control">
	            <?php if(isset($tb{0})) { ?>
	            	<a href="<?php echo esc_url( $tb_u ); ?>" class="btn" data-toggle="modal" target="_blank"><?php echo esc_html( $tb ); ?></a>
	            <?php } ?>
	          </div>
	          <div class="control wow fadeInUp" data-wow-delay="0.4s">
	            <?php if(isset($textb{0})) { ?>
	            <a href="<?php echo esc_url( $video ) ?>" class="text-white play-home js-play">
	              <img alt=""  src="<?php echo get_template_directory_uri();?>/img/play-btn.png">
	              <span><?php echo esc_html( $textb ); ?></span>
	            <?php } ?>
	            </a>
	          </div>
	        </div>
	      </div>
	    </main>

	<?php
	return ob_get_clean();
}


/**
 * Partners
 */
add_shortcode( 'felix_partners', 'felix_partners_func' );
function felix_partners_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'items'      => '',
			'images'     => '',
			'section_id' => '',
			'css'        => '',

		), $atts
	);
	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );

	$arr_img = explode( ',', $images );

	?>
	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="partners <?php echo esc_attr( $css_class ); ?> ">
		<div class="container">
			<div class="row">

				<div class="partners-carousel">


					<?php
					foreach ( $arr_img as $item ) { ?>

						<div class="partner">

							<?php

							global $felix_class;
							$img_arr = wp_get_attachment_image_src( $item, 'full' );

							$img = $felix_class->felix_trim_img_by_url( $img_arr[0], 163, 163 );

							?>

							<img alt="" class="img-responsive" src="<?php echo esc_url( $img ); ?>">
						</div>
					<?php }
					?>

				</div>
			</div>
		</div>

	</section>
	<?php
	return ob_get_clean();
}


/*
 *  About
 */


add_shortcode( 'felix_about', 'felix_about_func' );
function felix_about_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			't'          => esc_html__( 'Meet felix', 'felix' ),
			'd'          => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'felix' ),
			'white'      => '',
			'opacity'    => '',
			'class'      => '',
			'icon'       => '',
			'items'      => '',
			'ts'         => esc_html__( 'Functional', 'felix' ),
			'ds'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quae provident enim cum quidem aut corporis', 'felix' ),
			'section_id' => '',
			'css'        => '',

		), $atts

	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );

	$class2 = $atts['white'] == true ? 'text-white' : '';
	$op     = $atts['opacity'] == true ? 'text-opacity' : '';

	?>


	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="about 	<?php echo esc_attr( $css_class ); ?>  text-center section">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-8 col-md-offset-2
         <?php echo esc_attr( $class2 ); ?> <?php echo esc_attr( $class ); ?>">

					<h2 class="section-title <?php echo esc_attr( $class2 ); ?>  "><?php echo esc_html( $t ); ?></h2>

					<p class="lead-text <?php echo esc_attr( $op ); ?> "><?php echo esc_html( $d ); ?></p>
				</div>
			</div>
			<div class="section-body">
				<div class="row row-columns row-padding">
					<?php
					$items_v = vc_param_group_parse_atts( $atts['items'] );
					if ( $items_v ) {
						foreach ( $items_v as $item ) { ?>

							<div class="column column-padding col-md-4">
								<i class="text-primary icon <?php echo( ( $item['icon'] ) ); ?>"></i>
								<h3><?php if ( isset( $item['ts'] ) ) {
										echo esc_html( $item['ts'] );
									} ?></h3>
								<p><?php if ( isset( $item['ds'] ) ) {
										echo esc_html( $item['ds'] );
									} ?></p>

							</div>
						<?php }
					}
					?>
				</div>
			</div>
		</div>
	</section>


	<?php
	return ob_get_clean();
}


/**
 * Product
 */
add_shortcode( 'felix_product', 'felix_product_func' );
function felix_product_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'images'     => '',
			'section_id' => '',
			'css'        => '',

		), $atts
	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );

	global $felix_class;

	$img_arr = wp_get_attachment_image_src( $images, 'full' );
	$img     = $felix_class->felix_trim_img_by_url( $img_arr[0], 1170, 260 );
	if ( ! isset( $img{2} ) ) {
		$img = get_template_directory_uri() . '/img/product.png';
	}
	?>


	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="product bgc-light <?php echo esc_attr( $css_class ); ?>  text-center section-sm">
		<div class="container">
			<div class="row">
				<div class="text-center wow animatePhone" data-wow-duration="2s">
					<img alt="" class="img-responsive"
					     src="<?php echo esc_url( $img ); ?>"></div>
			</div>
		</div>
	</section>


	<?php
	return ob_get_clean();
}


/*
 *  Charts
 */


add_shortcode( 'felix_chart', 'felix_chart_func' );
function felix_chart_func( $atts, $content ) {
	ob_start();
	$content   = ! empty( $content ) ? $content : "";
	$atts      = shortcode_atts(
		array(
			'title'      => esc_html__( 'Burn', 'felix' ),
			'number'     => esc_html__( '8,45', 'felix' ),
			'type'       => esc_html__( 'Calories', 'felix' ),
			'items'      => '',
			'title1'     => esc_html__( 'Available anytime', 'felix' ),
			'desc'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas harum, hic officiis commodi reprehenderit explicabo tenetur eos! Excepturi adipisci consequatur quisquam error, velit, pariatur', 'felix' ),
			'section_id' => '',
			'css'        => '',
		), $atts
	);
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );

	$tems_v = vc_param_group_parse_atts( $atts['items'] );

	extract( $atts );

	?>

	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="charts <?php echo esc_attr( $css_class ); ?>  section">
		<div class="container">
			<div class="row-columns row-padding row">
				<div class="column col-md-6 col-md-push-6">
					<h2 class="section-title"><?php echo esc_html( $title1 ); ?></h2>
					<p><?php echo esc_html( $desc ); ?></p>
				</div>
				<div class="column col-md-6 col-md-pull-6 text-center">
					<div class="row-columns row">
						<?php foreach ( $tems_v as $item ): ?>
							<div class="column col-pie">
								<div class="chart" data-percent="84.5">
									<div class="chart-content">
										<div
											class="chart-title"><?php if ( isset( $item['title'] ) ) {
												echo esc_html( $item['title'] );
											} ?></div>
										<div
											class="chart-number"><?php if ( isset( $item['number'] ) ) {
												echo esc_html( $item['number'] );
											} ?></div>
										<div class="line line-center"></div>
										<div
											class="chart-type"><?php if ( isset( $item['type'] ) ) {
												echo esc_html( $item['type'] );
											} ?></div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	return ob_get_clean();

}


/**
 *  Video section
 */

add_shortcode( 'felix_video_section', 'felix_video_section_func' );
function felix_video_section_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(

			'desc'       => esc_html__( 'Watch our video', 'felix' ),
			'video'      => '',
			'title1'     => esc_html__( 'Available anytime', 'felix' ),
			'desc1'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas harum, hic officiis commodi reprehenderit explicabo tenetur eos! Excepturi adipisci consequatur quisquam error, velit, pariatur', 'felix' ),
			'section_id' => '',
			'css'        => '',

		), $atts
	);

	extract( $atts );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );

	?>

	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="video-section <?php echo esc_attr( $css_class ); ?>  text-white masked section-lg">
		<div class="container rel-1">
			<div class="row">
				<div class="col-md-6">
					<h2 class="text-white section-title"><?php echo esc_html( $title1 ); ?></h2>

					<p class="text-opacity"><?php echo  ( $desc1 ); ?></p>
					<p class="top-space  ">
						<a href="<?php echo esc_url( $video ) ?>" class="text-white play js-play"><i
								class="text-white fa fa-3x fa-play-circle"></i> <?php echo esc_html( $desc ); ?></a>
					</p>
				</div>
			</div>
		</div>
	</section>


	<?php
	return ob_get_clean();
}


/**
 * Features 1
 */

add_shortcode( 'felix_features_1', 'felix_features_1_func' );
function felix_features_1_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'section_id'  => 'Features',
			'images'      => '',
			'class'       => '',
			'title'       => esc_html__( 'Accomplish more,<br /> every day.', 'felix' ),
			'description' => esc_html__( '', 'felix' ),
			't'           => esc_html__( 'Ionicons', 'felix' ),
			'd'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas harum, hic officiis commodi', 'felix' ),
			'number'        => esc_html__( '4K', 'felix' ),
			'items'       => '',
			'css'         => '',
		), $atts
	);

	extract( $atts );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );
	$tems_v    = vc_param_group_parse_atts( $atts['items'] );
	global $felix_class;


	$img_arr = wp_get_attachment_image_src( $images, 'full' );
	$img     = $felix_class->felix_trim_img_by_url( $img_arr[0], 360, 738 );


	?>


	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="features <?php echo esc_attr( $css_class ); ?>   bgc-light section">
		<div class="container">
			<div class="row-columns row">
				<div class="text-center column  col-md-6">
					<img alt="" class="feature-img" src="<?php echo esc_url( $img ); ?>">
				</div>
				<div class="col-feature col-feature-content column  col-md-6">
					<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<p class="lead-text"><?php echo esc_html( $description ); ?></p>
					<div class="section-body">

						<?php foreach ( $tems_v as $item ) { ?>
							<div class="column">
								<div class="media-left">
									<div class="feature-number text-primary">
										<?php echo esc_attr( $item['number'] ); ?>
									</div>
								</div>
								<div class="media-right">
									<h4><?php   if(isset($item['t'])) echo esc_html( $item['t'] ); ?></h4>
									<p><?php if(isset($item['d'])) echo esc_html( $item['d'] ); ?></p>
								</div>
							</div>
						<?php } ?>


					</div>
				</div>
			</div>
		</div>

	</section>

	<?php
	return ob_get_clean();
}


/**
 * Features 2
 */

add_shortcode( 'felix_features_2', 'felix_features_2_func' );
function felix_features_2_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'section_id'  => '',
			'images'      => '',
			'class'       => '',
			'title'       => esc_html__( 'Key Features', 'felix' ),
			'description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas harum, hic officiis commodi reprehenderit explicabo tenetur eos! Excepturi adipisci consequatur quisquam error, velit, pariatur', 'felix' ),
			't'           => esc_html__( 'Bootstrap 3x', 'felix' ),
			'd'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'felix' ),
			'icon'        => '',
			'items'       => '',
			'css'         => '',
		), $atts

	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );


	if ( $images != '' ) {
		$img_arr = wp_get_attachment_image_src( $images, 'full' );


	}

	?>


	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="features 	<?php echo esc_attr( $css_class ); ?>  section">
		<div class="container">
			<div class="row-columns row">
				<div class="text-center column col-md-5 col-md-push-7">

					<?php if ( isset( $img_arr[0] ) ) {
						?>
						<img alt="" class="feature-img" src="<?php echo esc_url( $img_arr[0] ); ?>">
						<?php

					}
					?>

				</div>
				<div class="col-feature-content column col-md-7 col-md-pull-5">
					<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<!-- <div class="row">
						<div class="col-md-10">
							<p><?php echo esc_html( $description ); ?></p>

						</div>
					</div> -->
					<div class="section-body">
						<div class="row row-columns">
							<?php
							$tems = vc_param_group_parse_atts( $atts['items'] );
							if ( $tems ) {
								foreach ( $tems as $item ) { ?>
									<div class="column col-md-6">
										<div class="media-left">
					                        <i class="text-primary icon <?php if ( isset( $item['icon'] ) )
						                        echo esc_attr( ( $item['icon'] ) ) ?>"></i>
										</div>
										<div class="media-right">
											<h4><?php if ( isset( $item['t'] ) ) {
													echo esc_html( $item['t'] );
												} ?></h4>
											<p><?php if ( isset( $item['d'] ) ) {
													echo esc_html( $item['d'] );
												} ?></p>
										</div>
									</div>
								<?php }
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	return ob_get_clean();
}





/**
 * Features 3
 */

add_shortcode( 'felix_features_3', 'felix_features_3_func' );
function felix_features_3_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'section_id'  => '',
			'images'      => '',
			'class'       => '',
			'title'       => esc_html__( 'Start getting more', 'felix' ),
			'description' => esc_html__( '', 'felix' ),
			't'           => esc_html__( 'Bootstrap 3x', 'felix' ),
			'd'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas harum, hic officiis commodi', 'felix' ),
			'number'        => esc_html__( '4K', 'felix' ),
			'items'       => '',
			'css'         => '',
		), $atts
	);

	extract( $atts );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );
	$tems_v    = vc_param_group_parse_atts( $atts['items'] );
	global $felix_class;


	$img_arr = wp_get_attachment_image_src( $images, 'full' );
	$img     = $felix_class->felix_trim_img_by_url( $img_arr[0], 360, 738 );


	?>


	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="features <?php echo esc_attr( $css_class ); ?>   bgc-light section">
		<div class="container">
			<div class="row-columns row">
				<div class="text-center column  col-md-6">
					<img alt="" class="feature-img" src="<?php echo esc_url( $img ); ?>">
				</div>
				<div class="col-feature col-feature-content column  col-md-6">
					<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<p class="lead-text"><?php echo esc_html( $description ); ?></p>
					<div class="section-body">

						<?php foreach ( $tems_v as $item ) { ?>
							<div class="column">
								<h3><?php   if(isset($item['t'])) echo esc_html( $item['t'] ); ?></h3>
								<p><?php if(isset($item['d'])) echo esc_html( $item['d'] ); ?></p>
							</div>
						<?php } ?>


					</div>
				</div>
			</div>
		</div>

	</section>

	<?php
	return ob_get_clean();
}




/*
 *  banner
 */

add_shortcode( 'felix_banner', 'felix_banner_func' );
function felix_banner_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'section_id' => '',
			'title'      => esc_html__( 'Try Launch Today', 'felix' ),
			'desc'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'felix' ),
			'tb'         => esc_html__( 'Get start now', 'felix' ),
			't_url'      => esc_html__( '#request', 'felix' ),
			'css'        => '',
		), $atts
	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );

	?>
	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="text-center section pb-0  	<?php echo esc_attr( $css_class ); ?>">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-8 col-md-offset-2">
					<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<p class="lead-text">
						<?php echo esc_html( $desc ); ?>
					</p>
				</div>
			</div>
			<div class="top-space-sm">
				<a href="<?php echo esc_html( $t_url ); ?>" class="btn wow swing" data-toggle="modal" style="visibility: visible; animation-name: swing;">
					<?php echo esc_html( $tb ); ?>
			    </a>
			</div>
		</div>
	</section>


	<?php
	return ob_get_clean();

}


/*

/*
 *  Reviews
 */


add_shortcode( 'felix_review_carousel', 'felix_review_carousel_func' );
function felix_review_carousel_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'section_id'  => '',
			'items'       => '',
			'images'      => '',
			'desc'        => esc_html__( '«Design is the method of putting form and content together; there is no single definition. Design can be aesthetics ', 'felix' ),
			'icon'        => esc_html__( 'fa-quote-right', 'felix' ),
			'title'       => esc_html__( 'Buyers about product', 'felix' ),
			'description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ', 'felix' ),
			'name'        => esc_html__( 'James Thornton ', 'felix' ),
			'css'         => '',
		), $atts
	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );
	$tems_v    = vc_param_group_parse_atts( $atts['items'] );


	?>
	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="reviews bgc-light  <?php echo esc_attr( $css_class ); ?> text-center section">


		<div class="container">
			<div class="row">
				<div class="text-center col-md-8 col-md-offset-2">
					<h2 class="section-title"><?php esc_html_e( $title ) ?></h2>
					<p class="lead-text"><?php esc_html_e( $description ) ?></p></div>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="review-carousel carousel">
						<?php
						foreach ( $tems_v as $item ) { ?>
							<div class="review">
								<div class="text-center">

									<?php

									global $felix_class;
									$img_arr = wp_get_attachment_image_src( $item['images'], 'full' );

									$img = $felix_class->felix_trim_img_by_url( $img_arr[0], 150, 150 );

									if ( isset( $img[0] ) ) {
										?>

										<img alt="" class="img-circle" src="<?php echo esc_url( $img ); ?>">
										<?php

									}
									?>
									<h3><?php if ( isset( $item['name'] ) ) {
											echo esc_html( $item['name'] );
										} ?></h3>
									<p>

									<p><?php if ( isset( $item['desc'] ) ) {
											echo esc_html( $item['desc'] );
										} ?></p>


								</div>
							</div>
						<?php }
						?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php
	return ob_get_clean();
}


/*
 * Prices
 */

add_shortcode( 'felix_tariff_plan', 'felix_tariff_plan_func' );

/**
 * @param $atts
 * @param $content
 *
 * @return string
 */
function felix_tariff_plan_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'section_id'  => '',
			'title1'      => esc_html__( 'Choose your plan', 'felix' ),
			'title'       => esc_html__( 'Enhanced Security', 'felix' ),
			'description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'felix' ),
			'css'         => '',
			'class'       => '',
			'items'       => '',
			'separator'   => '',


		), $atts
	);

	extract( $atts );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );


	?>
	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="prices <?php echo esc_attr( $css_class ); ?> masked section"
		data-stellar-background-ratio="0.7">

		<div class="container rel-1">
			<!-- <div class="section-body"> -->
				<div class="row-price">
					<?php
					/*
					 * price tables
					 */


					$tems_v = vc_param_group_parse_atts( $atts['items'] );

					foreach ( $tems_v as $att ) {
						$att             = shortcode_atts(
							array(

								'currency'  => esc_html__( '', 'felix' ),
								'h'         => '',
								'price'     => '',
								'period'    => esc_html__( '', 'felix' ),
								'tb'        => esc_html__( 'Select plan', 'felix' ),
								'tbh'       => esc_html__( 'Get started', 'felix' ),
								'pr_url'    => esc_html__( '#request', 'felix' ),
								'css'       => '',
								'items'     => '',
								'class'     => '',
								'separator' => '',

							), $att
						);
						$css_class_n     = '';
						$tems_text_list_ = vc_param_group_parse_atts( $att['items'] );
						extract( $att );
						if ( $att['class'] == 'ADVANCED' ) {
							$css_class_n .= ' ' . 'leading wow flipInY ';
						} elseif ( $att['class'] == 'fadeInLeft' ) {
							$css_class_n .= ' ' . '';
						} elseif ( $att['class'] == 'fadeInRight' ) {
							$css_class_n .= ' ' . '';
						}


						$css_class_f     = '';
						$tems_text_list_ = vc_param_group_parse_atts( $att['items'] );
						extract( $att );
						if ( $att['class'] == 'ADVANCED' ) {
							$css_class_f .= ' ' . 'btn-b-primary';
						} elseif ( $att['class'] == 'fadeInLeft' ) {
							$css_class_f .= ' ' . 'btn-b-gray';
						} elseif ( $att['class'] == 'fadeInRight' ) {
							$css_class_f .= ' ' . 'btn-b-gray';
						}




						?>
						<div class="<?php echo esc_attr( $css_class_n ); ?> col-price ">
							<div class="price-box">
								<div class="price-body">
									<div class="price-inner">
										<header class="price-header">
											<h4 class="price-title"><?php echo esc_html( $h ); ?></h4>


											<div class="price">
												<strong
													class="price-currency"><?php echo esc_html( $currency ); ?></strong>
												<strong class="price-amount"><?php echo esc_html( $price ); ?></strong>
                                                <span
	                                                class="price-delimiter"><?php if ( isset( $separator ) ) {
		                                                echo esc_html( $separator );
	                                                } ?></span><strong
													class="price-period"><?php echo esc_html( $period ); ?></strong>
											</div>
										</header>
										<div class="price-features">
											<?php if ( $tems_text_list_ ): ?>
												<ul>
													<?php
													foreach ( $tems_text_list_ as $item ) {
														?>
														<li><?php if ( isset( $item['title'] ) ) {
																echo wp_kses_post( $item['title'] );
															} ?></li> <?php
													}
													?>


												</ul>
											<?php endif; ?>
										</div>
										<div class="price-footer">
											<a href="<?php echo esc_attr( $pr_url ); ?>" class="btn <?php echo esc_attr( $css_class_f ); ?> btn-block" data-toggle="modal"><?php echo esc_html( $tbh ); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>


				</div>
			<!-- </div> -->
		</div>

	</section>
	<?php
	return ob_get_clean();
}


/**
 *  felix_subscribe
 */
add_shortcode( 'felix_subscribe_form', 'felix_subscribe_form_func' );
function felix_subscribe_form_func( $atts, $content ) {
	ob_start();
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'placeholder' => esc_html__( 'Email address', 'felix' ),
			't'           => esc_html__( 'Subscribe', 'felix' ),
			'css'         => '',
			'section_id'  => '',
			'title'       => esc_html__( 'Subscribe', 'felix' ),
			'desc'        => esc_html__( 'Lorem ipsum dolor sit amet, consectetur', 'felix' ),

		), $atts
	);

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );


	?>
	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="text-center section <?php echo esc_attr( $css_class ); ?> ">
		<div class="container">
	        <div class="row">
	            <div class="col-md-8 col-md-offset-2">
	            	<h2 class="section-title"><?php echo esc_html( $atts['title'] ); ?></h2>
	            	<p class="lead-text"><?php echo esc_html( $atts['desc'] ); ?></p>
	            </div>
	        </div>
	          <div class="top-space-sm">
	            <div class="row">
	              <div class="col-md-6 col-md-offset-3">
	                <form id="mc-form" class="felix_subscribe" novalidate="true">
	                  <div class="input-group">
	                    <input required id="mc-email" type="email" class="form-control" placeholder="<?php echo esc_attr( $atts['placeholder'] ) ?>" name="EMAIL">
	                    <span class="input-group-btn">
	                      <button class="btn" type="submit"><?php echo esc_html( $atts['t'] ); ?></button>
	                    </span>
	                  </div>
	                  <p><label for="mc-email" id="mc-notification"></label></p>
	                </form>
	              </div>
	            </div>
	          </div>
		</div>
	</section> <?php
	return ob_get_clean();
}


/**
 * Contact
 */

add_shortcode( 'felix_address_item', 'felix_address_item_func' );

/**
 * @param $atts
 * @param $content
 *
 * @return string
 */
function felix_address_item_func( $atts, $content ) {

	ob_start();

	if ( isset( $atts['images']{0} ) ) {
		$img_arr = wp_get_attachment_image_src( $atts['images'], 'full' );
		if ( isset( $img_arr[0] ) ) {
			$atts['images'] = $img_arr[0];
		}

	}
	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(

			'text'           => '',
			'section_id'     => '',
			'title'          => esc_html__( 'Contact us', 'felix' ),
			'desc'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'felix' ),
			'images'         => '',
			'lat'            => '45.200',
			'lng'            => '-72.4310',
			'st2'            => '',
			'zoom'           => 12,
			'url_t'          => '',
			'url'            => '',
			'email'          => '',
			'phone'          => '',
			'items'          => '',
			'icon'           => '',
			't'              => '',
			'css'            => '',
			'map_items'      => '',
			'map_visibility' => '1',

		), $atts
	);


	extract( $atts );
	$items_v   = vc_param_group_parse_atts( $atts['items'] );
	$map_items = vc_param_group_parse_atts( $atts['map_items'] );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );


	?>

	<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
		class="contacts  <?php echo esc_attr( $css_class ); ?> text-centern">
		<div class="map-layer">
			<?php
			if ( $map_visibility != '2' ) { ?>

				<div id="map" data-lat="<?php echo esc_attr( $lat ); ?>"
				     data-lng="<?php echo esc_attr( $lng ); ?>"
				     class="map">
					<?php if ( $images != '' ) {
						?>
						<div class="map-title">
							<h3><img alt="" width="140" src="<?php echo esc_attr( $images ); ?>"></h3>
						</div>
						<?php
					} ?>
					<?php if ( $map_items ) {
						foreach ( $map_items as $item ) {
							?>
							<div class="map-address-row">
								<?php if ( isset( $item['icon'] ) && $item['icon'] != '' ): ?>
									<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
								<?php endif; ?>
								<?php if ( isset( $item['content'] ) && $item['content'] != '' ): ?>

									<span class="text"><?php echo wp_kses_post( $item['content'] ); ?></span>

								<?php endif; ?>
							</div>
							<?php
						}

					} ?>

					<?php if ( $url && $url_t ) { ?>
						<p class="gmap-open">
							<a
								href="<?php echo esc_url( $url ); ?>"
								target="_blank"><?php echo wp_kses_post( $url_t ); ?></a></p>

					<?php } ?>
				</div>
			<?php $map_style = get_theme_mod( 'felix_map_stylemap_json', '[]' );

			if ( strlen( str_replace( ' ', '', $map_style ) ) < 5 ) {
				$map_style = '[]';
			}
			?>
				<script>


					function initialize() {

						var contentString = '<div class="map-info">'
							+ jQuery("#map").html() +
							'</div>';


						var mapOptions = {
							zoom: <?php echo (int) $zoom; ?>, // Change zoom here
							center: mapLocation,
							scrollwheel: false,

							styles: <?php echo wp_kses_post( $map_style ); ?>

						};

						map = new google.maps.Map(document.getElementById('map'),
							mapOptions);
						var infowindow = new google.maps.InfoWindow({
							content: contentString,
						});


						marker = new google.maps.Marker({
							map: map,
							draggable: true,
							title: 'felix', //change title here
							animation: google.maps.Animation.DROP,
							position: mapLocation
						});

						google.maps.event.addListener(marker, 'click', function () {
							infowindow.open(map, marker);
						});


						infowindow.open(map, marker);

					}


				</script>
			<?php } ?>
		</div>
	</section>
	<!--oldsspdr-->

	<?php

	return ob_get_clean();
}


/**********End New version**************/


add_shortcode( 'felix_contact_form', 'felix_contact_form_func' );

/**
 * @param $atts
 * @param $content
 *
 * @return string
 */
function felix_contact_form_func( $atts, $content ) {

	ob_start();

	$content = ! empty( $content ) ? $content : "";
	$atts    = shortcode_atts(
		array(
			'items'   => '',
			'name'    => esc_html__( 'Name *', 'felix' ),
			'Email'   => esc_html__( 'Email *', 'felix' ),
			'sm'      => esc_html__( 'Send request', 'felix' ),
			'message' => esc_html__( 'Message *', 'felix' ),
			'smh'     => esc_html__( 'Submit', 'felix' ),
			'css'     => '',

		), $atts
	);

	extract( $atts );
	?>
		<form class="form-request js-ajax-form">
			<div class="row-fields row">
				<div class="form-group col-field">
					<input type="text" class="form-control" name="name" required
					       placeholder="<?php echo esc_attr( $name ); ?>">
				</div>
				<div class="form-group col-field">
					<input type="email" class="form-control" name="email" required
					       placeholder="<?php echo esc_attr( $Email ); ?>">
				</div>
				<div class="form-group col-field">
                    <textarea rows="3" name="message"
                              placeholder="<?php echo esc_attr( $message ); ?>"></textarea>
				</div>
				<div class="col-sm-12">
					<button type="submit" class="btn" data-text-hover="Submit"><?php echo esc_html( $sm ); ?></button>
				</div>

			</div>
		</form>
	<?php
	return ob_get_clean();
}

/*
 * addres
 */


add_shortcode( 'felix-i', 'felix_i_func' );
function felix_i_func( $atts, $content ) {
	echo '<i class="text-primary">' . do_shortcode( $content ) . '</i>';
}


add_shortcode( 'felix_social_links', 'felix_social_links_function' );

function felix_social_links_function( $atts ) {
	$atts = shortcode_atts(
		array(
			'url'   => '#',
			'class' => '',
		), $atts
	);
	if ( ! preg_match( '#icon#', $atts['class'] ) ) {
		$atts['class'] .= ' icon';
	}
	ob_start();
	?>
	<a href="<?php echo esc_url( $atts['url'] ); ?>" class="fa-2x  <?php echo esc_html( $atts['class'] ) ?>">
	</a>


	<?php
	return ob_get_clean();
}

if ( function_exists( 'vc_map' ) ) {

	class WPBakeryShortCode_felix_item_menu extends WPBakeryShortCodesContainer {


		protected function content( $atts, $content = null ) {

			ob_start();

			if ( isset( $atts['images']{0} ) ) {
				$img_arr = wp_get_attachment_image_src( $atts['images'], 'full' );
				if ( isset( $img_arr[0] ) ) {
					$atts['images'] = $img_arr[0];
				}

			}
			$content = ! empty( $content ) ? $content : "";
			$atts    = shortcode_atts(
				array(
					'section_id' => '',
					'css'        => '',

				), $atts
			);


			extract( $atts );

			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), '', $atts );


			?>

			<section <?php if ( isset( $section_id{0} ) ) { ?> id="<?php echo esc_attr( $section_id ); ?>"  <?php } ?>
				class="  <?php echo esc_attr( $css_class ); ?>  ">
				<?php echo do_shortcode( $content ); ?>

			</section>
			<!--oldsspdr-->
			<?php
			return ob_get_clean();

		}


	}
}
