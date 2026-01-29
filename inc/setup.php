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
