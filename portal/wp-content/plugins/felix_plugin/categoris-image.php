<?php


define('felix_IMAGE_PLACEHOLDER', esc_url(get_template_directory_uri() . "/img/brand.png"));


add_action('admin_init', 'felix_init');
function felix_init()
{
    $felix_taxonomies = get_taxonomies();
    if (is_array($felix_taxonomies)) {
        $felix__options = get_option('felix_options');
        if (empty($felix__options['excluded_taxonomies']))
            $felix__options['excluded_taxonomies'] = array();

        foreach ($felix_taxonomies as $felix_taxonomy) {
            if (in_array($felix_taxonomy, $felix__options['excluded_taxonomies']))
                continue;
            add_action($felix_taxonomy . '_add_form_fields', 'felix_add_texonomy_field');
            add_action($felix_taxonomy . '_edit_form_fields', 'felix_edit_texonomy_field');
            add_filter('manage_edit-' . $felix_taxonomy . '_columns', 'felix_taxonomy_columns');
            add_filter('manage_' . $felix_taxonomy . '_custom_column', 'felix_taxonomy_column', 10, 3);
        }
    }
}


// add image field in add form
function felix_add_texonomy_field()
{
    if (get_bloginfo('version') >= 3.5)
        wp_enqueue_media();
    else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
    }

    echo '<div class="form-field">
		<label for="taxonomy_image">' .  esc_html__(  'Image', 'felix') . '</label>
		<input type="text" name="taxonomy_image" id="taxonomy_image" value="" />
		<br/>
		<button class="felix_upload_image_button button">' .  esc_html__(  'Upload/Add image', 'felix') . '</button>
	</div>' ;
}

// add image field in edit form
function felix_edit_texonomy_field($taxonomy)
{
    if (get_bloginfo('version') >= 3.5)
        wp_enqueue_media();
    else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
    }

    if (felix_taxonomy_image_url($taxonomy->term_id, NULL, TRUE) == felix_IMAGE_PLACEHOLDER)
        $image_url = "";
    else
        $image_url = felix_taxonomy_image_url($taxonomy->term_id, NULL, TRUE);
    echo '<tr class="form-field">
		<th scope="row" valign="top"><label for="taxonomy_image">' .  esc_html__(  'Image', 'felix') . '</label></th>
		<td><img class="taxonomy-image" src="' . esc_url(felix_taxonomy_image_url($taxonomy->term_id, 'medium', TRUE)) . '"/><br/>
		<input type="text" name="taxonomy_image" id="taxonomy_image" value="' . esc_url($image_url) . '" /><br />
		<button class="felix_upload_image_button button">' .  esc_html__(  'Upload/Add image', 'felix') . '</button>
		<button class="felix_remove_image_button button">' .  esc_html__(  'Remove image', 'felix') . '</button>
		</td>
	</tr>';
}


// save our taxonomy image while edit or save term
add_action('edit_term', 'felix_save_taxonomy_image');
add_action('create_term', 'felix_save_taxonomy_image');
function felix_save_taxonomy_image($term_id)
{
    if (isset($_POST['taxonomy_image']))
        update_option('felix_taxonomy_image' . $term_id, sanitize_text_field($_POST['taxonomy_image']), NULL);
}

// get attachment ID by image url
function felix_get_attachment_id_by_url($image_src)
{
    global $wpdb;
    $id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid = %s", $image_src));
    return (!empty($id)) ? $id : NULL;
}

// get taxonomy image url for the given term_id (Place holder image by default)
function felix_taxonomy_image_url($term_id = NULL, $size = 'full', $return_placeholder = FALSE)
{
    if (!$term_id) {
        if (is_category())
            $term_id = get_query_var('cat');
        elseif (is_tag())
            $term_id = get_query_var('tag_id');
        elseif (is_tax()) {
            $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $term_id = $current_term->term_id;
        }
    }

    $taxonomy_image_url = get_option('felix_taxonomy_image' . $term_id);
    if (!empty($taxonomy_image_url)) {
        $attachment_id = felix_get_attachment_id_by_url($taxonomy_image_url);
        if (!empty($attachment_id)) {
            $taxonomy_image_url = wp_get_attachment_image_src($attachment_id, $size);
            $taxonomy_image_url = $taxonomy_image_url[0];
        }
    }

    if ($return_placeholder)
        return ($taxonomy_image_url != '') ? $taxonomy_image_url : felix_IMAGE_PLACEHOLDER;
    else
        return $taxonomy_image_url;
}

function felix_quick_edit_custom_box($column_name, $screen, $name)
{
    if ($column_name == 'thumb')
        echo '<fieldset>
		<div class="thumb inline-edit-col">
			<label>
				<span class="title"><img src="" alt=""/></span>
				<span class="input-text-wrap"><input type="text" name="taxonomy_image" value="" class="tax_list" /></span>
				<span class="input-text-wrap">
					<button class="felix_upload_image_button button">' .  esc_html__(  'Upload/Add image', 'felix') . '</button>
					<button class="felix_remove_image_button button">' .  esc_html__(  'Remove image', 'felix') . '</button>
				</span>
			</label>
		</div>
	</fieldset>';
}

/**
 * Thumbnail column added to category admin.
 *
 * @access public
 * @param mixed $columns
 * @return void
 */
function felix_taxonomy_columns($columns)
{
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumb'] =  esc_html__(  'Image', 'felix');

    unset($columns['cb']);

    return array_merge($new_columns, $columns);
}

/**
 * Thumbnail column value added to category admin.
 *
 * @access public
 * @param mixed $columns
 * @param mixed $column
 * @param mixed $id
 * @return void
 */
function felix_taxonomy_column($columns, $column, $id)
{
    if ($column == 'thumb')
        $columns = '<span><img width="100px" src="' . esc_url( felix_taxonomy_image_url($id, 'thumbnail', TRUE) ). '" alt="' .  esc_html__(  'Thumbnail', 'felix') . '" class="wp-post-image" /></span>';

    return $columns;
}

// Change 'insert into post' to 'use this image'
function felix_change_insert_button_text($safe_text, $text)
{
    return str_replace("Insert into Post", "Use this image", $text);
}

// Style the image in category list
if (strpos($_SERVER['SCRIPT_NAME'], 'edit-tags.php') > 0) {

    add_action('quick_edit_custom_box', 'felix_quick_edit_custom_box', 10, 3);
    add_filter("attribute_escape", "felix_change_insert_button_text", 10, 2);
}





// Settings section description
function felix_section_text()
{
    echo '<p>' .  esc_html__(  'Please select the taxonomies you want to exclude it from Categories Images plugin', 'felix') . '</p>';
}

// Excluded taxonomies checkboxs
function felix_excluded_taxonomies()
{
    $options = get_option('felix_options');
    $disabled_taxonomies = array('nav_menu', 'link_category', 'post_format');
    foreach (get_taxonomies() as $tax) : if (in_array($tax, $disabled_taxonomies)) continue; ?>
        <input type="checkbox" name="felix_options[excluded_taxonomies][<?php echo esc_html($tax); ?>]"
               value="<?php echo esc_html($tax); ?>" <?php checked(isset($options['excluded_taxonomies'][$tax])); ?> /> <?php echo esc_html($tax); ?>
        <br/>
    <?php endforeach;
}

// Validating options
function felix_options_validate($input)
{
    return $input;
}

// Plugin option page
function felix_options()
{
    if (!current_user_can('manage_options'))
        wp_die( esc_html__(  'You do not have sufficient permissions to access this page.', 'felix'));
    $options = get_option('felix_options');
    ?>
    <div class="wrap">
        <h2><?php esc_html_e('Categories Images', 'felix'); ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields('felix_options'); ?>
            <?php do_settings_sections('zci-options'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}


// display taxonomy image for the given term_id
function felix_taxonomy_image($term_id = NULL, $size = 'full', $attr = NULL, $echo = false)
{
    if (!$term_id) {
        if (is_category())
            $term_id = get_query_var('cat');
        elseif (is_tag())
            $term_id = get_query_var('tag_id');
        elseif (is_tax()) {
            $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $term_id = $current_term->term_id;
        }
    }

    $taxonomy_image_url = get_option('felix_taxonomy_image' . $term_id);
    if (!empty($taxonomy_image_url)) {
        $attachment_id = felix_get_attachment_id_by_url($taxonomy_image_url);
        if (!empty($attachment_id))
            $taxonomy_image = wp_get_attachment_image($attachment_id, $size, FALSE, $attr);
    }

    if ($echo)
        echo  esc_url($taxonomy_image_url);
    else
        return esc_url($taxonomy_image_url);
}