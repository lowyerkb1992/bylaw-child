<?php
/**
 * bylaw-child/functions.php
 * Child theme bootstrap: enqueue parent + child assets and load child modules.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue parent and child styles and child assets.
 */
function bch_enqueue_styles() {
    // Parent style
    $parent_handle = 'bylaw-parent-style';
    wp_enqueue_style( $parent_handle, get_template_directory_uri() . '/style.css', array(), wp_get_theme( 'bylaw' )->get( 'Version' ) );

    // Child main (this file is present but minimal)
    wp_enqueue_style( 'bylaw-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_handle ), wp_get_theme( get_stylesheet() )->get( 'Version' ) );

    // Additional modular CSS
    wp_enqueue_style( 'bylaw-child-global', get_stylesheet_directory_uri() . '/assets/css/global.css', array( 'bylaw-child-style' ), filemtime( get_stylesheet_directory() . '/assets/css/global.css' ) );
    wp_enqueue_style( 'bylaw-child-header-footer', get_stylesheet_directory_uri() . '/assets/css/header-footer.css', array( 'bylaw-child-style' ), filemtime( get_stylesheet_directory() . '/assets/css/header-footer.css' ) );

    // Load RTL adjustments conditionally (Polylang or WP RTL)
    $is_ar = false;
    if ( function_exists( 'pll_current_language' ) ) {
        $lang = pll_current_language( 'slug' );
        if ( $lang === 'ar' ) {
            $is_ar = true;
        }
    } elseif ( is_rtl() ) {
        $is_ar = true;
    }

    if ( $is_ar ) {
        wp_enqueue_style( 'bylaw-child-rtl', get_stylesheet_directory_uri() . '/assets/css/rtl.css', array( 'bylaw-child-style' ), filemtime( get_stylesheet_directory() . '/assets/css/rtl.css' ) );
    }
}
add_action( 'wp_enqueue_scripts', 'bch_enqueue_styles', 20 );

/**
 * Load child modules (hooks, cta, etc.)
 */
$inc = get_stylesheet_directory() . '/inc';
foreach ( array( 'hooks.php', 'cta.php' ) as $file ) {
    $path = $inc . '/' . $file;
    if ( file_exists( $path ) ) {
        require_once $path;
    }
}
