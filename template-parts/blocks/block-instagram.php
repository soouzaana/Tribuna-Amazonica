<?php
if (!defined('ABSPATH')) exit;

$config_id = get_config_page_id();
if (!$config_id) return;

/**
 * Campos ACF
 */
$username = get_field('instagram_username', $config_id) ?: 'tribunaamazonica';
$variant  = get_field('instagram_variant', $config_id) ?: 'default';

$instagram_url = 'https://instagram.com/' . ltrim($username, '@');
$username_clean = ltrim($username, '@');
?>  

<?php if ($variant === 'sidebar') : ?>

  <!-- Variante Sidebar -->
  <div class="block block-instagram bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl p-5 text-center">
    <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full mb-3">
      <!-- Ícone Instagram -->
      <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
        <circle cx="12" cy="12" r="4" />
        <circle cx="17.5" cy="6.5" r="1" />
      </svg>
    </div>

    <h3 class="text-base font-bold text-gray-900 mb-2">
      Siga no Instagram
    </h3>

    <p class="text-xs text-gray-600 mb-4">
      Fique por dentro das nossas atualizações diárias
    </p>

    <a href="<?= esc_url($instagram_url); ?>"
      target="_blank"
      rel="noopener noreferrer"
      class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg text-sm font-semibold hover:from-purple-700 hover:to-pink-700 transition-all">

      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
        <circle cx="12" cy="12" r="4" />
        <circle cx="17.5" cy="6.5" r="1" />
      </svg>

      @<?= esc_html($username_clean); ?>
    </a>
  </div>

<?php else : ?>

  <!-- Variante Default -->
  <section class="block block-instagram bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-12">
    <div class="max-w-xl mx-auto text-center">

      <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
          <circle cx="12" cy="12" r="4" />
          <circle cx="17.5" cy="6.5" r="1" />
        </svg>
      </div>

      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">
        Siga no Instagram
      </h2>

      <p class="text-gray-600 mb-6">
        Acompanhe nossas análises jurídicas, bastidores e conteúdos exclusivos em
        <strong> @<?= esc_html($username_clean); ?></strong>
      </p>

      <a href="<?= esc_url($instagram_url); ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full font-semibold hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
          <circle cx="12" cy="12" r="4" />
          <circle cx="17.5" cy="6.5" r="1" />
        </svg>

        Seguir @<?= esc_html($username_clean); ?>
      </a>

    </div>
  </section>

<?php endif; ?>