<?php
/**
 * Plugin Name: Odinaka Portfolio Post types
 * Plugin URI:
 * Description: This plugin creates Portfolio custom post type.
 * Version: 1.0
 * Author: Uchechukwu Peter
 * Author URI:
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register Portfolio Post Type
function register_portfolio_post_type() {
    $labels = array(
        'name'               => _x('Portfolios', 'Post Type General Name', 'portfolio-plugin'),
        'singular_name'      => _x('Portfolio', 'Post Type Singular Name', 'portfolio-plugin'),
        'menu_name'          => __('Portfolios', 'portfolio-plugin'),
        'parent_item_colon'  => __('Parent Portfolio', 'portfolio-plugin'),
        'all_items'          => __('All Portfolios', 'portfolio-plugin'),
        'view_item'          => __('View Portfolio', 'portfolio-plugin'),
        'add_new_item'       => __('Add New Portfolio', 'portfolio-plugin'),
        'add_new'            => __('Add New', 'portfolio-plugin'),
        'edit_item'          => __('Edit Portfolio', 'portfolio-plugin'),
        'update_item'        => __('Update Portfolio', 'portfolio-plugin'),
        'search_items'       => __('Search Portfolio', 'portfolio-plugin'),
        'not_found'          => __('Not Found', 'portfolio-plugin'),
        'not_found_in_trash' => __('Not Found in Trash', 'portfolio-plugin'),
    );

    $args = array(
        'label'              => __('portfolios', 'portfolio-plugin'),
        'description'        => __('Portfolio custom post type', 'portfolio-plugin'),
        'labels'             => $labels,
        'supports'           => array('title', 'editor', 'thumbnail', 'revisions'),
        'taxonomies'         => array('category', 'post_tag'),
        'hierarchical'       => false,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => true,
        'can_export'         => true,
        'has_archive'        => true,
        'exclude_from_search'=> false,
        'publicly_queryable' => true,
        'capability_type'    => 'post',
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'register_portfolio_post_type', 0);

// Activate Plugin
function portfolio_plugin_activate() {
    // Trigger our function that registers the custom post type
    register_portfolio_post_type();
    // Clear the permalinks
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'portfolio_plugin_activate');

// Deactivate Plugin
function portfolio_plugin_deactivate() {
    // Unregister the post type
    unregister_post_type('portfolio');
    // Clear the permalinks
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'portfolio_plugin_deactivate');
