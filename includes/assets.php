<?php
add_action('wp_enqueue_scripts', function () {
    if (is_singular() && has_shortcode(get_post()->post_content, 'carrusel_libros')) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], false, true);
        wp_add_inline_script('swiper-js', "
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.mySwiper', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    navigation: {
                      nextEl: '.swiper-button-next',
                      prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                      el: '.swiper-pagination',
                      clickable: true,
                    },
                    breakpoints: {
                        640: { slidesPerView: 2 },
                        768: { slidesPerView: 3 },
                        1024: { slidesPerView: 4 },
                    }
                });
            });
        ");
        wp_add_inline_style('swiper-css', "
            .libro-slide {
                text-align: center;
                padding: 10px;
            }
            .libro-slide img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            .libro-slide h3 {
                font-size: 14px;
                margin-top: 8px;
                color: #333;
                line-height: 1.3;
                font-weight: 500;
            }
        ");
    }
});
