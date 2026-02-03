<?php
if (!defined('ABSPATH')) exit;

$query = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 5,
]);


$home = get_page_by_path('home');
if (!$home) return;
$home_id = $home->ID;

// toggle
if (!get_field('mostrar_videos', $home_id)) return;

// campos
$titulo    = get_field('videos_titulo', $home_id);
$qtd       = get_field('videos_qtd', $home_id) ?: 5;
$ver_mais  = get_field('videos_ver_mais', $home_id);
$categoria = get_field('videos_categoria', $home_id);

if (!$categoria instanceof WP_Term) return;

$query = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => $qtd,
  'cat'            => $categoria->term_id,
  'post_status'    => 'publish',
]);

if (!$query->have_posts()) return;
?>

<section class="videos-section space-y-6">

  <header class="flex justify-between items-baseline">
    <h2><?= esc_html($titulo); ?></h2>

    <?php if ($ver_mais): ?>
      <a href="<?= esc_url(get_term_link($categoria)); ?>">
        Ver mais
      </a>
    <?php endif; ?>
  </header>

  <div class="videos-grid">
    <?php while ($query->have_posts()): $query->the_post(); ?>
      <?php
      get_template_part(
        'template-parts/cards/video-item',
        null,
        ['post_id' => get_the_ID()]
      );
      ?>
    <?php endwhile; ?>
  </div>

</section>

<?php wp_reset_postdata(); ?>