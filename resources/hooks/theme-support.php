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

// update gutenberg color picker options
function aventi_pallette() {
    // The new colors we are going to add
    $newColorPalette = [
        [
            'name' => esc_attr__('Astro', 'default'),
            'slug' => 'astro',
            'color' => '#67FFBB',
        ],
        [
            'name' => esc_attr__('Night', 'default'),
            'slug' => 'night',
            'color' => '#151B22',
        ],
        [
            'name' => esc_attr__('Aventi Blue', 'default'),
            'slug' => 'aventi-blue',
            'color' => '#2F5785',
        ],
        [
            'name' => esc_attr__('Light Blue', 'default'),
            'slug' => 'light-blue',
            'color' => '#D0EEFA',
        ],
        [
            'name' => esc_attr__('Lightest Blue', 'default'),
            'slug' => 'lightest-blue',
            'color' => '#F4F8F8',
        ],
        [
            'name' => esc_attr__('Light Grey', 'default'),
            'slug' => 'light-grey',
            'color' => '#C2DCDC',
        ],
        [
            'name' => esc_attr__('Cream', 'default'),
            'slug' => 'cream',
            'color' => '#FDF8E7',
        ],
    ];
    // Apply the color palette containing the original colors and 2 new colors:
    add_theme_support( 'editor-color-palette', $newColorPalette);
}
add_action( 'after_setup_theme', 'aventi_pallette' );
