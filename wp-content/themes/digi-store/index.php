<?php
/**
 * The main template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */

get_header();
	$digi_store_settings = digi_store_get_theme_options();
	$blog_layout_class = 'list-display';
	global $digi_store_content_layout;
	if( $post ) {
		$layout = get_post_meta( $post->ID, 'digi_store_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}
	if( 'default' == $layout ) { //Settings from customizer
		if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')){ ?>
		<?php
			if (is_author()) {
				$objs = get_queried_object();
				if (! empty($objs)) {
					$author_id = $objs->ID;
				}
				digi_store_author_description($author_id);
			}
		?>
			<div id="primary" class="<?php echo esc_attr($blog_layout_class);?>">
            <?php if(!is_home() && !is_page_template('page-templates/home-template.php')){ ?>
                <div class="page-header">
                    <h2 class="page-title"><?php echo wp_kses_post(get_the_archive_title()); ?></h2>
                    <!-- .page-title -->
                </div>
                <!-- .page-header -->
            <?php }?>
				<?php }
	}?>
				<main id="main" class="site-main clearfix">
					<?php
					if( have_posts() ) {
						while( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', get_post_format() );
						}
					}
					else { ?>
					<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'digi-store' ); ?> </h2>
					<?php } ?>
				</main> <!-- #main -->
				<?php get_template_part( 'pagination', 'none' );
				if( 'default' == $layout ) { //Settings from customizer
					if(($digi_store_settings['digi_store_sidebar_layout_options'] != 'nosidebar') && ($digi_store_settings['digi_store_sidebar_layout_options'] != 'fullwidth')): ?>
						</div> <!-- #primary -->
						<?php endif;
				}
get_sidebar();
get_footer(); ?>