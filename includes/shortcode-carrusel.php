<?php
add_shortcode('carrusel_libros', function () {
    $libros = new WP_Query([
        'post_type'  => 'libro',
        'meta_key'   => '_es_destacado',
        'meta_value' => '1',
        'posts_per_page' => -1,
    ]);
    if (!$libros->have_posts()) return '<p>No hay libros destacados.</p>';
    ob_start(); ?>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php while ($libros->have_posts()) : $libros->the_post(); ?>
                <div class="swiper-slide">
                    <div class="libro-slide">
                        <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <?php wp_reset_postdata();
    return ob_get_clean();
});
