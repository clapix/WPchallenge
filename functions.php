<?php


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
// add_filter ('the_title', 'filter_example');


function filter_example($title) {
	return 'Hooked: '.$title;
}


function theme_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Set up a Custom Post Type for case studies
// Define naming
function create_custom_post_type_case_studies(){
	$labels = array(
		'name' => 'Case Studies', 
		'singular_name' => 'Case Study',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Case Study',
		'edit_item' => 'Edit Case Study',
		'new_item' => 'New Case Study',
		'view_item' => 'View Case Study',
		'search_items' => 'Search Case Studies',
		'not_found' => 'No case studies found',
		'not_found_in_trash' => 'No case studies found in Trash',
		'parent_item_colon' => '',
    );
    // Define options
	$args = array(
		'label' => __('Case Studies'),
		'labels' => $labels, // from array above
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-case_studies', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "case_studies" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'event_category', 'post_tag') // own categories
	);
	register_post_type('case_studies', $args);
}

// Create the action hook
add_action('init','create_custom_post_type_case_studies'); // define event custom post type


