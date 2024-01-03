<?php
/**
 * File path: /resources/blocks/team-grid.php
 */

/**
 * Register the block
 * @link https://www.advancedcustomfields.com/resources/acf_register_block/ for more details
 */
acf_register_block(array(
    'name'              => 'team-grid',
    'title'             => __('Team Grid'),
    'description'       => __('Display the team member posts in a grid, displays details when clicked.'),
    'render_callback'   => 'team_grid_renderer',
    'category'          => 'aventi-2024-blocks',
    'icon'              => 'businessperson',
    'keywords'          => array('aventi-2024'),
    'mode'              => 'edit',
));

/**
 * Method that renders block on the front end. Do all your logic here
 */
function team_grid_renderer($block) {
    global $post; // current post
    $slug = str_replace('acf/', '', $block['name']);

    $data = [
        'id' => $block['id'],
        'title' => get_field('title'),
        'team_members' => get_field('team_members'),
    ];

    // Pass all data to the view
    echo \App\sage('blade')->render('blocks.' . $slug, $data);
}
