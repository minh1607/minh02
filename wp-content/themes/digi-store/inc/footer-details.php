<?php
/**
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
?>
<?php
/************************* Digi Store FOOTER DETAILS **************************************/
if (! function_exists('digi_store_site_footer')) {
	function digi_store_site_footer() {
		$digi_store_settings = digi_store_get_theme_options();
		if ( is_active_sidebar( 'digi_store_footer_options' ) ) :
			dynamic_sidebar( 'digi_store_footer_options' );
		else:
			echo '<div class="copyright">';
			echo esc_html__(' Theme by ', 'digi-store');
		 	echo '<a href="'.esc_url('https://Codethemes.co/').'" target="_blank">'. ' ' .esc_html__('Code Themes', 'digi-store').'</a>';
		 	 ?>
		</div>
		<?php endif;
	}
	add_action( 'digi_store_sitegenerator_footer', 'digi_store_site_footer');
}