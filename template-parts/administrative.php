<?php
// Query de Direito Administrativo
$admin_query = new WP_Query([
  'posts_per_page' => 4,
  'category_name'  => 'direito-administrativo',
]);

if ($admin_query->have_posts()) :
?>

  <section class="space-y-6">
    <div>
      <div class="flex justify-between items-baseline">
        <h2 class="section-title">Direito Administrativo</h2>

        <?php
        $category = get_category_by_slug('direito-administrativo');
        $category_link = $category ? get_category_link($category->term_id) : '#';
        ?>
        <a href="<?php echo esc_url($category_link); ?>" class="section-link">
          Ver todos →
        </a>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php while ($admin_query->have_posts()) : $admin_query->the_post(); ?>
          <?php get_template_part('template-parts/news-card'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

<?php endif; ?>