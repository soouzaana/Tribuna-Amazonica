<?php
if (!defined('ABSPATH')) exit;

$post_id = $args['post_id'] ?? null;
if (!$post_id) return;

$image = get_the_post_thumbnail_url($post_id, 'large')
  ?: get_the_post_thumbnail_url($post_id, 'full')
  ?: get_template_directory_uri() . '/assets/images/featured-default.jpg';

$is_live = get_post_meta($post_id, 'live', true) == '1';
$category = get_the_category($post_id)[0]->name ?? '';
?>

<a href="<?= esc_url(get_permalink($post_id)); ?>"
  class="featured-video flex-1 relative rounded-2xl overflow-hidden">

  <img src="<?= esc_url($image); ?>"
    alt="<?= esc_attr(get_the_title($post_id)); ?>"
    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">

  <div class="overlay absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

  <?php if ($category): ?>
    <span class="badge-normal absolute top-2 right-2">
      <?= esc_html($category); ?>
    </span>
  <?php endif; ?>

  <?php if ($is_live): ?>
    <span class="badge-live absolute top-2 left-2">Live</span>
  <?php endif; ?>

  <span class="play-button absolute inset-0 m-auto"></span>

  <div class="featured-overlay absolute bottom-3 left-3 right-3 text-white">
    <h3><?= esc_html(get_the_title($post_id)); ?></h3>
    <span>
      <?= get_the_date('d M Y', $post_id); ?> ·
      <?= get_comments_number($post_id); ?> comentários
    </span>
  </div>
</a>