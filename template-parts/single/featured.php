<?php if (has_post_thumbnail()): ?>
  <div class="rounded-2xl overflow-hidden mb-8 shadow-lg">
    <img
      src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
      alt="<?php echo esc_attr(get_the_title()); ?>"
      class="w-full h-auto object-cover">
  </div>
<?php endif; ?>