<?php
if (!defined('ABSPATH')) exit;

$title = $args['title'] ?? '';
$align = $args['align'] ?? 'left'; // left | center
$tag   = $args['tag'] ?? 'h2';

if (!$title) return;

$align_class = match ($align) {
  'center' => 'text-center',
  default  => 'text-left',
};
?>

<<?= esc_attr($tag); ?>
  class="section-title mb-4 text-lg md:text-xl font-semibold tracking-tight text-neutral-900 <?= esc_attr($align_class); ?>">
  <?= esc_html($title); ?>
</<?= esc_attr($tag); ?>>