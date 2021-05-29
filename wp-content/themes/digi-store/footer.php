<?php
/**
 * The template for displaying the footer.
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
$digi_store_settings = digi_store_get_theme_options();
if(!is_page() && !is_single()){
	if(class_exists('WooCommerce') && is_shop()): ?>
		</div> <!-- end .container -->
	<?php else: ?>
	</div> <!-- end #main -->
	<?php
	endif;
}else{?>
</div> <!-- end .container -->
<?php
} ?>
</div> <!-- end #content -->
<!-- Footer Start ============================================= -->
<footer id="colophon" class="site-footer clearfix">
<?php
$footer_column = $digi_store_settings['digi_store_footer_column_section'];
	if( is_active_sidebar( 'digi_store_footer_1' ) || is_active_sidebar( 'digi_store_footer_2' ) || is_active_sidebar( 'digi_store_footer_3' ) || is_active_sidebar( 'digi_store_footer_4' )) { ?>
	<div class="widget-wrap">
		<div class="container">
			<div class="widget-area clearfix">
			<?php
				if($footer_column == '1' || $footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.esc_attr($footer_column).'">';
					if ( is_active_sidebar( 'digi_store_footer_1' ) ) :
						dynamic_sidebar( 'digi_store_footer_1' );
					endif;
				echo '</div><!-- end .column'.esc_attr($footer_column). '  -->';
				}
				if($footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.esc_attr($footer_column).'">';
					if ( is_active_sidebar( 'digi_store_footer_2' ) ) :
						dynamic_sidebar( 'digi_store_footer_2' );
					endif;
				echo '</div><!--end .column'.esc_attr($footer_column).'  -->';
				}
				if($footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.esc_attr($footer_column).'">';
					if ( is_active_sidebar( 'digi_store_footer_3' ) ) :
						dynamic_sidebar( 'digi_store_footer_3' );
					endif;
				echo '</div><!--end .column'.esc_attr($footer_column).'  -->';
				}
				if($footer_column == '4'){
				echo '<div class="column-'.esc_attr($footer_column).'">';
					if ( is_active_sidebar( 'digi_store_footer_4' ) ) :
						dynamic_sidebar( 'digi_store_footer_4' );
					endif;
				echo '</div><!--end .column'.esc_attr($footer_column).  '-->';
				}
				?>
			</div> <!-- end .widget-area -->
		</div> <!-- end .container -->
	</div> <!-- end .widget-wrap -->
	<?php } ?>
<div class="site-info">
	<div class="container">
	<?php
		if($digi_store_settings['digi_store_buttom_social_icons'] == 0):
			do_action('digi_store_social_links');
		endif; ?>
		<div class="footer-content">
	<?php
		do_action('digi_store_sitegenerator_footer');
		?>
			<div style="clear:both;"></div>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end .site-info -->
	<div class="go-to-top"><a title="<?php esc_attr_e('Go to Top','digi-store');?>" href="#masthead"><i class="fa fa-angle-double-up"></i></a></div> <!-- end .go-to-top -->
</footer> <!-- end #colophon -->
</div> <!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>