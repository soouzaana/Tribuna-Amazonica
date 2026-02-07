<?php
get_header();
?>
<main>
  <h1>INDEX FALLBACK</h1>

  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      the_title('<h2>', '</h2>');
      the_content();
    endwhile;
  else :
    echo '<p>Sem conteúdo</p>';
  endif;
  ?>
</main>

<?php
get_footer();