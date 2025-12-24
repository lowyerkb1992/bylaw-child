<?php
/**
 * bylaw-child/inc/cta.php
 * Global CTA output (floating WhatsApp / Call / Email)
 * Placeholders used: CONFIGURE_WHATSAPP, CONFIGURE_PHONE, CONFIGURE_EMAIL
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'BCH_CTA_WHATSAPP' ) ) {
    define( 'BCH_CTA_WHATSAPP', '+971502974604' ); // WhatsApp number (Almoustashar Legal)
}
if ( ! defined( 'BCH_CTA_PHONE' ) ) {
    define( 'BCH_CTA_PHONE', '+971502974604' ); // Call/Tel number (Almoustashar Legal)
}
if ( ! defined( 'BCH_CTA_EMAIL' ) ) {
    define( 'BCH_CTA_EMAIL', 'info@almoustasharlegal.com' ); // Official email
}

/**
 * Output floating CTAs in footer (accessibility + translation-ready).
 */
function bch_print_floating_ctas() {
    $cfg = array(
        'whatsapp' => defined( 'BCH_CTA_WHATSAPP' ) ? BCH_CTA_WHATSAPP : '',
        'phone'    => defined( 'BCH_CTA_PHONE' ) ? BCH_CTA_PHONE : '',
        'email'    => defined( 'BCH_CTA_EMAIL' ) ? BCH_CTA_EMAIL : '',
    );

    // Do not output if not configured at all
    if ( empty( $cfg['whatsapp'] ) && empty( $cfg['phone'] ) && empty( $cfg['email'] ) ) {
        return;
    }

    // Language-aware labels (translation-ready)
    $is_ar = false;
    if ( function_exists( 'pll_current_language' ) && pll_current_language( 'slug' ) === 'ar' ) {
        $is_ar = true;
    } elseif ( is_rtl() ) {
        $is_ar = true;
    }

    $labels = array(
        'whatsapp' => $is_ar ? 'واتساب' : 'WhatsApp',
        'call'     => $is_ar ? 'اتصال' : 'Call',
        'email'    => $is_ar ? 'بريد' : 'Email',
    );

    // Output sanitized static markup (no inline styles) to keep caching safe
    echo "<nav class=\"bch-floating-ctas\" aria-label=\"Contact shortcuts\">";

    if ( ! empty( $cfg['whatsapp'] ) ) {
        $wa = esc_attr( preg_replace( '/[^0-9+]/', '', $cfg['whatsapp'] ) );
        printf(
            '<a class="bch-cta bch-cta-whatsapp" href="https://wa.me/%1$s" aria-label="%2$s" target="_blank" rel="noopener noreferrer"><span class="bch-cta-icon" aria-hidden="true">📱</span><span class="bch-cta-label">%2$s</span></a>',
            $wa,
            esc_html( $labels['whatsapp'] )
        );
    }

    if ( ! empty( $cfg['phone'] ) ) {
        $ph = esc_attr( preg_replace( '/[^0-9+]/', '', $cfg['phone'] ) );
        printf(
            '<a class="bch-cta bch-cta-phone" href="tel:%1$s" aria-label="%2$s"><span class="bch-cta-icon" aria-hidden="true">📞</span><span class="bch-cta-label">%2$s</span></a>',
            $ph,
            esc_html( $labels['call'] )
        );
    }

    if ( ! empty( $cfg['email'] ) ) {
        $em = antispambot( esc_attr( $cfg['email'] ) );
        printf(
            '<a class="bch-cta bch-cta-email" href="mailto:%1$s" aria-label="%2$s"><span class="bch-cta-icon" aria-hidden="true">✉️</span><span class="bch-cta-label">%2$s</span></a>',
            $em,
            esc_html( $labels['email'] )
        );
    }

    echo "</nav>";
}
add_action( 'wp_footer', 'bch_print_floating_ctas', 20 );
