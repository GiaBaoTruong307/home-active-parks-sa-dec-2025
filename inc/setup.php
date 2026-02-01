<?php
if (!defined('ABSPATH')) {
    exit;
} // Absolute Path - Avoid direct access

function theme_setup()
{
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menu('mainMenu', __('Main Menu', 'theme'));
}
add_action('after_setup_theme', 'theme_setup');

// Allow SVG upload
function allow_svg_upload($mimes)
{
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

// Set posts per page for equipment archive to -1
function setup_default_query($query)
{
    if (!is_admin() and is_post_type_archive('equipment') and $query->is_main_query()) {
        $query->set('posts_per_page', -1);
    }
};
add_action('pre_get_posts', 'setup_default_query'); // this function has global impact