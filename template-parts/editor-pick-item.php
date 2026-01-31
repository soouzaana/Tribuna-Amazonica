<?php
$img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
if (!$img) {
  $img = get_template_directory_uri() . '/assets/images/featured-default.jpg';
}

$date = get_the_date('d M Y');
?>

<article class="editor-pick group">
  <div class="editor-image">
    <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" />
  </div>

  <div class="editor-content">
    <h3 class="editor-title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>

    <span class="editor-date"><?php echo esc_html($date); ?></span>
  </div>
</article>