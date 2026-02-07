<?php
$author_id = get_queried_object_id();

$instagram = get_field('colunist_instagram', 'user_' . $author_id);
$linkedin  = get_field('colunist_linkedin', 'user_' . $author_id);
$email     = get_field('colunist_email', 'user_' . $author_id);

if (!$instagram && !$linkedin && !$email) return;
?>

<div class="flex flex-wrap gap-3 justify-center md:justify-start">

  <?php if ($instagram): ?>
    <a
      href="<?= esc_url($instagram); ?>"
      target="_blank"
      rel="noopener noreferrer"
      class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg">
      <!-- Instagram icon -->
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
      </svg>

      <?= esc_html(parse_url($instagram, PHP_URL_PATH)); ?>
    </a>
  <?php endif; ?>

  <?php if ($linkedin): ?>
    <a
      href="<?= esc_url($linkedin); ?>"
      target="_blank"
      rel="noopener noreferrer"
      class="flex items-center gap-2 px-4 py-2 bg-blue-700 rounded-full hover:bg-blue-800 transition-colors shadow-lg">
      <!-- LinkedIn icon -->
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
        <rect width="4" height="12" x="2" y="9"></rect>
        <circle cx="4" cy="4" r="2"></circle>
      </svg>

      LinkedIn
    </a>
  <?php endif; ?>

  <?php if ($email): ?>
    <a
      href="mailto:<?= esc_attr($email); ?>"
      class="flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full hover:bg-white/30 transition-colors shadow-lg">
      <!-- Mail icon -->
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
      </svg>

      Contato
    </a>
  <?php endif; ?>

</div>