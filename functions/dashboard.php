<?php

// Function that outputs the contents of the dashboard widget
function dashboard_widget_function( $post, $callback_args ) {
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
<input type="submit" value="Save" />
</form>
<h2>Social</h2>
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
<input type="submit" value="Save" />
</form>
    <?php 
}

// Function used in the action hook
function add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'Contact Information', 'dashboard_widget_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );