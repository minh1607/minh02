<?php
/**
 * Theme Customizer Functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
$digi_store_settings = digi_store_get_theme_options();
/********************  Digi Store THEME OPTIONS ******************************************/
//Support section
    $wp_customize->add_section( 'digi_store_theme_support', array(
        'title' =>  esc_html__( 'Support','digi-store' ),
        'priority' => 1, // Mixed with top-level-section hierarchy.
    ) );

    $wp_customize->add_setting('digi_store_options[support_links]',
        array(
            'type' => 'option',
            'default' => '',
            'sanitize_callback' => 'esc_url',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(new digi_Store_Support_Control($wp_customize,'support_links',array(
                'label' => 'Support',
                'section' => 'digi_store_theme_support',
                'settings' => 'digi_store_options[support_links]',
                'type' => 'digi-store-support',
            )
        )
    );
							/*
							Product Cat
							*/
	$product_categories = get_terms( 'product_cat' );
    $count =0;


    if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )){
        if(is_array($product_categories));
        $count = count($product_categories);
        if ($count > 0 && !is_wp_error($product_categories)) {

            $select_categories = array();
            $select_categories[''] = esc_html__('Select', 'digi-store');
            foreach ($product_categories as $product_category) {
                $select_categories[$product_category->term_id] = $product_category->name;
            }
        }
    }
    else{
        $select_categories = array(''=> esc_html__('Select','digi-store'));
    }
	$wp_customize->add_section('digi_store_product_categories', array(
	'title' =>  esc_html__('Product Categories', 'digi-store'),
	'priority' => 11,
	'panel' => 'digi_store_options_panel'
	));
	$wp_customize->add_setting('digi_store_theme_options[digi_store_product_cat_title]', array(
		'capability' => 'edit_theme_options',
		'default' => $digi_store_settings['digi_store_product_cat_title'],
		'sanitize_callback' => 'esc_html',
		'type' => 'option',
	));
	$wp_customize->add_control('digi_store_theme_options[digi_store_product_cat_title]', array(
		'label' =>  esc_html__('Section Title', 'digi-store'),
		'priority' => 1,
		'section' => 'digi_store_product_categories',
		'type' => 'text',
			));

	$wp_customize->add_setting('digi_store_theme_options[digi_store_product_cat_lists]', array(
		'capability' => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => 'digi_store_text_sanitize',
		'type' => 'option',
	));
	$wp_customize->add_control(
	    new digi_store_Customize_Control_Multiple_Select(
	        $wp_customize,
	        'digi_store_theme_options[digi_store_product_cat_lists]',
	        array(
			'label' =>  esc_html__('Select Category', 'digi-store'),
			'section' => 'digi_store_product_categories',
			'type' => 'multiple-select',
			'choices' => $select_categories,
			)
	));
								/*
							Recent Product
							*/
	$wp_customize->add_section('digi_store_product_recent_prod', array(
	'title' =>  esc_html__('Recent Products', 'digi-store'),
	'priority' => 12,
	'panel' => 'digi_store_options_panel'
	));
	$wp_customize->add_setting('digi_store_theme_options[digi_store_product_recent_prod_title]', array(
		'capability' => 'edit_theme_options',
		'default' => $digi_store_settings['digi_store_product_recent_prod_title'],
		'sanitize_callback' => 'esc_html',
		'type' => 'option',
	));
	$wp_customize->add_control('digi_store_theme_options[digi_store_product_recent_prod_title]', array(
		'label' =>  esc_html__('Section Title', 'digi-store'),
		'priority' => 1,
		'section' => 'digi_store_product_recent_prod',
		'type' => 'text',
			));
							/*
							Featured Product
							*/
	$wp_customize->add_section('digi_store_product_feat_prod', array(
	'title' =>  esc_html__('Featured Products', 'digi-store'),
	'priority' => 13,
	'panel' => 'digi_store_options_panel'
	));
	$wp_customize->add_setting('digi_store_theme_options[digi_store_product_recent_feat_title]', array(
		'capability' => 'edit_theme_options',
		'default' => $digi_store_settings['digi_store_product_recent_feat_title'],
		'sanitize_callback' => 'esc_html',
		'type' => 'option',
	));
	$wp_customize->add_control('digi_store_theme_options[digi_store_product_recent_feat_title]', array(
		'label' =>  esc_html__('Section Title', 'digi-store'),
		'priority' => 1,
		'section' => 'digi_store_product_feat_prod',
		'type' => 'text',
			));

	$wp_customize->add_section('digi_store_custom_header', array(
		'title' =>  esc_html__('General Options', 'digi-store'),
		'priority' => 1,
		'panel' => 'digi_store_options_panel'
	));
	$wp_customize->add_setting( 'digi_store_theme_options[digi_store_top_social_icons]', array(
		'default' => $digi_store_settings['digi_store_top_social_icons'],
		'sanitize_callback' => 'digi_store_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'digi_store_theme_options[digi_store_top_social_icons]', array(
		'priority'=>40,
		'label' =>  esc_html__('Hide Social Icons on Top', 'digi-store'),
		'section' => 'digi_store_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'digi_store_theme_options[digi_store_buttom_social_icons]', array(
		'default' => $digi_store_settings['digi_store_buttom_social_icons'],
		'sanitize_callback' => 'digi_store_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'digi_store_theme_options[digi_store_buttom_social_icons]', array(
		'priority'=>40,
		'label' =>  esc_html__('Hide Social Icons on Bottom', 'digi-store'),
		'section' => 'digi_store_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'digi_store_theme_options[digi_store_reset_all]', array(
		'default' => $digi_store_settings['digi_store_reset_all'],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'digi_store_reset_alls',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( 'digi_store_theme_options[digi_store_reset_all]', array(
		'priority'=>50,
		'label' =>  esc_html__('Reset all default settings. (Refresh it to view the effect)', 'digi-store'),
		'section' => 'digi_store_custom_header',
		'type' => 'checkbox',
	));
?>