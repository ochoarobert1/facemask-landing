<?php
/* --------------------------------------------------------------
 *    CUSTOM ADMIN FOOTER
 *-------------------------------------------------------------- */
function dashboard_footer()
{
    echo '<span id="footer-thankyou">';
    _e('Gracias por crear con ', 'facemask');
    echo '<a href="http://wordpress.org/" target="_blank">WordPress.</a> - ';
    _e('Tema desarrollado por ', 'facemask');
    echo '<a href="http://robertochoa.com.ve/?utm_source=footer_admin&utm_medium=link&utm_content=facemask" target="_blank">Robert Ochoa</a></span>';
}
add_filter('admin_footer_text', 'dashboard_footer');

/* --------------------------------------------------------------
 *    CUSTOM STYLES HOOKS
 *-------------------------------------------------------------- */
function facemask_load_css()
{
    $version_remove = NULL;
    if (!is_admin()) {
        if (get_page_template_slug() === 'page-template.php') {
            /*- BOOTSTRAP CORE -*/
            wp_register_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', false, '4.5.2', 'all');
            wp_enqueue_style('bootstrap-css');

            /*- ANIMATE CSS -*/
            wp_register_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css', false, '3.7.2', 'all');
            wp_enqueue_style('animate-css');

            /*- FONT AWESOME -*/
            wp_register_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', 'all');
            wp_enqueue_style('fontawesome-css');

            /*- AOS -*/
            wp_register_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', false, '2.3.4', 'all');
            wp_enqueue_style('aos-css');

            /*- SWIPER JS -*/
            wp_register_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', false, '6.1.2', 'all');
            wp_enqueue_style('swiper-css');

            /*- GOOGLE FONTS -*/
            wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Catamaran:wght@100;300;500;700;900&display=swap', false, $version_remove, 'all');
            wp_enqueue_style('google-fonts');

            /*- MAIN STYLE -*/
            wp_register_style('main-style', FL_PLUGIN_URL . '/css/facemask-landing.css', false, $version_remove, 'all');
            wp_enqueue_style('main-style');

            /*- MAIN MEDIAQUERIES -*/
            wp_register_style('main-mediaqueries', FL_PLUGIN_URL . '/css/facemask-responsive.css', array('main-style'), $version_remove, 'all');
            wp_enqueue_style('main-mediaqueries');
        }
    }
}

add_action('wp_enqueue_scripts', 'facemask_load_css');

/* --------------------------------------------------------------
 *    CUSTOM SCRIPT HOOKS
 *-------------------------------------------------------------- */
function facemask_load_js()
{
    $version_remove = NULL;
    if (!is_admin()) {
        if (get_page_template_slug() === 'page-template.php') {
            /*- BOOTSTRAP -*/
            wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
            wp_enqueue_script('bootstrap');

            /*- POPPER -*/
            wp_register_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), '4.5.2', true);
            wp_enqueue_script('bootstrap-bundle');

            /*- AOS -*/
            wp_register_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), '2.3.4', true);
            wp_enqueue_script('aos-js');

            /*- SWIPER JS -*/
            wp_register_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', [], '6.1.2', true);
            wp_enqueue_script('swiper-js');

            /*- ANIME JS -*/
            wp_register_script('anime-js', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', [], '6.1.2', true);
            wp_enqueue_script('anime-js');

            /*- MAIN FUNCTIONS -*/
            wp_register_script('main-functions', FL_PLUGIN_URL . '/js/facemask-landing.js', array('jquery'), $version_remove, true);
            wp_enqueue_script('main-functions');

            /* LOCALIZE MAIN SHORTCODE SCRIPT */
            wp_localize_script('main-functions', 'custom_admin_url', array(
                'ajax_url' => admin_url('admin-ajax.php')
            ));
        }
    }
}

add_action('wp_enqueue_scripts', 'facemask_load_js');

/* --------------------------------------------------------------
WP CUSTOMIZE SECTION - CUSTOM SETTINGS
-------------------------------------------------------------- */

add_action('customize_register', 'facemask_customize_register');

function facemask_customize_register($wp_customize)
{
    /* SOCIAL SETTINGS */
    $wp_customize->add_section('mfm_social_settings', array(
        'title'    => __('Redes Sociales', 'facemask'),
        'description' => __('Agregue aqui las redes sociales de la página, serán usadas globalmente', 'facemask'),
        'priority' => 175,
    ));

    $wp_customize->add_setting('mfm_social_settings[facebook]', array(
        'default'           => '',
        'sanitize_callback' => 'facemask_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('facebook', array(
        'type' => 'url',
        'section' => 'mfm_social_settings',
        'settings' => 'mfm_social_settings[facebook]',
        'label' => __('Facebook', 'facemask'),
    ));

    $wp_customize->add_setting('mfm_social_settings[twitter]', array(
        'default'           => '',
        'sanitize_callback' => 'facemask_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('twitter', array(
        'type' => 'url',
        'section' => 'mfm_social_settings',
        'settings' => 'mfm_social_settings[twitter]',
        'label' => __('Twitter', 'facemask'),
    ));

    $wp_customize->add_setting('mfm_social_settings[instagram]', array(
        'default'           => '',
        'sanitize_callback' => 'facemask_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('instagram', array(
        'type' => 'url',
        'section' => 'mfm_social_settings',
        'settings' => 'mfm_social_settings[instagram]',
        'label' => __('Instagram', 'facemask'),
    ));

    $wp_customize->add_setting('mfm_social_settings[linkedin]', array(
        'default'           => '',
        'sanitize_callback' => 'facemask_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('linkedin', array(
        'type' => 'url',
        'section' => 'mfm_social_settings',
        'settings' => 'mfm_social_settings[linkedin]',
        'label' => __('LinkedIn', 'facemask'),
    ));

    $wp_customize->add_setting('mfm_social_settings[youtube]', array(
        'default'           => '',
        'sanitize_callback' => 'facemask_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('youtube', array(
        'type' => 'url',
        'section' => 'mfm_social_settings',
        'settings' => 'mfm_social_settings[youtube]',
        'label' => __('YouTube', 'facemask'),
    ));

    /* COOKIES SETTINGS */
    $wp_customize->add_section('mfm_cookie_settings', array(
        'title'    => __('Cookies', 'facemask'),
        'description' => __('Opciones de Cookies', 'facemask'),
        'priority' => 176,
    ));

    $wp_customize->add_setting('mfm_cookie_settings[cookie_text]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control('cookie_text', array(
        'type' => 'textarea',
        'label'    => __('Cookie consent', 'facemask'),
        'description' => __('Texto del Cookie consent.'),
        'section'  => 'mfm_cookie_settings',
        'settings' => 'mfm_cookie_settings[cookie_text]'
    ));

    $wp_customize->add_setting('mfm_cookie_settings[cookie_link]', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('cookie_link', array(
        'type'     => 'dropdown-pages',
        'section' => 'mfm_cookie_settings',
        'settings' => 'mfm_cookie_settings[cookie_link]',
        'label' => __('Link de Cookies', 'facemask'),
    ));
}

function facemask_sanitize_url($url)
{
    return esc_url_raw($url);
}
