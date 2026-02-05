<?php
$lead = get_field('lead');
if (!$lead) return;
?>

<div class="bg-emerald-50 border-l-4 border-emerald-600 p-6 rounded-r-xl mb-8">
  <p class="text-lg text-emerald-900 font-medium leading-relaxed">
    <?= esc_html($lead); ?>
  </p>
</div>