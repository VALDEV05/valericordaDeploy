<?php
/**
 * Konte functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Konte Child
 */

add_action( 'wp_enqueue_scripts', 'konte_child_enqueue_scripts', 20 );

function konte_child_enqueue_scripts() {
	wp_enqueue_style( 'konte-child', get_stylesheet_uri() );

	if ( is_rtl() ) {
		wp_enqueue_style( 'konte-rtl', get_template_directory_uri() . '/rtl.css' );
	}
}
