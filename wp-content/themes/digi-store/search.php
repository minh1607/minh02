<?php
/**
 * The template for displaying search results.
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
			<?php
			if( have_posts() ) {
				while( have_posts() ) {
					the_post();
                    $post_format = get_post_format($post->ID);
                    $content = get_the_content();
                    $class = digi_store_check_post_format($post_format, $content);
					?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class($class);?>>
                        <?php digi_store_blog_post_format($post_format, $post->ID);?>
                        <div class="post-content-wrap">
                            <header class="entry-header">
                                <?php $entry_format_meta_blog = $digi_store_settings['digi_store_entry_meta_blog']; ?>

                                <h2 class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"> <?php the_title();?> </a> </h2> <!-- end.entry-title -->
                                <?php if($entry_format_meta_blog == 'show-meta'){ ?>
                                    <div class="entry-meta">
								<span class="posted-on"><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
								<?php the_time( get_option( 'date_format' ) ); ?> </a></span>
                                        <span class="author vcard"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" title="<?php the_author(); ?>">
									<?php the_author(); ?> </a></span>
                                        <!--									--><?php //if ( comments_open() ) { ?>
                                        <!--                                --><?php //if ( comments_number() ) { ?>
                                        <?php 		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {?>

                                            <span class="comments">
									<?php comments_popup_link(
//									        __( 'No Comments', 'digi-store' ), __( '1 Comment', 'digi-store' ), __( '% Comments', 'digi-store' ), '', __( 'Comments Off', 'digi-store' )
                                        sprintf(
                                            wp_kses(
                                            /* translators: %s: post title */
                                                __( ' Leave a Comment<span class="screen-reader-text"> on %s</span>', 'digi-store' ),

                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                            get_the_title()
                                        )
                                    ); ?> </span>
                                        <?php } ?>
                                    </div><!-- end .entry-meta -->
                                    <div class="entry-meta">
								<span class="cat-links">
									<?php the_category(); ?>
								</span> <!-- end .cat-links -->
                                    </div><!-- end .entry-meta -->
                                <?php } ?>
                            </header><!-- end .entry-header -->
                            <div class="entry-content">
                                <?php $content_display = $digi_store_settings['digi_store_blog_content_layout'];
                                if($content_display == 'fullcontent_display'):
                                    the_content();
                                else:
                                    the_excerpt();
                                endif; ?>
                            </div> <!-- end .entry-content -->
                            <?php
                            $excerpt = get_the_excerpt();
                            $content = get_the_content();
                            ?>

                        </div>
                        <footer class="entry-footer">
                            <?php
                            if(strlen($excerpt) < strlen($content)){ ?>
                                <a class="more-link" title="<?php the_title_attribute('echo=0');?>" href="<?php the_permalink();?>">
                                    <?php esc_html_e('Read More', 'digi-store'); ?>
                                </a>
                            <?php } ?>
                        </footer> <!-- end .entry-footer -->
                    </article><!-- end .post -->
				<?php }
			} else { ?>
			<h2 class="entry-title">
				<?php get_search_form(); ?>
				<p>&nbsp; </p>
				<?php esc_html_e( 'No Posts Found.', 'digi-store' ); ?>
			</h2>
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