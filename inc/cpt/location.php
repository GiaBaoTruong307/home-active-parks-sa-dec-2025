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
            'name' => 'Locations',
            'all_items' => 'All Locations',
            'add_new_item' => 'Add New',
            'edit_item' => 'Edit',
            'singular_name' => 'Location',
        ),
        'menu_icon' => 'dashicons-location',
    ));
}
add_action('init', 'location_post_type');


function location_amenities_taxonomy()
{
    register_taxonomy('amenities', 'location', array(
        'label' => 'Amenities',
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'amenities'),
    ));
}
add_action('init', 'location_amenities_taxonomy');
