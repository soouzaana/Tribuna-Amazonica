<?php
$categories = get_the_category();
$category   = $categories[0] ?? null;
?>

<div class="bg-white border-b">
  <div class="max-w-4xl mx-auto px-4 py-4">
    <div class="flex items-center gap-2 text-sm text-gray-500">

      <a href="<?= home_url(); ?>" class="hover:text-emerald-700 transition-colors">
        Home
      </a>

      <?php if ($category): ?>
        <span>/</span>
        <a href="<?= get_category_link($category); ?>" class="hover:text-emerald-700 transition-colors">
          <?= esc_html($category->name); ?>
        </a>
      <?php endif; ?>

      <span>/</span>
      <span class="text-gray-900 truncate max-w-xs">
        <?php the_title(); ?>
      </span>

    </div>
  </div>
</div>