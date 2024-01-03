<?php

/**
 * Register Custom Post Types here
 * @see https://codex.wordpress.org/Function_Reference/register_post_type
 */

function post_types() {
  //---------------------------------------------------------------------------
  // Register Team Members
  //---------------------------------------------------------------------------

  $labels = array(
    'name'                  => 'Team',
    'singular_name'         => 'Team Member',
    'menu_name'             => 'Team',
    'name_admin_bar'        => 'Team',
    'all_items'             => 'All Team Members',
    'add_new_item'          => 'Add Team Member',
    'add_new'               => 'Add New',
    'new_item'              => 'New Team Member',
    'edit_item'             => 'Edit Team Member',
    'update_item'           => 'Update Team Member',
    'view_item'             => 'View Team Member',
    'view_items'            => 'View Team',
    'search_items'          => 'Search Team',
  );

  $args = array(
    'label'                 => 'Team',
    'labels'                => $labels,
    'supports'              => array('title'),
    'hierarchical'          => false,
    'public'                => false,
    'publicly_queryable'    => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'can_export'            => true,
    'has_archive'           => false,
    'capability_type'       => 'page',
    'rewrite'               => array( 'slug' => 'team', 'with_front' => false ),
    'menu_icon'             => 'dashicons-groups',
    'rewrite'               => array( 'with_front' => false ),
  );

  register_post_type('team', $args);

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
