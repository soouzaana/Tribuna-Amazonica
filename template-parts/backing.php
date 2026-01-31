<section class="py-12 text-center bg-gray-100 rounded-2xl mb-12">
  <h1 class="text-2xl font-bold text-gray-900 mb-1">Patrocinadores</h1>
  <p class="text-gray-600 mb-8">Empresas parceiras que apoiam o jornalismo de verdade</p>

  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center px-9">
    <?php
    $sponsors = new WP_Query([
      'post_type' => 'sponsors',
      'posts_per_page' => -1,
      'post_status' => 'publish',
    ]);

    if ($sponsors->have_posts()) :
      while ($sponsors->have_posts()) : $sponsors->the_post();
        $logo = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        if (!$logo) {
          $logo = get_template_directory_uri() . '/assets/images/default-logo.png';
        }

        // URL do patrocinador (usando ACF ou post meta 'sponsor_url')
        $url = get_post_meta(get_the_ID(), 'sponsor_url', true);
        if (!$url) {
          $url = '#';
        }
    ?>
        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer"
          class="group flex items-center justify-center bg-white rounded-xl p-4 shadow-sm hover:shadow-lg transition-all duration-300">
          <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>"
            class="max-h-14 object-contain grayscale opacity-70 transition-all duration-500 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-105" />
        </a>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>