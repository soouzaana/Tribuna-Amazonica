<?php
add_action('after_setup_theme', function () {
  register_nav_menus([
    'menu-principal' => 'Menu Principal'
  ]);

  add_theme_support('post-thumbnails');
});

add_filter('upload_mimes', function ($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
});
