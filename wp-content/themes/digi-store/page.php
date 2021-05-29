<?php
/**
 * The template for displaying all pages.
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
 <?php if(!is_home() && !is_page_template('page-templates/home-template.php')){ ?>
            <div class="page-header">
                <h2 class="page-title"><?php echo wp_kses_post(get_the_archive_title()); ?></h2>
                <!-- .page-title -->
            </div>
            <!-- .page-header -->
        <?php }?>
<?php }
	}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<div id="primary">
  <?php if(!is_home() && !is_page_template('page-templates/home-template.php')){ ?>
            <div class="page-header">
                <h2 class="page-title"><?php echo wp_kses_post(get_the_archive_title()); ?></h2>
                <!-- .page-title -->
            </div>
            <!-- .page-header -->
        <?php }?>
	<?php }
	}?>
	<main id="main">
	<?php
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<article>
		<div class="entry-content clearfix">
			<?php the_content();

			wp_link_pages( array(
				'before'			=> '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'digi-store' ),
				'after'			=> '</div>',
				'link_before'	=> '<span>',
				'link_after'	=> '</span>',
				'pagelink'		=> '%',
				'echo'			=> 1
			) );
			?>
		</div> <!-- entry-content clearfix-->
		<?php  comments_template(); ?>
		</article>
	</section>
	<?php }
	} else { ?>
	<h1 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'digi-store' ); ?> </h1>
	<?php
	} ?>
	</main> <!-- #main -->
	<?php
if( 'default' == $layout ) { //Settings from customizer
	if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}else{ // for page/post
	if(($layout != 'no-sidebar') && ($layout != 'full-width')){
		echo '</div><!-- #primary -->';
	}
}
get_sidebar();
get_footer(); ?>