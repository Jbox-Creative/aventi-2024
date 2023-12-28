<?php
/**
 * File path: /resources/blocks/splash-hero.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'splash-hero',
    'title'             => __('Splash Hero'),
    'description'       => __('Displays a graphical splash with several options.'),
    'render_callback'   => 'splash_hero_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'star-filled',
    'keywords'          => array('splash', 'aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function splash_hero_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $layout = get_field('sh_layout');

    if ($layout == 'location') {
        $locationDetails = [
            'hours' => get_field('hours',$post->ID),
            'address' => get_field('address',$post->ID),
            'phone' => get_field('phone',$post->ID),
            'email' => get_field('email',$post->ID)
        ];
    }

    $data = [
        'layout' => $layout,
        'image' => get_field('sh_image'),
        'title' => get_field('sh_title'),
        'subtitle' => get_field('sh_subtitle'),
        'text' => get_field('sh_text'),
        'links' => $layout == 'default' ? get_field('sh_links') : false,
        'big_text' => $layout == 'big-text' ? get_field('sh_big_text') : false,
        'stats' => $layout == 'stats' ? get_field('sh_stats') : false,
        'locDetails' => $layout == 'location' ? $locationDetails : false,
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
