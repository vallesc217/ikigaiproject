<!-- SIDEBAR -->
<div class="secondary col-lg-3">
	<?php
	if ( is_active_sidebar( dynamic_sidebar( 'felix_sidebar' ) ) ) {
		dynamic_sidebar( 'felix_sidebar' );
	}

	?>
</div>
<!-- /SIDEBAR -->