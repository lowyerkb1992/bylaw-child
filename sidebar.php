<?php
/**
 * Sidebar Template
 * 
 * @package ByLaw_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php echo esc_attr( is_rtl() ? 'الشريط الجانبي' : 'Sidebar' ); ?>">
	<?php
	// Always show contact widget first
	get_template_part( 'template-parts/sidebar-contact' );
	
	// Then show any other widgets
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar( 'sidebar-1' );
	}
	?>
</aside>
