<?php
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
    include plugin_dir_path(__FILE__) . '../templates/block-book-listing.php';
}
