<?php get_header(); ?>

<main class="p-6 space-y-10 bg-gray-50">

  <!-- destaques -->
  <?php get_template_part('template-parts/featured'); ?>

  <!-- home section -->
  <?php get_template_part('template-parts/home-section'); ?>

  <!-- jurisprudencia e decisões -->
  <?php get_template_part('template-parts/law'); ?>

  <!-- direito administrativo -->
  <?php get_template_part('template-parts/administrative'); ?>

  <!-- newsletter -->
  <?php get_template_part('template-parts/newsletter'); ?>

  <!-- video section -->
  <?php get_template_part('template-parts/section-videos'); ?>

  <!-- opiniao e doutrina -->
  <?php get_template_part('template-parts/opinion-doutrine'); ?>

  <!-- mais lidas -->
  <?php get_template_part('template-parts/most-read'); ?>

</main>

<?php get_footer(); ?>

<script src="https://cdn.tailwindcss.com"></script>