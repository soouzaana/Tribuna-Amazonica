<div class="grid grid-cols-2 gap-9">

  <!-- LIFESTYLE -->
  <section>
    <div>
      <div class="flex justify-between items-baseline">
        <h2 class="section-title">Lifestyle</h2>
        <a href="<?php echo esc_url(get_category_link(get_category_by_slug('lifestyle'))); ?>" class="section-link">
          Ver todos
          <span class="arrow-icon">→</span>
        </a>
      </div>

      <!-- Grid de notícias principais -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <?php
        $lifestyle_posts = new WP_Query([
          'category_name'  => 'lifestyle',
          'posts_per_page' => 1,
        ]);

        if ($lifestyle_posts->have_posts()) :
          while ($lifestyle_posts->have_posts()) : $lifestyle_posts->the_post();
            get_template_part('template-parts/news-card');
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>

      <!-- Editor Picks -->
      <div class="pt-3">
        <?php
        $lifestyle_editor_picks = new WP_Query([
          'category_name'  => 'lifestyle',
          'posts_per_page' => 4,
          'offset'         => 1, // pula os posts já mostrados
        ]);

        if ($lifestyle_editor_picks->have_posts()) :
          while ($lifestyle_editor_picks->have_posts()) : $lifestyle_editor_picks->the_post();
            get_template_part('template-parts/editor-pick-item');
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </section>

  <!-- WELLNESS -->
  <section>
    <div>
      <div class="flex justify-between items-baseline">
        <h2 class="section-title">Wellness</h2>
        <a href="<?php echo esc_url(get_category_link(get_category_by_slug('wellness'))); ?>" class="section-link">
          Ver todos
          <span class="arrow-icon">→</span>
        </a>
      </div>

      <div class="p-8 bg-white">
        <!-- Destaque principal -->
        <?php
        $wellness_featured = new WP_Query([
          'category_name'  => 'wellness',
          'posts_per_page' => 1,
        ]);

        if ($wellness_featured->have_posts()) :
          while ($wellness_featured->have_posts()) : $wellness_featured->the_post();
        ?>
            <div class="pb-6 border-b border-gray-200">
              <article class="law-featured lg:col-span-2">
                <div class="law-featured-bg" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_template_directory_uri() . '/assets/images/featured-default.jpg'; ?>');"></div>

                <div class="law-featured-overlay">
                  <span class="law-badge">Wellness</span>
                  <h3 class="law-title"><?php the_title(); ?></h3>
                  <p class="law-subtitle"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                  <div class="law-meta">
                    <span><?php echo get_the_date('d M Y'); ?></span>
                    <span>|</span>
                    <span><?php echo get_comments_number(); ?> comentários</span>
                  </div>
                </div>
              </article>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>

        <!-- Editor Picks -->
        <div class="pt-6">
          <?php
          $wellness_editor_picks = new WP_Query([
            'category_name'  => 'wellness',
            'posts_per_page' => 2,
            'offset'         => 1, // pula o post em destaque
          ]);

          if ($wellness_editor_picks->have_posts()) :
            while ($wellness_editor_picks->have_posts()) : $wellness_editor_picks->the_post();
              get_template_part('template-parts/editor-pick-item');
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>

</div>