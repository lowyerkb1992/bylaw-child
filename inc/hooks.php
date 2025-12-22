<?php
// Custom hooks for ByLaw Child<?php
/**
 * Child theme hooks/overrides for ByLaw
 */

/**
 * 1) Add language direction class to <body> (RTL/LTR)
 * Polylang sets language, we use it to apply CSS cleanly.
 */
add_filter('body_class', function ($classes) {
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language('slug'); // e.g. en, ar
        $classes[] = 'lang-' . $lang;
        if ($lang === 'ar') $classes[] = 'is-rtl';
        if ($lang === 'en') $classes[] = 'is-ltr';
    }
    return $classes;
});
