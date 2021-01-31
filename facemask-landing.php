<?php

/**
 * Plugin Name:       FaceMask Landing
 * Plugin URI:        https://robertochoaweb.com/casos/facemask-landing/
 * Description:       Plugin for Landing Page 
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Robert Ochoa
 * Author URI:        https://robertochoaweb.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       facemask-landing
 * Domain Path:       /lang
 
 * --------------------------------------------------------------
 *    CUSTOM VARIABLES
 *-------------------------------------------------------------- */
define('FL_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('FL_PLUGIN_URL', plugin_dir_url(__FILE__));

/* --------------------------------------------------------------
 *    CUSTOM FUNCTIONS
 *-------------------------------------------------------------- */
require_once(FL_PLUGIN_PATH . '/inc/admin-functions.php');

/* --------------------------------------------------------------
 *    CUSTOM METABOXES
 *-------------------------------------------------------------- */
require_once(FL_PLUGIN_PATH . '/inc/custom-metabox-landing.php');

/* --------------------------------------------------------------
    ADD PAGE TEMPLATE
-------------------------------------------------------------- */
/**
 * Add "Custom" template to page attirbute template section.
 */
function wpse_288589_add_template_to_select($post_templates, $wp_theme, $post, $post_type)
{

    // Add custom template named template-custom.php to select dropdown 
    $post_templates['page-template.php'] = __('Page Landing');

    return $post_templates;
}

add_filter('theme_page_templates', 'wpse_288589_add_template_to_select', 10, 4);


/**
 * Check if current page has our custom template. Try to load
 * template from theme directory and if not exist load it 
 * from root plugin directory.
 */
function wpse_288589_load_plugin_template($template)
{

    $theme_file = get_page_template_slug();
    if (get_page_template_slug() === 'page-template.php') {
        if ($theme_file == locate_template(array('page-template.php'))) {
            $template = $theme_file;
        } else {
            $template = FL_PLUGIN_PATH . 'page-landing.php';
        }
    }

    return $template;
}

add_filter('template_include', 'wpse_288589_load_plugin_template');
