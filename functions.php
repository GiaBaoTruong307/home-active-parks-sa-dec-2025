<?php
define('THEME_VERSION', '1.0.2');

require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/cpt/equipment.php';
require get_template_directory() . '/inc/cpt/location.php';
require get_template_directory() . '/inc/elementor/elementor.php';
