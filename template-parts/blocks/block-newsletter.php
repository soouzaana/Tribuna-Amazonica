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
  <section class="block block-newsletter bg-gradient-to-r from-emerald-800 to-emerald-700 rounded-xl p-6">
    <div class="max-w-xl mx-auto text-center">

      <h3 class="text-lg font-bold text-white mb-4">
        Receba Nossas Notícias
      </h3>

      <form class="newsletter-form flex flex-col sm:flex-row gap-2" data-variant="default">
        <input
          type="email"
          name="email"
          placeholder="Seu email"
          required
          class="flex-1 bg-white border-0 text-gray-900 placeholder:text-gray-400 h-9 text-sm rounded-md px-3" />

        <button
          type="submit"
          class="bg-white text-emerald-800 hover:bg-emerald-50 h-9 px-5 text-sm font-semibold rounded-md transition-colors">
          Assinar
        </button>
      </form>

      <div class="flex items-center justify-center gap-1.5 mt-2">
        <input
          type="checkbox"
          name="agreed"
          id="newsletter-terms"
          required
          class="h-3.5 w-3.5 accent-white" />
        <label for="newsletter-terms" class="text-xs text-emerald-100">
          Aceito receber comunicações
        </label>
      </div>

    </div>
  </section>

<?php endif; ?>