<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function consulte_breadcrumbs() {

    
    $breadcrumbs_separator = '-';

    /**
    * Settings
    */
    $separator          = $breadcrumbs_separator;
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'consulte-page-breadcrumb';
    $home_title         = __('Home', 'consulte');

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = '';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a href="' . esc_url(get_home_url()) . '" title="' . $home_title . '">' . $home_title . '</a></li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="active item-current item-archive">' . get_the_archive_title( ) . '</li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-custom-post-type-' . $post_type . '" href="' . esc_url($post_type_archive) . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="active item-current item-archive">' . esc_html( $custom_tax_name ) . '</li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-custom-post-type-' . $post_type . '"><a class="bread-custom-post-type-' . $post_type . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end($category);
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo wp_kses_post($cat_display);
                echo '<li class="active item-current item-' . $post->ID . '">' . esc_html( get_the_title() ) . '</li>';

                // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_html($cat_name) . '</a></li>';
                echo '<li class="active item-current item-' . $post->ID . '">' . esc_html( get_the_title() ) . '</li>';

            } else {
                echo '<li class="active item-current item-' . $post->ID . '">' . esc_html( get_the_title() ) . '</li>';
            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="active item-current item-cat">' . esc_html( single_cat_title('', false) ) . '</li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents = '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }

                // Display parent pages
                echo wp_kses_post($parents);

                // Current page
                echo '<li class="active item-current item-' . $post->ID . '">' . esc_html( get_the_title() ) . '</li>';

            } else {

                // Just display current page if not parents
                echo '<li class="active item-current item-' . $post->ID . '">' . esc_html( get_the_title() ) . '</li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="active item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '">' . $get_term_name . '</li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('Archives', 'consulte') .'</a></li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__('Archives', 'consulte') .'</a></li>';

            // Day display
            echo '<li class="active item-current item-' . get_the_time('j') . '">' . get_the_time('jS') . ' ' . get_the_time('M') . esc_html__('Archives', 'consulte') .'</li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('Archives', 'consulte') .'</a></li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '">' . get_the_time('M') . esc_html__('Archives', 'consulte') .'</li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="active item-current item-current-' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('Archives', 'consulte') .'</li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="active item-current item-current-' . esc_attr($userdata->user_nicename) . '">' . esc_html__('Author: ', 'consulte') . esc_html( $userdata->display_name ) . '</li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="active item-current item-current-' . get_query_var('paged') . '">'.esc_html__('Page', 'consulte') . ' ' . get_query_var('paged') . '</li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="active item-current item-current-' . get_search_query() . '">' . esc_html__('Search results for: ', 'consulte') . get_search_query() . '</li>';

        } elseif ( is_404() ) {
            
            // 404 page
            echo '<li>' . esc_html__('Error 404', 'consulte') . '</li>';
        }

        echo '</ul>';

    }

}

/**
 * [consulte_premium_btn]
 * @return HTML
 */
function consulte_button( $btn_text = '', $btn_link = '' ){
    $btn_text = get_option( $btn_text );
    $btn_link = get_option( $btn_link );
    $btn = '';
    if( !empty( $btn_text ) ){
        $btn = '<a href="'.esc_url($btn_link).'" class="consulte-header-btn">'.esc_html( $btn_text ).'</a>';
    }
    return $btn;
}