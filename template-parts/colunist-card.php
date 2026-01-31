<?php
$name = get_the_title();
$area = get_field('colunist_area');
$description = get_field('colunist_description');
$image = get_field(get_the_ID(), 'colunist-image');
if (!$image) $image = get_template_directory_uri() . '/assets/images/featured-default.jpg';
$instagram = get_field('colunist_instagram');
$linkedin  = get_field('colunist_linkedin');
$email     = get_field('colunist_email');
?>

<article class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
  <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-emerald-100 to-emerald-50">
    <a href="<?php the_permalink(); ?>">
      <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
    </a>
  </div>

  <div class="p-6">
    <a href="<?php the_permalink(); ?>">
      <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-700 transition-colors"><?php echo esc_html($name); ?></h3>
    </a>

    <?php if ($area) : ?>
      <p class="text-sm text-emerald-600 font-medium mb-3"><?php echo esc_html($area); ?></p>
    <?php endif; ?>

    <?php if ($description) : ?>
      <p class="text-gray-600 text-sm line-clamp-3 mb-4"><?php echo esc_html($description); ?></p>
    <?php endif; ?>

    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
      <div class="flex gap-2">
        <?php if ($instagram) : ?>
          <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" class="social-icon w-9 h-9 rounded-full bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center hover:scale-110 transition-transform" title="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <circle cx="12" cy="12" r="4"></circle>
              <circle cx="17.5" cy="6.5" r="1"></circle>
            </svg>
          </a>
        <?php endif; ?>

        <?php if ($linkedin) : ?>
          <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" class="social-icon w-9 h-9 rounded-full bg-blue-700 flex items-center justify-center hover:scale-110 transition-transform" title="LinkedIn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon">
              <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
              <rect x="2" y="9" width="4" height="12"></rect>
              <circle cx="4" cy="4" r="2"></circle>
            </svg>
          </a>
        <?php endif; ?>


        <?php if ($email) : ?>
          <a href="mailto:<?php echo esc_attr($email); ?>" class="social-icon w-9 h-9 rounded-full bg-emerald-700 flex items-center justify-center hover:scale-110 transition-transform" title="Email">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon">
              <rect x="2" y="4" width="20" height="16" rx="2"></rect>
              <path d="M22 7 L13 12.7 A1.94 1.94 0 0 1 11 12.7 L2 7"></path>
            </svg>
          </a>
        <?php endif; ?>
      </div>

      <a href="<?php the_permalink(); ?>">
        <button class="botao inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-emerald-600 bg-white shadow-sm hover:bg-emerald-50 h-8 rounded-md px-3 text-xs text-emerald-700 hover:text-emerald-900">
          Ver Artigos
        </button>
      </a>
    </div>
  </div>
</article>