<?php
// Dados fixos (podem virar ACF ou opções depois)
$instagram = $news['instagram'] ?? 'a';
$linkedin  = $news['linkedin'] ?? 'a';
$email     = $news['email'] ?? 'a';
?>

<footer class="bg-emerald-900 text-white">
  <div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 text-left">

      <!-- COLUNA 1: SOBRE -->
      <div>
        <h1 class="text-2xl font-bold mb-3">Tribuna Amazônica</h1>
        <p class="text-sm text-emerald-200 leading-relaxed mb-4">
          Seu portal de análise jurídica, doutrina e julgados do Norte do Brasil.
          Comprometidos com a informação de qualidade e o debate jurídico.
        </p>

        <!-- Redes sociais -->
        <div class="flex gap-3 mt-4">

          <?php if ($instagram) : ?>
            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer"
              class="social-icon w-9 h-9 rounded-full bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center hover:scale-110 transition-transform"
              title="Instagram">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                <circle cx="12" cy="12" r="4"></circle>
                <circle cx="17.5" cy="6.5" r="1"></circle>
              </svg>
            </a>
          <?php endif; ?>

          <?php if ($linkedin) : ?>
            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer"
              class="social-icon w-9 h-9 rounded-full bg-blue-700 flex items-center justify-center hover:scale-110 transition-transform"
              title="LinkedIn">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                <rect x="2" y="9" width="4" height="12"></rect>
                <circle cx="4" cy="4" r="2"></circle>
              </svg>
            </a>
          <?php endif; ?>

          <?php if ($email) : ?>
            <a href="mailto:<?php echo esc_attr($email); ?>"
              class="social-icon w-9 h-9 rounded-full bg-emerald-700 flex items-center justify-center hover:scale-110 transition-transform"
              title="Email">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                <path d="M22 7 L13 12.7 A1.94 1.94 0 0 1 11 12.7 L2 7"></path>
              </svg>
            </a>
          <?php endif; ?>

        </div>
      </div>

      <!-- COLUNA 2: CATEGORIAS -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Categorias</h2>
        <ul class="space-y-2 text-sm text-emerald-200">
          <?php
          $categories = get_categories();
          foreach ($categories as $cat) :
          ?>
            <li>
              <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
                class="hover:text-emerald-400 transition-colors">
                <?php echo esc_html($cat->name); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- COLUNA 3: ESCOLHAS DO EDITOR -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Escolhas do Editor</h2>
        <ul class="space-y-3">
          <?php
          $editor_query = new WP_Query([
            'posts_per_page' => 2,
            'tag' => 'editor' // ou category_name => 'editor'
          ]);

          while ($editor_query->have_posts()) : $editor_query->the_post();
          ?>
            <li>
              <a href="<?php the_permalink(); ?>"
                class="text-emerald-100 hover:text-emerald-400 text-sm block leading-snug">
                <?php the_title(); ?>
              </a>
              <span class="text-xs text-emerald-400">
                <?php echo get_the_date('d M Y'); ?>
              </span>
            </li>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </ul>
      </div>

      <!-- COLUNA 4: ÚLTIMOS POSTS -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Últimos Posts</h2>
        <ul class="space-y-3 text-sm">
          <?php
          $latest_query = new WP_Query([
            'posts_per_page' => 2
          ]);

          while ($latest_query->have_posts()) : $latest_query->the_post();
          ?>
            <li>
              <a href="<?php the_permalink(); ?>"
                class="text-emerald-100 hover:text-emerald-400 block leading-snug">
                <?php the_title(); ?>
              </a>
              <span class="text-xs text-emerald-400">
                <?php echo get_the_date('d M Y'); ?>
              </span>
            </li>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </ul>
      </div>

    </div>

    <!-- Linha inferior -->
    <div class="border-t border-white/10 mt-10 pt-6 flex justify-between text-sm text-gray-300">
      <p class="text-emerald-300">
        © <?php echo date('Y'); ?> Tribuna Amazônica — Todos os direitos reservados.
      </p>
      <p class="text-emerald-400">
        Desenvolvido com dedicação para a comunidade jurídica.
      </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>