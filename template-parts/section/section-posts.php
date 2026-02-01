<?php
if (!defined('ABSPATH')) exit;

$titulo     = $args['titulo'] ?? '';
$categoria  = $args['categoria'] ?? null;
$quantidade = $args['quantidade'] ?? 4;
$layout     = $args['layout'] ?? 'grid';

$query = get_posts_by_category([
  'posts_per_page' => $quantidade,
  'category'       => $categoria,
]);

if (!$query->have_posts()) return;
?>

<section class="section section-posts layout-<?php echo esc_attr($layout); ?>">

  <?php if ($titulo) : ?>
    <header class="section-header">
      <h2><?php echo esc_html($titulo); ?></h2>
    </header>
  <?php endif; ?>

  <div class="posts-wrapper">
    <?php while ($query->have_posts()) : $query->the_post(); ?>

      <?php
      get_template_part(
        'template-parts/cards/card-post',
        null,
        ['layout' => $layout]
      );
      ?>

    <?php endwhile;
    wp_reset_postdata(); ?>
  </div>

</section>