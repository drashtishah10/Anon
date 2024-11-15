<?php
/*
Plugin Name: Free Range Code Challenge
Description: A plugin to add a custom Gutenberg block for displaying books with filtering options.
Version: 1.0
Author: Drashti Shah
*/

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Include Custom Post Type and Custom Taxonomy setup
require_once plugin_dir_path(__FILE__) . 'includes/cpt-books.php';

//registers the Gutenberg block
function register_acf_book_listing_block() {
    acf_register_block_type(array(
        'name'              => 'book-listing',
        'title'             => __('Book Listing'),
        'description'       => __('A custom block to display a list of books with filtering options.'),
        'render_callback'   => 'render_book_listing_block',
        'category'          => 'formatting',
        'icon'              => 'book',
        'keywords'          => array('book', 'listing', 'filter'),
        'supports'          => array('align' => true),
    ));
}
add_action('acf/init', 'register_acf_book_listing_block');

function render_book_listing_block($block) {
    // Block render template
    include plugin_dir_path(__FILE__) . 'templates/block-book-listing.php';
}

function enqueue_book_listing_assets() {
    if (has_block('acf/book-listing')) {
        wp_enqueue_style('book-listing-css', plugin_dir_url(__FILE__) . 'assets/css/book-listing.css');
        wp_enqueue_script('book-listing-js', plugin_dir_url(__FILE__) . 'assets/js/book-listing.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_book_listing_assets');


