<div class="grid grid-cols-1 md:grid-cols-3 gap-10">

  <!-- Últimas Notícias - ocupa 2/3 -->
  <section class="col-span-1 md:col-span-2">
    <div class="flex justify-between items-baseline mb-4">
      <h2 class="section-title">Últimas Notícias</h2>
      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="section-link">
        Ver todos
        <span class="arrow-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </span>
      </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-6">
      <?php
      $latest = new WP_Query([
        'posts_per_page' => 4,
        'post_status'    => 'publish',
      ]);

      while ($latest->have_posts()) : $latest->the_post();
        get_template_part('template-parts/news-card');
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </section>

  <!-- Coluna menor -->
  <div class="col-span-1 flex flex-col gap-6">
    <section>
      <div class="flex justify-between items-baseline mb-4">
        <h2 class="section-title">Escolhas do Editor</h2>
        <a href="#" class="section-link">
          Ver todos
          <span class="arrow-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </span>
        </a>
      </div>

      <div class="grid grid-cols-1 gap-6">
        <?php
        $editorPick = new WP_Query([
          'posts_per_page' => 3,
          'meta_key'       => 'editor_pick',
          'meta_value'     => '1',
          'post_status'    => 'publish',
        ]);

        while ($editorPick->have_posts()) : $editorPick->the_post();
          get_template_part('template-parts/editor-pick-item');
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </section>

    <!-- Instagram -->
    <section class="bg-white rounded-lg p-4">
      <div class="flex justify-between items-center mb-2">
        <h2 class="instagram-title text-base">Siga no Instagram</h2>
        <a href="https://instagram.com/tribunaamazonica" target="_blank" rel="noopener noreferrer" class="text-pink-600 hover:text-pink-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none"></rect>
            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" fill="none"></path>
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
          </svg>
        </a>
      </div>

      <div class="grid grid-cols-3 gap-2 mb-3">
        <?php for ($i = 1; $i <= 9; $i++) : ?>
          <img src="https://picsum.photos/100?random=<?php echo $i; ?>" alt="Instagram" class="w-full h-24 object-cover rounded-lg">
        <?php endfor; ?>
      </div>

      <a href="https://instagram.com/tribunaamazonica" target="_blank" rel="noopener noreferrer"
        class="block w-full text-center py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-medium hover:from-purple-700 hover:to-pink-700 transition-all">
        @tribunaamazonica
      </a>
    </section>
  </div>
</div>