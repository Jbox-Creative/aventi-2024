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
    'icon'              => 'align-pull-left',
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
        'id' => $block['id'],
        'layout' => $layout,
        'title' => get_field('ti_title'),
        'intro' => get_field('ti_intro'),
        'learn_more_button' => get_field('ti_learn_more_button'),
        'img' => get_field('ti_image'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
