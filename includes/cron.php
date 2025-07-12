<?php
add_action('wp', function () {
    if (!wp_next_scheduled('ile_cron_importar_libros')) {
        wp_schedule_event(time(), 'weekly', 'ile_cron_importar_libros');
    }
});

add_action('ile_cron_importar_libros', 'ile_importar_libros_destacados');

add_action('admin_init', function () {
    if (current_user_can('administrator') && isset($_GET['forzar_importar_libros'])) {
        ile_importar_libros_destacados();
        echo '<div style="padding:20px;font-family:sans-serif">✅ Importación forzada completada.</div>';
        exit;
    }
});
