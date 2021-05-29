<?php
/**
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
/**************** Digi Store REGISTER WIDGETS ***************************************/
if (! function_exists('digi_store_widgets_init')) {
	add_action('widgets_init', 'digi_store_widgets_init');
	function digi_store_widgets_init() {

		register_sidebar(array(
				'name' =>  esc_html__('Main Sidebar', 'digi-store'),
				'id' => 'digi_store_main_sidebar',
				'description' =>  esc_html__('Shows widgets at Main Sidebar.', 'digi-store'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>',
			));
		global $digi_store_settings;
		$digi_store_settings = wp_parse_args( get_option( 'digi_store_theme_options', array() ), digi_store_get_option_defaults_values() );
		for($i =1; $i<= $digi_store_settings['digi_store_footer_column_section']; $i++){
		register_sidebar(array(
				'name' =>  esc_html__('Footer Widget ', 'digi-store') . $i,
				'id' => 'digi_store_footer_'.$i,
				'description' =>  esc_html__('Shows widgets at Footer Widget ', 'digi-store').$i,
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}
	}
}

if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
	if (! function_exists('digi_store_woocommerce_sidebar')) {
		add_action('widgets_init', 'digi_store_woocommerce_sidebar');
		function digi_store_woocommerce_sidebar() {
			register_sidebar(array(
					'name' =>  esc_html__('WooCommerce Sidebar', 'digi-store'),
					'id' => 'digi_store_woocommerce_sidebar',
					'description' =>  esc_html__('Add WooCommerce Widgets Only', 'digi-store'),
					'before_widget' => '<div id="A%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h2 class="widget-title">',
					'after_title' => '</h2>',
				));
		}
	}
endif;