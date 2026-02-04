<?php
if (!defined('ABSPATH')) exit;

$query = new WP_Query([
  'post_type'      => 'colunistas',
  'posts_per_page' => 6,
  'post_status'    => 'publish',
]);
?>

<?php if ($query->have_posts()): ?>
  <section class="mx-auto py-8 px-4">
    <header class="section-header mb-6">
      <h2 class="section-title">Nossos Colunistas</h2>
    </header>

    <div class="colunistas-grid flex flex-col gap-4">
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