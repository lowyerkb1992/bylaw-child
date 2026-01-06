<?php
/**
 * Top Bar with Contact Information
 */

// Get contact information from constants
$phone = defined( 'BCH_CTA_PHONE' ) ? BCH_CTA_PHONE : '+971502974604';
$email = defined( 'BCH_CTA_EMAIL' ) ? BCH_CTA_EMAIL : 'info@almoustasharlegal.com';
$whatsapp = defined( 'BCH_CTA_WHATSAPP' ) ? BCH_CTA_WHATSAPP : '+971502974604';

// Detect language for labels
$is_ar = ( function_exists( 'pll_current_language' ) && pll_current_language( 'slug' ) === 'ar' ) || is_rtl();

$labels = array(
    'phone' => $is_ar ? 'هاتف:' : 'Phone:',
    'email' => $is_ar ? 'بريد:' : 'Email:',
    'whatsapp' => $is_ar ? 'واتساب' : 'WhatsApp',
);
?>

<div class="topbar">
  <div class="topbar__inner">
    <div class="topbar__left">
      <?php if ( ! empty( $phone ) ) : ?>
        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" class="topbar__contact-item topbar__phone" aria-label="<?php echo esc_attr( $labels['phone'] . ' ' . $phone ); ?>">
          <span class="topbar__icon" aria-hidden="true">📞</span>
          <span class="topbar__label"><?php echo esc_html( $labels['phone'] ); ?></span>
          <span class="topbar__value"><?php echo esc_html( $phone ); ?></span>
        </a>
      <?php endif; ?>
      
      <?php if ( ! empty( $email ) ) : ?>
        <a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>" class="topbar__contact-item topbar__email" aria-label="<?php echo esc_attr( $labels['email'] . ' ' . $email ); ?>">
          <span class="topbar__icon" aria-hidden="true">✉️</span>
          <span class="topbar__label"><?php echo esc_html( $labels['email'] ); ?></span>
          <span class="topbar__value"><?php echo esc_html( antispambot( $email ) ); ?></span>
        </a>
      <?php endif; ?>
    </div>
    
    <div class="topbar__right">
      <?php if ( ! empty( $whatsapp ) ) : ?>
        <a href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $whatsapp ) ); ?>" class="topbar__contact-item topbar__whatsapp" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $labels['whatsapp'] ); ?>">
          <span class="topbar__icon" aria-hidden="true">💬</span>
          <span class="topbar__label"><?php echo esc_html( $labels['whatsapp'] ); ?></span>
        </a>
      <?php endif; ?>
      
      <?php
      // Language switcher if Polylang is active
      if ( function_exists( 'pll_the_languages' ) ) :
      ?>
        <div class="topbar__lang-switcher">
          <?php
          pll_the_languages( array(
              'dropdown'             => 0,
              'show_names'           => 1,
              'display_names_as'     => 'slug',
              'show_flags'           => 0,
              'hide_if_empty'        => 0,
              'hide_current'         => 0,
          ) );
          ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
