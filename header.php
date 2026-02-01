<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="bg-green-dark text-white">

    <!-- TOPO -->
    <div class="header-data">
      <div class="header-data-inner">
        <span>
          <?php
          setlocale(LC_TIME, 'pt_BR.UTF-8');
          echo date_i18n('d \d\e F \d\e Y H:i:s');
          ?>
        </span>

        <div class="redes">
          <a class="mr-3" href="<?php echo esc_url(site_url('/contato')); ?>">Contato</a>

          <a href="#" aria-label="Facebook">
            <?php theme_icon('facebook', 'icon'); ?>
          </a>

          <a href="#" aria-label="Twitter">
            <?php theme_icon('twitter', 'icon'); ?>
          </a>

          <a href="#" aria-label="Instagram">
            <?php theme_icon('instagram', 'icon'); ?>
          </a>

          <a href="#" aria-label="LinkedIn">
            <?php theme_icon('linkedin', 'icon'); ?>
          </a>
        </div>
      </div>
    </div>


    <!-- LOGO / BUSCA / HAMBURGUER -->
    <div class="bg-white text-green-dark">
      <div class="header-main">

        <!-- LOGO -->
        <div class="py-2">
          <p class="text-4xl md:text-4xl sm:text-2xl font-bold">Tribuna Amazônica</p>
          <p class="text-sm font-semibold opacity-80 hidden sm:block">
            Análise Jurídica, Doutrina e Julgados do Norte
          </p>
        </div>

        <!-- BUSCA DESKTOP -->
        <form role="search" method="get" class="search-box" action="<?php echo esc_url(home_url('/')); ?>">
          <label class="search-input">
            <span class="search-icon">
              <?php theme_icon('search', 'icon'); ?>
            </span>
            <input
              type="search"
              class="search-field"
              placeholder="Buscar..."
              value="<?php echo get_search_query(); ?>"
              name="s" />
          </label>
        </form>

        <!-- HAMBURGUER -->
        <button
          id="openMenu"
          class="md:hidden text-green-dark text-3xl"
          aria-label="Abrir menu">
          ☰
        </button>
      </div>
    </div>

    <!-- MENU DESKTOP -->
    <!-- MENU DESKTOP -->
    <div class="menu-div bg-green-dark">
      <nav class="menu-scroll hidden md:flex">
        <?php
        wp_nav_menu([
          'theme_location' => 'menu-principal',
          'container'      => false,
          'menu_class'     => 'menu-desktop',
          'depth'          => 1
        ]);
        ?>
      </nav>
    </div>

    <!-- OVERLAY -->
    <div
      id="overlay"
      class="fixed inset-0 bg-black/40 z-40 hidden"></div>

    <!-- DRAWER MOBILE -->
    <aside
      id="drawer"
      class="fixed top-0 right-0 h-full w-80 bg-white z-50 text-green-dark p-4 overflow-y-auto hidden">

      <div class="flex justify-between items-center mb-4">
        <strong class="text-lg">Menu</strong>
        <button id="closeMenu" class="text-2xl" aria-label="Fechar menu">✕</button>
      </div>

      <?php get_search_form(); ?>

      <nav class="flex flex-col divide-y mt-6">
        <?php
        wp_nav_menu([
          'theme_location' => 'menu-principal',
          'container'      => false,
          'items_wrap'     => '%3$s',
          'menu_class'     => 'hidden'
        ]);
        ?>
      </nav>
    </aside>

    <!-- TICKER -->
    <div class="ticker-bar bg-green-dark text-white py-2 overflow-hidden">
      <span class="ticker-label font-bold px-4">Headlines</span>

      <div class="ticker-wrapper overflow-hidden">
        <div class="ticker-track flex gap-8 animate-marquee">
          <?php
          // Pega as 5 últimas headlines
          $ticker = new WP_Query([
            'posts_per_page' => 5,
            'post_status'    => 'publish',
          ]);

          // Armazena as headlines
          $headlines = [];

          while ($ticker->have_posts()) :
            $ticker->the_post();
            $headlines[] = get_the_title();
          endwhile;

          wp_reset_postdata();

          // Duplica para criar loop infinito
          $headlines = array_merge($headlines, $headlines);

          // Renderiza
          foreach ($headlines as $headline) :
            echo '<span class="ticker-item whitespace-nowrap">' . esc_html($headline) . '</span>';
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </header>

  <script>
    const openBtn = document.getElementById('openMenu')
    const closeBtn = document.getElementById('closeMenu')
    const drawer = document.getElementById('drawer')
    const overlay = document.getElementById('overlay')

    function openMenu() {
      drawer.classList.remove('hidden')
      overlay.classList.remove('hidden')
    }

    function closeMenu() {
      drawer.classList.add('hidden')
      overlay.classList.add('hidden')
    }

    openBtn?.addEventListener('click', openMenu)
    closeBtn?.addEventListener('click', closeMenu)
    overlay?.addEventListener('click', closeMenu)
  </script>