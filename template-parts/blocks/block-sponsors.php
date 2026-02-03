<?php
if (!defined('ABSPATH')) exit;

$query = new WP_Query([
  'post_type'      => 'sponsors',
  'posts_per_page' => -1,
  'post_status'    => 'publish',
]);

if (!$query->have_posts()) return;
?>

<section class="py-12 text-center bg-gray-100 rounded-2xl mb-12 space-y-8">
  <header>
    <h2 class="text-2xl font-bold text-gray-900 mb-1">Patrocinadores</h2>
    <p class="text-gray-600">
      Empresas parceiras que apoiam o jornalismo de verdade
    </p>
  </header>

  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center px-9">
    <?php
    while ($query->have_posts()) {
      $query->the_post();

      get_template_part(
        'template-parts/cards/card-sponsor',
        null,
        ['post_id' => get_the_ID()]
      );
    }
    wp_reset_postdata();
    ?>
  </div>
</section>