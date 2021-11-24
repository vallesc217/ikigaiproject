<?php

/**
 * Template Name: Full width page with container
 * Preview:
 *
 */

get_header();
the_post();

$shotrcodes = get_the_content();
preg_match_all('#\[felix_header.*?\]#',$shotrcodes,$math);
preg_match_all('#\[felix_video_header.*?\].*?\[\/felix_video_header\]#',$shotrcodes,$math_v);




if(isset($math[0][0]))
    echo do_shortcode(apply_filters( 'the_content', $math[0][0]));

if(isset($math_v[0][0]))
    echo do_shortcode(apply_filters( 'the_content', $math_v[0][0]));

if(isset($math_slider[0][0]))
    echo do_shortcode(apply_filters( 'the_content', $math_slider[0][0]));



?>
<div>
    <div class="content">
<?php
$content = $shotrcodes;

if(isset($math[0][0]))
    $content = apply_filters( 'the_content', str_replace($math[0][0],'',$shotrcodes) );

if(isset($math_v[0][0]))
    $content = apply_filters( 'the_content', str_replace($math_v[0][0],'',$shotrcodes) );

if(isset($math_slider[0][0]))
    $content = apply_filters( 'the_content', str_replace($math_slider[0][0],'',$shotrcodes) );

echo do_shortcode(str_replace( ']]>', ']]&gt;', $content ));

?>
        </div>
        <?php
get_footer();