<?php
$area  = get_field('colunist_area');
$image = get_field('colunist_image');
?>

<article class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
  <a href="<?php the_permalink(); ?>" class="block">

    <?php if ($image): ?>
      <img
        src="<?php echo esc_url($image['sizes']['medium']); ?>"
        alt="<?php echo esc_attr($image['alt'] ?: get_the_title()); ?>"
        class="w-full h-56 object-cover">
    <?php endif; ?>

    <div class="p-6">
      <h2 class="text-xl font-bold text-gray-900 mb-2">
        <?php the_title(); ?>
      </h2>

      <?php if ($area): ?>
        <p class="text-sm text-emerald-700 font-medium">
          <?php echo esc_html($area); ?>
        </p>
      <?php endif; ?>
    </div>

  </a>
</article>