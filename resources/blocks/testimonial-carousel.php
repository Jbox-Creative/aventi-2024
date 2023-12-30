<?php
/**
 * File path: /resources/blocks/testimonial-carousel.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'testimonial-carousel',
    'title'             => __('Testimonial Carousel'),
    'description'       => __('A carousel of client testimonials.'),
    'render_callback'   => 'testimonial_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'format-quote',
    'keywords'          => array('slider', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function testimonial_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'id' => $block['id'],
        'title' => get_field('title'),
        'testimonials' => get_field('testimonials'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
