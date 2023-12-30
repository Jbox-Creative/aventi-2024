<?php
/**
 * File path: /resources/blocks/numbered-cards.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'numbered-cards',
    'title'             => __('Numbered Cards'),
    'description'       => __('Grid of cards with numbers and text, optional title above grid.'),
    'render_callback'   => 'numbered_cards_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'grid-view',
    'keywords'          => array('services', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function numbered_cards_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'id' => $block['id'],
        'add_arrow' => get_field('add_arrow'),
        'title' => get_field('title'),
        'cards' => get_field('cards'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
