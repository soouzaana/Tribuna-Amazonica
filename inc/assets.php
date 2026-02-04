<?php
add_action('wp_enqueue_scripts', function () {

  /**
   * ===== VITE =====
   */
  $dist_path = get_template_directory() . '/assets/dist';
  $dist_uri  = get_template_directory_uri() . '/assets/dist';
  $manifest  = $dist_path . '/.vite/manifest.json';

  if (file_exists($manifest)) {
    $data = json_decode(file_get_contents($manifest), true);
    $entry = 'assets/src/js/main.js';

    if (isset($data[$entry])) {
      wp_enqueue_script(
        'theme-js',
        $dist_uri . '/' . $data[$entry]['file'],
        [],
        null,
        true
      );

      foreach ($data[$entry]['css'] ?? [] as $i => $css) {
        wp_enqueue_style(
          "theme-vite-$i",
          $dist_uri . '/' . $css,
          [],
          null
        );
      }
    }
  }

  /**
   * ===== CSS MANUAL =====
   */
  $styles = [
    'header',
    'section-title',
    'featured',
    'home-section',
    'news-card',
    'editor-pick',
    'law',
    'newsletter',
    'section-videos'
  ];

  foreach ($styles as $style) {
    $path = "/assets/src/css/$style.css";
    wp_enqueue_style(
      "theme-$style",
      get_template_directory_uri() . $path,
      [],
      filemtime(get_template_directory() . $path)
    );
  }
});
