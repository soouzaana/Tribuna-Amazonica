<?php
$area        = get_field('colunist_area');
$description = get_field('colunist_description');
$image       = get_field('colunist_image');
?>

<section class="bg-gradient-to-br from-emerald-800 to-emerald-600 text-white py-16">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center md:items-start gap-8">

      <?php if ($image): ?>
        <img
          src="<?php echo esc_url($image['sizes']['medium']); ?>"
          alt="<?php echo esc_attr($image['alt'] ?: get_the_title()); ?>"
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