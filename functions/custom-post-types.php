<?php

// Teachers
/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 $singular = 'Teacher';
 $plural = 'Teachers';
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( $plural, 'Post Type General Name' ),
            'singular_name'       => _x( $singular, 'Post Type Singular Name' ),
            'menu_name'           => __( $plural ),
            'parent_item_colon'   => __( 'Parent '. $singular ),
            'all_items'           => __( 'All '. $plural ),
            'view_item'           => __( 'View '.$singular ),
            'add_new_item'        => __( 'Add New '. $singular ),
            'add_new'             => __( 'Add New' ),
            'edit_item'           => __( 'Edit '.$singular ),
            'update_item'         => __( 'Update '. $singular ),
            'search_items'        => __( 'Search '. $singular ),
            'not_found'           => __( 'Not Found' ),
            'not_found_in_trash'  => __( 'Not found in Trash' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( $plural ),
            'description'         => __( $singular . ' Profiles' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            // 'taxonomies'          => array( 'classes' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_icon'           => 'dashicons-id-alt',
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
         
        // Registering your Custom Post Type
        register_post_type( $plural, $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );