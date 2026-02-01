<?php
get_header();
?>

<main class="p-6 space-y-10 bg-gray-50">

  <?php
  for ($i = 1; $i <= 3; $i++) :
    if (!get_field("secao_{$i}_ativa")) continue;

    set_query_var('slot', $i);
    get_template_part(
      'template-parts/home-slot',
      null,
      ['index' => 1]
    );
    get_template_part('template-parts/home-slot', null, ['index' => 2]);
    get_template_part('template-parts/home-slot', null, ['index' => 3]);

  endfor;
  ?>

</main>

<?php get_footer(); ?>