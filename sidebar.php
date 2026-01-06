<?php
/**
 * Sidebar Template
 * 
 * @package ByLaw_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php echo esc_attr( is_rtl() ? 'الشريط الجانبي' : 'Sidebar' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
