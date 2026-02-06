<?php
$area        = get_field('colunist_area') ?: null;
$description = get_field('colunist_description') ?: null;

$image_id = get_field('colunist_image');

$image_url = null;
$image_alt = null;

if ($image_id) {
  $image_url = wp_get_attachment_image_url($image_id, 'medium');
  $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
}
?>

<section class="bg-gradient-to-br from-emerald-800 to-emerald-600 text-white py-16">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center md:items-start gap-8">

      <?php if ($image_url): ?>
        <img
          src="<?= esc_url($image_url); ?>"
          alt="<?= esc_attr($image_alt ?: get_the_title()); ?>"
          class="w-48 h-48 rounded-2xl object-cover ring-4 ring-white/30 shadow-2xl">
      <?php endif; ?>

      <div class="flex-1 text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-bold mb-3">
          <?php the_title(); ?>
        </h1>

        <?php if ($area): ?>
          <p class="text-xl text-emerald-100 mb-6">
            <?php echo esc_html($area); ?>
          </p>
        <?php endif; ?>

        <?php if ($description): ?>
          <p class="text-emerald-50 leading-relaxed mb-6 max-w-2xl">
            <?php echo esc_html($description); ?>
          </p>
        <?php endif; ?>

        <?php get_template_part('template-parts/columnist/socials'); ?>
      </div>

    </div>
  </div>
</section>