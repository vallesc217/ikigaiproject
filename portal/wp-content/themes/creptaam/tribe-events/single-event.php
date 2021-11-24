<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div class="row">
	<div class="col-md-9 col-sm-8">
		<div id="tribe-events-content" class="tribe-events-single">
			<!-- Notices -->
			<?php tribe_the_notices() ?>

			<!-- Event header -->
			<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
				<!-- Navigation -->
				<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'creptaam' ), $events_label_singular ); ?></h3>
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
				</ul>
				<!-- .tribe-events-sub-nav -->
			</div>
			<!-- #tribe-events-header -->

			<?php while ( have_posts() ) :  the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- Event featured image, but exclude link -->
					<?php echo tribe_event_featured_image( $event_id, 'creptaam-event-thumbnail-large', false ); ?>
					
					<div class="creptaam-events-header">
						<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>

						<div class="tribe-events-schedule tribe-clearfix">
							<ul class="list-inline">
								<?php echo tribe_events_event_schedule_details( $event_id, '<li><i class="fa fa-clock-o"></i> ', '</li>' ); ?>
								<?php if ( tribe_get_cost() ) : ?>
									<li class="tribe-events-cost"><i class="fa fa-money"></i> <?php echo tribe_get_cost( null, true ) ?></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					
					<!-- Event content -->
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<div class="tribe-events-single-event-description tribe-events-content">
						<?php the_content(); ?>
					</div>
					<!-- .tribe-events-single-event-description -->
					<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

					
				</div> <!-- #post-x -->
				<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
			<?php endwhile; ?>

			<!-- Event footer -->
			<div id="tribe-events-footer">
				<!-- Navigation -->
				<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'creptaam' ), $events_label_singular ); ?></h3>
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> Previous' ) ?></li>
					<li class="tribe-events-back">
						<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf(esc_html_x( 'All %s', '%s Events plural label', 'creptaam' ), $events_label_plural ); ?></a>
					</li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( 'Next <span>&raquo;</span>' ) ?></li>
				</ul> <!-- .tribe-events-sub-nav -->
			</div> <!-- #tribe-events-footer -->
		</div> <!-- #tribe-events-content -->
	</div>
	<div class="col-md-3 col-sm-4">
		<!-- Event meta -->
		<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
		<?php tribe_get_template_part( 'modules/meta' ); ?>
		<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
	</div>
</div>

