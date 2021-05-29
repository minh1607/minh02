<?php
/**
 * Template Name: Full Width Template
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */

get_header();
	?>
<div id="primary">
	
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
				'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'digi-store' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
				) ); ?>
		</div> <!-- entry-content clearfix-->
		<?php  comments_template(); ?>
		</article>
	</section>
	<?php }
	} ?>
	</main> <!-- #main -->
	<?php

get_footer(); ?>