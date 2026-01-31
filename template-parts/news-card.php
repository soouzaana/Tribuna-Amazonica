<?php
// Recebe $post ou $news via get_template_part
// Mas vamos usar o loop do WP normalmente

$img = get_the_post_thumbnail_url(get_the_ID(), 'large');
if (!$img) {
  $img = get_template_directory_uri() . '/assets/images/featured-default.jpg';
}

$categories = get_the_category();
$badge = !empty($categories) ? $categories[0]->name : '';

$date = get_the_date('d M Y');
$comments = get_comments_number();
$live = get_post_meta(get_the_ID(), 'live', true) == '1';
?>

<article class="relative">
  <div class="relative overflow-hidden rounded-2xl">
    <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>"
      class="image w-full h-48 object-cover transition-transform duration-300 hover:scale-105">

    <!-- BADGE CATEGORIA -->
    <?php if ($badge) : ?>
      <span class="absolute top-2 right-2 bg-emerald-500/60 text-white text-xs font-semibold px-2 py-1 rounded-full">
        <?php echo esc_html($badge); ?>
      </span>
    <?php endif; ?>

    <!-- BADGE LIVE -->
    <?php if ($live) : ?>
      <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full flex items-center gap-1">
        <svg class="w-3 h-3 animate-pulse" fill="currentColor" viewBox="0 0 8 8">
          <circle cx="4" cy="4" r="4" />
        </svg>
        Live
      </span>

      <!-- BOTÃO PLAY CENTRAL -->
      <button class="absolute inset-0 m-auto w-12 h-12 rounded-full flex items-center justify-center opacity-80 hover:opacity-100 transition-opacity">
        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
          <path d="M5 3v18l15-9z" />
        </svg>
      </button>
    <?php endif; ?>
  </div>

  <div class="p-3 flex flex-col gap-1">
    <h3 class="font-semibold text-lg hover:text-emerald-500 transition-colors cursor-pointer">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>

    <div class="text-gray-600 text-sm flex gap-4">
      <span><?php echo esc_html($date); ?></span>
      <span>|</span>
      <span class="flex icon">
        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M9.61886 19.6898C9.55095 19.6898 9.50568 19.6672 9.43777 19.6445C9.27932 19.5766 9.18877 19.4182 9.18877 19.2597V16.3403C3.91539 15.7518 0 12.3117 0 8.21531C0 3.68899 4.82057 0 10.7503 0C16.6799 0 21.5005 3.68903 21.5005 8.21531C21.5005 11.8364 18.3319 15.0726 13.8054 16.091L9.89036 19.5765C9.82245 19.6444 9.70927 19.6897 9.61872 19.6897L9.61886 19.6898ZM10.7505 0.859904C5.29607 0.859904 0.860487 4.16413 0.860487 8.21541C0.860487 11.9724 4.64008 15.0956 9.64182 15.5256C9.86818 15.5482 10.0266 15.7293 10.0266 15.9556V18.2867L13.3082 15.3671C13.3535 15.3218 13.4214 15.2766 13.512 15.2766C17.7214 14.3713 20.6411 11.4743 20.6411 8.2153C20.6411 4.16425 16.2052 0.859796 10.7511 0.859796L10.7505 0.859904Z"
            fill="currentColor" />
        </svg>
        <?php echo esc_html($comments); ?> comentários
      </span>
    </div>
  </div>
</article>