<?php
function equipment_post_type()
{
    register_post_type('equipment', array(
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'equipment'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Equipments',
            'all_items' => 'All Equipments',
            'add_new_item' => 'Add New',
            'edit_item' => 'Edit',
            'singular_name' => 'Equipment',
        ),
        'menu_icon' => 'dashicons-awards',
    ));
}
add_action('init', 'equipment_post_type');

function equipment_sports_taxonomy()
{
    register_taxonomy('sports', 'equipment', array(
        'label' => 'Sports',
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'sports'),
    ));
}
add_action('init', 'equipment_sports_taxonomy');
