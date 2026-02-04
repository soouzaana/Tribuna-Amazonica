<?php
get_header();
?>

<main class="p-6 space-y-10 bg-gray-50">

  <?php
  // SEÇÃO 1 — sempre com colunistas
  get_template_part(
    'template-parts/home-slot',
    null,
    [
      'index' => 1,
      'with_colunistas' => true
    ]
  );

  // SEÇÕES NORMAIS
  for ($i = 2; $i <= 3; $i++) {
    get_template_part(
      'template-parts/home-slot',
      null,
      ['index' => $i]
    );
  }
  ?>

  <?php get_template_part('template-parts/blocks/block-videos'); ?>

  <?php if (site_config('mostrar_newsletter')): ?>
    <?php get_template_part('template-parts/blocks/block-newsletter'); ?>
  <?php endif; ?>

  <?php if (site_config('mostrar_cta')): ?>
    <?php get_template_part('template-parts/blocks/block-cta'); ?>
  <?php endif; ?>

  <?php if (site_config('mostrar_instagram')): ?>
    <?php get_template_part('template-parts/blocks/block-instagram'); ?>
  <?php endif; ?>

  <?php get_template_part('template-parts/blocks/block-sponsors'); ?>

</main>

<?php get_footer(); ?>