<?php

/**
 * Layout: Grid
 * Espera receber:
 * - WP_Query em $args['query']
 * - colunas opcionais em $args['cols']
 */

$query = $args['query'] ?? null;
$cols  = $args['cols'] ?? 'sm:grid-cols-2 lg:grid-cols-3';

if (!$query || !$query->have_posts()) {
  return;
}
?>

<div class="grid gap-6 <?php echo esc_attr($cols); ?>">
  <?php
  while ($query->have_posts()) :
    $query->the_post();

    // Card unitário (modelo NewsCard)
    get_template_part('template-parts/news-card');

  endwhile;

  wp_reset_postdata();
  ?>
</div>