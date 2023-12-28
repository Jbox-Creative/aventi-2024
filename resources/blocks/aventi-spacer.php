<?php
/**
 * File path: /resources/blocks/aventi-spacer.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'aventi-spacer',
    'title'             => __('Aventi Spacer'),
    'description'       => __('Positive or negative margins at various breakpoints'),
    'render_callback'   => 'aventi_spacer_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'star-filled',
    'keywords'          => array('keywords', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function aventi_spacer_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'space' => get_field('space'),
        'hide_for' => get_field('hide_for'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
