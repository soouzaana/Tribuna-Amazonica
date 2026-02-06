<?php if (!is_singular('columnist')) return; ?>

<div class="bg-white border-b">
  <div class="max-w-7xl mx-auto px-4 py-4">
    <div class="flex items-center gap-2 text-sm text-gray-500">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-emerald-700 transition-colors">
        Home
      </a>
      <span>/</span>
      <a href="<?php echo esc_url(get_post_type_archive_link('columnist')); ?>" class="hover:text-emerald-700 transition-colors">
        Colunistas
      </a>
      <span>/</span>
      <span class="text-gray-900 truncate max-w-xs">
        <?php the_title(); ?>
      </span>
    </div>
  </div>
</div>