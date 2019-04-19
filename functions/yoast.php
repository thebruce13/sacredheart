<?php 
// Move Yoast to bottom
function wpcover_move_yoast() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'wpcover_move_yoast');