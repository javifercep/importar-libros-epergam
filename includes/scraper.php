<?php
function ile_resetear_destacados_anteriores() {
    $destacados = get_posts([
        'post_type'  => 'libro',
        'meta_key'   => '_es_destacado',
        'meta_value' => '1',
        'numberposts' => -1,
    ]);
    foreach ($destacados as $post) {
        delete_post_meta($post->ID, '_es_destacado');
    }
}

function ile_importar_libros_destacados() {
    ile_resetear_destacados_anteriores();

    $url = 'https://aplicacions.gestioeducativa.gencat.cat/epergam/web/biblioteca.jsp?codi=08041179';
    $response = wp_remote_get($url);
    if (is_wp_error($response)) return;

    $html = wp_remote_retrieve_body($response);
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);

    $rows = $xpath->query("//table[@class='tabla_listado2']//a[@class='enlace_n']");
    foreach ($rows as $link) {
        $titulo = trim($link->nodeValue);
        $img = $xpath->evaluate(".//img[@name='foto']", $link->parentNode->parentNode)->item(0);
        $src = $img?->getAttribute('src');
        $imagen_url = $src && str_startswith($src, '/') ? 'https://aplicacions.gestioeducativa.gencat.cat' . $src : $src;

        if (!$titulo) continue;
        $existing = get_page_by_title($titulo, OBJECT, 'libro');
        if (!$existing) {
            $post_id = wp_insert_post([
                'post_title'   => $titulo,
                'post_type'    => 'libro',
                'post_status'  => 'publish',
                'post_content' => '',
            ]);
            update_post_meta($post_id, '_es_destacado', '1');
            if ($imagen_url && $post_id) {
                ile_asignar_imagen_destacada($imagen_url, $post_id);
            }
        }
    }
}

function ile_asignar_imagen_destacada($url, $post_id) {
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    $tmp = download_url($url);
    if (is_wp_error($tmp)) return;
    $file_array = ['name' => basename($url), 'tmp_name' => $tmp];
    $id = media_handle_sideload($file_array, $post_id);
    if (!is_wp_error($id)) {
        set_post_thumbnail($post_id, $id);
    }
}
