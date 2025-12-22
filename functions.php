<?php
/**
 * Enqueue parent and child styles
 */
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'bylaw-parent',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'bylaw-child',
        get_stylesheet_uri(),
        ['bylaw-parent'],
        '1.0'
    );

});

/**
 * Load child theme hooks
 */
require_once get_stylesheet_directory() . '/inc/hooks.php';

