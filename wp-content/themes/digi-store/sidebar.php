<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
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

<div id="secondary">
<?php }
}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<div id="secondary">
  <?php }
	}?>
  <?php
	if( 'default' == $layout ) { //Settings from customizer
		if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')): ?>
  <?php dynamic_sidebar( 'digi_store_main_sidebar' ); ?>
</div> <!-- #secondary -->
<?php endif;
	}else{ // for page/post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){
			dynamic_sidebar( 'digi_store_main_sidebar' );
			echo '</div><!-- #secondary -->';
		}
	}
?>