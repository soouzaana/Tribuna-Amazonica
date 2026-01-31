<?php get_header(); ?>

<main class="p-6 space-y-10 bg-gray-50">

  <?php get_template_part('template-parts/featured'); ?>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

    <!-- Últimas Notícias -->
    <section class="md:col-span-2">
      <div class="flex justify-between items-baseline mb-4">
        <h2 class="section-title">Últimas Notícias</h2>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="section-link">
          Ver todos →
        </a>
      </div>

      <div class="grid sm:grid-cols-2 gap-6">
        <?php
        $latest = new WP_Query([
          'posts_per_page' => 4,
        ]);

        while ($latest->have_posts()) : $latest->the_post();
          get_template_part('template-parts/news-card');
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </section>

    <!-- Coluna lateral -->
    <aside class="flex flex-col gap-6">
      <?php get_template_part('template-parts/editor-pick'); ?>
      <?php get_template_part('template-parts/instagram'); ?>
    </aside>

  </div>

</main>

<?php get_footer(); ?>

<script src="https://cdn.tailwindcss.com"></script>