<?php
// Tenta buscar post com meta 'destaque'
$featured_query = new WP_Query([
  'posts_per_page' => 1,
  'post_status'    => 'publish',
  'meta_key'       => 'destaque',
  'meta_value'     => '1',
]);

// Se não existir, tenta com tag 'destaque'
if (!$featured_query->have_posts()) {
  $featured_query = new WP_Query([
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'tag'            => 'destaque',
  ]);
}

// Se ainda não existir, pega o mais recente
if (!$featured_query->have_posts()) {
  $featured_query = new WP_Query([
    'posts_per_page' => 1,
    'post_status'    => 'publish',
  ]);
}

if ($featured_query->have_posts()) :
  while ($featured_query->have_posts()) : $featured_query->the_post();

    // fallback de imagem
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if (!$image_url) {
      $image_url = get_template_directory_uri() . '/assets/images/featured-default.jpg';
    }

    $date = get_the_date('d M Y');
    $author = get_the_author();
?>

    <!-- DESTAQUE PRINCIPAL -->
    <section class="featured">
      <div class="featured-bg" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>

      <div class="featured-overlay">
        <span class="featured-badge">Destaque</span>

        <h2 class="featured-title"><?php the_title(); ?></h2>

        <div class="featured-meta">
          <span><?php echo esc_html($date); ?></span>
          <span>•</span>
          <span><?php echo esc_html($author); ?></span>
        </div>
      </div>
    </section>

<?php
  endwhile;
  wp_reset_postdata();
endif;
?>