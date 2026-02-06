<?php
$categories = get_the_category();
if (!$categories) return;

$query = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => 2,
  'post__not_in'   => [get_the_ID()],
  'category__in'   => [$categories[0]->term_id],
]);

if (!$query->have_posts()) return;
?>

<section class="max-w-4xl mx-auto px-4 mb-12">
  <h2 class="text-2xl font-bold text-gray-900 mb-6 relative">
    Artigos Relacionados
    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-emerald-600 rounded-full"></span>
  </h2>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <article class="group">
        <a href="<?php the_permalink(); ?>">

          <?php if (has_post_thumbnail()): ?>
            <div class="relative rounded-xl overflow-hidden mb-4 aspect-[16/10]">
              <?php the_post_thumbnail('medium', [
                'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105'
              ]); ?>
            </div>
          <?php endif; ?>

          <h3 class="text-lg font-semibold text-gray-900 group-hover:text-emerald-700 transition-colors line-clamp-2 mb-2">
            <?php the_title(); ?>
          </h3>

          <div class="flex items-center gap-3 text-sm text-gray-500">
            <span><?php echo get_the_date(); ?></span>
            <span>|</span>
            <span><?php comments_number('0 Comentários', '1 Comentário', '% Comentários'); ?></span>
          </div>

        </a>
      </article>
    <?php endwhile; ?>
  </div>
</section>

<?php wp_reset_postdata(); ?>