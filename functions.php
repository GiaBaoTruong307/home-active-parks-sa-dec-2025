<?php
// Tile Tag Support
add_theme_support('title-tag');
// Thumbnail Support
add_theme_support('post-thumbnails');
// Custom Logo
add_action('after_setup_theme', function () {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'main-menu' => __('Main Menu', 'my_theme'),
        'footer-menu' => __('Footer Menu', 'my_theme'),
    ]);
});

// Enqueue Styles and Scripts
function my_theme_enqueue_assets()
{
    $theme_uri  = get_template_directory_uri();
    $theme_path = get_template_directory();

    wp_enqueue_style(
        'my-theme-style',
        $theme_uri . '/assets/css/main.css',
        [],
        filemtime($theme_path . '/assets/css/main.css')
    );

    wp_enqueue_style(
        'slick-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'
    );

    wp_enqueue_style(
        'slick-theme-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
        ['slick-css']
    );

    wp_enqueue_script(
        'slick-js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        ['jquery'],
        '1.8.1',
        true
    );

    wp_enqueue_script(
        'main-js',
        $theme_uri . '/assets/js/main.js',
        ['jquery', 'slick-js'],
        filemtime($theme_path . '/assets/js/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');

// Allow SVG upload
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

// ACF Options Page for Footer Settings
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Footer Settings',
        'menu_title' => 'Footer',
        'menu_slug'  => 'footer-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}
