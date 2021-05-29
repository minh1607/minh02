<?php
/**
 * Theme Customizer Functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
/********************Digi Store Contact us SETTINGS ******************************************/
$digi_store_settings = digi_store_get_theme_options();

 //Contact page

$wp_customize->add_section( 'digi_store_contact_page', array(
    'title'       =>  esc_html__( 'Contact Us Page Options', 'digi-store' ),
    'priority'    => 34,
    'panel' => 'digi_store_options_panel'
) );

$wp_customize->add_setting('digi_store_theme_options[digi_store_contact_address]',
        array(
            'type'    => 'option',
            'default' => $digi_store_settings['digi_store_contact_address'],
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
            )
);
$wp_customize->add_control('digi_store_theme_options[digi_store_contact_address]',
        array(
            'type'    => 'text',
            'label'   => esc_html__( 'Add Address', 'digi-store' ),
            'section' => 'digi_store_contact_page',
            'settings'=> 'digi_store_theme_options[digi_store_contact_address]'
            )
);

$wp_customize->add_setting('digi_store_theme_options[digi_store_contact_phone]',
        array(
            'type'    => 'option',
            'default' => $digi_store_settings['digi_store_contact_phone'],
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
            )
);
$wp_customize->add_control('digi_store_theme_options[digi_store_contact_phone]',
        array(
            'type'    => 'text',
            'label'   => esc_html__( 'Add Phone Number', 'digi-store' ),
            'section' => 'digi_store_contact_page',
            'settings'=> 'digi_store_theme_options[digi_store_contact_phone]'
            )
);

$wp_customize->add_setting('digi_store_theme_options[digi_store_contact_skype]',
        array(
            'type'    => 'option',
            'default' => $digi_store_settings['digi_store_contact_skype'],
            'sanitize_callback' => 'esc_html',
            'default' => ''
            )
);
$wp_customize->add_control('digi_store_theme_options[digi_store_contact_skype]',
        array(
            'type'    => 'text',
            'label'   => esc_html__( 'Add Skype ID', 'digi-store' ),
            'section' => 'digi_store_contact_page',
            'settings'=> 'digi_store_theme_options[digi_store_contact_skype]'
            )
);


$wp_customize->add_setting('digi_store_theme_options[digi_store_contact_email]',
        array(
            'type'    => 'option',
            'default' => $digi_store_settings['digi_store_contact_email'],
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
            )
);
$wp_customize->add_control('digi_store_theme_options[digi_store_contact_email]',
        array(
            'type'    => 'text',
            'label'   => esc_html__( 'Add Email', 'digi-store' ),
            'section' => 'digi_store_contact_page',
            'settings'=> 'digi_store_theme_options[digi_store_contact_email]'
            )
);