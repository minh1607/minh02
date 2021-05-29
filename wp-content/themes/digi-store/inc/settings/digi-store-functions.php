<?php
/**
 * Custom functions
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */

/******************************** EXCERPT LENGTH *********************************/
if (! function_exists('digi_store_excerpt_length')) {
	function digi_store_excerpt_length($length) {
		$digi_store_settings = digi_store_get_theme_options();
		$digi_store_excerpt_length = $digi_store_settings['digi_store_excerpt_length'];
	if ( is_admin() ) {
                return $length;
        }
        return intval( $digi_store_excerpt_length );

	}
	add_filter('excerpt_length', 'digi_store_excerpt_length');
}

/********************* CONTINUE READING LINKS FOR EXCERPT *********************************/
if (! function_exists('digi_store_continue_reading')) {
	function digi_store_continue_reading($link) {
	    if ( is_admin() ) {
		return $link;
	}
		 return '&hellip; ';
	}
	add_filter('excerpt_more', 'digi_store_continue_reading');
}

/***************** USED CLASS FOR BODY TAGS ******************************/
if (! function_exists('digi_store_body_class')) {
	function digi_store_body_class($classes) {
		$digi_store_settings = digi_store_get_theme_options();
		$digi_store_site_layout = $digi_store_settings['digi_store_design_layout'];

		if (is_page_template('page-templates/page-template-contact.php')) {
				$classes[] = 'contact';
		}
		if ($digi_store_site_layout =='boxed-layout') {
			$classes[] = 'boxed-layout';
		}
		if ($digi_store_site_layout =='small-boxed-layout') {
			$classes[] = 'boxed-layout-small';
		}
		$classes[] = 'small_image_blog';
		return $classes;
	}
	add_filter('body_class', 'digi_store_body_class');
}

/********************** SCRIPTS FOR DONATE/ UPGRADE BUTTON ******************************/
if (! function_exists('digi_store_customize_scripts')) {
	function digi_store_customize_scripts() {

		// Load the html5 shiv.
		wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '3.7.3' );

		wp_script_add_data( 'digi-store-html5', 'conditional', 'lt IE 9' );
	}
	add_action( 'customize_controls_print_scripts', 'digi_store_customize_scripts');
}

/**************************** SOCIAL MENU *********************************************/
if (! function_exists('digi_store_social_links')) {
	function digi_store_social_links() {

		$digi_store_settings 	= digi_store_get_theme_options();
		$facebook 				= $digi_store_settings['digi_store_social_facebook'];
		$twitter 				= $digi_store_settings['digi_store_social_twitter'];
		$pinterest				= $digi_store_settings['digi_store_social_pinterest'];
		$dribble 				= $digi_store_settings['digi_store_social_dribbble'];
		$instagram 				= $digi_store_settings['digi_store_social_instagram'];
		$flicker 				= $digi_store_settings['digi_store_social_flickr'];
		$gplus 					= $digi_store_settings['digi_store_social_googleplus'];
		$linkedin 				= $digi_store_settings['digi_store_social_linkedin'];

		if(!empty($facebook) || !empty($twitter) || !empty($pinterest) || !empty($dribble) || !empty($dribble) || !empty($instagram) || !empty($flicker) || !empty($gplus) || !empty($linkedin)) :
				?>
				<div class="social-links clearfix">
					<?php
					if( !empty($facebook) ):
						echo '<a target="_blank" href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>';
					endif;
					if( !empty($twitter) ):
						echo '<a target="_blank" href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>';
					endif;
					if( !empty($pinterest) ):
						echo '<a target="_blank" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest-p"></i></a>';
					endif;
					if( !empty($dribble) ):
						echo '<a target="_blank" href="'.esc_url($dribble).'"><i class="fa fa-dribbble"></i></a>';
					endif;
					if( !empty($instagram) ):
						echo '<a target="_blank" href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a>';
					endif;
					if( !empty($flicker) ):
						echo '<a target="_blank" href="'.esc_url($flicker).'"><i class="fa fa-flickr"></i></a>';
					endif;
					if( !empty($gplus) ):
						echo '<a target="_blank" href="'.esc_url($gplus).'"><i class="fa fa-google-plus-official"></i></a>';
					endif;
					if( !empty($linkedin) ):
						echo '<a target="_blank" href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>';
					endif;
						?>
				</div><!-- end .social-links -->
			<?php
		endif;
	}
	add_action ('digi_store_social_links', 'digi_store_social_links');
}

/*********************** Digi Store PAGE SLIDERS ***********************************/
if (! function_exists('digi_store_page_sliders')) {
	function digi_store_page_sliders() {
		global $digi_store_excerpt_length;
		global $post;
		$digi_store_settings 				= digi_store_get_theme_options();
		//$slider_custom_url 					= $digi_store_settings['digi_store_secondary_url'];
		$digi_store_page_sliders_display 	= '';
		$digi_store_total_page_no 			= 0;
		$digi_store_list_page				= array();
		for( $i = 1; $i <= $digi_store_settings['digi_store_slider_no']; $i++ ){
			if( isset ( $digi_store_settings['digi_store_featured_page_slider_' . $i] ) && $digi_store_settings['digi_store_featured_page_slider_' . $i] > 0 ){
				$digi_store_total_page_no++;
				$digi_store_list_page	=	array_merge( $digi_store_list_page, array( esc_attr($digi_store_settings['digi_store_featured_page_slider_' . $i] )) );
			}
		}
			if ( !empty( $digi_store_list_page ) && $digi_store_total_page_no > 0 ) {
				echo '<div class="main-slider clearfix"><div class="layer-slider">';
						$get_featured_posts = new WP_Query(
						        array(
						                'posts_per_page'=> $digi_store_settings['digi_store_slider_no'],
						                'post_type' => 'page',
						                'post__in' => $digi_store_list_page,
						                'orderby' => 'post__in',
						                ));
						$i=0;
				while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
				$attachment_id = get_post_thumbnail_id(get_the_ID());
                $image_attributes = wp_get_attachment_image_src($attachment_id, 'full');
                $i++;
                $title_attribute   = apply_filters('the_title', get_the_title($post->ID));
				$excerpt          = substr(get_the_excerpt(), 0 , 160);
							if (1 == $i) {$classes   	 = "slides show-display";} else { $classes = "slides hide-display";}
									?>
					<div class="<?php echo esc_attr($classes); ?>">
						<div class="image-slider clearfix" title="<?php the_title('', '', false); ?>" style="background-image:url(<?php echo esc_url($image_attributes[0]); ?>)">
						<div class="container">
							<article class="slider-content clearfix">
					<?php

						if ($title_attribute != '') {
							echo '<h2 class="slider-title"><a href="'.esc_url(get_permalink()).'" title="'.the_title('', '', false).'" rel="bookmark">'.esc_html(get_the_title()).'</a></h2><!-- .slider-title -->';
						}

						if ($excerpt != '') {
							echo '<div class="slider-text">';
							echo '<p>'.esc_html($excerpt).' </p></div><!-- end .slider-text -->';
						}
						echo '<div class="slider-buttons">';
						echo '<a title='.'"'.esc_html(get_the_title()). '"'. ' '.'href="'.esc_url(get_permalink()).'"'.' class="btn-default">'.esc_html__('Read More', 'digi-store').'</a>';
						echo '</div><!-- end .slider-buttons -->';
						echo '</article></div><!-- end .slider-content --> ';
					if ($image_attributes) {
						echo '</div><!-- end .image-slider -->';
					}
					echo '</div><!-- end .slides -->';
				endwhile;
				wp_reset_postdata();
				echo '</div>	  <!-- end .layer-slider -->
						<a class="slider-prev" id="prev2" href="#"><i class="fa fa-angle-left"></i></a> <a class="slider-next" id="next2" href="#"><i class="fa fa-angle-right"></i></a>
	  					<nav class="slider-button"> </nav> <!-- end .slider-button -->
					</div> <!-- end .main-slider -->';
			}

	}
}


/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
if (! function_exists('digi_store_scripts')) {
	function digi_store_scripts() {
		$digi_store_settings = digi_store_get_theme_options();
		wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_enqueue_style( 'digi-store-style', get_stylesheet_uri() );
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');
		wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-slick', get_template_directory_uri().'/assets/js/slick.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-cycle-all', get_template_directory_uri().'/assets/js/jquery.cycle.all.js', array('jquery'), false, true);
		wp_enqueue_script('digi-store-slider', get_template_directory_uri().'/assets/js/digi-store-slider-setting.js', array('jquery'), false, true);
		wp_enqueue_script('digi-store-main', get_template_directory_uri().'/assets/js/digi-store.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-sticky', get_template_directory_uri().'/assets/sticky/jquery.sticky.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-sticky-settings', get_template_directory_uri().'/assets/sticky/sticky-settings.js', array('jquery'), false, true);
		
		wp_style_add_data('ie-9', 'conditional', 'lt IE 9');
		wp_enqueue_style('digi-store-responsive', get_template_directory_uri().'/assets/css/responsive.css');
		wp_enqueue_style('slick-css', get_template_directory_uri().'/assets/css/slick.css');

		/********* Adding Multiple Fonts ********************/
		$digi_store_googlefont = array();
		array_push( $digi_store_googlefont, 'Poppins:300,400,500,600');
		$digi_store_googlefonts = implode("|", $digi_store_googlefont);
		wp_register_style( 'digi_store_google_fonts', '//fonts.googleapis.com/css?family='.$digi_store_googlefonts);
		wp_enqueue_style( 'digi_store_google_fonts' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'digi_store_scripts' );
}

if (! function_exists('digi_store_blog_post_format')) {
	function digi_store_blog_post_format($post_format, $post_id) {

		if (is_single()){
			$single_post_format_class = 'single-post-format';
		} else {
			$single_post_format_class = '';
		}

		$digi_store_settings = digi_store_get_theme_options();

		if($post_format == 'video'){  ?>
			<div class="post-video <?php echo esc_attr($single_post_format_class);?>">
				<div class="post-video-holder">
					<?php
			            global $post;

        if ($post_format == 'video') {
            $content = trim(get_post_field('post_content', $post->ID));
            $ori_url = explode("\n", esc_html($content));
            $url = $ori_url[0];
            $url_type = explode(" ", $url);
            $url_type = explode("[", $url_type[0]);

            if (isset($url_type[1])) {
                $url_type_shortcode = $url_type[1];
            }
            $new_content = get_shortcode_regex();
            if (isset($url_type[1])) {
                if (preg_match_all('/' . $new_content . '/s', $post->post_content, $matches)
                    && array_key_exists(2, $matches)
                    && in_array($url_type_shortcode, $matches[2])
                ) {
                    echo do_shortcode($matches[0][0]);
                }
            } else {
                echo wp_oembed_get(digi_store_the_featured_video($content));
            }
        }
			        ?>
				</div>
			</div>
		<?php
		}
		elseif($post_format == 'audio'){
			?>
				<div class="post-audio <?php echo esc_attr($single_post_format_class);?>">
					<div class="post-audio-holder">
						<?php
							$content = trim(  get_post_field('post_content', $post_id) );
				              $ori_url = explode( "\n", esc_html( $content ) );
				            $new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
				            if( $new_content){
				                echo do_shortcode( $matches[0][0] );
				            }
				            elseif (preg_match ( '#^<(script|iframe|embed|object)#i', $content )) {
				                $regex = '/https?\:\/\/[^\" ]+/i';
				                preg_match_all($regex, $ori_url[0], $matches);
				                $urls = ($matches[0]);
				                 print_r('<iframe src="'.$urls[0].'" width="100%" height="240" frameborder="no" scrolling="no"></iframe>');
				            } elseif (0 === strpos( $content, 'https://' )) {
				                $embed_url = wp_oembed_get( esc_url( $ori_url[0] ) );
				                print_r($embed_url);
				            }
						?>
					</div>
				</div>
			<?php
		}
		elseif ($post_format == 'gallery') {
			//Get the alt and title of the image
			if ( ! is_single() ) {
				$image_url = get_post_gallery_images( $post_id );
				$post_thumbnail_id = get_post_thumbnail_id( $post_id );
				$attachment =  get_post($post_thumbnail_id);

				if( $image_url ) {?>
						<div class="post-gallery">
							<?php foreach ( $image_url as $key => $images ) { ?>
								<div class="post-gallery-item">
									<div class="post-gallery-item-holder" style="background-image: url('<?php echo esc_url( $images); ?>');" alt= "<?php echo esc_attr( $attachment->post_excerpt );?>">
									</div>
								</div>
							<?php } ?>
						</div>
					<?php
						}
						else{
				    if (has_post_thumbnail()) {
                    ?>
                    <div class="post-image-content">
							<figure class="post-featured-image">
								<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							</figure><!-- end.post-featured-image  -->
						</div> <!-- end.post-image-content -->
                <?php }
						}
			}
		}
		else{
					if( has_post_thumbnail()) { ?>
						<div class="post-image-content">
							<figure class="post-featured-image">
								<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							</figure><!-- end.post-featured-image  -->
						</div> <!-- end.post-image-content -->
		<?php
					}


		}
}
}

if (!function_exists('digi_store_check_post_format')) {
    function digi_store_check_post_format($content,$post_format)
    {
        $class = '';
        if(has_shortcode( $content, $post_format )){
            return ;
        }
        elseif($post_format=='gallery'){
			if (has_post_thumbnail()) {
            return;
			}
        }
        else{
            $class = 'no-image';
            return $class;
        }
    }

}

if ( ! function_exists( 'digi_store_the_featured_video' ) ) {
    function digi_store_the_featured_video( $content )
    {
        $ori_url = explode("\n", $content);
        $url = $ori_url[0];
        $w = get_option('embed_size_w');
        if (!is_single()) {
            $url = str_replace('448', $w, $url);
            return $url;
        }

        if (0 === strpos($url, 'https://') || 0 == strpos($url, 'http://')) {
            echo esc_url(wp_oembed_get($url));
            $content = trim(str_replace($url, '', $content));
        }
        elseif (preg_match('#^<(script|iframe|embed|object)#i', $url)) {
            $h = get_option('embed_size_h');
            echo esc_url($url);
            if (!empty($h)) {

                if ($w === $h) $h = ceil($w * 0.75);
                $url = preg_replace(
                    array('#height="[0-9]+?"#i', '#height=[0-9]+?#i'),
                    array(sprintf('height="%d"', $h), sprintf('height=%d', $h)),
                    $url
                );
                echo esc_url($url);
            }
            $content = trim(str_replace($url, '', $content));

        }

    }
}

add_filter( 'wp_nav_menu_items', 'digi_store_custom_menu_item', 10, 2 );
if (! function_exists('digi_store_custom_menu_item')) {

function digi_store_custom_menu_item ( $items, $args ) {
        if ( $args->theme_location == 'primary') {
            $is_cart = is_cart();
            $items .= '<li class="menu-cart">'.wp_kses_post(digi_store_wcmenucart($is_cart)).'</li>';
        }
    return $items;
    }
}

if (! function_exists('digi_store_author_description')) {
	function digi_store_author_description($author_id) {
		$author_name = get_the_author_meta( 'display_name' );
        $author_firstname = get_the_author_meta( 'first_name' );
        $author_lastname = get_the_author_meta( 'last_name' );
        $author_id = get_the_author_meta( 'ID' );
        $author_description = get_the_author_meta('description', $author_id);
        $author_image = get_avatar($author_id);
        $user_info = get_userdata($author_id);
                                    $author_url = $user_info->user_url;
		?>
		 <div class="author-bio">
            <div class="row">
                <div class="col-md-2">
                    <div class="author-image">
                        <?php echo wp_kses_post($author_image); ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="author-desc">
                        <span class="author-name"><h5> <a href="<?php echo esc_url($author_url); ?>"><?php the_author_meta('display_name'); ?></a></h5>
					<p><?php the_author_meta('description'); ?></p>
						</span>  
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}