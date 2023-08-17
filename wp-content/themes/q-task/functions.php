<?php
// Enqueue styles and scripts
function q_task_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'q_task_enqueue_styles');

add_theme_support('custom-logo');
