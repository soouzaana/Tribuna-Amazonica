<?php
$featured = new WP_Query([
  'posts_per_page' => 1,
  'meta_key' => 'destaque',
  'meta_value' => '1'
]);

if ($featured->have_posts()) :
  $featured->the_post();
?>

<section class="featured">
  <div
    class="featured-bg"
    style="background-image: url('<?php the_post_thumbnail_url('large'); ?>');">
  </div>

  <div class="featured-overlay">
    <span class="featured-badge">Destaque</span>

    <h2 class="featured-title"><?php the_title(); ?></h2>

    <div class="featured-meta">
      <span><?php echo get_the_date(); ?></span>
      <span>•</span>
      <span><?php the_author(); ?></span>
    </div>
  </div>
</section>

<?php
endif;
wp_reset_postdata();
