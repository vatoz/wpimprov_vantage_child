<?php

/**
 * Enqueue the parent theme stylesheet.
 */

function wpimprov_vantage_child_enqueue_parent_style() {
    wp_enqueue_style( 'vantage-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpimprov_vantage_child_enqueue_parent_style', 8 );