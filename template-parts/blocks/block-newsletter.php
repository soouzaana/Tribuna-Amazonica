<?php
if (!defined('ABSPATH')) exit;

$config_id = get_config_page_id();
if (!$config_id) return;

/**
 * Campos ACF
 */
$forced_variant = get_query_var('force_variant');
$variant = $forced_variant ?: (get_field('newsletter_variant', $config_id) ?: 'default');

/* ===========================
   FEEDBACK DO FORMULÁRIO
=========================== */
$newsletter_status = $_GET['newsletter'] ?? null;
$feedback_html = '';

if ($newsletter_status) {
  $status = sanitize_text_field($newsletter_status);

  switch ($status) {
    case 'success':
      $feedback_html = '
            <div class="bg-emerald-50 rounded-xl p-5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-2 text-emerald-600">
                    <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                    <path d="m9 11 3 3L22 4"></path>
                </svg>
                <h3 class="font-bold text-base text-emerald-800">✓ Inscrito!</h3>
                <p class="text-xs mt-1 text-emerald-600">Você receberá nossas atualizações.</p>
            </div>';
      break;

    case 'already_registered':
      $feedback_html = '
            <div class="bg-yellow-50 rounded-xl p-5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-2 text-yellow-600">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12" y2="16"></line>
                </svg>
                <h3 class="font-bold text-base text-yellow-800">Email já cadastrado</h3>
                <p class="text-xs mt-1 text-yellow-600">Este email já está inscrito.</p>
            </div>';
      break;

    default:
      $feedback_html = '
            <div class="bg-red-50 rounded-xl p-5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-2 text-red-600">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <h3 class="font-bold text-base text-red-800">Erro!</h3>
                <p class="text-xs mt-1 text-red-600">Ocorreu um problema. Tente novamente.</p>
            </div>';
      break;
  }
}

?>

<?php if ($feedback_html) : ?>
  <!-- ===========================
         FEEDBACK VISUAL
    ============================ -->
  <?= $feedback_html ?>
<?php else : ?>

  <?php if ($variant === 'sidebar') : ?>

    <!-- ===========================
             VARIANTE SIDEBAR
        ============================ -->
    <div class="block block-newsletter bg-emerald-50 rounded-xl p-5 h-full">
      <h3 class="text-base font-bold text-emerald-800 mb-3">
        Newsletter
      </h3>

      <form
        class="newsletter-form space-y-2"
        method="POST"
        action="<?= esc_url(admin_url('admin-post.php')); ?>"
        data-variant="sidebar">

        <input type="hidden" name="action" value="newsletter_signup">
        <?php wp_nonce_field('newsletter_signup', 'newsletter_nonce'); ?>

        <input
          type="email"
          name="newsletter_email"
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

    <!-- ===========================
             VARIANTE DEFAULT
        ============================ -->
    <div class="block block-newsletter bg-emerald-50 rounded-xl p-5">
      <h3 class="text-base font-bold text-emerald-800 mb-3">
        Newsletter
      </h3>

      <form
        class="newsletter-form flex flex-col gap-2"
        method="POST"
        action="<?= esc_url(admin_url('admin-post.php')); ?>"
        data-variant="default">

        <input type="hidden" name="action" value="newsletter_signup">
        <?php wp_nonce_field('newsletter_signup', 'newsletter_nonce'); ?>

        <input
          type="email"
          name="newsletter_email"
          placeholder="Seu email"
          required
          class="w-full bg-white border border-emerald-200 focus:border-emerald-500 h-9 text-sm rounded-md px-3" />

        <div class="flex items-start gap-2">
          <input
            type="checkbox"
            name="agreed"
            id="newsletter-terms-default"
            required
            class="mt-0.5 accent-emerald-700" />
          <label for="newsletter-terms-default" class="text-xs text-gray-600">
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

  <?php endif; ?>

<?php endif; ?>