<?php
get_header();

// Busca usuários que realmente publicam
$colunistas = get_users([
  'role__in'            => ['author', 'editor', 'administrator'],
  'has_published_posts' => true,
  'orderby'             => 'display_name',
  'order'               => 'ASC',
]);
?>

<main class="flex-1">
  <div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 py-16">

      <header class="mb-12">
        <h1 class="text-4xl font-bold text-gray-900">Colunistas</h1>
        <p class="text-gray-600 mt-2 max-w-2xl">
          Conheça os colunistas que assinam análises, artigos e opiniões na Tribuna Amazônica.
        </p>
      </header>

      <?php if ($colunistas): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

          <?php foreach ($colunistas as $user): ?>
            <?php
            $user_id = $user->ID;

            $area     = get_field('colunist_area', 'user_' . $user_id);
            $bio      = get_field('colunist_bio', 'user_' . $user_id);
            $insta    = get_field('colunist_instagram', 'user_' . $user_id);
            $linkedin = get_field('colunist_linkedin', 'user_' . $user_id);
            $email    = get_field('colunist_email', 'user_' . $user_id);

            $image_id = get_field('colunist_image', 'user_' . $user_id);

            $image_url = $image_id
              ? wp_get_attachment_image_url($image_id, 'medium')
              : null;

            $image_alt = $image_id
              ? get_post_meta($image_id, '_wp_attachment_image_alt', true)
              : $user->display_name;

            $profile_url = get_author_posts_url($user_id);
            ?>

            <article class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">

              <!-- Imagem -->
              <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-emerald-100 to-emerald-50">
                <a href="<?= esc_url($profile_url); ?>">
                  <?php if ($image_url): ?>
                    <img
                      src="<?= esc_url($image_url); ?>"
                      alt="<?= esc_attr($image_alt); ?>"
                      class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                  <?php endif; ?>
                </a>

                <span class="absolute top-4 right-4 px-3 py-1 bg-emerald-600 text-white text-xs font-bold rounded-full">
                  COLUNISTA
                </span>
              </div>

              <!-- Conteúdo -->
              <div class="p-6">
                <a href="<?= esc_url($profile_url); ?>">
                  <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-700 transition-colors">
                    <?= esc_html($user->display_name); ?>
                  </h3>
                </a>

                <?php if ($area): ?>
                  <p class="text-sm text-emerald-600 font-medium mb-3">
                    <?= esc_html($area); ?>
                  </p>
                <?php endif; ?>

                <?php if ($bio): ?>
                  <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                    <?= esc_html($bio); ?>
                  </p>
                <?php endif; ?>

                <!-- Rodapé -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">

                  <!-- Social icons -->
                  <div class="flex gap-2">

                    <?php if ($insta): ?>
                      <a href="<?= esc_url($insta); ?>" target="_blank" rel="noopener noreferrer"
                        class="w-9 h-9 rounded-full bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center text-white hover:scale-110 transition-transform"
                        title="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round">
                          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                          <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                      </a>
                    <?php endif; ?>

                    <?php if ($linkedin): ?>
                      <a href="<?= esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer"
                        class="w-9 h-9 rounded-full bg-blue-700 flex items-center justify-center text-white hover:scale-110 transition-transform"
                        title="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                          <rect width="4" height="12" x="2" y="9"></rect>
                          <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                      </a>
                    <?php endif; ?>

                    <?php if ($email): ?>
                      <a href="mailto:<?= esc_attr($email); ?>"
                        class="w-9 h-9 rounded-full bg-emerald-700 flex items-center justify-center text-white hover:scale-110 transition-transform"
                        title="Email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round">
                          <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                          <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                      </a>
                    <?php endif; ?>

                  </div>

                  <!-- CTA -->
                  <a href="<?= esc_url($profile_url); ?>">
                    <button
                      class="h-8 px-3 text-xs border border-emerald-600 text-emerald-700 rounded-md hover:bg-emerald-50 transition">
                      Ver artigos
                    </button>
                  </a>

                </div>
              </div>

            </article>

          <?php endforeach; ?>

        </div>
      <?php else: ?>
        <p class="text-gray-500">Nenhum colunista encontrado.</p>
      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>