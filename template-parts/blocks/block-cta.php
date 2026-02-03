<?php
if (!defined('ABSPATH')) exit;

$config_id = get_config_page_id();
if (!$config_id) return;

$titulo = get_field('cta_titulo', $config_id);
$texto  = get_field('cta_texto', $config_id);
$link   = get_field('cta_link', $config_id);

if (!$titulo || !$link) return;
?>

<section class="block block-cta">
  <div class="container">
    <div class="cta-content">
      <h2><?= esc_html($titulo); ?></h2>

      <?php if ($texto): ?>
        <p><?= esc_html($texto); ?></p>
      <?php endif; ?>

      <a
        href="<?= esc_url($link['url']); ?>"
        target="<?= esc_attr($link['target'] ?: '_self'); ?>"
        class="btn btn-primary">
        <?= esc_html($link['title']); ?>
      </a>
    </div>
  </div>
</section>