<?php

/**
 * Artigos do colunista
 * ⚠️ Depende de relação futura entre posts e colunista
 */

$columnist_id = get_the_ID();

/**
 * FUTURO:
 * Aqui você pode trocar o meta_query quando criar o vínculo:
 * - ACF Relationship
 * - Taxonomia
 * - Meta post_id
 */

$query = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => 6,
  'meta_query'     => [
    [
      'key'   => 'columnist_id',
      'value' => $columnist_id,
    ]
  ]
]);

?>

<div class="mt-12">

  <div class="flex items-center justify-between mb-6">
    <h2 class="text-xl md:text-2xl font-bold text-gray-900 relative">
      Artigos de <?php the_title(); ?>
      <span class="absolute -bottom-2 left-0 w-12 h-1 bg-emerald-600 rounded-full"></span>
    </h2>

    <a href="<?php echo esc_url(get_post_type_archive_link('columnist')); ?>"
      class="flex items-center gap-1 text-sm text-emerald-700 hover:text-emerald-800 font-medium transition-colors">
      Todos os Colunistas →
    </a>
  </div>

  <?php if ($query->have_posts()) : ?>

    <?php
    get_template_part(
      'template-parts/layouts/layout-grid',
      null,
      ['query' => $query]
    );
    ?>

  <?php else : ?>

    <div class="text-center py-16 bg-white rounded-2xl">
      <p class="text-xl text-gray-500">
        Este colunista ainda não publicou artigos.
      </p>
      <p class="text-gray-400 mt-2">
        Em breve você encontrará as análises aqui.
      </p>
    </div>

  <?php endif; ?>

</div>

<?php wp_reset_postdata(); ?>