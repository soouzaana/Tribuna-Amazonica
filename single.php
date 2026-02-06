<?php
get_header();
?>

<main class="max-w-4xl mx-auto px-4 py-12">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

      <article>
        <h1 class="text-3xl font-bold mb-6">
          <?php the_title(); ?>
        </h1>

        <div class="prose max-w-none">
          <?php the_content(); ?>
        </div>
      </article>

    <?php endwhile; ?>
  <?php else : ?>
    <p>Sem conteúdo.</p>
  <?php endif; ?>
</main>

<?php
get_footer();
