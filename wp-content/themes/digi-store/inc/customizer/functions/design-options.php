<?php
/**
 * Theme Customizer Functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
$digi_store_settings = digi_store_get_theme_options();
/******************** Digi Store LAYOUT OPTIONS ******************************************/
	$wp_customize->add_section('digi_store_layout_options', array(
		'title' =>  esc_html__('Layout Options', 'digi-store'),
		'priority' => 2,
		'panel' => 'digi_store_options_panel'
	));
	$wp_customize->add_setting( 'digi_store_theme_options[digi_store_entry_meta_blog]', array(
		'default' => $digi_store_settings['digi_store_entry_meta_blog'],
		'sanitize_callback' => 'digi_store_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'digi_store_theme_options[digi_store_entry_meta_blog]', array(
		'priority'=>45,
		'label' =>  esc_html__('Meta for blog page', 'digi-store'),
		'section' => 'digi_store_layout_options',
		'type'	=> 'select',
		'choices' => array(
		'show-meta' =>  esc_html__('Show Meta','digi-store'),
		'hide-meta' =>  esc_html__('Hide Meta','digi-store'),
	),
	));
	$wp_customize->add_setting('digi_store_theme_options[digi_store_design_layout]', array(
		'default'        => $digi_store_settings['digi_store_design_layout'],
		'sanitize_callback' => 'digi_store_sanitize_select',
		'type'                  => 'option',
	));
	$wp_customize->add_control('digi_store_theme_options[digi_store_design_layout]', array(
	'priority'  =>50,
	'label'      =>  esc_html__('Design Layout', 'digi-store'),
	'section'    => 'digi_store_layout_options',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'wide-layout' =>  esc_html__('Full Width Layout','digi-store'),
		'boxed-layout' =>  esc_html__('Boxed Layout','digi-store'),
	),
));
?>