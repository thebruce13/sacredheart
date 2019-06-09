<?php

// Function that outputs the contents of the dashboard widget
function dashboard_contact_widget( $post, $callback_args ) {
    ?>
    <h2>Address</h2>
<form class="dashboard-form">
  <label>Street Address
      <input type="text" />
</label>   
<label>City
    <input type="text">
</label>
<label>State
    <input type="text">
</label>
<label>Zip
    <input type="text">
</label>
<h2>Phone</h2>
<label>Phone
    <input type="text">
</label>
<input class="page-title-action button" type="submit" value="Save" />
</form>
    <?php 
}

function dashboard_social_widget( $post, $callback_args ) {
    ?>
<form class="dashboard-form">
  <label>Facebook Link
      <input type="text" />
</label>   
<label>Twitter Link
    <input type="text">
</label>
<label>Instagram Link
    <input type="text">
</label>
<label>Pinterest Link
    <input type="text">
</label>
<input class="page-title-action button" type="submit" value="Save" />
</form>
    <?php
}

// Function used in the action hook
function add_dashboard_widgets() {
    wp_add_dashboard_widget( 'contact_widget', 'Contact Information', 'dashboard_contact_widget' );
    wp_add_dashboard_widget( 'social_widget', 'Social Information', 'dashboard_social_widget' );
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action( 'wp_dashboard_setup', 'add_dashboard_widgets' );