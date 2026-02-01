<?php
$layout = $args['layout'] ?? 'grid';
?>

<article class="card card-<?php echo esc_attr($layout); ?>">

  <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" class="card-thumb">
      <?php the_post_thumbnail('medium'); ?>
    </a>
  <?php endif; ?>

  <div class="card-content">
    <span class="card-category">
      <?php echo esc_html(get_the_category()[0]->name ?? ''); ?>
    </span>

    <h3 class="card-title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>
  </div>

</article>