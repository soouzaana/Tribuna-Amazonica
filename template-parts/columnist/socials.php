<?php
$instagram = get_field('colunist_instagram');
$linkedin  = get_field('colunist_linkedin');
$email     = get_field('colunist_email');

if (!$instagram && !$linkedin && !$email) return;
?>

<div class="flex flex-wrap gap-3 justify-center md:justify-start">

  <?php if ($instagram): ?>
    <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener"
      class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white shadow-lg">
      Instagram
    </a>
  <?php endif; ?>

  <?php if ($linkedin): ?>
    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener"
      class="px-4 py-2 bg-blue-700 rounded-full text-white shadow-lg">
      LinkedIn
    </a>
  <?php endif; ?>

  <?php if ($email): ?>
    <a href="mailto:<?php echo esc_attr($email); ?>"
      class="px-4 py-2 bg-white/20 rounded-full text-white shadow-lg">
      Contato
    </a>
  <?php endif; ?>

</div>