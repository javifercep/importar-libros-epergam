<?php
add_action('init', function () {
    register_post_type('libro', [
        'label' => 'Libros',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'libros'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-book-alt',
    ]);
});
