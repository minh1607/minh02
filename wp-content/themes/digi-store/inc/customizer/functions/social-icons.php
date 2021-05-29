<?php
/**
 * Theme Customizer Functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
$digi_store_settings = digi_store_get_theme_options();
/******************** Digi Store SOCIAL ICONS ******************************************/
$wp_customize->add_section( 'digi_store_social_icons', array(
	'title' =>  esc_html__('Social Icons','digi-store'),
	'priority' => 400,
	'panel' =>'digi_store_options_panel'
));
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_facebook]', array(
	'default' => $digi_store_settings['digi_store_social_facebook'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_facebook]', array(
	'priority' => 410,
	'label' =>  esc_html__( 'Facebook Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_twitter]', array(
	'default' => $digi_store_settings['digi_store_social_twitter'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_twitter]', array(
	'priority' => 420,
	'label' =>  esc_html__( 'Twitter Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_pinterest]', array(
	'default' => $digi_store_settings['digi_store_social_pinterest'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_pinterest]', array(
	'priority' => 430,
	'label' =>  esc_html__( 'Pinterest Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_dribbble]', array(
	'default' => $digi_store_settings['digi_store_social_dribbble'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_dribbble]', array(
	'priority' => 440,
	'label' =>  esc_html__( 'Dribbble Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_instagram]', array(
	'default' => $digi_store_settings['digi_store_social_instagram'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_instagram]', array(
	'priority' => 450,
	'label' =>  esc_html__( 'Instagram Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_flickr]', array(
	'default' => $digi_store_settings['digi_store_social_flickr'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_flickr]', array(
	'priority' => 460,
	'label' =>  esc_html__( 'Flickr Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_googleplus]', array(
	'default' => $digi_store_settings['digi_store_social_googleplus'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_googleplus]', array(
	'priority' => 470,
	'label' =>  esc_html__( 'Google Plus Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'digi_store_theme_options[digi_store_social_linkedin]', array(
	'default' => $digi_store_settings['digi_store_social_linkedin'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'edit_theme_options'
	)
);
$wp_customize->add_control( 'digi_store_theme_options[digi_store_social_linkedin]', array(
	'priority' => 480,
	'label' =>  esc_html__( 'Linkedin Link', 'digi-store' ),
	'section' => 'digi_store_social_icons',
	'type' => 'text',
	)
);
	?>