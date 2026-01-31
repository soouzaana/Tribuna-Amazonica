<?php
if (!defined('ABSPATH')) exit;

function permitir_svg_upload($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'permitir_svg_upload');

/* SETUP DO TEMA */
function tema_setup()
{
  register_nav_menus([
    'menu-principal' => 'Menu Principal'
  ]);

  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'tema_setup');

/* ASSETS */
function meu_tema_assets()
{
  /* ===== VITE ===== */
  $dist_path = get_template_directory() . '/assets/dist';
  $dist_uri  = get_template_directory_uri() . '/assets/dist';

  $manifest_path = $dist_path . '/.vite/manifest.json';
  if (file_exists($manifest_path)) {
    $manifest = json_decode(file_get_contents($manifest_path), true);
    $entry = 'assets/src/js/main.js';

    if (isset($manifest[$entry])) {
      $entry_data = $manifest[$entry];

      wp_enqueue_script(
        'meu-tema-js',
        $dist_uri . '/' . $entry_data['file'],
        [],
        null,
        true
      );

      if (!empty($entry_data['css'])) {
        foreach ($entry_data['css'] as $i => $css_file) {
          wp_enqueue_style(
            'meu-tema-style-' . $i,
            $dist_uri . '/' . $css_file,
            [],
            null
          );
        }
      }
    }
  }

  /* ===== HEADER CSS ===== */
  wp_enqueue_style(
    'meu-tema-header',
    get_template_directory_uri() . '/assets/src/css/header.css',
    [],
    '1.0'
  );

  /* ===== FEATURED CSS ===== */
  wp_enqueue_style(
    'meu-tema-featured',
    get_template_directory_uri() . '/assets/src/css/featured.css',
    [],
    '1.0'
  );

  /* ===== HOME SECTION CSS ===== */
  wp_enqueue_style(
    'meu-tema-home-section',
    get_template_directory_uri() . '/assets/src/css/home-section.css',
    [],
    filemtime(get_template_directory() . '/assets/src/css/home-section.css')
  );

  wp_enqueue_style(
    'meu-tema-news-card',
    get_template_directory_uri() . '/assets/src/css/news-card.css',
    [],
    filemtime(get_template_directory() . '/assets/src/css/news-card.css')
  );

  wp_enqueue_style(
    'meu-tema-editor-pick',
    get_template_directory_uri() . '/assets/src/css/editor-pick.css',
    [],
    filemtime(get_template_directory() . '/assets/src/css/editor-pick.css')
  );

  /* ===== LAW CSS ===== */
  wp_enqueue_style(
    'meu-tema-law',
    get_template_directory_uri() . '/assets/src/css/law.css',
    [],
    filemtime(get_template_directory() . '/assets/src/css/law.css')
  );

  require get_template_directory() . '/inc/icons.php';
}

add_action('wp_enqueue_scripts', 'meu_tema_assets');
