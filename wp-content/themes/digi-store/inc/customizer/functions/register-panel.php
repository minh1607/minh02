<?php
/**
 * Theme Customizer Functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
/******************** Digi Store CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'digi_store_customize_register_options', 20 );
function digi_store_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'digi_store_options_panel', array(
		'priority' => 2,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' =>  esc_html__( 'Theme Options', 'digi-store' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'digi_store_customize_register_featuredcontent' );
function digi_store_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'digi_store_featuredcontent_panel', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' =>  esc_html__( 'Slider Options', 'digi-store' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'digi_store_customize_register_widgets' );
function digi_store_customize_register_widgets( $wp_customize ) {
	$wp_customize->add_panel( 'widgets', array(
		'priority' => 33,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' =>  esc_html__( 'Widgets', 'digi-store' ),
		'description' => '',
	) );
}

?>