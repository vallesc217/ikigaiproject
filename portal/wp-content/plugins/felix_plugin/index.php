<?php
/**
 * Plugin Name: felix
 * Plugin URI:
 * Description: extends the capabilities of theme felix
 * Version: 1.0.1
 * Author: VK
 * Author URI:
 *
 * Text Domain: felix
 * Domain Path: /languages/
 *
 *
 */



add_action( 'vc_before_init', 'felix_name_integrateWithVC' );

function felix_name_integrateWithVC(){
	require plugin_dir_path(__FILE__) . '/shortcodes/shortcodes.php';
	require plugin_dir_path(__FILE__) . '/VC_custum-data.php';
}



require plugin_dir_path(__FILE__) . '/import_demo.php';
require plugin_dir_path(__FILE__) . '/css_generator.php';
require plugin_dir_path(__FILE__) . '/function.php';
require plugin_dir_path(__FILE__) . '/sendmail.php';
require plugin_dir_path(__FILE__) . '/mailchamp.php';
require plugin_dir_path(__FILE__) . '/categoris-image.php';
require plugin_dir_path(__FILE__) . '/metabox.php';
require plugin_dir_path(__FILE__) . '/custom-style.php';
require plugin_dir_path(__FILE__) . '/widgets.php';



/**
 *Create the desired tables for theme
 */




/**
 * image meta box
 */

add_action('add_meta_boxes', 'felix_image_add_metabox');
function felix_image_add_metabox()
{

    add_meta_box('feliximagediv',  esc_html__( 'felix Image', 'felix'),
        'felix_image_metabox', 'post', 'side', 'low');

}

function felix_image_metabox($post)
{
    global $content_width, $_wp_additional_image_sizes;
    $image_id = get_post_meta($post->ID, '_felix_image_id', true);
    $old_content_width = $content_width;
    $content_width = 254;
    if ($image_id && get_post($image_id)) {

        if (!isset($_wp_additional_image_sizes['post-thumbnail'])) {
            echo wp_kses_post( wp_get_attachment_image($image_id, array($content_width, $content_width)));
        } else {
            echo wp_kses_post(wp_get_attachment_image($image_id, 'post-thumbnail'));
            $thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
        }
        if (!empty($thumbnail_html)) {

            ?>
            <p class="hide-if-no-js">
                <a href="javascript:;"
                   id="remove_felix_image_button">
                    <?php esc_html_e('Remove felix image', 'felix'); ?>
                </a>
            </p>

            <input type="hidden"
                   id="upload_felix_image"
                   name="_felix_cover_image"
                   value="<?php echo esc_attr($image_id); ?>"/>
            <?php
        }
        $content_width = $old_content_width;
    } else {
        ?>
        <img src=""
             style="width:<?php echo esc_attr($content_width); ?>'px;height:auto;border:0;
                 display:none;"/>

        <p class="hide-if-no-js">
            <a title="<?php esc_html_e(  'Set felix image', 'felix') ; ?>"
               href="javascript:;"
               id="upload_felix_image_button"
               id="set-felix-image<?php echo   esc_html__(  'Choose an image', 'felix') ?>"
               data-uploader_button_text="<?php echo   esc_html__(  'Set felix image', 'felix') ?>"><?php
                echo  esc_html__(  'Set felix image', 'felix'); ?></a>
        </p>
        <input type="hidden" id="upload_felix_image" name="_felix_cover_image" value=""/>
        <?php

    }

}

add_action('save_post', 'felix_image_save', 10, 1);
function felix_image_save($post_id)
{
    if (isset($_POST['_felix_cover_image'])) {
        $image_id = (int)$_POST['_felix_cover_image'];
        update_post_meta($post_id, '_felix_image_id', $image_id);
    }
}