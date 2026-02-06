<?php if (has_post_thumbnail()): ?>
  <div class="rounded-2xl overflow-hidden shadow-lg mb-8">
    <img
      src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
      alt="<?php echo esc_attr(get_the_title()); ?>"
      class="max-w-3xl w-full h-auto object-cover rounded-2xl block mx-auto">
  </div>
<?php endif; ?>