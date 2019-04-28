<?php
/**
 * Requiring assets to be used on the website
 * 
 */
wp_enqueue_style ('app', get_template_directory_uri().'/css/app.css');
// wp_enqueue_style( $handle, $src, $deps, $ver, $media );

// Update CSS within in Admin
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
  }
  add_action('admin_enqueue_scripts', 'admin_style');