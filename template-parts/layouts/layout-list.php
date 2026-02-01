<?php

/**
 * Layout: Lista (Editor Pick Style)
 * Ideal para: notícias, decisões, jurisprudência, opinião
 */

$query = $args['query'] ?? null;
if (!$query) return;
?>

<div class="editor-pick-list">
  <?php while ($query->have_posts()): $query->the_post(); ?>

    <?php
    // Imagem com fallback
    $img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    if (!$img) {
      $img = get_template_directory_uri() . '/assets/images/featured-default.jpg';
    }

    // Data
    $date = get_the_date('d M Y');

    // Categoria
    $categories = get_the_category();
    $category   = !empty($categories) ? $categories[0] : null;
    ?>

    <article class="editor-pick group">

      <div class="editor-image">
        <a href="<?php the_permalink(); ?>">
          <img
            src="<?php echo esc_url($img); ?>"
            alt="<?php the_title_attribute(); ?>"
            loading="lazy" />
        </a>
      </div>

      <div class="editor-content">

        <?php if ($category): ?>
          <span class="editor-category">
            <a href="<?php echo esc_url(get_category_link($category)); ?>">
              <?php echo esc_html($category->name); ?>
            </a>
          </span>
        <?php endif; ?>

        <h3 class="editor-title">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h3>

        <span class="editor-date">
          <?php echo esc_html($date); ?>
        </span>

      </div>
    </article>

  <?php endwhile; ?>
</div>

<?php wp_reset_postdata(); ?>