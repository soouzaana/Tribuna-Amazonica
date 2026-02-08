<?php
if (!defined('ABSPATH')) exit;
?>

<div class="block block-news-social mb-12">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <?php
    set_query_var('force_variant', 'sidebar');
    get_template_part('template-parts/blocks/block', 'newsletter');
    set_query_var('force_variant', null);
    ?>

    <?php
    set_query_var('force_variant', 'sidebar');
    get_template_part('template-parts/blocks/block', 'instagram');
    set_query_var('force_variant', null);
    ?>

  </div>
</div>