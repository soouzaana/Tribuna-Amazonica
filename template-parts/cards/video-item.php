<?php
if (!defined('ABSPATH')) exit;

$post_id = $args['post_id'] ?? null;
if (!$post_id) return;

$thumb = get_the_post_thumbnail_url($post_id, 'medium')
  ?: get_template_directory_uri() . '/assets/images/featured-default.jpg';
?>

<article class="video-item group rounded-lg overflow-hidden">
  <a href="<?= esc_url(get_permalink($post_id)); ?>" class="flex gap-3">

    <div class="video-thumb w-34 h-24 rounded-lg overflow-hidden relative">
      <img src="<?= esc_url($thumb); ?>" alt="<?= esc_attr(get_the_title($post_id)); ?>">
    </div>

    <div class="video-content">
      <h4><?= esc_html(get_the_title($post_id)); ?></h4>
      <span>
        <?= get_the_date('d M Y', $post_id); ?> |
        <?= esc_html(get_bloginfo('name')); ?>
      </span>
    </div>

  </a>
</article>