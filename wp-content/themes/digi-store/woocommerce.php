<?php
/**
 * This template to displays woocommerce page
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */

get_header();
	$digi_store_settings = digi_store_get_theme_options();
	global $digi_store_content_layout;
	if( $post ) {
		$layout = get_post_meta( $post->ID, 'digi_store_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}
	if( 'default' == $layout ) { //Settings from customizer
		if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')){ ?>

<div id="primary">
	<?php }
	}?>
	<main id="main">
		<?php digi_store_woocommerce_content(); ?>
	</main> <!-- #main -->
	<?php
	if( 'default' == $layout ) { //Settings from customizer
		if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}?>
<?php
if( 'default' == $layout ) { //Settings from customizer
	if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')){ ?>
<div id="secondary">
	<?php }
}
	if( 'default' == $layout ) { //Settings from customizer
		if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')): ?>
		<?php if(!is_product()){
		 dynamic_sidebar( 'digi_store_woocommerce_sidebar' ); 
		} ?>
		
</div> <!-- #secondary -->
<?php endif;
	}
get_footer(); ?>