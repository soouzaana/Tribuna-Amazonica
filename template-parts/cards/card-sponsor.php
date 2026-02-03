<?php
if (!defined('ABSPATH')) exit;

$post_id = $args['post_id'] ?? get_the_ID();
if (!$post_id) return;

$logo = get_the_post_thumbnail_url($post_id, 'medium')
  ?: get_template_directory_uri() . '/assets/images/featured-default.jpg';

$url = get_field('sponsor_url', $post_id) ?: '#';
?>

<a
  href="<?= esc_url($url); ?>"
  target="_blank"
  rel="noopener noreferrer"
  class="group flex items-center justify-center bg-white rounded-xl p-4 shadow-sm hover:shadow-lg transition-all duration-300">
  <img
    src="<?= esc_url($logo); ?>"
    alt="<?= esc_attr(get_the_title($post_id)); ?>"
    class="max-h-14 object-contain grayscale opacity-70 transition-all duration-500
           group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-105" />
</a>