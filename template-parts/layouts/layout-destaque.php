<?php
$query = $args['query'] ?? null;
if (!$query) return;

$query->the_post();
?>

<article class="grid md:grid-cols-2 gap-6 bg-white p-6 rounded-xl shadow">
  <?php if (has_post_thumbnail()): ?>
    <div>
      <?php the_post_thumbnail('large', ['class' => 'rounded-lg w-full']); ?>
    </div>
  <?php endif; ?>

  <div class="space-y-3">
    <h3 class="text-3xl font-bold">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>

    <p class="text-gray-600">
      <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
    </p>

    <a href="<?php the_permalink(); ?>" class="text-blue-600 font-semibold">
      Ler mais →
    </a>
  </div>
</article>