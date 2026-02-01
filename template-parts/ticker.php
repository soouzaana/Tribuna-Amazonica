<?php
$ticker = new WP_Query([
  'posts_per_page' => 5,
  'post_status'    => 'publish',
  'no_found_rows'  => true,
]);

if (!$ticker->have_posts()) return;

$headlines = [];

while ($ticker->have_posts()) {
  $ticker->the_post();
  $headlines[] = get_the_title();
}

wp_reset_postdata();

$headlines = array_merge($headlines, $headlines);
?>

<div class="ticker-bar bg-green-dark text-white py-2 overflow-hidden">
  <span class="ticker-label font-bold px-4">Headlines</span>

  <div class="ticker-wrapper overflow-hidden">
    <div class="ticker-track flex gap-8 animate-marquee">
      <?php foreach ($headlines as $headline): ?>
        <span class="ticker-item whitespace-nowrap">
          <?php echo esc_html($headline); ?>
        </span>
      <?php endforeach; ?>
    </div>
  </div>
</div>