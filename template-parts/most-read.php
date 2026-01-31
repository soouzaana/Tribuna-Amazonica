<?php
// meta key usada para contar visualizações
$views_meta_key = 'post_views_count';

// 1️⃣ Verifica se existe ao menos UM post com views > 0
$has_views = new WP_Query([
  'posts_per_page' => 1,
  'post_status'    => 'publish',
  'meta_query'     => [
    [
      'key'     => $views_meta_key,
      'value'   => 0,
      'compare' => '>',
      'type'    => 'NUMERIC',
    ],
  ],
]);

// 2️⃣ Define argumentos da query principal
$args = [
  'posts_per_page' => 4,
  'post_status'    => 'publish',
];

if ($has_views->have_posts()) {
  // 🔥 Ordena por mais lidas
  $args['meta_key'] = $views_meta_key;
  $args['orderby']  = 'meta_value_num';
  $args['order']    = 'DESC';
} else {
  // 🆘 Fallback: últimos publicados
  $args['orderby'] = 'date';
  $args['order']   = 'DESC';
}

wp_reset_postdata();

// 3️⃣ Query final
$most_read = new WP_Query($args);
?>

<section>
  <div>
    <div class="flex justify-between items-baseline mb-4">
      <h2 class="section-title">Mais Lidas</h2>

      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="section-link">
        Ver todos
        <span class="arrow-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </span>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4 pt-3">
      <?php if ($most_read->have_posts()) : ?>
        <?php while ($most_read->have_posts()) : $most_read->the_post(); ?>
          <?php get_template_part('template-parts/editor-pick-item'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>