<?php
if (!defined('ABSPATH')) exit;

$primary   = $args['primary'] ?? null;
$secondary = $args['secondary'] ?? null;

if (!$primary || !$secondary) return;

$query_primary   = $primary['query'] ?? null;
$layout_primary  = $primary['layout'] ?? 'grid';
$title_primary   = $primary['title'] ?? null;
$term_primary    = $primary['term'] ?? null;

$query_secondary  = $secondary['query'] ?? null;
$layout_secondary = $secondary['layout'] ?? 'list';
$title_secondary  = $secondary['title'] ?? null;
$term_secondary   = $secondary['term'] ?? null;

if (
  !$query_primary instanceof WP_Query ||
  !$query_secondary instanceof WP_Query
) {
  return;
}

$ratio   = $args['ratio'] ?? '2-1';
$reverse = !empty($args['reverse_mobile']);

// GRID BASE
$grid = 'grid gap-8';

// PROPORÇÃO
$cols = $ratio === '1-1'
  ? 'md:grid-cols-2'
  : 'md:grid-cols-3';

// ORDEM MOBILE
$order_primary   = $reverse ? 'order-2 md:order-1' : 'order-1';
$order_secondary = $reverse ? 'order-1 md:order-2' : 'order-2';

// SPANS
$span_primary   = $ratio === '2-1' ? 'md:col-span-2' : '';
$span_secondary = 'md:col-span-1';
?>

<div class="<?php echo esc_attr("$grid $cols"); ?>">

  <!-- COLUNA PRINCIPAL -->
  <div class="<?php echo esc_attr("$order_primary $span_primary"); ?>">
    <?php
    if ($title_primary) {
      get_template_part(
        'template-parts/ui/section-title',
        null,
        [
          'title' => $title_primary,
          'tag'   => 'h3',
          'link'  => $term_primary instanceof WP_Term
            ? get_category_link($term_primary->term_id)
            : null,
        ]
      );
    }
    ?>

    <?php
    get_template_part(
      'template-parts/layouts/layout',
      $layout_primary,
      ['query' => $query_primary]
    );
    ?>
  </div>

  <!-- COLUNA SECUNDÁRIA -->
  <aside class="<?php echo esc_attr("$order_secondary $span_secondary"); ?>">
    <?php
    if ($title_secondary) {
      get_template_part(
        'template-parts/ui/section-title',
        null,
        [
          'title' => $title_secondary,
          'tag'   => 'h3',
          'link'  => $term_secondary instanceof WP_Term
            ? get_category_link($term_secondary->term_id)
            : null,
        ]
      );
    }
    ?>

    <?php
    get_template_part(
      'template-parts/layouts/layout',
      $layout_secondary,
      ['query' => $query_secondary]
    );
    ?>
  </aside>

</div>