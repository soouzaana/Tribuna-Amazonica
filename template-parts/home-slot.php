<?php
$index = $args['index'] ?? null;
if (!$index) return;

$ativa      = get_field("secao_{$index}_ativa");
$titulo     = get_field("secao_{$index}_titulo");
$quantidade = get_field("secao_{$index}_quantidade") ?: 6;
$layout     = get_field("secao_{$index}_layout") ?: 'grid';

// categoria (normalizada)
$categoria_field = get_field("secao_{$index}_categoria");

if (is_array($categoria_field)) {
  $categoria = $categoria_field[0] ?? null;
} else {
  $categoria = $categoria_field;
}

if (!$ativa || !$categoria instanceof WP_Term) return;

// valida layout
$allowed_layouts = ['grid', 'list', 'destaque'];
if (!in_array($layout, $allowed_layouts, true)) {
  $layout = 'grid';
}

// query
$query = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => $quantidade,
  'cat'            => $categoria->term_id,
  'post_status'    => 'publish',
]);

if (!$query->have_posts()) return;
?>


<section class="space-y-4">
  <?php if ($titulo): ?>
    <h2 class="text-2xl font-bold">
      <?php echo esc_html($titulo); ?>
    </h2>
  <?php endif; ?>

  <?php
  get_template_part(
    'template-parts/layouts/layout',
    $layout,
    ['query' => $query]
  );
  ?>
</section>

<?php wp_reset_postdata(); ?>