<?php get_header(); ?>

<main class="flex-1">
  <div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 py-16">

      <header class="mb-12">
        <h1 class="text-4xl font-bold text-gray-900">
          Colunistas
        </h1>
      </header>

      <?php if (have_posts()) : ?>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/columnist/card'); ?>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <p class="text-gray-500">Nenhum colunista encontrado.</p>
      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>