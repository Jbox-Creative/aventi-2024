<?php
/**
 * File path: /resources/blocks/cta-block.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'cta-block',
    'title'             => __('CTA Block'),
    'description'       => __('A block with title, text, and button representing a call to action.'),
    'render_callback'   => 'cta_block_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'button',
    'keywords'          => array('footer', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function cta_block_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'id' => $block['id'],
        'footer_block' => get_field('footer_block'),
        'title' => get_field('title'),
        'text' => get_field('text'),
        'cta' => get_field('cta'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
