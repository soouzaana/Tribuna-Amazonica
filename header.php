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
        <form role="search" method="get" class="search-box search-desktop" action="<?php echo esc_url(home_url('/')); ?>">
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

        <!-- HAMBURGUER MOBILE -->
        <button
          id="toggleMenu"
          class="md:hidden text-green-dark text-3xl bg-transparent hover:bg-transparent focus:bg-transparent active:bg-transparent p-2"
          aria-label="Abrir menu">
          ☰
        </button>
      </div>
    </div>

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

    <!-- MENU MOBILE INLINE -->
    <div
      id="mobileMenu"
      class="mobile-menu md:hidden bg-white border-t border-gray-100"
      aria-hidden="true">
      <!-- Busca Mobile -->
      <div class="p-4">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
          <input
            type="search"
            name="s"
            placeholder="Buscar..."
            value="<?php echo get_search_query(); ?>"
            class="w-full pl-10 pr-4 py-2 px-3 border border-gray-200 rounded-full text-sm focus:outline-none focus:border-emerald-500" />
        </form>
      </div>

      <!-- Links -->
      <ul class="pb-4">
        <li>
          <a class="block px-4 py-3 text-emerald-800 font-medium hover:bg-emerald-50 transition-colors"
            href="<?php echo esc_url(home_url('/')); ?>">
            Página Inicial
          </a>
        </li>

        <?php
        $menu_items = wp_get_nav_menu_items('menu-principal');
        if ($menu_items) :
          foreach ($menu_items as $item) :
        ?>
            <li>
              <a class="block px-4 py-3 text-emerald-800 font-medium hover:bg-emerald-50 transition-colors"
                href="<?php echo esc_url($item->url); ?>">
                <?php echo esc_html($item->title); ?>
              </a>
            </li>
        <?php
          endforeach;
        endif;
        ?>

        <?php
        $categories = get_categories(['orderby' => 'name']);
        foreach ($categories as $cat) :
        ?>
          <li>
            <a class="block px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-800 transition-colors"
              href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
              <?php echo esc_html($cat->name); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- TICKER -->
    <div class="ticker-bar bg-green-dark text-white py-2 overflow-hidden">
      <span class="ticker-label font-bold px-4">Headlines</span>
      <div class="ticker-wrapper overflow-hidden">
        <div class="ticker-track flex gap-8 animate-marquee">
          <?php
          $ticker = new WP_Query([
            'posts_per_page' => 5,
            'post_status'    => 'publish',
          ]);

          $headlines = [];
          while ($ticker->have_posts()) :
            $ticker->the_post();
            $headlines[] = get_the_title();
          endwhile;
          wp_reset_postdata();

          $headlines = array_merge($headlines, $headlines);

          foreach ($headlines as $headline) :
            echo '<span class="ticker-item whitespace-nowrap">' . esc_html($headline) . '</span>';
          endforeach;
          ?>
        </div>
      </div>
    </div>

  </header>

  <script>
    const toggleBtn = document.getElementById('toggleMenu');
    const mobileMenu = document.getElementById('mobileMenu');

    let isOpen = false;

    toggleBtn?.addEventListener('click', () => {
      if (!isOpen) {
        // abrir
        mobileMenu.style.height = mobileMenu.scrollHeight + 'px';
        mobileMenu.style.opacity = '1';
        mobileMenu.setAttribute('aria-hidden', 'false');
        toggleBtn.textContent = '✕';
      } else {
        // fechar
        mobileMenu.style.height = '0';
        mobileMenu.style.opacity = '0';
        mobileMenu.setAttribute('aria-hidden', 'true');
        toggleBtn.textContent = '☰';
      }

      isOpen = !isOpen;
    });
  </script>