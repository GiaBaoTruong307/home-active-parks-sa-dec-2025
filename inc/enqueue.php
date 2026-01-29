<?php
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue Styles and Scripts
function theme_enqueue_assets()
{
    wp_enqueue_style(
        'main-styles',
        get_theme_file_uri('/assets/css/main.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/main.css'))
    );

    wp_enqueue_script(
        'main-js',
        get_theme_file_uri('/assets/js/main.js'),
        array('jquery'),
        THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
