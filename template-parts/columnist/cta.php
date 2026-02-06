<?php
$cta_text = get_field('cta_texto');
$cta_link = get_field('cta_link');

if (!$cta_text || !$cta_link) {
  return;
}
?>

<div class="mt-16 bg-emerald-700 rounded-xl p-8 text-center text-white">
  <h3 class="text-xl font-bold mb-4">
    <?php echo esc_html($cta_text); ?>
  </h3>

  <a
    href="<?php echo esc_url($cta_link); ?>"
    class="inline-flex items-center justify-center px-6 py-3 bg-white text-emerald-800 font-semibold rounded-lg hover:bg-emerald-50 transition-colors">
    Saiba mais
  </a>
</div>