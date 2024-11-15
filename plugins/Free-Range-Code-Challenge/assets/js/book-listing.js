jQuery(document).ready(function ($) {
    const searchInput = $('#book-search');
    const categoryFilter = $('#book-category-filter');
    const cards = $('.book-card');

    function filterBooks() {
        const searchTerm = searchInput.val().toLowerCase();
        const selectedCategory = categoryFilter.val();

        cards.each(function () {
            const card = $(this);
            const title = card.find('h3').text().toLowerCase();
            const description = card.find('p').text().toLowerCase();
            const categories = card.data('category');

            const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
            const matchesCategory = selectedCategory === '' || categories.includes(selectedCategory);

            card.toggle(matchesSearch && matchesCategory);
        });
    }

    searchInput.on('input', filterBooks);
    categoryFilter.on('change', filterBooks);
});
