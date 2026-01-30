<?php
function location_post_type()
{
    register_post_type('location', array(
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'location'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Location',
            'add_new_item' => 'Add New Location',
            'edit_item' => 'Edit Location',
            'all_items' => 'All Locations',
            'singular_name' => 'Location',
        ),
        'menu_icon' => 'dashicons-location',
    ));
}
add_action('init', 'location_post_type');
