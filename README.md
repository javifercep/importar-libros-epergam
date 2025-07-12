# Importar Libros Destacados ePèrgam

This WordPress plugin automatically scrapes and imports the weekly featured books ("Recomanats") from the Catalan school library portal [ePèrgam](https://aplicacions.gestioeducativa.gencat.cat/epergam/web/biblioteca.jsp?codi=08041179).

## Features

- ✅ Registers a custom post type `libro` for books.
- ✅ Weekly automated scraping of featured books.
- ✅ Downloads and sets book cover images as featured images.
- ✅ Marks imported books as "featured" with metadata.
- ✅ Includes a responsive Swiper.js carousel via `[carrusel_libros]` shortcode.
- ✅ Resets previously featured books each week.
- ✅ Includes manual trigger for admins via URL.

## Installation

1. Upload the plugin to the `wp-content/plugins` directory.
2. Activate it from the WordPress admin panel.
3. Place the shortcode `[carrusel_libros]` on any page or post.

## Manual Import Trigger

Access this URL (as admin) to force immediate import:

```
https://yourdomain.com/wp-admin/?forzar_importar_libros
```

## AI-Generated Notice

This plugin's code was significantly assisted and partially generated using OpenAI's ChatGPT. Manual review and adaptation were performed to ensure it meets WordPress standards and the specific use case.

## License

MIT License – free to use, modify, and distribute.
