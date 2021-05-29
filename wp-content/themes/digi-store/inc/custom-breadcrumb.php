<?php

if (!function_exists('digi_store_breadcrumb')) {
    function digi_store_breadcrumb()
    {
            // Boxed or Fullwidth
            $boxedornot = digi_store_boxedornot();
            $header_image = get_header_image();
            global $post;


            echo '<div class="inner-banner-wrap" style="background-image: url('.esc_url($header_image).')">'; ?>
            <div class="container">
            <?php
            echo '<div class = "breadcrumbs">';

            if ($boxedornot == 'fullwidth') {?>
                <div class="container full-width-container">
            <?php }
             $checkwoocommerce = '';
            if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                $checkwoocommerce = true;
            }
            if ($checkwoocommerce && is_woocommerce()) {
                woocommerce_breadcrumb();
            }

            elseif ( !is_home() ) {
                    echo '<a href="';
                    echo esc_url(home_url());
                    echo '">';
                    echo '<span class="home"><i class="fa fa-home"></i></span>';
                    echo '</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>';

                    if ( is_category() ) {
                        echo "<span class='delimiter'>";
                        echo single_cat_title(); echo "</span>";
                    }

                    elseif ( is_month() ) {
                        echo '<span class="delimiter">'.esc_html__('Archive for ','digi-store'); echo get_the_date('F, Y'); echo'</span>';
                    }

                    elseif ( is_year() ) { echo '<span class="delimiter">'.esc_html__('Archive for ','digi-store'); echo get_the_date('Y'); echo'</span>';
                    }
                    elseif ( is_single() ) {
                        echo '<span class="delimiter">';
                        the_title();
                        echo '</span>';

                    }
                    elseif ( is_search() ) {
                        echo '<span class="delimiter">';
                        echo esc_html__('Search Results for ','digi-store');
                        echo '<strong>';
                        echo get_search_query();
                        echo'</strong></span>';
                    }
                    elseif ( is_404() ) {
                        echo '<span class="delimiter">';
                        echo esc_html__('404 - Page not found ','digi-store');
                        echo '</span>';
                    }
                    elseif ( is_day() ) {
                        echo '<span class="delimiter">';
                        echo esc_html__('Archive for ','digi-store');
                        echo the_time('F jS, Y');
                        echo'</span>';
                    }
                    elseif ( is_tag() ) {
                        echo '<span class="delimiter">';
                            single_tag_title();
                        echo'</span>';
                    }
                    elseif ( is_author() ) {
                    echo '<span class="delimiter"> ';
                        echo esc_html__('Author Archive ','digi-store');
                        the_author();
                    echo'</span>';
                }
                elseif ( has_post_format() ) {
                        echo '<span class="delimiter">';
                        echo esc_html(get_post_format());
                        echo'</span>';
                    }
                    elseif ( is_page() ) {
                        if( $post->post_parent ){
                            $anc = get_post_ancestors( $post->ID );
                            $title = esc_attr( get_the_title() );
                            foreach ( $anc as $ancestor ) {
                                $output = '<a href="'. esc_url( get_permalink( $ancestor ) ) .'" title="'. esc_html( get_the_title( $ancestor ) ) .'">'. esc_html( get_the_title( $ancestor ) ) .'</a> <span class="delimiter"><i class="fa fa-angle-right"></i></span> ';
                            }
                            echo wp_kses_post($output);
                            echo '<span title="'. esc_attr($title) .'"> '.esc_html($title) .'</span>';
                        } else {
                            echo '<span class="delimiter"> '.esc_html( get_the_title() ) .'</span><span class="delimiter">';
                        }
                    }
                }
                elseif(is_home()){
                echo '<a href="';
                    echo esc_url(home_url());
                    echo '">';
                    echo '<span class="home"><i class="fa fa-home"></i></span>';
                    echo '</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>';
                     echo get_the_title( get_option( 'page_for_posts' ) );
                }

                elseif ( isset($_GET['paged'] ) && !empty( $_GET['paged'] ) ) {
                echo '<span class="delimiter">'.esc_html__('Blog Archives ','digi-store'); echo'</span>';
            }
                if ($boxedornot == 'fullwidth') {?>
                    </div>
                <?php }
            echo '</div></div>';
            echo '</div>';
    }
}