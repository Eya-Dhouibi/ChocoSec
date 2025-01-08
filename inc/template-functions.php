<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package chocoSec
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function chocoSec_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'chocoSec_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function chocoSec_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'chocoSec_pingback_header' );


/**
 * Add lazy loading to images
 */
function add_lazy_loading_to_images($content) {
    $content = preg_replace('/<img(.*?)>/i', '<img$1 loading="lazy">', $content);
    return $content;
}
add_filter('the_content', 'add_lazy_loading_to_images');
add_filter('widget_text', 'add_lazy_loading_to_images');
add_filter('widget_text_content', 'add_lazy_loading_to_images');
add_filter('post_thumbnail_html', 'add_lazy_loading_to_images');

