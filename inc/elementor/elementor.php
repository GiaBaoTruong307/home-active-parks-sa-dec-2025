<?php

// Register Feature Service Widget  
function register_feature_service_widget($widgets_manager)
{
    require_once(get_template_directory() . '/inc/elementor/widgets/feature-service-widget.php');
    $widgets_manager->register(new \Feature_Service_Widget());
}
add_action('elementor/widgets/register', 'register_feature_service_widget');

// Register Elementor Widget Scripts
function register_elementor_widget_scripts()
{
    wp_register_script(
        'feature-service-widget-js',
        get_template_directory_uri() . '/inc/elementor/asset/js/feature-service-widget.js',
        ['jquery', 'slick-js'],
        THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'register_elementor_widget_scripts');

// Register Benefit Widget  
function register_benefit_widget($widgets_manager)
{
    require_once(get_template_directory() . '/inc/elementor/widgets/benefit-widget.php');
    $widgets_manager->register(new \Benefit_Widget());
}
add_action('elementor/widgets/register', 'register_benefit_widget');
