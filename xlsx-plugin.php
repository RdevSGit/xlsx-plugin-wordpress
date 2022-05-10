<?php
/*
Plugin Name: Xlsx Plugin
Description: Import XLSX
Author: Romain Sanieres
*/

define('MY_PLUGIN_DIR_PATH', untrailingslashit(plugin_dir_path(__FILE__)));


function my_acf_json_save_point($path)
{

    // Update path
    $path = MY_PLUGIN_DIR_PATH . '/acf-json';

    // Return path
    return $path;
}

function my_acf_json_load_point($path)
{
    unset($path[0]);
    $path[] = MY_PLUGIN_DIR_PATH . '/acf-json';
    return $path;
}

function plugin_mentormarketing()
{
    register_post_type(
        'MentorMarketing',
        [
            'label' => 'mentormarketing_product',
            'public' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-spreadsheet',

        ]
    );
}

add_action('init', 'plugin_mentormarketing');
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
