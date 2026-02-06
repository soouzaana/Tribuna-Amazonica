<?php
get_header();

while (have_posts()) : the_post();
?>

  <main class="flex-1">
    <div class="min-h-screen bg-gray-50">

      <?php get_template_part('template-parts/columnist/breadcrumb'); ?>
      <?php get_template_part('template-parts/columnist/hero'); ?>

      <div class="max-w-7xl mx-auto px-4 py-12">
        <?php get_template_part('template-parts/columnist/articles'); ?>
        <?php get_template_part('template-parts/columnist/cta'); ?>
      </div>

    </div>
  </main>

<?php endwhile; ?>

<?php get_footer(); ?>