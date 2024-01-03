<?php
/**
 * File path: /resources/blocks/hero.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'hero',
    'title'             => __('Hero'),
    'description'       => __('Top of page element with large text and graphical elements.'),
    'render_callback'   => 'hero_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'star-filled',
    'keywords'          => array('splash', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function hero_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'id' => $block['id'],
        'layout' => get_field('layout'),        
        'theme' => get_field('theme'),        
        'text_align' => get_field('text_align'),        
        'text_size' => get_field('text_size'),        
        'heading_size' => get_field('heading_size'),        
        'title' => get_field('title'),        
        'text' => get_field('text'),        
        'ctas' => get_field('ctas'),        
        'image' => get_field('image'),        
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
