<?php
/**
 * Displays the header content
 *
 * @package Code Themes
 * @subpackage Digi Store
 * @since Digi Store 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$digi_store_settings = digi_store_get_theme_options(); ?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}
?>
<div id="page" class="hfeed site">
<!-- Masthead ============================================= -->
<header id="masthead" class="site-header">
        <div class="nav-wrapper">
            <div class="container text-center">
                <div class="digi-store-site-branding">
                    <?php do_action('digi_store_site_branding'); ?>
                </div>
                <?php
                if($digi_store_settings['digi_store_top_social_icons'] == 0): ?>
                    <div class="header-social-block">
                            <?php do_action('digi_store_social_links'); ?>
                    </div><!-- end .header-social-block -->
                    <?php
                endif; ?>
                <div class="menu-toggle">
                    <div class="line-one"></div>
                    <div class="line-two"></div>
                    <div class="line-three"></div>
                </div>
            </div>

                <div id="sticky_header">
                    <div class="container clearfix">
                        <div class="col-md-2">
                            <div class="digi-store-site-branding">
                                <?php do_action('digi_store_site_branding'); ?>
                            </div>
                            <div class="menu-toggle">
                                <div class="line-one"></div>
                                <div class="line-two"></div>
                                <div class="line-three"></div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <!-- end .menu-toggle -->

                            <!-- Main Nav ============================================= -->
                            <?php
                                if (has_nav_menu('primary')) { ?>
                            <?php $args = array(
                                'theme_location' => 'primary',
                                'container'      => '',
                                'items_wrap'     => '<ul class="menu">%3$s</ul>',
                                ); ?>
                            <nav id="site-navigation" class="main-navigation clearfix">
                                <?php wp_nav_menu($args);//extract the content from apperance-> nav menu ?>
                            </nav> <!-- end #site-navigation -->
                            <?php } else {// extract the content from page menu only ?>
                            <nav id="site-navigation" class="main-navigation clearfix">
                                <?php   wp_page_menu(array('menu_class' => 'menu')); ?>
                            </nav>
                        </div> <!-- end #site-navigation -->
                        <?php }
                echo '</div> <!-- end .container -->
                </div> <!-- end #sticky_header -->';?>

        </div> <!-- end .top-header -->
        <!-- Main Header============================================= -->

        <?php
        if (! is_front_page()) {
            do_action('digi_store_header_image');
        }
        digi_store_slider_value();

            if(is_front_page() || is_page_template('page-templates/home-template.php' )) {
                        digi_store_page_sliders();
            }

         ?>

</header> <!-- end #masthead -->


<!-- Main Page Start ============================================= -->
    <?php
    if( !is_page_template('page-templates/home-template.php') && !is_front_page()) {
        digi_store_breadcrumb();
    }?>

    <div id="content">

<?php
if( !is_page_template('page-templates/home-template.php')){?>
    <div class="container clearfix">

<?php } ?>
