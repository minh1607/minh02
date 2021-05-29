<?php
/**
 * The template for displaying 404 pages
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
<main id="main" class="site-main clearfix">
	<article id="post-0" class="post error404 not-found">
		<?php if ( is_active_sidebar( 'digi_store_404_page' ) ) :
			dynamic_sidebar( 'digi_store_404_page' );
		else:?>
		<section class="error-404 not-found">
			<header class="page-header">
				<h2 class="page-title"> <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'digi-store' ); ?> </h2>
			</header> <!-- .page-header -->
			<div class="page-content">
				<p> <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'digi-store' ); ?> </p>
					<?php get_search_form(); ?>
			</div> <!-- .page-content -->
		</section> <!-- .error-404 -->
	<?php endif; ?>
	</article> <!-- #post-0 .post .error404 .not-found -->
</main> <!-- #main -->
<?php
if( 'default' == $layout ) { //Settings from customizer
	if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}
get_sidebar();
get_footer(); ?>