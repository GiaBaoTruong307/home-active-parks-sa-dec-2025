<?php
if (!defined('ABSPATH')) {
    exit;
} // Avoid direct access

// Save ACF JSON to theme folder
function active_park_acf_json_save_point($path)
{
    // update path
    $path = get_template_directory() . '/inc/acf-options';

    // return
    return $path;
}
add_filter('acf/settings/save_json', 'active_park_acf_json_save_point');

// Load ACF JSON from theme folder
function active_park_acf_json_load_point($paths)
{
    // Remove default ACF path
    unset($paths[0]);

    // Add custom path
    $paths[] = get_template_directory() . '/inc/acf-options';

    return $paths;
}
add_filter('acf/settings/load_json', 'active_park_acf_json_load_point');

// Footer Options Page
if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title'  => 'Theme Options',
        'menu_title'  => 'Theme Options',
        'menu_slug'   => 'theme-options',
        'capability'  => 'edit_posts', // (manage_options, edit_posts: Admin + Editor, edit_pages)
        'redirect'    => false,
        'position'    => 60,
        'icon_url'    => 'dashicons-admin-generic',
    ]);
}
