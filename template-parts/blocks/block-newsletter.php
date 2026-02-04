<?php
if (!defined('ABSPATH')) exit;

$config_id = get_config_page_id();
if (!$config_id) return;

/**
 * Campos ACF
 */
$variant = get_field('newsletter_variant', $config_id) ?: 'default';
?>

<?php if ($variant === 'sidebar') : ?>

  <!-- Variante Sidebar -->
  <div class="block block-newsletter bg-emerald-50 rounded-xl p-5">
    <h3 class="text-base font-bold text-emerald-800 mb-3">
      Newsletter
    </h3>

    <form class="newsletter-form space-y-2" data-variant="sidebar">
      <input
        type="email"
        name="email"
        placeholder="Seu email"
        required
        class="w-full bg-white border border-emerald-200 focus:border-emerald-500 h-9 text-sm rounded-md px-3" />

      <div class="flex items-start gap-2">
        <input
          type="checkbox"
          name="agreed"
          id="newsletter-terms-sidebar"
          required
          class="mt-0.5 accent-emerald-700" />
        <label for="newsletter-terms-sidebar" class="text-xs text-gray-600">
          Aceito receber comunicações
        </label>
      </div>

      <button
        type="submit"
        class="w-full bg-emerald-700 hover:bg-emerald-800 h-9 text-sm text-white font-semibold rounded-md transition-colors">
        Assinar
      </button>
    </form>
  </div>

<?php else : ?>

  <!-- Variante Default -->
  <div class="block block-newsletter bg-emerald-50 rounded-xl p-5">
    <h3 class="text-base font-bold text-emerald-800 mb-3">
      Newsletter
    </h3>

    <form class="space-y-4 px-9" data-variant="sidebar">
      <!-- Email -->
      <input
        type="email"
        name="email"
        placeholder="Seu email"
        required
        class="block w-full bg-white border border-emerald-200 focus:border-emerald-500 h-9 text-sm rounded-md px-3" />

      <!-- Checkbox e label em bloco -->
      <div class="flex gap-1">
        <input
          type="checkbox"
          name="agreed"
          id="newsletter-terms-sidebar"
          required
          class="block accent-emerald-700 mb-1" />
        <label for="newsletter-terms-sidebar" class="block text-xs text-gray-600">
          Aceito receber comunicações
        </label>
      </div>

      <!-- Botão -->
      <div class="flex items-center">
        <button
          type="submit"
          class="bg-emerald-700 hover:bg-emerald-800 w-1/4 h-9 text-sm text-white font-semibold rounded-md transition-colors mx-auto">
          Assinar
        </button>
      </div>
    </form>
  </div>

<?php endif; ?>