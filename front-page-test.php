<?php get_header(); ?>

<?php if (have_rows('secoes_home')) : ?>
  <?php while (have_rows('secoes_home')) : the_row(); ?>

    <?php
    get_template_part(
      'template-parts/sections/' . get_row_layout(),
      null,
      get_sub_fields()
    );
    ?>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
