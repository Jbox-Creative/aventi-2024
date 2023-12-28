<?php
    function getPrimaryCategory() {
        $currentID = get_the_ID();
        $category = get_the_category();

        // Get primary (Yoast) term if it is set
        $category_display = '';
        $category_slug = '';

        if ( class_exists('WPSEO_Primary_Term') ) {

             // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
            $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term( $wpseo_primary_term );

             if ( is_wp_error( $term ) ) {

                  // Default to first category (not Yoast) if an error is returned
                  $category_display = $category[0]->name;
                  $category_slug = $category[0]->slug;

             } else {

                  // Set variables for category_display & category_slug based on Primary Yoast Term
                  $category_id = $term->term_id;
                  $category_term = get_category($category_id);
                  $category_display = $term->name;
                  $category_slug = $term->slug;

             }

        } else {

             // Default, display the first category in WP's list of assigned categories
             $category_display = $category[0]->name;
             $category_slug = $category[0]->slug;

        }

        return [$category_display,$category_slug];
    }

    function add_nofollow_content($content) {
        if (is_single()) {
            $content = preg_replace_callback('/]*href=["|\']([^"|\']*)["|\'][^>]*>([^<]*)<\/a>/i', function($m) {
                if (strpos($m[1], "aventigroup") === false)
                    return 'href="'.$m[1].'" rel="nofollow" target="_blank">'.$m[2].'</a>';
                else
                    return 'href="'.$m[1].'" target="_blank">'.$m[2].'</a>';
                }, $content);
        }
        return $content;
    }
    add_filter('the_content', 'add_nofollow_content');
?>
