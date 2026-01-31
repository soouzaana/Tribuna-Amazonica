<?php
// Query para colunistas
$colunists = new WP_Query([
  'post_type'      => 'colunistas', // CPT correto
  'posts_per_page' => 6,
  'post_status'    => 'publish',
]);

?>

<section>
  <div>
    <div class="flex justify-between items-baseline mb-4">
      <h2 class="section-title">Colunistas</h2>
      <a href="<?php echo esc_url(get_post_type_archive_link('colunistas')); ?>" class="section-link">
        Ver todos
        <span class="arrow-icon">→</span>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-4 pt-3">
      <?php if ($colunists->have_posts()) : ?>
        <?php while ($colunists->have_posts()) : $colunists->the_post(); ?>
          <?php get_template_part('template-parts/colunist-card'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>