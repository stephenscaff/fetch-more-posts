<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 *   Fetch More Posts
 *   A simple load more / pagination replacement using Fetch API
 *
 *   @see fetch-more-posts/fetch-more-posts.js
 *   @see scss/components/_load-more.scss
 */
add_action('template_redirect', 'wp_fetch_more_posts');

function wp_fetch_more_posts() {
  global $wp_query;

  if( is_home() || is_archive() || is_tax() ) {

    /**
     * Load script. Note directoroy location inside an
     */
    wp_enqueue_script('wp_fetch_more_posts_js',
    get_template_directory_uri() . '/inc/fetch-more-posts/fetch-more-posts.js', '', false, true );

    $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
    $max_pages = $wp_query->max_num_pages;

    wp_localize_script(
      'wp_fetch_more_posts_js',
      'wpFetchMorePosts',
      array(
        'startPage' => $paged,
        'maxPages'  => $max_pages,
        'nextLink'  => next_posts($max_pages, false),
      )
    );
  }
}
