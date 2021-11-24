<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<div class="top-search">
    <div class="container">
        <form role="search" method="get" class="search-form header-search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <input type="text" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search">
                <input type="hidden" value="post" name="post_type" />
                <button type="submit" class="input-group-addon"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>