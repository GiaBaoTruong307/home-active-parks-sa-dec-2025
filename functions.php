<?php

// Grant management of the <title> tag to WordPress Core + SEO plugin
add_theme_support('title-tag');
// Enable support for Post Thumbnails on posts and pages
add_theme_support('post-thumbnails');

// Enqueue CSS & JS
function my_theme_enqueue_assets()
{
    // CSS
    wp_enqueue_style(
        'my_theme-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );

    // JS
    wp_enqueue_script(
        'my_theme-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true // load before </body>
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');

// Register navigation menus
function my_theme_register_menus()
{
    register_nav_menus([
        'main-menu' => __('Main Menu', 'my_theme'),
    ]);
}
add_action('after_setup_theme', 'my_theme_register_menus');

// Add support for custom logo
function mytheme_setup()
{
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');
