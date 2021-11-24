<?php

/**
 * Class felix
 */
class felix_class
{
    public function __construct()
    {
        // Include required files
        $this->felix_includes();
        /**
         * Hooks
         */
        add_action('after_setup_theme', array($this, 'felix_crucial_setup'));

        // widgets
        add_action('widgets_init', array($this, 'felix_arphabet_widgets_init'));
        add_action('current_screen', array($this, 'felix_my_theme_add_editor_styles'));
        //filters
        add_filter('body_class', array($this, 'felix_add_body_class'));
        //theme support
        $this->felix_support_setting();

    }

    /**
     * felix support setting
     */
    function felix_support_setting()
    {
        add_theme_support('custom-background');
        add_theme_support("title-tag");
        add_theme_support('automatic-feed-links');
        add_theme_support("custom-header", array());
        add_theme_support('post-thumbnails');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('title-tag');
        set_post_thumbnail_size(849, 450, true);
        add_image_size("felix_post", 849, 450, true);
        register_nav_menus(
            array(
                'felix_topmenu' => esc_html__('Header menu', 'felix'),

            ));

        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));
        add_theme_support('post-formats', array(
            'video',
        ));


    }

    /**
     * require files and function
     */
    function felix_includes()
    {
        //# Part 1. Includes

        require get_template_directory() . '/assets/customizer.php';
        require get_template_directory() . '/assets/style_scripts.php';
        require get_template_directory() . '/assets/tgm.php';
        require get_template_directory() . '/assets/ajax_comment.php';

        /**OT*/
        require get_template_directory() . '/assets/ot_demo_function.php';



    }

    /************************************************************
     *                           Hooks Action
     ************************************************************/
    function felix_crucial_setup()
    {
        load_theme_textdomain('felix', get_template_directory() . '/languages');

    }


    /**
     *
     */
    function felix_arphabet_widgets_init()
    {
        register_sidebar(array(
            'name' => esc_html__('sidebar', 'felix'),
            'id' => 'felix_sidebar',
            'before_widget' => '<div id="%1$s" class="widget sidebar_widget  %2$s">',
            'after_widget' => '</div>',
            'description' => esc_html__('Blog sidebar', 'felix'),
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

    }




    /**
     * add custom body class
     * @param string $classes
     * @return array
     */
    function felix_add_body_class($classes)
    {

        global $post;
        if (isset($post->ID)) {
            if ((
                    is_archive()
                    || is_single()
                    || is_page())
                &&
                get_page_template_slug($post->ID) != 'template-fullwidth.php'
            )
                $classes[] = " felix_blog";

        }
        if(is_admin_bar_showing()){
	        $classes[] = ' admin_bar_showing ';
        }

        return sanitize_html_class($classes);
    }
    /**
     *
     * /************************************************************
     *                          Metods
     ************************************************************/


    /**
     * @param $maxchar
     */
    function felix_truncate_str($maxchar)
    { //Specifies the number of characters
        $out = get_the_excerpt();
        $out = iconv_substr($out, 0, $maxchar, 'utf-8');
        $out = preg_replace('@(.*)\s[^\s]*$@s', '\\1 ', $out);
        echo wp_kses_post($out);
    }

    /**
     * @return string
     */
    function felix_container_class()
    {
        $mod = get_theme_mod("site_Identity_layout", 's2');
        if ($mod == "s2")
            return "container-fluid container-fluid_pad_off";
        return "container";
    }

    function felix_my_theme_add_editor_styles()
    {
        add_editor_style('editor_styles.css');
    }
    /****************************************************
     *                  Helper methods
     * **************************************************
     */


    /**
     * Prepares correct the url to google font
     * @param $fonts_param
     * @return string url google fonts
     */
    function felix_google_fonts_url($fonts_param)
    {
        $font_url = '';
        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== esc_html_x('on', 'Google font: on or off', 'felix')) {
            $font_url = add_query_arg('family', urlencode($fonts_param), "//fonts.googleapis.com/css");
        }
        $font_url = str_replace('%2B', '+', $font_url);
        return $font_url;
    }


    /**
     * @param null $theid
     * @param int $widht
     * @param int $height
     * @param bool|false $big_src if is true the get full img
     * @param bool|true $default if there is no plug pictures
     * @param bool|false $return
     * @return string url new img
     */
    function felix_get_post_thumbnail($theid = null, $widht = 848, $height = 450, $big_src = false, $default = true, $return = false)
    {

        if ($theid == null) {
            $theid = get_the_ID();
        }
        $thumbnail = get_the_post_thumbnail($theid, 'full');

        preg_match_all('#src="(.*?)"#si', $thumbnail, $thumb_url);

        $thumb = "";


        if (isset($thumb_url[1][0])) {
            $thumb = esc_url($thumb_url[1][0]);
        } elseif ($default) {
            $thumb = '';
        }
        if ($big_src) {
            if ($return) {
                return esc_url($thumb);
            } else {
                echo esc_url($thumb);
            }

        } else {
            if (function_exists('felix_resize_image')) {

                 $thumb_arr = felix_resize_image(get_post_thumbnail_id($theid), $widht, $height, true);
                $thumb = $thumb_arr['url'];

            }
            if ($return) {
                return esc_url(($thumb));
            } else {
                echo esc_url(($thumb));
            }

        }

    }
    /**
     * method return new size img
     * @param int $widht
     * @param int $height
     * @return string
     */
    function felix_trim_img_by_url($thumb, $widht = 848, $height = 400)
    {
        return esc_url(($thumb));

    }
    /**
     * @param string $before
     * @param string $after
     * @param bool|true $echo
     * @param array $args
     * @param null $wp_query
     * @return int|string pagination in categorias
     */
    function felix_pagenavi($max_page = false, $before = '', $after = '', $echo = true, $args = array(), $wp_query = null)
    {
        if (!$wp_query)
            global $wp_query;

        // the default settings
        $default_args = array(
            'text_num_page' => '', // Text before pagination. {current} - current; {last} - last (pr. 'Page {current} of {last}' get 'Page 4 of 60 ")
            'num_pages' => 10, // how many links to display
            'step_link' => 10, // Links increments (value - the number, the step size (at. 1,2,3 ... 10,20,30). Put 0 if such references are not needed.
            'dotright_text' => '', // intermediate text "to".
            'dotright_text2' => '', //intermediate text "after."
            'back_text' => '<i class="fa fa-angle-double-left"></i> ' . esc_html__('Previous', 'felix'), // text "go to the previous page." Put 0 if this reference is not needed
            'next_text' => esc_html__('Next', 'felix') . ' <i class="fa fa-angle-double-right"></i>', // text "go to the next page." Put 0 if this reference is not needed.
            'first_page_text' => 0, // text "to the first page." Put 0 if instead of text you need to show a page number.
            'last_page_text' => 0, // text "to the last page." Put 0 if instead of text you need to show a page number.
        );

        $default_args = apply_filters('felix_pagenavi_args', $default_args); //to be able to establish their default values

        $args = array_merge($default_args, $args);

        extract($args);

        $posts_per_page = (int)$wp_query->query_vars['posts_per_page'];
        $paged = (int)$wp_query->query_vars['paged'];
        if ($max_page == false) {
            $max_page = $wp_query->max_num_pages;
        }

        //check the need for navigation
        if ($max_page <= 1)
            return false;

        if (empty($paged) || $paged == 0)
            $paged = 1;

        $pages_to_show = intval($num_pages);
        $pages_to_show_minus_1 = $pages_to_show - 1;

        $half_page_start = floor($pages_to_show_minus_1 / 2); // how many links to the current page
        $half_page_end = ceil($pages_to_show_minus_1 / 2); // how many links after current page

        $start_page = $paged - $half_page_start; //first page
        $end_page = $paged + $half_page_end; // the last page (conditionally)

        if ($start_page <= 0)
            $start_page = 1;
        if (($end_page - $start_page) != $pages_to_show_minus_1)
            $end_page = $start_page + $pages_to_show_minus_1;
        if ($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = (int)$max_page;
        }

        if ($start_page <= 0)
            $start_page = 1;

        // display navigation
        $out = '';

        // Create a base to cause get_pagenum_link once
        $link_base = str_replace(99999999, '___', get_pagenum_link(99999999));
        $first_url = get_pagenum_link(1);
        if (false === strpos($first_url, '?'))
            $first_url = user_trailingslashit($first_url);

        $out .= $before . "<ul class='pagination'>\n";

        if ($text_num_page) {
            $text_num_page = preg_replace('!{current}|{last}!', '%s', $text_num_page);
            $out .= sprintf("<li><span class='pages'>$text_num_page</span></li> ", $paged, $max_page);
        }


        // ago
        if ($back_text && $paged != 1) {
            $out .= '<li><a class="prev" href="' . (($paged - 1) == 1 ? $first_url : str_replace('___', ($paged - 1), $link_base)) . '">' . $back_text . '</a></li> ';
        } else {
            $out .= '<li class="disabled"><a>' . $back_text . '</a></li> ';

        }
        // to the begining
        if ($start_page >= 2 && $pages_to_show < $max_page) {
            $out .= '<li><a class="first" href="' . esc_url($first_url ). '">' .wp_kses_post($first_page_text ? $first_page_text : 1) . '</a></li> ';
            if ($dotright_text && $start_page != 2) $out .= '<li><span class="extend">' .wp_kses_post( $dotright_text) . '</span> </li>';
        }
        // pagination
        for ($i = $start_page; $i <= $end_page; $i++) {
            if ($i == $paged)
                $out .= '<li class="active">' . '<a href="#">' . $i . ' <span class="sr-only">(current)</span></a>' . '</li> ';
            elseif ($i == 1)
                $out .= '<li><a href="' .  esc_url($first_url) . '">1</li></a> ';
            else
                $out .= '<li><a href="' .  esc_url(str_replace('___', $i, $link_base) ). '">' . wp_kses_post($i) . '</a></li> ';
        }


        // links increments
        $dd = 0;
        if ($step_link && $end_page < $max_page) {
            for ($i = $end_page + 1; $i <= $max_page; $i++) {
                if ($i % $step_link == 0 && $i !== $num_pages) {
                    if (++$dd == 1)
                        $out .= '<span class="extend">' . $dotright_text2 . '</span> ';
                    $out .= '<li><a href="' . str_replace('___', $i, $link_base) . '">' . $i . '</a></li> ';
                }
            }
        }

        // In the end
        if ($end_page < $max_page) {
            if ($dotright_text && $end_page != ($max_page - 1))
                $out .= '<span class="extend">' . $dotright_text2 . '</span> ';
            $out .= '<li><a class="last" href="' . str_replace('___', $max_page, $link_base) . '">' . ($last_page_text ? $last_page_text : $max_page) . '</a></li> ';
        }
        // forward
        if ($next_text && $paged != $end_page) {
            $out .= '<li><a class="next" href="' . str_replace('___', ($paged + 1), $link_base) . '">' . $next_text . '</a></li> ';
        } else {
            $out .= '<li class="disabled"><a class="next" href="' . '">' . $next_text . '</a> </li>';

        }

        $out .= "</ul>" . $after . "\n";

        $out = apply_filters('kama_pagenavi', $out);

        if ($echo)
            return print $out;

        return $out;
    }

    /*get_avatar_url*/
    function felix_get_url_img_avatar($user_ID, $width = 128, $height = 128, $class = "", $return = false)
    {
        $params = array('width' => $width, 'height' => $height, 'crop' => true);
        preg_match("/src=(.*?) /i", get_avatar($user_ID, 120), $matches);
        $img_url = (trim($matches[1]));
        if ($return) {
            return esc_url($img_url);
        } else {
            echo '<img src="' . esc_url($img_url) . '" class="' . esc_attr($class) . '" height="' . esc_attr($height) . '" width="' . esc_attr($width) . '" alt="">';
        }
    }


}

$GLOBALS['felix_class'] = new felix_class();

/**
 * @return mixed
 */
function felix_get_global_class()
{
    global $felix_class;
    return $felix_class;
}

add_filter('get_the_excerpt', 'felix_exc', 90);
/**
 * carves out a brief description of shortcodes
 * @param $param
 * @return mixed
 */
function felix_exc($param)
{
    $param = preg_replace("/\[.*?\].*?\[\/.*?\]/", "", $param);
    $param = preg_replace("/<.*?>/", "", $param);
    return $param;
}

/**
 * @param bool $path
 * @param bool $is_page
 * @return mixed
 */
function felix_newBasename($path = false, $is_page = false)
{
    if ($path == false && $is_page = false) $path = get_page_template();
    if ($path == false && $is_page = true && is_page()) {
        $path = get_page_template();
    }
    $path = str_replace('\\', '/', $path);
    $path_array = explode('/', $path);
    return array_pop($path_array);
}

/*
 * coments pagination
 */
function felix_wp_comments_corenavi()
{
    $pages = '';
    $max = get_comment_pages_count();
    $page = get_query_var('cpage');
    if (!$page) $page = 1;
    $a['current'] = $page;
    $a['echo'] = false;
    $total = 0; //1 - display text "Page N of N", 0 - not to withdraw
    $a['mid_size'] = 3; // how many links to display on the left and right of the current
    $a['end_size'] = 1; // how many links to show the beginning and the end
    $a['prev_text'] = '&laquo;'; // link text "Previous"
    $a['next_text'] = '&raquo;'; // link text "Next page"
    if ($max > 1) echo '<div class="commentNavigation">';
    echo esc_attr($pages) . paginate_comments_links($a);
    if ($max > 1) echo '</div>';
}


/**
 * post pagination
 * @return string
 */
function felix_link_pages()
{
    /* ================ Settings ================ */
    $text_num_page = ''; // The text for the number of pages. {current} is replaced by the current, and {last} the last. Example: "Page {current} of {last} '= Page 4 of 60
    $num_pages = 10; // how many links to display
    $stepLink = 10; // after the navigation links to specific step (value = the number (a pitch) or '' if you do not need to show). Example: 1,2,3 ... 10,20,30
    $dotright_text = '...';
    $dotright_text2 = '...';
    $backtext = '&#171;';
    $nexttext = '&raquo;';
    $first_page_text = ''; //  text "to the first page" or put '', instead of the text if you need to show a page number.
    $last_page_text = ''; // text "to the last page 'or write' 'if, instead of the text you need to show a page number.
    /* ================ End Settings ================ */
    global $page, $numpages;
    $paged = (int)$page;
    $max_page = $numpages;
    if ($max_page <= 1) return false; //check the need for navigation
    if (empty($paged) || $paged == 0) $paged = 1;
    $pages_to_show = intval($num_pages);
    $pages_to_show_minus_1 = $pages_to_show - 1;
    $half_page_start = floor($pages_to_show_minus_1 / 2); //how many links to the current page
    $half_page_end = ceil($pages_to_show_minus_1 / 2); //how many links after current page
    $start_page = $paged - $half_page_start; //first page
    $end_page = $paged + $half_page_end; //last page (conditionally)
    if ($start_page <= 0) $start_page = 1;
    if (($end_page - $start_page) != $pages_to_show_minus_1) $end_page = $start_page + $pages_to_show_minus_1;
    if ($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = (int)$max_page;
    }
    if ($start_page <= 0) $start_page = 1;
    $out = '';
    $out .= "<div class='pagination'>\n";
    if ($text_num_page) {
        $text_num_page = preg_replace('!{current}|{last}!', '%s', $text_num_page);
        $out .= sprintf("<span class='pages'>$text_num_page</span>", $paged, $max_page);
    }
    if ($backtext && $paged != 1) $out .= _wp_link_page(($paged - 1)) . $backtext . '</a>';
    if ($start_page >= 2 && $pages_to_show < $max_page) {
        $out .= _wp_link_page(1) . ($first_page_text ? $first_page_text : 1) . '</a>';
        if ($dotright_text && $start_page != 2) $out .= '<span class="extend">' . $dotright_text . '</span>';
    }
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $paged) {
            $out .= '<span class="page-numbers current">' . $i . '</span>';
        } else {
            $out .= '<a href="' . esc_url( _wp_link_page($i)) . '">' . $i . '</a>';
        }
    }
    //Links increments
    if ($stepLink && $end_page < $max_page) {
        for ($i = $end_page + 1; $i <= $max_page; $i++) {
            if ($i % $stepLink == 0 && $i !== $num_pages) {
                if (++$dd == 1) $out .= '<span class="extend">' . $dotright_text2 . '</span>';
                $out .= '<a href="' . _wp_link_page($i) . '">' . $i . '</a>';
            }
        }
    }
    if ($end_page < $max_page) {
        if ($dotright_text && $end_page != ($max_page - 1)) $out .= '<span class="extend">' . $dotright_text2 . '</span>';
        $out .= _wp_link_page($max_page) . ($last_page_text ? $last_page_text : $max_page) . '</a>';
    }
    if ($nexttext && $paged != $end_page) $out .= _wp_link_page(($paged + 1)) . $nexttext . '</a>';
    $out .= "</div>";
    $out = str_replace('"<a href="', '"', $out);
    $out = str_replace('">">', '">', $out);
    return wp_kses_post($out);
}


if (!isset($content_width)) {
    $content_width = 1170;
}


if (!function_exists('felix_get_youtube_id')) {

    /**
     * @param $value
     * @return mixed|null
     */
    function felix_get_youtube_id($value)
    {
        $id = null;
        if (preg_match('/youtu.be\/(.*)/', $value, $math)) {
            $id = $math[1];
        } elseif (preg_match('/youtube.com.*?v=(.*)/', $value, $math)) {
            $id = $math[1];
        } else {
            $id = $value;
        }

        $id = str_replace("http://", '', $id);
        $id = str_replace("https://", '', $id);
        return $id;
    }
}


/**
 * @param $carry
 * @param $item
 * @return mixed|string
 */
function felix_video_patern($carry, $item)
{
    if (strpos($item, '#') === 0) {
        // Assuming '#...#i' regexps.
        $item = substr($item, 1, -2);
    } else {
        // Assuming glob patterns.
        $item = str_replace('*', '(.+)', $item);
    }
    return $carry ? $carry . ')|(' . $item : $item;
}


if (!function_exists('felix_theme_oembed_videos')) :

    function felix_theme_oembed_videos()
    {


        global $post;
        if ($post && $post->post_content) {
            global $shortcode_tags;
            // Make a copy of global shortcode tags - we'll temporarily overwrite it.
            $theme_shortcode_tags = $shortcode_tags;
            // The shortcodes we're interested in.
            $shortcode_tags = apply_filters('felix_vide_embed_tags', array(
                'video' => $theme_shortcode_tags['video'],
                'embed' => $theme_shortcode_tags['embed']
            ), $theme_shortcode_tags);
            // Get the absurd shortcode regexp.
            $video_regex = '#' . get_shortcode_regex() . '#i';
            // Restore global shortcode tags.
            $shortcode_tags = $theme_shortcode_tags;
            $pattern_array = array($video_regex);
            $pattern_array = array_merge($pattern_array, array_keys($providers = array(
                '#http://((m|www)\.)?youtube\.com/watch.*#i' => array('http://www.youtube.com/oembed', true),
                '#https://((m|www)\.)?youtube\.com/watch.*#i' => array('http://www.youtube.com/oembed?scheme=https', true),
                '#http://((m|www)\.)?youtube\.com/playlist.*#i' => array('http://www.youtube.com/oembed', true),
                '#https://((m|www)\.)?youtube\.com/playlist.*#i' => array('http://www.youtube.com/oembed?scheme=https', true),
                '#http://youtu\.be/.*#i' => array('http://www.youtube.com/oembed', true),
                '#https://youtu\.be/.*#i' => array('http://www.youtube.com/oembed?scheme=https', true),
                'http://blip.tv/*' => array('http://blip.tv/oembed/', false),
                '#https?://(.+\.)?vimeo\.com/.*#i' => array('http://vimeo.com/api/oembed.{format}', true),
                '#https?://(www\.)?dailymotion\.com/.*#i' => array('http://www.dailymotion.com/services/oembed', true),
                'http://dai.ly/*' => array('http://www.dailymotion.com/services/oembed', false),
                '#https?://(www\.)?flickr\.com/.*#i' => array('https://www.flickr.com/services/oembed/', true),
                '#https?://flic\.kr/.*#i' => array('https://www.flickr.com/services/oembed/', true),
                '#https?://(.+\.)?smugmug\.com/.*#i' => array('http://api.smugmug.com/services/oembed/', true),
                '#https?://(www\.)?hulu\.com/watch/.*#i' => array('http://www.hulu.com/api/oembed.{format}', true),
                'http://i*.photobucket.com/albums/*' => array('http://photobucket.com/oembed', false),
                'http://gi*.photobucket.com/groups/*' => array('http://photobucket.com/oembed', false),
                '#https?://(www\.)?scribd\.com/doc/.*#i' => array('http://www.scribd.com/services/oembed', true),
                '#https?://wordpress.tv/.*#i' => array('http://wordpress.tv/oembed/', true),
                '#https?://(.+\.)?polldaddy\.com/.*#i' => array('https://polldaddy.com/oembed/', true),
                '#https?://poll\.fm/.*#i' => array('https://polldaddy.com/oembed/', true),
                '#https?://(www\.)?funnyordie\.com/videos/.*#i' => array('http://www.funnyordie.com/oembed', true),
                '#https?://(www\.)?twitter\.com/.+?/status(es)?/.*#i' => array('https://api.twitter.com/1/statuses/oembed.{format}', true),
                '#https?://vine.co/v/.*#i' => array('https://vine.co/oembed.{format}', true),
                '#https?://(www\.)?soundcloud\.com/.*#i' => array('http://soundcloud.com/oembed', true),
                '#https?://(.+?\.)?slideshare\.net/.*#i' => array('https://www.slideshare.net/api/oembed/2', true),
                '#https?://instagr(\.am|am\.com)/p/.*#i' => array('https://api.instagram.com/oembed', true),
                '#https?://(www\.)?rdio\.com/.*#i' => array('http://www.rdio.com/api/oembed/', true),
                '#https?://rd\.io/x/.*#i' => array('http://www.rdio.com/api/oembed/', true),
                '#https?://(open|play)\.spotify\.com/.*#i' => array('https://embed.spotify.com/oembed/', true),
                '#https?://(.+\.)?imgur\.com/.*#i' => array('http://api.imgur.com/oembed', true),
                '#https?://(www\.)?meetu(\.ps|p\.com)/.*#i' => array('http://api.meetup.com/oembed', true),
                '#https?://(www\.)?issuu\.com/.+/docs/.+#i' => array('http://issuu.com/oembed_wp', true),
                '#https?://(www\.)?collegehumor\.com/video/.*#i' => array('http://www.collegehumor.com/oembed.{format}', true),
                '#https?://(www\.)?mixcloud\.com/.*#i' => array('http://www.mixcloud.com/oembed', true),
                '#https?://(www\.|embed\.)?ted\.com/talks/.*#i' => array('http://www.ted.com/talks/oembed.{format}', true),
                '#https?://(www\.)?(animoto|video214)\.com/play/.*#i' => array('http://animoto.com/oembeds/create', true),
                '#https?://(.+)\.tumblr\.com/post/.*#i' => array('https://www.tumblr.com/oembed/1.0', true),
                '#https?://(www\.)?kickstarter\.com/projects/.*#i' => array('https://www.kickstarter.com/services/oembed', true),
                '#https?://kck\.st/.*#i' => array('https://www.kickstarter.com/services/oembed', true),
                '#https?://cloudup\.com/.*#i' => array('https://cloudup.com/oembed', true),
            )));
            // Or all the patterns together.

            $pattern = '#(' . array_reduce($pattern_array, "felix_video_patern") . ')#is';
            // Simplistic parse of content line by line.
            $lines = explode("\n", $post->post_content);
            $i = 0;
            foreach ($lines as $line) {
                $line = trim($line);
                if (preg_match($pattern, $line, $matches)) {
                    if (strpos($matches[0], '[') === 0) {
                        $ret = do_shortcode($matches[0]);
                    } elseif (preg_match('#youtu#', $matches[0])) {
                        $ret = '<' . 'iframe' . ' src="https://www.youtube.com/embed/' . sanitize_text_field(felix_get_youtube_id($matches[0])) . '?feature=oembed" class="youtube_video"  allowfullscreen></iframe>';

                    } else {
                        $ret = wp_video_shortcode(array('src' => $matches[0]));
                    }
                    $ret = preg_replace('/width=".*?"/', '', $ret);
                    $ret = preg_replace('/height=".*?"/', '', $ret);
                    $ret = '<div class="embed-responsive embed-responsive-16by9">' . $ret;
                    $ret = $ret . '</div>';
                    print($ret);
                }
            }
        }
    }
endif;


if (!function_exists('felix_post_gallery_slide')) :


    /**
     * its diplay gallery in posts
     * @param bool $cut
     * @param int $width
     * @param int $height
     */
    function felix_post_gallery_slide($cut = false, $width = 848, $height = 566)
    {

        global $felix_class, $post;


        $gallery = get_post_gallery_images($post);

        // Make sure the post has a gallery in it

        ?>
        <div class="gallery-carousel carousel">
            <?php
            if (has_post_thumbnail()) {

                $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                $feature_src = wp_get_attachment_image_src($post_thumbnail_id, 'felix_post');

                ?>
                <div class="gallery-item">
                    <img alt="<?php the_title(); ?>"
                         src=<?php echo esc_url($feature_src[0]); ?>>
                </div>
                <?php

            }

            foreach ($gallery as $image_url) {

                ?>
                <div class="gallery-item">
                    <img alt="<?php the_title(); ?>" src=<?php echo esc_url(($image_url)); ?>>
                </div>
                <?php


            }
            ?>
        </div>
        <?php


    }
endif;




if (!function_exists('felix_limit_excerpt')) :
    function felix_limit_excerpt($limit, $content = null)
    {

        if (empty($content)) {
            $content = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', get_the_excerpt());
        }
        $out = $content;
        $out = preg_replace("#\<code\>.*?\<\/code\>#s", '', $out);
        $out = preg_replace("#<pre>.*?</pre>#im", '', $out);
        $out = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $out);
        $out = preg_replace("#\[.*?\]#", '', $out);
        $out = preg_replace("#\<.*?\>#", '', $out);

        $excerpt = explode(' ', $content, $limit + 1);
        if (count($excerpt) >= $limit) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt);

        } else {
            $excerpt = implode(" ", $excerpt);

        }
        $excerpt .= '...';
        $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

        $output = $excerpt;

        return $output;

    }
endif;


if (!function_exists('felix_words_limit')) :

    function felix_words_limit()
    {
        $limit = get_theme_mod('felix_blog_list_limit_word');

        if (empty($limit)) {
            return 50;
        }

        return $limit;
    }

endif;

if (!function_exists('felix_post_thumbnail')) :
    /**
     * Display an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * @since Rent It 1.0
     */
    function felix_post_thumbnail()
    {
        global $felix_class;

        ///$theid = null, $widht = 848, $height = 565, $big_src = false, $default = true, $return = false
        if ($felix_class->felix_get_post_thumbnail(get_the_ID(), 0, 0, false, true, true) == false || post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }
        if (strlen($felix_class->felix_get_post_thumbnail(get_the_ID(), 0, 0, 0, 0, 1)) < 5) return false;
        ?>

        <img class="img-responsive"
             src=" <?php echo esc_url($felix_class->felix_get_post_thumbnail(get_the_ID())); ?>"
             alt="<?php the_title(); ?>  ">

        <?php ?>

        <?php
    }
endif;



/***
 * modified image size
 * @return string
 */
function felix_resize_image($thumb_id, $width, $height, $crop)
{
    // Get the image source for the attachment, note the following:
    // $image_src[0] = the URL of the image
    // $image_src[1] = the width of the image
    // $image_src[2] = the height of the image
    $image_src = wp_get_attachment_image_src($thumb_id, 'full');

    // If either the width or height of the full size image is bigger than the target size, then we know we need to resize
    if ($image_src[1] > $width || $image_src[2] > $height) {
        $resized_image_path = '';
        $resized_image_url = '';

        $file_path = get_attached_file($thumb_id);

        // Get the file info and extension
        $file_info = pathinfo($file_path);
        $extension = '.' . $file_info['extension'];

        // The image path without the extension
        $no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];

        // Build the cropped image path and URL with the width and height as part of the name
        $cropped_image_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
        $cropped_image_url = str_replace(basename($image_src[0]), basename($cropped_image_path), $image_src[0]);

        // Check if resized cropped version already exists (for crop = true but will also work for crop = false if the sizes match)
        if (file_exists($cropped_image_path)) {
            return array('url' => esc_url($cropped_image_url), 'width' => esc_html($width), 'height' => esc_html($height));
        } else {
            $resized_image_path = $cropped_image_path;
            $resized_image_url = $cropped_image_url;
        }

        // If crop is false then check proportional image
        if ($crop == false) {
            // Calculate the size proportionally
            $proportional_size = wp_constrain_dimensions($image_src[1], $image_src[2], $width, $height);
            $proportional_image_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
            $proportional_image_url = str_replace(basename($image_src[0]), basename($proportional_image_path), $image_src[0]);

            // Check if resized proportional version already exists
            if (file_exists($proportional_image_path)) {
                return array('url' => esc_url($proportional_image_url), 'width' => esc_html($proportional_size[0]), 'height' => esc_html($proportional_size[1]));
            } else {
                $resized_image_path = $proportional_image_path;
                $resized_image_url = $proportional_image_url;
            }
        }

        // Getting this far means that neither the cropped resized image nor the proportional
        // resized image exists, so we use a WP_Image_Editor to do the resizing and save to disk


        $image_editor = wp_get_image_editor($file_path);

        if (!is_wp_error($image_editor)) {
            $resized = $image_editor->resize($width, $height, $crop);
            $new_image = $image_editor->save($resized_image_path);
        } else {
            $resized = NULL;
            $new_image = array('width' => 0, 'height' => 0);
        }

        return array('url' => esc_url($resized_image_url), 'width' => esc_html($new_image['width']), 'height' => esc_html($new_image['height']));
    }

    // Default output, no resizing
    return array('url' =>  esc_url($image_src[0]), 'width' => esc_html($image_src[1]), 'height' => esc_html($image_src[2]));
}



/**
 * gets the current price of the product taking into account sales
 * @param $product_id
 * @return mixed
 */
function felix_get_current_price_product($product_id)
{
    $sale_cost = get_post_meta($product_id, "_sale_cost", true);
    $base_price = get_post_meta($product_id, "_base_cost", true);
    if (isset($sale_cost{0})) {
        return $sale_cost;
    } elseif (isset($base_price{0})) {
        return $base_price;
    } else {
        return 0;
    }

}


/** Generate one page menu
 * add menu elements
 * @param $items
 * @param $args
 * @return string
 */
function felix_social_menu_item($items, $args)
{
    $frontpage_id = get_option('page_on_front');
    $post_ID = get_the_ID();
    $newitems = $items;
    $menu_left = '';
    $menu_right = '';

    if (get_option('felix_one_page_menu') == true && ($args->theme_location == 'felix_topmenu' || $args->theme_location == 'felix_topmenu_blog')) {

        if (!is_front_page() && get_option('felix_one_page_menu_' . $post_ID) == false) {
            $menu_left = get_option('felix_one_page_menu');
            $menu_left = str_replace('#', get_home_url('/') . '/#', $menu_left);

        } else {


            $menu_left = get_option('felix_one_page_menu_' . $post_ID);

        }
        if (is_front_page()) {
            $menu_left = get_option('felix_one_page_menu');
        }


    }
    
    if (get_option('felix_one_page_menu_right') == true && ($args->theme_location == 'felix_topmenu' || $args->theme_location == 'felix_topmenu_blog')) {


        if (!is_front_page() && get_option('felix_one_page_menu_right_' . $post_ID) == false) {
            $menu_right = get_option('felix_one_page_menu_right');;
            $menu_right = str_replace('#', get_home_url('/') . '/#', $menu_right);


        } else {


            $menu_right = get_option('felix_one_page_menu_right_' . $post_ID);

        }
        if (is_front_page()) {
            $menu_right = get_option('felix_one_page_menu_right');
        }


    }


    return  $menu_left . $items   . $menu_right;


}

add_filter('wp_nav_menu_items', 'felix_social_menu_item', 10, 2);


/*
 *  it display lis of post cat
 */
function felix_get_list_cats()
{
    global $post;
    $categories = get_the_category($post->ID);

    if (isset($categories[0]->term_id)) {


        ?>
        <li><span class="fa fa-server"></span>&ensp;

            <?php
            $c = count($categories);
            $i = 1;
            foreach ($categories as $category) {

                ?>

                <a rel="category tag" href="<?php echo esc_url(get_category_link($category->term_id)); ?> ">
                    <?php echo esc_html($category->name); ?></a>                <?php

                if ($c != $i) {
                    ?>                   ,
                    <?php
                }
                $i++;
            }
            ?>


        </li>
        <?php
    }

}


/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 *  *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function felix_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'felix_widget_tag_cloud_args' );
