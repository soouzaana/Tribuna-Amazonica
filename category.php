<?php
get_header();
?>

<main class="flex-1">
  <div class="min-h-screen bg-gray-50">

    <?php get_template_part('template-parts/news/hero'); ?>

    <div class="max-w-7xl mx-auto px-4 py-12">

      <?php get_template_part('template-parts/news/filters'); ?>

      <?php if (have_posts()) : ?>

        <?php get_template_part('template-parts/news/grid'); ?>

        <div class="mt-12">
          <?php the_posts_pagination(); ?>
        </div>

      <?php else : ?>

        <?php get_template_part('template-parts/news/empty'); ?>

      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>