<article class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
  <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?>
  </a>

  <div class="p-4">
    <h3 class="font-bold text-lg leading-snug mb-2">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>

    <div class="text-sm text-gray-500 flex gap-2">
      <span><?php echo get_the_date(); ?></span>
      <span>•</span>
      <span><?php comments_number('0 comentários','1 comentário','% comentários'); ?></span>
    </div>
  </div>
</article>
