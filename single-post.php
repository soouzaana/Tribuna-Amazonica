<?php
get_header();
?>

<main class="flex-1">
  <div class="min-h-screen bg-gray-50">

    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('template-parts/single/breadcrumb'); ?>

      <article class="max-w-4xl mx-auto px-4 py-8">

        <?php get_template_part('template-parts/single/header'); ?>

        <?php get_template_part('template-parts/single/featured'); ?>

        <?php get_template_part('template-parts/single/lead'); ?>

        <?php get_template_part('template-parts/single/content'); ?>

        <?php get_template_part('template-parts/single/related', null, [
          'post_id' => get_the_ID()
        ]);
        ?>

      </article>

    <?php endwhile; ?>

  </div>
</main>

<?php get_footer(); ?>