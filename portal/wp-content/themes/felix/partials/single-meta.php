<div class="post-controls clearfix">
    <div class="post-share">
    <ul class="list-inline">
        <li>
            <?php  esc_html_e('Share:','felix'); ?>

        </li>
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>">
                <i class="fa fa-facebook"></i></a>
        </li>

        <li>
            <a href="https://twitter.com/home?status=<?php echo esc_url(get_permalink()); ?>">
                <i class="fa fa-twitter"></i></a>
        </li>

        <li>
            <a href="https://plus.google.com/share?url=<?php echo esc_url(get_permalink()); ?>"><i
                    class="fa fa-google-plus"></i></a>
        </li>

      

    </ul>
    </div>

    <div class="entry-comment">
        <i class="fa fa-comment">
            <?php
            $number = get_comments_number() > 0 ? get_comments_number() : 0;
            echo esc_html($number) . ' ' ;
            ?>
        </i>
    </div>

</div>