<?php
$categories   = get_categories(['hide_empty' => true]);
$page_posts   = get_option('page_for_posts');

$current_obj  = get_queried_object();
$current_cat  = is_category() ? $current_obj->term_id : null;

$base_classes = 'px-4 py-2 rounded-full text-sm font-medium transition';
?>

<?php if ($categories): ?>
  <nav class="mb-10 flex flex-wrap gap-2">

    <!-- TODAS -->
    <a
      href="<?php echo esc_url(get_permalink($page_posts)); ?>"
      class="<?php
              echo $base_classes . ' ' .
                (!$current_cat
                  ? 'bg-emerald-600 text-white'
                  : 'bg-gray-100 text-gray-700 hover:bg-emerald-100 hover:text-emerald-700');
              ?>">
      Todas
    </a>

    <!-- CATEGORIAS -->
    <?php foreach ($categories as $cat): ?>
      <a
        href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
        class="<?php
                echo $base_classes . ' ' .
                  ($current_cat === $cat->term_id
                    ? 'bg-emerald-600 text-white'
                    : 'bg-gray-100 text-gray-700 hover:bg-emerald-100 hover:text-emerald-700');
                ?>">
        <?php echo esc_html($cat->name); ?>
      </a>
    <?php endforeach; ?>

  </nav>
<?php endif; ?>