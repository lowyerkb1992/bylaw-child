<?php
/**
 * Sidebar Contact Widget Template
 * 
 * @package ByLaw_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get contact information
$phone = defined( 'BCH_CTA_PHONE' ) ? BCH_CTA_PHONE : '+971502974604';
$email = defined( 'BCH_CTA_EMAIL' ) ? BCH_CTA_EMAIL : 'info@almoustasharlegal.com';
$whatsapp = defined( 'BCH_CTA_WHATSAPP' ) ? BCH_CTA_WHATSAPP : '+971502974604';

// Detect language
$is_ar = ( function_exists( 'pll_current_language' ) && pll_current_language( 'slug' ) === 'ar' ) || is_rtl();

$labels = array(
    'title' => $is_ar ? 'اتصل بنا' : 'Contact Us',
    'phone' => $is_ar ? 'اتصل' : 'Call',
    'email' => $is_ar ? 'راسلنا' : 'Email Us',
    'whatsapp' => $is_ar ? 'واتساب' : 'WhatsApp',
    'cta_text' => $is_ar ? 'احصل على استشارة مجانية' : 'Get Free Consultation',
);
?>

<div class="sidebar-contact-widget">
	<h3 class="sidebar-contact-widget__title"><?php echo esc_html( $labels['title'] ); ?></h3>
	
	<div class="sidebar-contact-widget__content">
		<?php if ( ! empty( $phone ) ) : ?>
			<div class="sidebar-contact-item">
				<span class="sidebar-contact-item__icon" aria-hidden="true">📞</span>
				<div class="sidebar-contact-item__details">
					<span class="sidebar-contact-item__label"><?php echo esc_html( $labels['phone'] ); ?></span>
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" class="sidebar-contact-item__value">
						<?php echo esc_html( $phone ); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ( ! empty( $email ) ) : ?>
			<div class="sidebar-contact-item">
				<span class="sidebar-contact-item__icon" aria-hidden="true">✉️</span>
				<div class="sidebar-contact-item__details">
					<span class="sidebar-contact-item__label"><?php echo esc_html( $labels['email'] ); ?></span>
					<a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>" class="sidebar-contact-item__value">
						<?php echo esc_html( antispambot( $email ) ); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ( ! empty( $whatsapp ) ) : ?>
			<div class="sidebar-contact-item">
				<span class="sidebar-contact-item__icon" aria-hidden="true">💬</span>
				<div class="sidebar-contact-item__details">
					<span class="sidebar-contact-item__label"><?php echo esc_html( $labels['whatsapp'] ); ?></span>
					<a href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $whatsapp ) ); ?>" class="sidebar-contact-item__value" target="_blank" rel="noopener noreferrer">
						<?php echo esc_html( $whatsapp ); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		
		<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="sidebar-contact-widget__cta">
			<?php echo esc_html( $labels['cta_text'] ); ?>
		</a>
	</div>
</div>
