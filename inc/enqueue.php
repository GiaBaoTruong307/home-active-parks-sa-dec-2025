<?php

function theme_enqueue_assets()
{
    // MAIN CSS
    wp_enqueue_style(
        'main-styles',
        get_theme_file_uri('/assets/css/main.css'),
        [],
        filemtime(get_theme_file_path('/assets/css/main.css'))
    );

    // SLICK CSS
    wp_enqueue_style(
        'slick-css',
        get_theme_file_uri('/assets/css/slick.css'),
        [],
        '1.8.1'
    );

    wp_enqueue_style(
        'slick-theme-css',
        get_theme_file_uri('/assets/css/slick-theme.css'),
        ['slick-css'],
        '1.8.1'
    );

    // SLICK JS (CDN)
    wp_enqueue_script(
        'slick-js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        ['jquery'],
        '1.8.1',
        true
    );

    wp_enqueue_script(
        'carousel-js',
        get_theme_file_uri('/assets/js/carousel.js'),
        ['jquery', 'slick-js'],
        filemtime(get_theme_file_path('/assets/js/carousel.js')),
        true
    );

    // MAIN JS 
    wp_enqueue_script(
        'main-js',
        get_theme_file_uri('/assets/js/main.js'),
        ['jquery'],
        filemtime(get_theme_file_path('/assets/js/main.js')),
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
