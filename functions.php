<?php

/**
 * Enqueue the parent theme stylesheet.
 */

function wpimprov_vantage_child_enqueue_parent_style() {
    wp_enqueue_style( 'vantage-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpimprov_vantage_child_enqueue_parent_style', 8 );

// Load translation files from your child theme instead of the parent theme
function wpimprov_vantage_child_locale() {
    load_child_theme_textdomain( 'vantage', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wpimprov_vantage_child_locale' );

set_post_thumbnail_size(800,600,false);
add_image_size('vantage-thumbnail-no-sidebar', 1080,500, false);
add_image_size('vantage-thumbnail', 800,600, false);