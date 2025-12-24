<?php
/**
 * bylaw-child/inc/hooks.php
 * Child theme hooks and safe filters.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Determine current language slug (Polylang preferred) and return normalized slug.
 *
 * @return string 'ar' or 'en' (fallback to 'en').
 */
function bch_detect_language_slug() {
    if ( function_exists( 'pll_current_language' ) ) {
        $slug = pll_current_language( 'slug' );
        if ( $slug ) {
            return strtolower( substr( $slug, 0, 2 ) ) === 'ar' ? 'ar' : 'en';
        }
    }

    return is_rtl() ? 'ar' : 'en';
}

/**
 * Add language + direction body classes: lang-en | lang-ar and is-ltr | is-rtl
 */
function bch_body_classes( $classes ) {
    $lang = bch_detect_language_slug();

    // Remove old markers to avoid duplicates
    $classes = array_filter( $classes, function( $c ) {
        return ! in_array( $c, array( 'lang-en', 'lang-ar', 'is-ltr', 'is-rtl' ), true );
    } );

    $classes[] = ( $lang === 'ar' ) ? 'lang-ar' : 'lang-en';
    $classes[] = ( $lang === 'ar' ) ? 'is-rtl' : 'is-ltr';

    return $classes;
}
add_filter( 'body_class', 'bch_body_classes' );

/**
 * Ensure the HTML language attributes include the correct dir value based on detection.
 */
function bch_language_attributes( $output ) {
    $lang = bch_detect_language_slug();
    $has_dir = ( strpos( $output, 'dir=' ) !== false );

    if ( $lang === 'ar' ) {
        if ( ! $has_dir ) {
            $output .= ' dir="rtl"';
        } else {
            $output = preg_replace( '/dir=(\"|\')(ltr|rtl)(\"|\')/i', 'dir="rtl"', $output );
        }
    } else {
        if ( ! $has_dir ) {
            $output .= ' dir="ltr"';
        } else {
            $output = preg_replace( '/dir=(\"|\')(ltr|rtl)(\"|\')/i', 'dir="ltr"', $output );
        }
    }

    return $output;
}
add_filter( 'language_attributes', 'bch_language_attributes' );

/**
 * Optional wp_body_open topbar hook placeholder (disabled by default).
 * To enable a topbar in templates: add do_action( 'bch_topbar' ); in the theme template where desired.
 */
function bch_topbar_output() {
    // Intentionally empty: implement via add_action('bch_topbar', 'your_callback') from child or plugin.
}

/**
 * Add filter to allow adding a class to header wrapper if theme exposes a header container filter.
 * This is non-destructive: it adds a 'bch-has-cta' class when a CTA is registered.
 */
function bch_maybe_add_header_class( $classes ) {
    // $classes may be string or array depending on theme; normalize to array
    if ( is_string( $classes ) ) {
        $classes = explode( ' ', $classes );
    }

    $has_cta = false;
    // Detect if CTA constants are configured (basic detection)
    if ( defined( 'BCH_CTA_WHATSAPP' ) && BCH_CTA_WHATSAPP !== 'CONFIGURE_WHATSAPP' ) {
        $has_cta = true;
    }
    if ( defined( 'BCH_CTA_PHONE' ) && BCH_CTA_PHONE !== 'CONFIGURE_PHONE' ) {
        $has_cta = true;
    }

    if ( $has_cta ) {
        $classes[] = 'bch-has-cta';
    }

    // Return same type as received
    return is_string( $classes ) ? implode( ' ', array_filter( $classes ) ) : array_values( array_filter( $classes ) );
}

// Example usage: if parent theme applies 'header_class' filter, hook into it. We guard with function_exists check.
if ( has_filter( 'header_class' ) ) {
    add_filter( 'header_class', 'bch_maybe_add_header_class' );
}

