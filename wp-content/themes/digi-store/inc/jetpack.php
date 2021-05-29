<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
/*********** Digi Store ADD THEME SUPPORT FOR INFINITE SCROLL **************************/
if (! function_exists('digi_store_jetpack_setup')) {
	function digi_store_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'footer'    => 'page',
		) );
	}
	add_action( 'after_setup_theme', 'digi_store_jetpack_setup' );
}