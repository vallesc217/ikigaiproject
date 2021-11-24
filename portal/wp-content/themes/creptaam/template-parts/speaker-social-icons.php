<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<?php if (function_exists('rwmb_meta')): ?>
    <ul class="speaker-social-link transition list-inline">
        <?php
        $facebook_link = rwmb_meta('creptaam_facebook_link');
        if ($facebook_link) : ?>
            <li class="facebook">
                <a href="<?php echo esc_url($facebook_link); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            </li>
        <?php endif; 

        $twitter_link = rwmb_meta('creptaam_twitter_link');
        if ($twitter_link) : ?>
            <li class="twitter">
                <a href="<?php echo esc_url($twitter_link); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            </li>
        <?php endif; 

        $google_plus_link = rwmb_meta('creptaam_google_plus_link');
        if ($google_plus_link) : ?>
            <li class="google-plus">
                <a href="<?php echo esc_url($google_plus_link); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
            </li>
        <?php endif; 

        $linkedin_link = rwmb_meta('creptaam_linkedin_link');

        if ($linkedin_link) : ?>
            <li class="linkedin">
                <a href="<?php echo esc_url($linkedin_link); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            </li>
        <?php endif; 

        $dribbble_link = rwmb_meta('creptaam_dribbble_link');

        if ($dribbble_link) : ?>
            <li class="dribbble">
                <a href="<?php echo esc_url($dribbble_link); ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
            </li>
        <?php endif; 

        $envelope_link = rwmb_meta('creptaam_envelope_link');

        if ($envelope_link) : ?>
            <li class="envelope">
                <a href="<?php echo esc_url($envelope_link); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>