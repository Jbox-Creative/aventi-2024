<?php
/**
 * ACF Related hooks
 */

// Google JS Maps API Key
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAi9fpZoAJ8IFWBDFXtuDvw0mfW_JZPBIU';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

//Custom Block category for Aventi Group
add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
        array(
            array(
                'slug' => 'aventi-2024-blocks',
                'title' => __( 'Aventi Group', 'aventi-2024' ),
            ),
        ),
        $categories
    );
}, 10, 2 );

// init new blocks in scripts/blocks folder
add_action('acf/init', 'blocks_acf_init');
function blocks_acf_init(){
    // check function exists
    if (function_exists('acf_register_block')) {

        $files = glob(__DIR__ . '/../blocks/*.php');
        foreach ($files as $file) {
            require_once($file);
        }
    }
}

// Set save point
add_filter('acf/settings/save_json', function ($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});

// Set load point(s) - ACF loads all.json files from multiple load points
add_filter('acf/settings/load_json', function ($paths) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

// Create options page
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => 'Global Options',
        'menu_title' => 'Options',
        'menu_slug' => 'site-options',
        'capability' => 'manage_options',
        'redirect' => false,
    ));
}
