<?php

add_action('wp_head','felix_css_generator');
function felix_css_generator()
{
    if ( ! current_user_can( "administrator" ) || isset( $wp_customize ) ) {
        return;

    }
    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once(ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    $felix_upload_dir = wp_upload_dir();
    $felix_filename = trailingslashit($felix_upload_dir['basedir']) . '/style.css';

    $con =felix_css_generator_custumize();

    /*******************************************************************/
    $F = $wp_filesystem->put_contents($felix_filename, felix_minify_css($con), FS_CHMOD_FILE);

}

function felix_css_generator_custumize()
{
    if (!current_user_can("administrator") || isset($wp_customize)) {
        return;
        exit();
    }


    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once(ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    $felix_upload_dir = wp_upload_dir();
    $felix_filename = trailingslashit($felix_upload_dir['basedir']) . '/style.css';
    /*****************************************************************/
    $con = $wp_filesystem->get_contents(get_template_directory() . "/css/style.css");
    $con = felix_color_hack($con);
    preg_match_all("/#([A-z0-9]{6,6}?)/", $con, $arr);
    $colors = $arr[1];
    $colors = array_unique($colors);
    foreach ($colors as $k => $v) {
        $tmp_settingname = 'colors_m_' . strtoupper($v);
        $color = get_theme_mod($tmp_settingname);
        if ($color) {
            $v = esc_attr($v);
            $color = esc_attr($color);

            $con = str_replace("#" . $v, $color, $con);
            $con = str_replace("#" . strtolower($v), $color, $con);

            $con = str_replace('../', get_template_directory_uri() . "/", $con);
        }
    }
    $con = preg_replace('#\@import url(.*?);#','',$con);
    $con = preg_replace('#background:.*?url.*?;#','',$con);

    return felix_minify_css($con);


}


function felix_replace_callback($matches) {
    return 'calc(' . preg_replace('#\s+#', "\x1A", $matches[1]) . ')';
}

function felix_minify_css($input) {
    if(trim($input) === "") return $input;
    // Force white-space(s) in `calc()`
    if(strpos($input, 'calc(') !== false) {
        $input = preg_replace_callback('#(?<=[\s:])calc\(\s*(.*?)\s*\)#',felix_replace_callback(), $input);
    }
    return preg_replace(
        array(
            // Remove comment(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
            // Remove unused white-space(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
            // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
            '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
            // Replace `:0 0 0 0` with `:0`
            '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
            // Replace `background-position:0` with `background-position:0 0`
            '#(background-position):0(?=[;\}])#si',
            // Replace `0.6` with `.6`, but only when preceded by a white-space or `=`, `:`, `,`, `(`, `-`
            '#(?<=[\s=:,\(\-]|&\#32;)0+\.(\d+)#s',
            // Minify string value
            '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][-\w]*?)\2(?=[\s\{\}\];,])#si',
            '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
            // Minify HEX color code
            '#(?<=[\s=:,\(]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
            // Replace `(border|outline):none` with `(border|outline):0`
            '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
            // Remove empty selector(s)
            '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s',
            '#\x1A#'
        ),
        array(
            '$1',
            '$1$2$3$4$5$6$7',
            '$1',
            ':0',
            '$1:0 0',
            '.$1',
            '$1$3',
            '$1$2$4$5',
            '$1$2$3',
            '$1:0',
            '$1$2',
            ' '
        ),
        $input);
}
