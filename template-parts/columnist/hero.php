<?php
$author_id = get_queried_object_id();

$area        = get_field('colunist_area', 'user_' . $author_id);
$description = get_field('colunist_description', 'user_' . $author_id);
$image_id    = get_field('colunist_image', 'user_' . $author_id);

$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : null;
$image_alt = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
?>

<section class="bg-gradient-to-br from-emerald-800 to-emerald-600 text-white py-16">
  <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-8 items-center">

    <?php if ($image_url): ?>
      <img
        src="<?= esc_url($image_url); ?>"
        alt="<?= esc_attr($image_alt ?: get_the_author_meta('display_name', $author_id)); ?>"
        class="w-48 h-48 rounded-2xl object-cover ring-4 ring-white/30 shadow-2xl">
    <?php endif; ?>

    <div>
      <h1 class="text-4xl md:text-5xl font-bold mb-3">
        <?= esc_html(get_the_author_meta('display_name', $author_id)); ?>
      </h1>

      <?php if ($area): ?>
        <p class="text-xl text-emerald-100 mb-4"><?= esc_html($area); ?></p>
      <?php endif; ?>

      <?php if ($description): ?>
        <p class="max-w-2xl text-emerald-50 leading-relaxed mb-6">
          <?= esc_html($description); ?>
        </p>
      <?php endif; ?>

      <?php get_template_part('template-parts/columnist/socials'); ?>
    </div>

  </div>
</section>