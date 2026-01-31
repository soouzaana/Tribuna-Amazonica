<?php
// Query de Opinião e Doutrina
$opinion_query = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => 4,
  'category_name'  => 'opiniao,doutrine', // ajuste para o slug correto
]);
?>

<section>
  <div>
    <div class="flex justify-between items-baseline">
      <h2 class="section-title">Opinião e Doutrina</h2>

      <span class="section-link">
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="section-link">
          Ver todos
          <span class="arrow-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </span>
        </a>
      </span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4 pt-3">
      <?php if ($opinion_query->have_posts()) : ?>
        <?php while ($opinion_query->have_posts()) : $opinion_query->the_post(); ?>
          <?php get_template_part('template-parts/editor-pick-item'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>