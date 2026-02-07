<?php
get_header();

// Busca usuários que realmente publicam
$colunistas = get_users([
  'role__in'               => ['author', 'editor', 'administrator'],
  'has_published_posts'    => true,
  'orderby'                => 'display_name',
  'order'                  => 'ASC',
]);
?>

<main class="flex-1">
  <div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 py-16">

      <header class="mb-12">
        <h1 class="text-4xl font-bold text-gray-900">
          Colunistas
        </h1>
        <p class="text-gray-600 mt-2 max-w-2xl">
          Conheça os colunistas que assinam análises, artigos e opiniões na Tribuna Amazônica.
        </p>
      </header>

      <?php if ($colunistas): ?>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

          <?php foreach ($colunistas as $user): ?>

            <?php
            $user_id = $user->ID;

            $area = get_field('colunist_area', 'user_' . $user_id);

            // 🔑 imagem como ID (padrão correto)
            $image_id = get_field('colunist_image', 'user_' . $user_id);

            $image_url = null;
            $image_alt = null;

            if ($image_id) {
              $image_url = wp_get_attachment_image_url($image_id, 'medium');
              $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            }
            ?>

            <article class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
              <a href="<?php echo esc_url(get_author_posts_url($user_id)); ?>" class="block">

                <?php if ($image_url): ?>
                  <img
                    src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt ?: $user->display_name); ?>"
                    class="w-full h-56 object-cover">
                <?php endif; ?>

                <div class="p-6">
                  <h2 class="text-xl font-bold text-gray-900 mb-2">
                    <?php echo esc_html($user->display_name); ?>
                  </h2>

                  <?php if ($area): ?>
                    <p class="text-sm text-emerald-700 font-medium">
                      <?php echo esc_html($area); ?>
                    </p>
                  <?php endif; ?>
                </div>

              </a>
            </article>

          <?php endforeach; ?>

        </div>
      <?php else: ?>
        <p class="text-gray-500">
          Nenhum colunista encontrado.
        </p>
      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>