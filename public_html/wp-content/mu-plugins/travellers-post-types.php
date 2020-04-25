<?php 
function travellers_post_types(){
        register_post_type('tours',array(
            'supports' => array('title', 'editor','excerpt', 'thumbnail'),
            'rewrite'=> array('slug' => 'tours' ),
            'has_archive' => true,
            'public' => true, 
            'labels' => array(
                'name' => "Tours",
                'add_new_item' => 'Add New Tour',
                'edit_item' => 'Edit Tour',
                'all_items' => 'All Tours',
                'singular_name' => "Tour"
            ),
            'menu_icon' => 'dashicons-calendar'
        ));
        register_post_type('experiences',array(
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite'=> array('slug' => 'experiences' ),
            'has_archive' => true,
            'public' => true, 
            'labels' => array(
                'name' => "Experiences",
                'add_new_item' => 'Add New Experiences',
                'edit_item' => 'Edit Experiences',
                'all_items' => 'All Experiences',
                'singular_name' => "Experiences"
            ),
            'menu_icon' => 'dashicons-format-status'
        ));
}
 add_action('init', 'travellers_post_types');
?>