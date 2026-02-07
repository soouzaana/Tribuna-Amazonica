<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

  <?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('template-parts/news-card'); ?>

  <?php endwhile; ?>

</div>