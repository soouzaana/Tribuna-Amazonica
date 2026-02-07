<?php
get_header();
?>

<main class="flex-1 bg-gray-50 min-h-screen">

  <?php get_template_part('template-parts/columnist/breadcrumb'); ?>
  <?php get_template_part('template-parts/columnist/hero'); ?>

  <div class="max-w-7xl mx-auto px-4 py-12">
    <?php get_template_part('template-parts/columnist/articles'); ?>
  </div>

</main>

<?php get_footer(); ?>