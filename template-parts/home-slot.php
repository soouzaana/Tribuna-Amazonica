<?php
if (!defined('ABSPATH')) exit;

$index = $args['index'] ?? null;
$with_colunistas = $args['with_colunistas'] ?? false;
if (!$index) return;

$ativa  = get_field("secao_{$index}_ativa");
$titulo = get_field("secao_{$index}_titulo");
$layout = get_field("secao_{$index}_layout") ?: 'grid';

if (!$ativa) return;

/**
 * ==================================================
 * WRAPPER COM COLUNISTAS (layout compositor)
 * ==================================================
 */
if ($with_colunistas): ?>
  <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    <div class="space-y-6 lg:col-span-2">
    <?php endif; ?>


    <?php
    /**
     * ============================
     * SPLIT (layout compositor)
     * ============================
     */
    if ($layout === 'split') {

      // PRIMARY
      $cat_primary    = get_field("secao_{$index}_split_categoria_principal");
      $qty_primary    = get_field("secao_{$index}_split_quantidade_principal") ?: 6;
      $layout_primary = get_field("secao_{$index}_split_layout_principal") ?: 'grid';
      $title_primary  = get_field("secao_{$index}_split_titulo_principal");

      // SECONDARY
      $cat_secondary    = get_field("secao_{$index}_split_categoria_secundaria");
      $qty_secondary    = get_field("secao_{$index}_split_quantidade_secundaria") ?: 4;
      $layout_secondary = get_field("secao_{$index}_split_layout_secundario") ?: 'list';
      $title_secondary  = get_field("secao_{$index}_split_titulo_secundario");

      if (!$cat_primary || !$cat_secondary) return;

      $allowed = ['grid', 'list', 'destaque'];

      if (!in_array($layout_primary, $allowed, true)) {
        $layout_primary = 'grid';
      }

      if (!in_array($layout_secondary, $allowed, true)) {
        $layout_secondary = 'list';
      }

      $primary_term   = is_array($cat_primary) ? $cat_primary[0] : $cat_primary;
      $secondary_term = is_array($cat_secondary) ? $cat_secondary[0] : $cat_secondary;

      if (
        !$primary_term instanceof WP_Term ||
        !$secondary_term instanceof WP_Term
      ) return;

      $query_primary = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => $qty_primary,
        'cat'            => $primary_term->term_id,
        'post_status'    => 'publish',
        'ignore_sticky_posts'  => true,
      ]);

      $query_secondary = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => $qty_secondary,
        'cat'            => $secondary_term->term_id,
        'post_status'    => 'publish',
        'ignore_sticky_posts'  => true,
      ]);

      if (!$query_primary->have_posts() && !$query_secondary->have_posts()) return;
    ?>

      <section class="space-y-6">
        <?php
      $mostrar_ver_mais = get_field("secao_{$index}_mostrar_ver_mais");

      get_template_part(
        'template-parts/ui/section-title',
        null,
        [
          'title' => $titulo,
          'tag'   => 'h2',
          'link'  => $mostrar_ver_mais
            ? get_category_link($categoria->term_id)
            : null,
        ]
      );


      $mostrar_primary   = get_field("secao_{$index}_split_primary_mostrar_ver_mais");
      $mostrar_secondary = get_field("secao_{$index}_split_secondary_mostrar_ver_mais");

      get_template_part(
        'template-parts/layouts/layout-split',
        null,
        [
          'primary' => [
            'query'  => $query_primary,
            'layout' => $layout_primary,
            'title'  => $title_primary,
            'term'   => $mostrar_primary ? $primary_term : null,
          ],
          'secondary' => [
            'query'  => $query_secondary,
            'layout' => $layout_secondary,
            'title'  => $title_secondary,
            'term'   => $mostrar_secondary ? $secondary_term : null,
          ],
        ]
      );
    ?>
      </section>

    <?php
    } else {
      /**
       * ============================
       * LAYOUTS SIMPLES (atômicos)
       * ============================
       */
      $categoria_field = get_field("secao_{$index}_categoria");
      $categoria = is_array($categoria_field)
        ? ($categoria_field[0] ?? null)
        : $categoria_field;

      if (!$categoria instanceof WP_Term) return;

      $quantidade = get_field("secao_{$index}_quantidade") ?: 6;

      $allowed_layouts = ['grid', 'list', 'destaque'];
      if (!in_array($layout, $allowed_layouts, true)) {
        $layout = 'grid';
      }

      $query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => $quantidade,
        'cat'            => $categoria->term_id,
        'post_status'    => 'publish',
        'ignore_sticky_posts'  => true,
      ]);

      if (!$query->have_posts()) return;
    ?>

      <section class="space-y-6">
        <?php
        get_template_part(
          'template-parts/ui/section-title',
          null,
          [
            'title' => $titulo,
            'tag'   => 'h2',
          ]
        );

        get_template_part(
          'template-parts/layouts/layout',
          $layout,
          ['query' => $query]
        );
        ?>
      </section>

    <?php } ?>


    <?php
    /**
     * ==================================================
     * SIDEBAR — COLUNISTAS
     * ==================================================
     */
    if ($with_colunistas): ?>
    </div>

    <aside class="space-y-6 lg:col-span-1">
      <?php get_template_part('template-parts/blocks/block-colunista'); ?>
    </aside>
  </section>
<?php endif; ?>