<?php
/**
*
*
* Template Name: Home
*
**/
get_header();
    $digi_store_settings = digi_store_get_theme_options();
    $digi_store_product_cat_lists = $digi_store_settings['digi_store_product_cat_lists'];

    $digi_store_product_cat_title = $digi_store_settings['digi_store_product_cat_title']; ?>
    <div class="digi-store-product-categories">
        <div class="container">
            <?php if(!empty($digi_store_product_cat_title)): ?>
                    <div class="featured-title txt-center"><h2><?php echo esc_html($digi_store_product_cat_title);?></h2></div>
            <?php endif;
            $product_category_post_count =0;
            if($digi_store_product_cat_lists)
            $product_category_post_count = count($digi_store_product_cat_lists);
            if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && (!empty($digi_store_product_cat_lists[0])) ):
                $prefix = '';
                $product_cat_ids ='';
                for($i=0; $i<$product_category_post_count; $i++){
                 if (empty($digi_store_product_cat_lists[$i])) {
                    break;
                }
                $product_cat_ids .= $prefix . $digi_store_product_cat_lists[$i];
                $prefix = ',';
                }
                echo do_shortcode('[product_categories number="3" columns="3" ids ="'.esc_html($product_cat_ids).'" ]' );
            endif; ?>
        </div>
    </div>
    <div class="digi-store-recent-product">
        <div class="container">
            <?php
            $digi_store_product_recent_prod_title = $digi_store_settings['digi_store_product_recent_prod_title'];
             if(!empty($digi_store_product_recent_prod_title)): ?>
                <div class="featured-title txt-center"><h2><?php echo esc_html($digi_store_product_recent_prod_title);?></h2></div>
            <?php endif;
            if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
                echo do_shortcode('[recent_products per_page="4" columns="4"]' );
            endif; ?>

        </div>
    </div>
    <div class="digi-store-recent-feat">
        <div class="container">
            <?php $digi_store_product_recent_feat_title = $digi_store_settings['digi_store_product_recent_feat_title'];
             if(!empty($digi_store_product_recent_feat_title)): ?>
                <div class="featured-title txt-center"><h2><?php echo esc_html($digi_store_product_recent_feat_title);?></h2></div>
            <?php endif;
            if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
                echo do_shortcode('[featured_products per_page="8" columns="4"]' );
            endif; ?>
        </div>
    </div>
<?php get_footer();