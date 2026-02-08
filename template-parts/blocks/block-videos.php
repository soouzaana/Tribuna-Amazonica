<?php
if (!defined('ABSPATH')) exit;

/**
 * ============================
 * CONTEXTO HOME (ACF FREE)
 * ============================
 */
$home = get_page_by_path('home');
if (!$home) return;
$home_id = $home->ID;

// toggle
if (!get_field('mostrar_videos', $home_id)) return;

// campos
$titulo    = get_field('videos_titulo', $home_id);
$qtd       = get_field('videos_qtd', $home_id) ?: 5;
$ver_mais  = get_field('videos_ver_mais', $home_id);
$categoria = get_field('videos_categoria', $home_id);

if (!$categoria instanceof WP_Term) return;

/**
 * ============================
 * QUERY ÚNICA
 * ============================
 */
$query = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => $qtd,
  'cat'            => $categoria->term_id,
  'post_status'    => 'publish',
  'ignore_sticky_posts'  => true,
]);

if (!$query->have_posts()) return;
?>

<section class="videos-section !bg-slate-900 text-white p-6 rounded-2xl space-y-6">

  <!-- HEADER -->
  <header class="flex justify-between items-baseline">
    <?php if ($titulo): ?>
      <h2 class="text-xl font-bold">
        <?= esc_html($titulo); ?>
      </h2>
    <?php endif; ?>

    <?php if ($ver_mais): ?>
      <a
        href="<?= esc_url(get_term_link($categoria)); ?>"
        class="text-emerald-400 font-medium hover:text-emerald-300 transition">
        Ver mais
      </a>
    <?php endif; ?>
  </header>

  <!-- LAYOUT -->
  <div class="videos-layout grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- DESTAQUE -->
    <div class="videos-highlight">
      <?php
      get_template_part(
        'template-parts/layouts/layout-destaque',
        null,
        ['query' => $query]
      );
      ?>
    </div>

    <!-- LISTA -->
    <div class="videos-list
  [&_.editor-title]:text-white
  [&_.editor-date]:text-white/60
  [&_.editor-pick:hover_.editor-title]:text-emerald-400
">

      <?php
      get_template_part(
        'template-parts/layouts/layout-list',
        null,
        ['query' => $query]
      );
      ?>
    </div>

  </div>

</section>

<?php wp_reset_postdata(); ?>