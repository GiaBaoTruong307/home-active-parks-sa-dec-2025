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
            'name' => 'Equipment',
            'add_new_item' => 'Add New Equipment',
            'edit_item' => 'Edit Equipment',
            'all_items' => 'All Equipment',
            'singular_name' => 'Equipment',
        ),
        'menu_icon' => 'dashicons-universal-access',
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
