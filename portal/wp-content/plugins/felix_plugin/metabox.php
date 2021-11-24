<?php


add_action('add_meta_boxes', 'felix_custom_meta_box');

/**
 * init metabox
 * @param $postType
 */
function felix_custom_meta_box($postType)
{

    $postType = (isset($postType)) ? $postType : "post";
    add_meta_box('felix_meta_box',
         esc_html__(  'felix Onepage menu', 'felix'),
        'felix_footer_meta_box',
        'page',
        'side',
        'low');

    add_meta_box('felix_meta_box_all_posttype',
         esc_html__(  'Short description (text near title)', 'felix'),
        'felix_meta_box_all_posttype_fun',
        $postType,
        'normal',
        'high');
}

add_action('save_post', 'felix_save_metabox', 9999);


/***
 *  Combine 2 Arrays of Different Lengths
 * @param $arr1
 * @param $arr2
 * @return array
 */
function felix_array_combine2($arr1, $arr2) {
    $count = min(count($arr1), count($arr2));
    return array_combine(array_slice($arr1, 0, $count), array_slice($arr2, 0, $count));
}

/***
 * Save metabox
 * @param $post_id
 * @return mixed
 */
function felix_save_metabox($post_id)
{
    global $post;

    if (!empty($_POST['_felix_short_description'])) {
        $datta = wp_kses_post($_POST['_felix_short_description']);
        update_post_meta($post_id, '_felix_short_description', $datta);

    }

    if (!current_user_can('edit_page', $post_id)) {
        return $post_id;
    }

    if (isset($post->ID)) {
        if (isset($_POST["felix_menu_name"])) {
            $meta_element_class = serialize($_POST['felix_menu_name']);
            update_post_meta($post->ID, '_felix_menu_name', ($meta_element_class));
        } else {
            @delete_post_meta($post->ID, '_felix_menu_name');
        }
        if (isset($_POST["felix_munu_url"])) {
            $meta_element_class = serialize($_POST['felix_munu_url']);
            update_post_meta($post->ID, '_felix_munu_url', ($meta_element_class));
        } else {
            @delete_post_meta($post->ID, '_felix_munu_url');
        }
        if (isset($_POST["felix_menu_pos"])) {
            $meta_element_class = serialize($_POST['felix_menu_pos']);
            update_post_meta($post->ID, '_felix_menu_pos', ($meta_element_class));
        } else {
            @delete_post_meta($post->ID, '_felix_menu_pos');
        }

        $frontpage_id = get_option('page_on_front');
        $contents = unserialize(get_post_meta($post->ID, '_felix_menu_name', true));
        $socialurl = unserialize(get_post_meta($post->ID, '_felix_munu_url', true));
        $menu_pos = unserialize(get_post_meta($post->ID, '_felix_menu_pos', true));



        if ($post->ID == $frontpage_id) {


            delete_option('felix_one_page_menu');
            delete_option('felix_one_page_menu_right');

            $menu = '';
            $menu_right = '';
            if (($contents && $socialurl) != '') {
                $i = 0;
                foreach (felix_array_combine2($contents, $socialurl) as $content => $url) {

                    if ($menu_pos[$i] == 'right') {
                        $menu_right .= ' 	<li><a href="' . esc_url($url) . '">' . esc_html($content) . '</a></li>';

                    } else {
                        $menu .= ' 	<li><a href="' . esc_url($url) . '">' . esc_html($content) . '</a></li>';

                    }
                    $i++;
                }
            }
            //
            if ($menu != '') {
                update_option('felix_one_page_menu', $menu);


            }
            if ($menu_right != '') {
                update_option('felix_one_page_menu_right', $menu_right);


            }


        } else {
            /*
             * onother page
             */
            $menu_o = '';
            if (($contents && $socialurl) != '') {
                foreach (array_combine($contents, $socialurl) as $content => $url) {
                    $menu_o .= ' 	<li><a href="' . esc_url($url) . '">' . esc_html($content) . '</a></li>';
                }
            }
            if ($menu_o != '')
                update_option('felix_one_page_menu_' . $post->ID, $menu_o);


        }

    }


}


/**
 *  menu build
 * @param $post
 */
function felix_footer_meta_box($post)
{

    
    $felix_munu_url = unserialize(get_post_meta($post->ID, '_felix_munu_url', true));
    $felix_menu_name = unserialize(get_post_meta($post->ID, '_felix_menu_name', true));

    $menu_pos = unserialize(get_post_meta($post->ID, '_felix_menu_pos', true));

    ?>
    <div class="felix_one_page">
        <div class="inside">
            <strong><?php esc_html_e('Menu item name', 'felix') ?></strong>
        </div>
        <div class="input_fields_wrap">

            <?php if ($felix_menu_name) {
                $j = 0;
                foreach ($felix_menu_name as $item) {
                    ?>
                    <div><input type="text" name="felix_menu_name[]" value="<?php echo wp_kses_post($item); ?>"
                                class="widefat valid felix_vdf"/><a href="#" class="remove_field"><i
                                class="fa fa-times"
                                aria-hidden="true"></i></a>
                        <select name="felix_menu_pos[]">
                            <option value="left" <?php selected($menu_pos[$j], "left"); ?> ><?php esc_html_e('Left', 'felix') ?></option>
                            <option <?php selected($menu_pos[$j], "right"); ?> value="right"><?php esc_html_e('Right', 'felix') ?></option>
                        </select>
                    </div>
                    <?php
                    $j++;
                }
            } ?>


        </div>
        <button
            class="add_field_button vc_btn vc_btn-primary vc_btn-sm vc_navbar-btn">
            <?php esc_html_e('+ Add More item', 'felix') ?>
        </button>
        <p class="description"><?php esc_html_e('Format: Any text', 'felix') ?></p>
        <script>
            jQuery(document).ready(function ($) {
                var max_fields = 10; //maximum input boxes allowed
                var wrapper = $(".input_fields_wrap"); //Fields wrapper
                var add_button = $(".add_field_button"); //Add button ID

                var x = 1; //initlal text box count
                $(add_button).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (x < max_fields) { //max input box allowed
                        x++; //text box increment
                        $(wrapper).append('<div><input type="text" name="felix_menu_name[]"  class="widefat valid felix_vdf"/> <select name="felix_menu_pos[]" >     <option value="left" selected="selected">Left</option>                           <option value="right" >Right</option></select><a href="#" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a></div>'); //add input box
                    }
                });

                $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });
        </script>
        <div class="inside">
            <strong><?php esc_html_e('Menu item Url', 'felix') ?></strong>
        </div>
        <div class="input_fields_wrap2">


            <?php if ($felix_munu_url) {
                foreach ($felix_munu_url as $item) {
                    ?>
                    <div><input type="text" name="felix_munu_url[]" class="widefat valid felix_vdf"
                                value="<?php echo wp_kses_post($item); ?>"/><a href="#" class="remove_field"><i
                                class="fa fa-times" aria-hidden="true"></i></a></div>
                    <?php
                }
            } ?>

        </div>
        <button
            class="add_field_button2 vc_btn vc_btn-primary vc_btn-sm vc_navbar-btn">
            <?php esc_html_e('+ Add More item', 'felix') ?>
        </button>
        <p class="description"><?php esc_html_e('Format: #sectionname or http://yoururl.com', 'felix') ?></p>
        <script>
            jQuery(document).ready(function ($) {
                var max_fields = 10; //maximum input boxes allowed
                var wrapper = $(".input_fields_wrap2"); //Fields wrapper
                var add_button = $(".add_field_button2"); //Add button ID

                var x = 1; //initlal text box count
                $(add_button).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (x < max_fields) { //max input box allowed
                        x++; //text box increment
                        $(wrapper).append('<div><input type="text" name="felix_munu_url[]"  class="widefat valid felix_vdf"/><a href="#" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a></div>'); //add input box
                    }
                });

                $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });
        </script>
    </div>
    <?php
}


function felix_meta_box_all_posttype_fun($post)
{

    $valueeee2 = get_post_meta($post->ID, '_felix_short_description', true);
    wp_editor(wp_kses_post($valueeee2), 'mettaabox_ID_stylee',
        $settings = array('textarea_name' => '_felix_short_description',
            'textarea_rows' => 3, 'media_buttons' => false));
}


