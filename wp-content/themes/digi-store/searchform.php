<?php
/**
 * Displays the searchform
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$digi_store_settings = digi_store_get_theme_options();
		$digi_store_search_form = $digi_store_settings['digi_store_search_text'];
		if($digi_store_search_form !='Search &hellip;'): ?>
	<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($digi_store_search_form); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php else: ?>
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'digi-store' ); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->