<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
$header_bg = creptaam_option('header-top-bg');
if($header_bg){
    $header_bg = "background-color: $header_bg";
}
?>

<?php if (function_exists('creptaam_header_short_price')): ?>
	<div class="header-top" style="<?php echo esc_attr($header_bg); ?>">
		<div class="container">
    		<?php creptaam_header_short_price(creptaam_option('market-coin-limit2'), true); ?>
		</div>
	</div> <!-- .header-top -->
<?php endif;