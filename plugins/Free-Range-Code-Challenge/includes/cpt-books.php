<?php
// Register Custom Post Type Books
function register_books_post_type() {
    register_post_type('book', array(
        'label' => 'Books',
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_books_post_type');

// Register Custom Taxonomy for Book Category
function register_book_category_taxonomy() {
    register_taxonomy('book_category', 'book', array(
        'label' => 'Book Category',
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_book_category_taxonomy');
