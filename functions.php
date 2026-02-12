<?php
define('THEME_VERSION', '1.0.1');

require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/cpt/equipment.php';
require get_template_directory() . '/inc/cpt/location.php';

// Register Elementor Widget    
function register_benefit_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/benefit-widget.php'); // Include the Benefit_Widget class file
    $widgets_manager->register(new \Benefit_Widget()); // Register the Benefit_Widget class 
}
add_action('elementor/widgets/register', 'register_benefit_widget');
