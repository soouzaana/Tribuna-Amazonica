<?php

/**
 * Layout: Destaque
 * Espera receber: WP_Query em $args['query']
 */

$query = $args['query'] ?? null;

if (!$query || !$query->have_posts()) {
  return;
}

$query->the_post();

// fallback de imagem
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
if (!$image_url) {
  $image_url = get_template_directory_uri() . '/assets/images/featured-default.jpg';
}

$date = get_the_date('d M Y');
$author = get_the_author();
?>

<section class="featured">
  <div class="featured-bg" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>

  <div class="featured-overlay">
    <span class="featured-badge">Destaque</span>

    <h2 class="featured-title">
      <a href="<?php the_permalink(); ?>" class="hover:text-emerald-600 transition-colors">
        <?php the_title(); ?>
      </a>
    </h2>

    <div class="featured-meta">
      <span><?php echo esc_html($date); ?></span>
      <span>•</span>
      <span><?php echo esc_html($author); ?></span>
    </div>
  </div>
</section>

<?php wp_reset_postdata(); ?>