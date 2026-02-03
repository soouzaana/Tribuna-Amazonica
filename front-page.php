<?php
get_header();
?>

<main class="p-6 space-y-10 bg-gray-50">

  <?php get_template_part('template-parts/blocks/block-colunista'); ?>

  <?php
  for ($i = 1; $i <= 3; $i++) {
    get_template_part(
      'template-parts/home-slot',
      null,
      ['index' => $i]
    );
  }
  ?>

  <?php if (site_config('mostrar_newsletter')): ?>
    <?php get_template_part('template-parts/blocks/block-newsletter'); ?>
  <?php endif; ?>

  <?php if (site_config('mostrar_cta')): ?>
    <?php get_template_part('template-parts/blocks/block-cta'); ?>
  <?php endif; ?>

  <?php if (site_config('mostrar_instagram')): ?>
    <?php get_template_part('template-parts/blocks/block-instagram'); ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>