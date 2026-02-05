<?php
$categories = get_the_category();
$category   = $categories[0] ?? null;
?>

<?php if ($category): ?>
  <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-800 text-sm font-semibold rounded-full mb-4">
    <?= esc_html($category->name); ?>
  </span>
<?php endif; ?>

<h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
  <?php the_title(); ?>
</h1>

<div class="flex flex-wrap items-center gap-4 text-gray-500 mb-8 pb-8 border-b">

  <!-- Autor -->
  <div class="flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="text-emerald-600">
      <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
      <circle cx="12" cy="7" r="4"></circle>
    </svg>
    <span class="font-medium text-gray-700">
      <?php the_author(); ?>
    </span>
  </div>

  <!-- Data -->
  <div class="flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="text-emerald-600">
      <path d="M8 2v4"></path>
      <path d="M16 2v4"></path>
      <rect width="18" height="18" x="3" y="4" rx="2"></rect>
      <path d="M3 10h18"></path>
    </svg>
    <span><?php echo get_the_date('d \d\e F \d\e Y'); ?></span>
  </div>

  <!-- Hora -->
  <div class="flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="text-emerald-600">
      <circle cx="12" cy="12" r="10"></circle>
      <polyline points="12 6 12 12 16 14"></polyline>
    </svg>
    <span><?php echo get_the_time('H:i'); ?></span>
  </div>

  <!-- Comentários -->
  <div class="flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="text-emerald-600">
      <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
    </svg>
    <span>
      <?php comments_number('0 Comentários', '1 Comentário', '% Comentários'); ?>
    </span>
  </div>

</div>