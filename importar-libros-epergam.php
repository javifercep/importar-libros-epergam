<?php
/*
Plugin Name: Importar Libros Destacados ePèrgam
Description: Importa libros destacados desde ePèrgam y los muestra en un carrusel.
Version: 1.1
Author: Javier Fernández
*/

defined('ABSPATH') || exit;

require_once plugin_dir_path(__FILE__) . 'includes/cpt-libro.php';
require_once plugin_dir_path(__FILE__) . 'includes/scraper.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode-carrusel.php';
require_once plugin_dir_path(__FILE__) . 'includes/assets.php';
require_once plugin_dir_path(__FILE__) . 'includes/cron.php';
