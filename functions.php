<?php
// Enqueue styles and scripts
function conversion10x_enqueue_assets() {
    wp_enqueue_style('conversion10x-style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'conversion10x_enqueue_assets');

// Theme setup
function conversion10x_setup() {
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 40,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'conversion10x'),
    ));
}
add_action('after_setup_theme', 'conversion10x_setup');

// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Clean up WordPress head
function conversion10x_clean_head() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'conversion10x_clean_head');
?>