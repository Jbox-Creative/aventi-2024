<?php
/**
 * File path: /resources/blocks/word-marquee.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'word-marquee',
    'title'             => __('Word Marquee'),
    'description'       => __('Shows an infinite marquee of words in both small and large font sizes.'),
    'render_callback'   => 'word_marquee_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'leftright',
    'keywords'          => array('values', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function word_marquee_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'id' => $block['id'],
        'words' => get_field('words')
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
