<?php
$query = $args['query'] ?? null;
if (!$query) return;
?>

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php while ($query->have_posts()): $query->the_post(); ?>
    <article class="bg-white rounded-xl shadow overflow-hidden">

      <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('medium', [
            'class' => 'w-full h-48 object-cover'
          ]); ?>
        </a>
      <?php endif; ?>

      <div class="p-4 space-y-2">
        <h3 class="font-bold text-lg leading-tight">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h3>

        <p class="text-sm text-gray-600">
          <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
        </p>
      </div>
    </article>
  <?php endwhile; ?>
</div>