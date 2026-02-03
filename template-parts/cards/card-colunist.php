<?php
if (!defined('ABSPATH')) exit;

$post_id = $args['post_id'] ?? get_the_ID();
if (!$post_id) return;

$nome  = get_the_title($post_id);
$area  = get_field('colunist_area', $post_id);
$bio   = get_field('colunist_description', $post_id);

$cta_texto = get_field('cta_texto', $post_id);
$cta_link  = get_field('cta_link', $post_id);
?>

<article class="colunist-card">

  <div class="colunist-avatar">
    <?php
    if (has_post_thumbnail($post_id)) {
      echo get_the_post_thumbnail($post_id, 'medium');
    }
    ?>
  </div>

  <div class="colunist-content">
    <h3 class="colunist-name"><?= esc_html($nome); ?></h3>

    <?php if ($area): ?>
      <span class="colunist-area"><?= esc_html($area); ?></span>
    <?php endif; ?>

    <?php if ($bio): ?>
      <p class="colunist-bio"><?= esc_html($bio); ?></p>
    <?php endif; ?>

    <div class="colunist-actions">

      <?php
      $redes = [
        'colunist_instagram' => 'Instagram',
        'colunist_twitter'   => 'Twitter',
        'colunist_linkedin'  => 'LinkedIn',
      ];

      foreach ($redes as $field => $label) :
        $url = get_field($field, $post_id);
        if (!$url) continue;
      ?>
        <a
          href="<?= esc_url($url); ?>"
          target="_blank"
          rel="noopener"
          class="social-link social-<?= esc_attr($field); ?>">
          <?= esc_html($label); ?>
        </a>
      <?php endforeach; ?>

      <?php if ($cta_texto && $cta_link): ?>
        <a
          href="<?= esc_url($cta_link); ?>"
          class="btn btn-outline">
          <?= esc_html($cta_texto); ?>
        </a>
      <?php endif; ?>

    </div>
  </div>

</article>