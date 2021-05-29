<?php
if(!function_exists('digi_store_get_option_defaults_values')):
	/******************** DIGI STORE DEFAULT OPTION VALUES ******************************************/
	function digi_store_get_option_defaults_values() {
		global $digi_store_default_values;
		$digi_store_default_values = array(
			'digi_store_total_features'			=> '3',
			'digi_store_disable_features'		=> 0,
			'digi_store_design_layout' 			=> 'wide-layout',
			'digi_store_sidebar_layout_options' => 'right',
			'digi_store_header_display'			=> 'header_text',
			'digi_store_categories'				=> array(),
			'digi_store_excerpt_length'			=> '55',
			'digi_store_search_text' 			=>  esc_html__('Search', 'digi-store'),
			'digi_store_reset_all' 				=> 0,
			'digi_store_search_text' 			=>  esc_html__('Search &hellip;', 'digi-store'),
			'digi_store_blog_content_layout'	=> '',

			/* Slider Settings */
			'digi_store_transition_effect' 		=> 'fade',
			'digi_store_transition_delay' 		=> '4',
			'digi_store_transition_duration' 	=> '1',
			'digi_store_slider_no' 				=> '4',
			'digi_store_footer_column_section' 	=>'4',
			/* Front page feature */
			'digi_store_entry_format_blog' 		=> 'show',
			'digi_store_entry_meta_blog' 		=> 'show-meta',
			/*Social Icons */
			'digi_store_top_social_icons' 		=>0,
			'digi_store_buttom_social_icons'	=>0,
			'digi_store_social_facebook'		=> '',
			'digi_store_social_twitter'			=> '',
			'digi_store_social_pinterest'		=> '',
			'digi_store_social_dribbble'		=> '',
			'digi_store_social_instagram'		=> '',
			'digi_store_social_flickr'			=> '',
			'digi_store_social_googleplus'		=> '',
			'digi_store_social_linkedin'		=>'',

			'digi_store_featured_block_title' 	=> '',
			/*Contact Us */
			'digi_store_contact_address' 		=> '',
			'digi_store_contact_phone' 			=> '',
			'digi_store_contact_skype' 			=> '',
			'digi_store_contact_email' 			=> '',
			/*Product Cat Title*/
			'digi_store_product_cat_title' 		   =>  esc_html__('Featured Categories','digi-store'),
			'digi_store_product_recent_prod_title' =>  esc_html__('Recent Products','digi-store'),
			'digi_store_product_recent_feat_title' =>  esc_html__('Featured Products','digi-store'),
			'digi_store_product_cat_lists' 		   => '',
			);
		return apply_filters( 'digi_store_get_option_defaults_values', $digi_store_default_values );
	}
endif;
?>