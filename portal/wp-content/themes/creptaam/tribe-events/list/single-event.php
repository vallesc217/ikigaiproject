<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.6.3
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<div class="row">
	<div class="col-md-4">
		<!-- Event Image -->
		<?php echo tribe_event_featured_image( null, 'creptaam-event-thumbnail' ); ?>
	</div>

	<div class="col-md-8">
		<!-- Event Content -->
		<?php do_action( 'tribe_events_before_the_content' ); ?>
		<div class="tribe-events-list-event-description tribe-events-content description entry-summary">

			<!-- Event Title -->
			<?php do_action( 'tribe_events_before_the_event_title' ) ?>
			<h2 class="tribe-events-list-event-title">
				<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
					<?php the_title() ?>
				</a>
			</h2>
			<?php do_action( 'tribe_events_after_the_event_title' ) ?>

			<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
			<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Read More', 'creptaam' ) ?></a>

			<!-- Event Meta -->
			<?php do_action( 'tribe_events_before_the_meta' ) ?>
			<div class="tribe-events-event-meta">
				<div class="author <?php echo esc_attr( $has_venue_address ); ?>">
					<?php if ( $venue_details ) : ?>
						<!-- Venue Display Info -->
						<div class="tribe-events-venue-details">
							<i class="fa fa-map-marker"></i>
							<div class="creptaam-vanue-wrapper">
								<?php $address_delimiter = empty( $venue_address ) ? ' ' : ', ';

									// These details are already escaped in various ways earlier in the process.
									echo implode( $address_delimiter, $venue_details );

								?>
							</div>
						</div> <!-- .tribe-events-venue-details -->
					<?php endif; ?>

					<!-- Schedule & Recurrence Details -->
					<div class="tribe-event-schedule-details">
						<i class="fa fa-calendar"></i>
						<div class="creptaam-time-wrapper">
							<span class="creptaam-time-label"><?php esc_html_e('Event date:', 'creptaam'); ?></span>
							<?php echo tribe_events_event_schedule_details() ?>
						</div>
					</div>

					<!-- Event Cost -->
					<?php if ( tribe_get_cost() ) : ?>
						<div class="tribe-events-event-cost">
							<i class="fa fa-money"></i>
							<span class="ticket-cost"><span><?php esc_html_e('Event Price:', 'creptaam'); ?> </span><?php echo tribe_get_cost( null, true ); ?></span>
							<?php
							/**
							 * Runs after cost is displayed in list style views
							 *
							 * @since 4.5
							 */
							do_action( 'tribe_events_inside_cost' )
							?>
						</div>
					<?php endif; ?>

				</div>
			</div><!-- .tribe-events-event-meta -->

			<?php do_action( 'tribe_events_after_the_meta' ) ?>

		</div><!-- .tribe-events-list-event-description -->

		<?php do_action( 'tribe_events_after_the_content' ); ?>

	</div>
</div> <!-- .row -->