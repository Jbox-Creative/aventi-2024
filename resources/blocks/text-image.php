<?php
/**
 * File path: /resources/blocks/text-image.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'text-image',
    'title'             => __('Text & Image'),
    'description'       => __('Text Image with 2 options (Left, Right)'),
    'render_callback'   => 'text_image_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'star-filled',
    'keywords'          => array('aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function text_image_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $layout = get_field('ti_layout');

    $data = [
        'layout' => $layout,
        'icon' => get_field('ti_icon'),
        'title' => get_field('ti_title'),
        'anchor_id' => get_field('ti_anchor_id'),
        'intro' => get_field('ti_intro'),
        'learn_more_button' => get_field('ti_learn_more_button'),
        'img' => get_field('ti_accent_image'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
