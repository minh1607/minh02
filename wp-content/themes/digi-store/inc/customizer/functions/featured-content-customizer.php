<?php
/**
 * Theme Customizer Functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
/******************** Digi Store SLIDER SETTINGS ******************************************/
$digi_store_settings = digi_store_get_theme_options();

$wp_customize->add_section( 'digi_store_page_post_options', array(
	'title' =>  esc_html__('Slider Option','digi-store'),
	'priority' => 3,
	'panel' =>'digi_store_options_panel'
));
for ( $i=1; $i <= $digi_store_settings['digi_store_slider_no'] ; $i++ ) {
	$wp_customize->add_setting('digi_store_theme_options[digi_store_featured_page_slider_'. $i .']', array(
		'default' =>'',
		'sanitize_callback' =>'digi_store_sanitize_page',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( 'digi_store_theme_options[digi_store_featured_page_slider_'. $i .']', array(
		'priority' => 220 . $i,
		'label' =>  esc_html__(' Page Slider', 'digi-store') . ' ' . $i ,
		'section' => 'digi_store_page_post_options',
		'type' => 'dropdown-pages',
	));
}