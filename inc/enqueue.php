<?php

function theme_enqueue_assets()
{
    // Main CSS
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

    // SLICK THEME CSS
    wp_enqueue_style(
        'slick-theme-css',
        get_theme_file_uri('/assets/css/slick-theme.css'),
        ['slick-css'],
        '1.8.1'
    );

    // PHOTOSWIPE CSS
    wp_enqueue_style(
        'photoswipe',
        get_theme_file_uri('/assets/vendor/photoswipe/photoswipe.css'),
        [],
        '5.4.4'
    );

    // SLICK JS
    wp_enqueue_script(
        'slick-js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        ['jquery'],
        '1.8.1',
        true
    );

    // PHOTOSWIPE JS (UMD)
    wp_enqueue_script(
        'photoswipe',
        get_theme_file_uri('/assets/vendor/photoswipe/photoswipe.umd.min.js'),
        [],
        '5.4.4',
        true
    );

    wp_enqueue_script(
        'photoswipe-lightbox',
        get_theme_file_uri('/assets/vendor/photoswipe/photoswipe-lightbox.umd.min.js'),
        ['photoswipe'],
        '5.4.4',
        true
    );

    // CAROUSEL JS
    wp_enqueue_script(
        'carousel-js',
        get_theme_file_uri('/assets/js/carousel.js'),
        ['jquery', 'slick-js'],
        filemtime(get_theme_file_path('/assets/js/carousel.js')),
        true
    );

    // GALLERY JS
    wp_enqueue_script(
        'gallery-js',
        get_theme_file_uri('/assets/js/gallery.js'),
        ['jquery', 'photoswipe-lightbox'],
        filemtime(get_theme_file_path('/assets/js/gallery.js')),
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
