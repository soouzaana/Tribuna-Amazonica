<?php
if (!defined('ABSPATH')) exit;

function get_posts_by_category($args = [])
{
  $defaults = [
    'posts_per_page' => 4,
    'category'       => null,
    'exclude'        => [],
  ];

  $args = wp_parse_args($args, $defaults);

  return new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => $args['posts_per_page'],
    'cat'            => $args['category'],
    'post__not_in'   => $args['exclude'],
  ]);
}
