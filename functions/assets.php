<?php
// Update CSS on pages
function enqueue_scripts(){
  wp_enqueue_style ('app', get_template_directory_uri().'/css/app.css');  
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts');

// Update CSS within in Admin
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
  }
  add_action('admin_enqueue_scripts', 'admin_style');