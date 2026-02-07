<section class="mt-12">

  <h2 class="text-2xl font-bold mb-6">
    Artigos de <?php echo esc_html(get_the_author()); ?>
  </h2>

  <?php if (have_posts()): ?>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

      <?php while (have_posts()): the_post(); ?>
        <?php get_template_part('template-parts/news-card'); ?>
      <?php endwhile; ?>

    </div>

    <?php the_posts_pagination([
      'mid_size'  => 2,
      'prev_text' => '← Anterior',
      'next_text' => 'Próxima →',
    ]); ?>

  <?php else: ?>
    <p class="text-gray-500">
      Este colunista ainda não publicou artigos.
    </p>
  <?php endif; ?>

</section>