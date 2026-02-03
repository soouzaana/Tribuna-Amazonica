<?php
if (!defined('ABSPATH')) exit;

$post_id = $args['post_id'] ?? get_the_ID();
if (!$post_id) return;

$nome  = get_the_title($post_id);
$area  = get_field('colunist_area', $post_id);

// Caminho da imagem default
$default_avatar = get_template_directory_uri() . '/assets/images/avatar-default.jpg';
?>

<a href="<?= esc_url(get_permalink($post_id)); ?>" class="flex gap-3 p-2 rounded-lg hover:bg-gray-50 transition-colors group">
  <!-- Avatar -->
  <img
    src="<?= has_post_thumbnail($post_id) ? get_the_post_thumbnail_url($post_id, 'thumbnail') : esc_url($default_avatar); ?>"
    alt="<?= esc_attr($nome); ?>"
    class="w-12 h-12 rounded-full object-cover flex-shrink-0">

  <!-- Conteúdo -->
  <div class="flex-1 min-w-0">
    <h4 class="text-sm font-semibold text-gray-900 group-hover:text-emerald-700 transition-colors truncate">
      <?= esc_html($nome); ?>
    </h4>

    <?php if ($area): ?>
      <p class="text-xs text-gray-500 truncate">
        <?= esc_html($area); ?>
      </p>
    <?php endif; ?>
  </div>
</a>