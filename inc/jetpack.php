<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package easy-WebDev
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function easy_webdev_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'easy_webdev_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function easy_webdev_jetpack_setup
add_action( 'after_setup_theme', 'easy_webdev_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function easy_webdev_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function easy_webdev_infinite_scroll_render
