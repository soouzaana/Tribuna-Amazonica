<?php
// QUERY PRINCIPAL (destaque)
$law_featured = new WP_Query([
  'posts_per_page' => 1,
  'category_name'  => 'jurisprudencia',
]);

// QUERY LATERAL (lista)
$law_posts = new WP_Query([
  'posts_per_page' => 4,
  'category_name'  => 'jurisprudencia,decisoes',
  'post__not_in'   => $law_featured->posts ? [$law_featured->posts[0]->ID] : [],
]);

?>

<section class="space-y-6">
  <div class="flex justify-between items-baseline">
    <h2 class="section-title">Jurisprudência e Decisões</h2>

    <?php
    $category = get_category_by_slug('jurisprudencia');
    $category_link = $category ? get_category_link($category->term_id) : '#';
    ?>
    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="section-link">
      Ver todos
      <span class="arrow-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </span>
    </a>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- DESTAQUE (agora menor) -->
    <?php if ($law_featured->have_posts()) : $law_featured->the_post(); ?>
      <article class="law-featured lg:col-span-1">
        <?php
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if (!$image_url) {
          $image_url = get_template_directory_uri() . '/assets/images/featured-default.jpg';
        }
        ?>
        <div class="law-featured-bg" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>

        <div class="law-featured-overlay">
          <span class="law-badge">Jurisprudência</span>
          <h3 class="law-title"><?php the_title(); ?></h3>
          <p class="law-subtitle"><?php the_excerpt(); ?></p>

          <div class="law-meta">
            <span><?php echo get_the_date('d M Y'); ?></span>
            <span>•</span>
            <span><?php echo get_comments_number(); ?> comentários</span>
          </div>
        </div>
      </article>
    <?php endif;
    wp_reset_postdata(); ?>

    <!-- LISTA LATERAL -->
    <div class="flex flex-col gap-4 lg:col-span-1">
      <?php if ($law_posts->have_posts()) : ?>
        <?php while ($law_posts->have_posts()) : $law_posts->the_post(); ?>
          <?php
          $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
          if (!$thumb) {
            $thumb = get_template_directory_uri() . '/assets/images/featured-default.jpg';
          }
          ?>
          <article class="law-item">
            <div class="law-item-thumb">
              <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
            </div>

            <div class="law-item-content">
              <span class="law-item-badge">
                <?php
                $cats = get_the_category();
                echo $cats ? esc_html($cats[0]->name) : '';
                ?>
              </span>

              <h3 class="law-item-title"><?php the_title(); ?></h3>
              <span class="law-item-date"><?php echo get_the_date('d M Y'); ?></span>
            </div>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>

  </div>
</section>