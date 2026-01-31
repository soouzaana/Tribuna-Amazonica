<?php
// Query vídeos (ajuste o post_type se precisar)
$args = [
  'post_type'      => 'post',
  'posts_per_page' => 5,
  'category_name'  => 'videos,live'
];

$query = new WP_Query($args);

if (!$query->have_posts()) return;

// Primeiro post = destaque
$query->the_post();

$highlight_image = get_the_post_thumbnail_url(get_the_ID(), 'large')
  ?: get_the_post_thumbnail_url(get_the_ID(), 'full')
  ?: get_template_directory_uri() . '/assets/images/featured-default.jpg';

$highlight = [
  'title'    => get_the_title(),
  'link'     => get_the_permalink(),
  'image'    => $highlight_image,
  'date'     => get_the_date('d M Y'),
  'comments' => get_comments_number(),
  'badge'    => get_the_category()[0]->name ?? '',
  'isLive'   => get_post_meta(get_the_ID(), 'live', true) == '1'
];
?>

<section class="video-section p-6 rounded-2xl">
  <div class="flex justify-between items-baseline mb-6">
    <h2 class="section-title text-white">Assista aos vídeos</h2>
    <a href="<?php echo esc_url(get_category_link(get_cat_ID('videos'))); ?>" class="section-link">
      Mais Posts
    </a>
  </div>

  <div class="videos-container flex flex-col md:flex-row gap-6">

    <!-- Vídeo em destaque -->
    <a href="<?php echo esc_url($highlight['link']); ?>" class="featured-video flex-1 relative rounded-2xl overflow-hidden cursor-pointer">
      <img src="<?php echo esc_url($highlight['image']); ?>" alt="<?php echo esc_attr($highlight['title']); ?>" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105" />
      <div class="overlay absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

      <?php if ($highlight['badge']) : ?>
        <span class="badge-normal absolute top-2 right-2 bg-emerald-500/60 text-white text-xs font-semibold px-2 py-1 rounded-full">
          <?php echo esc_html($highlight['badge']); ?>
        </span>
      <?php endif; ?>

      <?php if ($highlight['isLive']) : ?>
        <span class="badge-live absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full flex items-center gap-1">
          <svg class="w-3 h-3 animate-pulse" fill="currentColor" viewBox="0 0 8 8">
            <circle cx="4" cy="4" r="4" />
          </svg>
          Live
        </span>
      <?php endif; ?>

      <span class="play-button absolute inset-0 m-auto w-12 h-12 flex items-center justify-center opacity-80">
        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="M5 3v18l15-9z" />
        </svg>
      </span>

      <div class="featured-overlay absolute bottom-3 left-3 right-3 text-white">
        <h3 class="featured-title"><?php echo esc_html($highlight['title']); ?></h3>
        <div class="featured-meta">
          <span><?php echo esc_html($highlight['date']); ?></span>
          <span>|</span>
          <span><?php echo esc_html($highlight['comments']); ?> comentários</span>
        </div>
      </div>
    </a>

    <!-- Lista de vídeos menores -->
    <div class="video-list flex flex-col gap-4 flex-1">
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium')
          ?: get_the_post_thumbnail_url(get_the_ID(), 'full')
          ?: get_template_directory_uri() . '/assets/images/featured-default.jpg';
        ?>
        <article class="video-item group rounded-lg overflow-hidden flex gap-3 cursor-pointer">
          <a href="<?php the_permalink(); ?>" class="flex gap-3">
            <div class="video-thumb w-34 h-24 rounded-lg overflow-hidden relative">
              <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover" />
              <div class="play-overlay absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100">
                <svg width="24" height="24" fill="none" stroke="#fff" stroke-width="2">
                  <polygon points="5 3 19 12 5 21 5 3" />
                </svg>
              </div>
            </div>

            <div class="video-content flex flex-col gap-1">
              <h4 class="video-title"><?php the_title(); ?></h4>
              <span class="video-meta">
                <?php echo get_the_date('d M Y'); ?> | <?php echo esc_html(get_bloginfo('name')); ?>
              </span>
            </div>
          </a>
        </article>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php wp_reset_postdata(); ?>