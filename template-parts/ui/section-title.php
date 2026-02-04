<?php
if (!defined('ABSPATH')) exit;

$title = $args['title'] ?? '';
$align = $args['align'] ?? 'left';
$tag   = $args['tag'] ?? 'h2';

$link       = $args['link'] ?? null;
$link_label = $args['link_label'] ?? 'Ver todos';

if (!$title) return;

$align_class = match ($align) {
  'center' => 'text-center',
  default  => 'text-left',
};
?>

<div class="flex items-baseline justify-between gap-4">
  <<?= esc_attr($tag); ?>
    class="section-title text-lg md:text-xl font-semibold tracking-tight text-neutral-900 <?= esc_attr($align_class); ?>">
    <?= esc_html($title); ?>
  </<?= esc_attr($tag); ?>>

  <?php if ($link): ?>
    <a
      href="<?= esc_url($link); ?>"
      class="section-link inline-flex items-center gap-1 text-sm font-medium text-neutral-600 hover:text-neutral-900 transition">
      <?= esc_html($link_label); ?>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 5l7 7-7 7" />
      </svg>
    </a>
  <?php endif; ?>
</div>