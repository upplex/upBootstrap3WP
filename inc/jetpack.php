<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function upbootwp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'upbootwp_jetpack_setup' );
