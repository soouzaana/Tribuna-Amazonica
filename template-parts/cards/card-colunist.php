<?php
if (!defined('ABSPATH')) exit;

// Agora o card trabalha com user_id
$user_id = $args['user_id'] ?? null;
if (!$user_id) return;

$user = get_user_by('id', $user_id);
if (!$user) return;

// Dados
$nome = $user->display_name;
$area = get_field('colunist_area', 'user_' . $user_id);

// Avatar
$default_avatar = get_template_directory_uri() . '/assets/images/avatar-default.jpg';

$image_id = get_field('colunist_image', 'user_' . $user_id);
$image_url = $image_id
  ? wp_get_attachment_image_url($image_id, 'thumbnail')
  : $default_avatar;

// Link para página do autor
$profile_url = get_author_posts_url($user_id);
?>

<a
  href="<?= esc_url($profile_url); ?>"
  class="flex gap-3 p-2 rounded-lg hover:bg-gray-50 transition-colors group">
  <!-- Avatar -->
  <img
    src="<?= esc_url($image_url); ?>"
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