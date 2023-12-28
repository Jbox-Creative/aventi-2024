<?php

// define( 'WP_POST_REVISIONS' , 30 );

// prevent Yoast from auto-saving 301 redirects
add_filter( 'wpseo_premium_post_redirect_slug_change', '__return_true' );

/**
 * Allows SVG and EPS Uploading
 */
function custom_upload_mimes( $upload_mimes ) {
    $upload_mimes['svg']    = 'image/svg+xml';
    $upload_mimes['svgz']   = 'image/svg+xml';
    $upload_mimes['eps']    = 'application/postscript';

    return $upload_mimes;
}
add_filter( 'upload_mimes', 'custom_upload_mimes', 10, 1 );

// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// Change locale
add_filter('locale', 'change_locale');
function change_locale( $locale ) {
    if ( get_post_type() == 'location' ) {
        return 'en_CA';
    }
    return $locale;
}

/**
 * Satisfy WP check for theme.json without this file being present.
 *
 * @since 6.3
 * @link https://github.com/roots/sage/issues/3143
 */
add_filter('theme_file_path', function ($path, $file) {
    if ($file === 'theme.json') {
        return false;
    }

    return $path;
}, 0, 2);
