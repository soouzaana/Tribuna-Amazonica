<?php

/**
 * Featured – apenas lógica de seleção
 */

// 1. Meta destaque
$featured_query = new WP_Query([
  'posts_per_page' => 1,
  'post_status'    => 'publish',
  'meta_key'       => 'destaque',
  'meta_value'     => '1',
]);

// 2. Tag destaque
if (!$featured_query->have_posts()) {
  $featured_query = new WP_Query([
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'tag'            => 'destaque',
  ]);
}

// 3. Fallback: último post
if (!$featured_query->have_posts()) {
  $featured_query = new WP_Query([
    'posts_per_page' => 1,
    'post_status'    => 'publish',
  ]);
}

// Verifica se tem posts e carrega o layout
if ($featured_query->have_posts()) {
  get_template_part(
    'template-parts/layouts/layout-destaque',
    null,
    ['query' => $featured_query]
  );
}
