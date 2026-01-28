<?php

// Enqueue Styles and Scripts
function add_theme_scripts()
{
    wp_enqueue_style('main-styles', get_theme_file_uri('/assets/css/main.css'));
    wp_enqueue_script('main-js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.0', true); // true for add script in footer
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

// Theme Support
function my_theme_setup()
{
    // Add support for custom logo
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    // Add support for dynamic title tag
    add_theme_support('title-tag');
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    // Register navigation menus
    register_nav_menu('headerMenu', 'Header Menu');
    register_nav_menu('footerMenu', 'Footer Menu');
}
add_action('after_setup_theme', 'my_theme_setup');
