<?php

/**
 * Register Custom Post Types here
 * @see https://codex.wordpress.org/Function_Reference/register_post_type
 */

function post_types() {
  //---------------------------------------------------------------------------
  // Register Locations
  //---------------------------------------------------------------------------
  $labels = array(
    'name'          => __( 'Locations', 'aventi' ),
    'singular_name' => __( 'Location', 'aventi' ),
    'search_items'  => __( 'Search Locations', 'aventi' ),
    'all_items'     => __( 'All Locations', 'aventi' ),
    'menu_name'     => __( 'Locations', 'aventi' )
  );
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'menu_icon'          => _( 'dashicons-building' ),
    'show_ui'            => true,
    'show_in_menu'       => true,
    'menu_position'      => 6,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'location', 'with_front' => false ),
    'capability_type'    => 'post',
    'show_in_rest'       => true,
    'has_archive'        => false,
    'hierarchical'       => false,
    'supports'           => array( 'title','editor','thumbnail','revisions' )
  );
  register_post_type( 'location', $args );

  //---------------------------------------------------------------------------
  // Register FAQs
  //---------------------------------------------------------------------------
  $labels = array(
    'name'          => __( 'FAQs', 'aventi' ),
    'singular_name' => __( 'FAQ', 'aventi' ),
    'search_items'  => __( 'Search FAQs', 'aventi' ),
    'all_items'     => __( 'All FAQs', 'aventi' ),
    'menu_name'     => __( 'FAQs', 'aventi' )
  );
  $args = array(
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => false,
    'menu_icon'          => _( 'dashicons-info' ),
    'show_ui'            => true,
    'show_in_menu'       => true,
    'menu_position'      => 7,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'faq', 'with_front' => false ),
    'capability_type'    => 'post',
    'show_in_rest'       => true,
    'has_archive'        => false,
    'hierarchical'       => false,
    'supports'           => array( 'title' )
  );
  register_post_type( 'faq', $args );

    //---------------------------------------------------------------------------
    // Testimonial Locations
    //---------------------------------------------------------------------------
    $labels = array(
        'name'          => __( 'Testimonials', 'aventi' ),
        'singular_name' => __( 'Testimonial', 'aventi' ),
        'search_items'  => __( 'Search Testimonials', 'aventi' ),
        'all_items'     => __( 'All Testimonials', 'aventi' ),
        'menu_name'     => __( 'Testimonials', 'aventi' )
    );
    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => true,
        'menu_icon'          => _( 'dashicons-star-filled' ),
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 8,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial', 'with_front' => false ),
        'capability_type'    => 'post',
        'show_in_rest'       => true,
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array( 'title' )
    );
    register_post_type( 'testimonial', $args );
}

add_action( 'init', 'post_types' );
