<?php
/**
 * Footer Template with Widget Areas
 * 
 * @package ByLaw_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Detect language
$is_ar = ( function_exists( 'pll_current_language' ) && pll_current_language( 'slug' ) === 'ar' ) || is_rtl();
$year = date( 'Y' );

// Footer disclaimer text
$disclaimer_text = $is_ar 
	? "© {$year} المستشار القانوني. جميع الحقوق محفوظة. هذا الموقع لا ينشئ علاقة محاماة وموكل."
	: "© {$year} Almoustashar Legal. All rights reserved. This site does not create an attorney-client relationship.";
?>

<footer id="site-footer" class="site-footer">
	<div class="footer-widgets-container">
		<div class="footer-widgets">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="footer-widget-area footer-widget-area-1">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="footer-widget-area footer-widget-area-2">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="footer-widget-area footer-widget-area-3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="footer-widget-area footer-widget-area-4">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	
	<div class="footer-bottom">
		<div class="footer-bottom__inner">
			<div class="footer-disclaimer">
				<p><?php echo esc_html( $disclaimer_text ); ?></p>
			</div>
			
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-menu" aria-label="<?php echo esc_attr( $is_ar ? 'قائمة التذييل' : 'Footer Menu' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'footer-menu-list',
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
					?>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</footer>
