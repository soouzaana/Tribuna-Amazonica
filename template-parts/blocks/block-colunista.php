<?php
if (!defined('ABSPATH')) exit;

$query = new WP_Query([
  'post_type'      => 'colunistas',
  'posts_per_page' => 6,
  'post_status'    => 'publish',
]);
?>

<?php if ($query->have_posts()): ?>
  <section class="section-colunistas">
    <header class="section-header">
      <h2>Nossos Colunistas</h2>
    </header>

    <div class="colunistas-grid">
      <?php
      while ($query->have_posts()):
        $query->the_post();

        get_template_part(
          'template-parts/cards/card-colunist',
          null,
          ['post_id' => get_the_ID()]
        );

      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </section>
<?php endif; ?>