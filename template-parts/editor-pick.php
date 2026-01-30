<section>
  <div class="flex justify-between items-baseline mb-4">
    <h2 class="section-title">Escolhas do Editor</h2>
  </div>

  <div class="flex flex-col gap-4">
    <?php
    $editor = new WP_Query([
      'posts_per_page' => 3,
      'category_name' => 'editor'
    ]);

    while ($editor->have_posts()) : $editor->the_post(); ?>
      <article class="flex gap-3">
        <?php the_post_thumbnail('thumbnail', ['class' => 'rounded']); ?>
        <div>
          <h4 class="font-semibold text-sm"><?php the_title(); ?></h4>
          <span class="text-xs text-gray-500"><?php echo get_the_date(); ?></span>
        </div>
      </article>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</section>
