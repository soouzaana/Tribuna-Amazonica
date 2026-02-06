<?php

/**
 * Related Posts Section
 * Espera receber em $args:
 * - post_id (int)
 */

$post_id = $args['post_id'] ?? null;
if (!$post_id) return;

// categorias do post (ignora Uncategorized)
$categories = array_filter(
  get_the_category($post_id),
  fn($cat) => $cat->slug !== 'uncategorized'
);

if (!$categories) return;

$category_ids = wp_list_pluck($categories, 'term_id');

$related_query = new WP_Query([
  'post_type'           => 'post',
  'posts_per_page'      => 3,
  'post__not_in'        => [$post_id],
  'category__in'        => $category_ids,
  'ignore_sticky_posts' => true,
  'no_found_rows'       => true,
]);

if (!$related_query->have_posts()) return;
?>

<section class="max-w-6xl mx-auto mb-12">
  <h2 class="text-2xl font-bold text-gray-900 mb-6 relative">
    Artigos Relacionados
    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-emerald-600 rounded-full"></span>
  </h2>

  <?php
  get_template_part('template-parts/layouts/layout-grid', null, [
    'query' => $related_query,
    'cols'  => 'sm:grid-cols-2 lg:grid-cols-3'
  ]);
  ?>
</section>