<?php
// Get custom field values for title and description
$title = get_field('title') ?: 'Our Book Collection';
$description = get_field('description') ?: 'Browse through our available books below.';

// Fetch all book posts
$books = new WP_Query(array(
    'post_type' => 'book',
    'posts_per_page' => -1,
));

// Fetch all book categories
$categories = get_terms(array('taxonomy' => 'book_category'));
?>

<div class="book-listing-block">
    <h2><?php echo esc_html($title); ?></h2>
    <p><?php echo esc_html($description); ?></p>

    <!-- Filters Section -->
    <div class="filters">
        <div class="category-filter">
            <label for="book-category-filter">Filter by Category:</label>
            <select id="book-category-filter">
                <option value="">All Categories</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="search-filter">
            <label for="book-search">Search:</label>
            <input type="text" id="book-search" placeholder="Search by title or description">
        </div>
    </div>

    <!-- Book Cards Section -->
    <div class="book-listing-cards">
        <?php while ($books->have_posts()): $books->the_post(); ?>
            <div class="book-card" data-category="<?php echo esc_attr(implode(' ', wp_get_post_terms(get_the_ID(), 'book_category', array('fields' => 'slugs')))); ?>">
                <h3><?php the_title(); ?></h3>
                <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                <span class="book-category"><?php echo esc_html(implode(', ', wp_list_pluck(get_the_terms(get_the_ID(), 'book_category'), 'name'))); ?></span>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>
