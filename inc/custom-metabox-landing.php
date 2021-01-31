<?php
function ed_metabox_include_front_page($display, $meta_box)
{
    if (!isset($meta_box['show_on']['key'])) {
        return $display;
    }

    if ('front-page' !== $meta_box['show_on']['key']) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } elseif (isset($_POST['post_ID'])) {
        $post_id = $_POST['post_ID'];
    }

    if (!$post_id) {
        return false;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option('page_on_front');

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
add_filter('cmb2_show_on', 'ed_metabox_include_front_page', 10, 2);

function be_metabox_show_on_slug($display, $meta_box)
{
    if (!isset($meta_box['show_on']['key'], $meta_box['show_on']['value'])) {
        return $display;
    }

    if ('slug' !== $meta_box['show_on']['key']) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } elseif (isset($_POST['post_ID'])) {
        $post_id = $_POST['post_ID'];
    }

    if (!$post_id) {
        return $display;
    }

    $slug = get_post($post_id)->post_name;

    // See if there's a match
    return in_array($slug, (array) $meta_box['show_on']['value']);
}
add_filter('cmb2_show_on', 'be_metabox_show_on_slug', 10, 2);

add_action('cmb2_admin_init', 'facemask_register_custom_metabox');
function facemask_register_custom_metabox()
{
    global $post;
    $prefix = 'mfm_';

    /* --------------------------------------------------------------
    1.- LANDING: HERO SECTION
-------------------------------------------------------------- */
    $cmb_landing_hero = new_cmb2_box(array(
        'id'            => $prefix . 'landing_hero_metabox',
        'title'         => esc_html__('Landing: Main Hero', 'facemask'),
        'object_types'  => array('page'),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-template.php'),
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true,
        'cmb_styles' => true,
        'closed'     => false
    ));

    $cmb_landing_hero->add_field(array(
        'id'   => $prefix . 'video_webm',
        'name'      => esc_html__('Webm Video File', 'facemask'),
        'desc'      => esc_html__('Upload a Video in webm format', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload Video', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'video/webm'
            )
        ),
        'preview_size' => 'medium'
    ));

    $cmb_landing_hero->add_field(array(
        'id'   => $prefix . 'video_mp4',
        'name'      => esc_html__('Mp4 Video File', 'facemask'),
        'desc'      => esc_html__('Upload a Video in mp4 format', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload Video', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'video/mp4'
            )
        ),
        'preview_size' => 'medium'
    ));

    $cmb_landing_hero->add_field(array(
        'id'   => $prefix . 'qr_image',
        'name'      => esc_html__('QR image file', 'facemask'),
        'desc'      => esc_html__('Upload a universal qr image', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload QR', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png'
            )
        ),
        'preview_size' => 'medium'
    ));

    $cmb_landing_hero->add_field(array(
        'name'      => esc_html__('Store Links', 'facemask'),
        'desc'      => esc_html__('Here are the Store Links', 'facemask'),
        'id'   => 'store_title',
        'type' => 'title'
    ));

    $cmb_landing_hero->add_field(array(
        'id'   => $prefix . 'applestore_logo',
        'name'      => esc_html__('AppStore image file', 'facemask'),
        'desc'      => esc_html__('Upload the AppStore logo image', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload Logo', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png'
            )
        ),
        'preview_size' => 'medium'
    ));


    $cmb_landing_hero->add_field(array(
        'id'        => $prefix . 'appstore_link',
        'name'      => esc_html__('Google Store URL Link', 'facemask'),
        'desc'      => esc_html__('Add the URL link for the app in AppStore', 'facemask'),
        'type'      => 'text_url'
    ));

    $cmb_landing_hero->add_field(array(
        'id'   => $prefix . 'googlestore_logo',
        'name'      => esc_html__('PlayStore image file', 'facemask'),
        'desc'      => esc_html__('Upload the PlayStore logo image', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload Logo', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png'
            )
        ),
        'preview_size' => 'medium'
    ));


    $cmb_landing_hero->add_field(array(
        'id'        => $prefix . 'googlestore_link',
        'name'      => esc_html__('Google Store URL Link', 'facemask'),
        'desc'      => esc_html__('Add the URL link for the app in PlayStore', 'facemask'),
        'type'      => 'text_url'
    ));


    /* --------------------------------------------------------------
    2.- LANDING: SLIDER CONTAINER
-------------------------------------------------------------- */
    $cmb_landing_slider = new_cmb2_box(array(
        'id'            => $prefix . 'landing_slider_metabox',
        'title'         => esc_html__('Landing: Main Phone Slider', 'facemask'),
        'object_types'  => array('page'),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-template.php'),
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true,
        'cmb_styles' => true,
        'closed'     => false
    ));

    $cmb_landing_slider->add_field(array(
        'id'        => $prefix . 'slider_section_title',
        'name'      => esc_html__('Section Title', 'facemask'),
        'desc'      => esc_html__('Add this section title', 'facemask'),
        'type'      => 'text'
    ));

    $group_field_id = $cmb_landing_slider->add_field(array(
        'id'          => $prefix . 'slider_main_group',
        'name'      => esc_html__('Slides Group', 'facemask'),
        'description' => __('Phone slides inside section', 'facemask'),
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __('Slide {#}', 'facemask'),
            'add_button'        => __('Add other Slide', 'facemask'),
            'remove_button'     => __('Remove Slide', 'facemask'),
            'sortable'          => true,
            'closed'         => true,
            'remove_confirm' => esc_html__('Are you sure to remove this slide?', 'facemask')
        )
    ));

    $cmb_landing_slider->add_group_field($group_field_id, array(
        'id'   => 'image',
        'name'      => esc_html__('Phone Image', 'facemask'),
        'desc'      => esc_html__('Upload a phone image that corresponds with this step', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload image', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png'
            )
        ),
        'preview_size' => 'thumbnail'
    ));

    $cmb_landing_slider->add_group_field($group_field_id, array(
        'id'        => 'title',
        'name'      => esc_html__('Step Title', 'facemask'),
        'desc'      => esc_html__('Add the title of this step', 'facemask'),
        'type' => 'text'
    ));

    $cmb_landing_slider->add_group_field($group_field_id, array(
        'id'        => 'content',
        'name'      => esc_html__('Step Content', 'facemask'),
        'desc'      => esc_html__('Add the small text of this step', 'facemask'),
        'type' => 'textarea'
    ));

    /* --------------------------------------------------------------
    3.- LANDING: ABOUT SECTION
-------------------------------------------------------------- */
    $cmb_landing_about = new_cmb2_box(array(
        'id'            => $prefix . 'landing_about_metabox',
        'title'         => esc_html__('Landing: About', 'facemask'),
        'object_types'  => array('page'),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-template.php'),
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true,
        'cmb_styles' => true,
        'closed'     => false
    ));

    $cmb_landing_about->add_field(array(
        'id'        => $prefix . 'about_section_title',
        'name'      => esc_html__('Section Title', 'facemask'),
        'desc'      => esc_html__('Add this section title', 'facemask'),
        'type'      => 'text'
    ));

    $cmb_landing_about->add_field(array(
        'id'   => $prefix . 'about_main_bg',
        'name'      => esc_html__('Background Image', 'facemask'),
        'desc'      => esc_html__('Upload a Background image for this section', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload Image', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png'
            )
        ),
        'preview_size' => 'medium'
    ));

    $cmb_landing_about->add_field(array(
        'id'   => $prefix . 'about_gallery',
        'name'      => esc_html__('Section Gallery', 'facemask'),
        'desc'      => esc_html__('Upload files for this gallery', 'facemask'),
        'type'          => 'file_list',
        'query_args'    => array('type' => 'image'),
        'text' => array(
            'add_upload_files_text'     => esc_html__('Upload image', 'facemask'),
            'remove_image_text'         => esc_html__('Remove image', 'facemask'),
            'file_text'                 => esc_html__('Image', 'facemask'),
            'file_download_text'        => esc_html__('Download', 'facemask'),
            'remove_text'               => esc_html__('Remove', 'facemask'),
        ),
        'preview_size'  => 'thumbnail'
    ));

    $cmb_landing_about->add_field(array(
        'id'        => $prefix . 'about_text',
        'name'      => esc_html__('Main content text', 'facemask'),
        'desc'      => esc_html__('Add a descriptive text for this section', 'facemask'),
        'type' => 'wysiwyg',
        'options' => array(
            'textarea_rows' => get_option('default_post_edit_rows', 2),
            'teeny' => false
        )
    ));

    $cmb_landing_about->add_field(array(
        'id'        => $prefix . 'follow_up_text',
        'name'      => esc_html__('"Follow us" Text', 'facemask'),
        'desc'      => esc_html__('Add a text for the follow up links', 'facemask'),
        'type'      => 'text'
    ));

    $group_field_id = $cmb_landing_about->add_field(array(
        'id'          => $prefix . 'follow_up_group',
        'name'      => esc_html__('Links Group', 'facemask'),
        'description' => __('Social Links inside section', 'facemask'),
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __('Link {#}', 'facemask'),
            'add_button'        => __('Add other Link', 'facemask'),
            'remove_button'     => __('Remove Link', 'facemask'),
            'sortable'          => true,
            'closed'         => true,
            'remove_confirm' => esc_html__('Are you sure to remove this Link?', 'facemask')
        )
    ));

    $cmb_landing_about->add_group_field($group_field_id, array(
        'id'   => 'logo',
        'name'      => esc_html__('Social Network Logo', 'facemask'),
        'desc'      => esc_html__('Upload a logo that corresponds with this network', 'facemask'),
        'type'    => 'file',

        'options' => array(
            'url' => false
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Upload logo', 'facemask'),
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png'
            )
        ),
        'preview_size' => 'thumbnail'
    ));

    $cmb_landing_about->add_group_field($group_field_id, array(
        'id'        => 'link_url',
        'name'      => esc_html__('Link URL', 'facemask'),
        'desc'      => esc_html__('Add the Link URL of this network', 'facemask'),
        'type' => 'text_url'
    ));
}
