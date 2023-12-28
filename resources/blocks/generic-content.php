<?php
/**
 * File path: /resources/blocks/generic-content.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'generic-content',
    'title'             => __('Generic Content'),
    'description'       => __('A simple WYSYWG editor for Aventi theme'),
    'render_callback'   => 'generic_content_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'star-filled',
    'keywords'          => array('text', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function generic_content_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'content' => get_field('gc_content'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
