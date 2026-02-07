<?php
$author_id = get_queried_object_id();
?>

<nav class="bg-white border-b">
  <div class="max-w-7xl mx-auto px-4 py-4 text-sm text-gray-500 flex gap-2">
    <a href="<?= esc_url(home_url('/')); ?>">Home</a>
    <span>/</span>
    <a href="<?= esc_url(home_url('/colunistas')); ?>">Colunistas</a>
    <span>/</span>
    <span class="text-gray-900">
      <?= esc_html(get_the_author_meta('display_name', $author_id)); ?>
    </span>
  </div>
</nav>