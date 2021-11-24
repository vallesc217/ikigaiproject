<?php
/**
 * This function via Ajax sends a post request to the server MailChimp
 */
function felix_mailchimp_send()
{

    //get api kode
    preg_match("/(.*?)-(us..)/", sanitize_text_field(get_theme_mod('felix_mailchimp_api_control')), $math);
    @$api_key = (isset($math[1])) ? $math[1] : "";
    if (@strlen($math[1]) < 10) {
        echo esc_attr( esc_html__(  'You have incorrect API key  ', 'felix'));
        exit;
        die();

    }
    if (isset($math[2]) && strlen($math[2]) < 1) {
        echo esc_attr( esc_html__(  'You have incorrect dc ', 'felix'));
        exit;
        die();
    }
    $list_id = sanitize_text_field(get_theme_mod('felix_mailchimpid_list_control'));
    if (strlen($list_id) < 5) {
        echo esc_attr( esc_html__(  'You have incorrect id list ', 'felix'));
        exit;
        die();
    }

    
    $dc = $math[2]; // date center MailChimp
    $email = sanitize_email($_POST['EMAIL']);
    $url = "https://$dc.api.mailchimp.com/2.0/lists/subscribe.json";
    $request = wp_remote_post(sanitize_text_field($url), array('body' => json_encode(array(
        'apikey' => sanitize_text_field($api_key),
        'id' => sanitize_text_field($list_id),
        'email' => array('email' => sanitize_email($email)),
    )),));
    $result = json_decode(wp_remote_retrieve_body($request));
    /*if have error then echo this*/
    if (isset($result->error)) {
        echo esc_attr($result->error);
    } elseif (isset($result->email)) {
        echo  "<i class='fa fa-envelope'></i> Awesome! We have sent you a confirmation email ". esc_attr($result->email);
    }
    wp_die();
    exit;
}

add_action('wp_ajax_felix_mailchimp_send', 'felix_mailchimp_send'); // for logged in user
add_action('wp_ajax_nopriv_felix_mailchimp_send', 'felix_mailchimp_send'); // if user not logged in

