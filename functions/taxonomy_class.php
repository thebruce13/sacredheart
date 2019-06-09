<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_subject_taxonomy', 0 );
add_action( 'init', 'create_class_taxonomy', 0 );

function create_subject_taxonomy() {
    // Add new taxonomy, make it hierarchical (like categories)
    $singular = 'Subject';
    $plural = 'Subjects';

	$labels = array(
		'name'              => _x( $plural, 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( $singular, 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search ' . $plural, 'textdomain' ),
		'all_items'         => __( 'All ' . $plural, 'textdomain' ),
		'parent_item'       => __( 'Parent ' . $singular, 'textdomain' ),
		'parent_item_colon' => __( 'Parent '. $singular .':', 'textdomain' ),
		'edit_item'         => __( 'Edit ' . $singular, 'textdomain' ),
		'update_item'       => __( 'Update ' . $singular, 'textdomain' ),
		'add_new_item'      => __( 'Add New ' . $singular, 'textdomain' ),
		'new_item_name'     => __( 'New '. $singular . ' Name', 'textdomain' ),
		'menu_name'         => __( $singular, 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => strtolower($singular) ),
	);

	register_taxonomy(  strtolower($singular) , array( 'teacher' ), $args );
}

function create_class_taxonomy() {
    // Add new taxonomy, NOT hierarchical (like tags)
    $singular = 'Class';
    $plural = 'Classes';

	$labels = array(
		'name'              => _x( $plural, 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( $singular, 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search ' . $plural, 'textdomain' ),
		'all_items'         => __( 'All ' . $plural, 'textdomain' ),
		'parent_item'       => __( 'Parent ' . $singular, 'textdomain' ),
		'parent_item_colon' => __( 'Parent '. $singular .':', 'textdomain' ),
		'edit_item'         => __( 'Edit ' . $singular, 'textdomain' ),
		'update_item'       => __( 'Update ' . $singular, 'textdomain' ),
		'add_new_item'      => __( 'Add New ' . $singular, 'textdomain' ),
		'new_item_name'     => __( 'New '. $singular . ' Name', 'textdomain' ),
		'menu_name'         => __( $singular, 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => strtolower($singular) ),
	);

    register_taxonomy( strtolower($singular), array( 'teacher' ), $args );
    
}
?>