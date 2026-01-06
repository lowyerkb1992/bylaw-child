<?php
/**
 * ByLaw Child - functions.php
 * Safe customizations (Arabic/English) + hardening + comments control.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1) Enqueue parent + child styles safely
 * (prevents losing parent styling)
 */
add_action( 'wp_enqueue_scripts', function () {
	// Parent theme stylesheet handle may vary; using robust approach:
	$parent_style_handle = 'bylaw-parent-style';

	// Load parent style (fallback to theme stylesheet URI)
	wp_enqueue_style(
		$parent_style_handle,
		get_template_directory_uri() . '/style.css',
		[],
		wp_get_theme( get_template() )->get( 'Version' )
	);

	// Load child style after parent
	wp_enqueue_style(
		'bylaw-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[ $parent_style_handle ],
		wp_get_theme()->get( 'Version' )
	);
}, 20 );

/**
 * 2) Professional hardening (lightweight, low-risk)
 * - Disable XML-RPC (common attack vector if not needed)
 * - Disable emoji assets (performance)
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

add_action( 'init', function () {
	// Disable emojis
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}, 1 );

/**
 * 3) Close comments on PAGES (keep them available for Posts if you want)
 * Applies to:
 * - Existing pages (on save/update)
 * - New pages (default)
 */
function bylaw_child_close_comments_for_pages( $post_id, $post, $update ) {
	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}
	if ( $post->post_type !== 'page' ) {
		return;
	}

	// If already closed, do nothing
	if ( $post->comment_status === 'closed' && $post->ping_status === 'closed' ) {
		return;
	}

	// Update comment + ping status to closed
	remove_action( 'save_post', 'bylaw_child_close_comments_for_pages', 10 );
	wp_update_post( [
		'ID'             => $post_id,
		'comment_status' => 'closed',
		'ping_status'    => 'closed',
	] );
	add_action( 'save_post', 'bylaw_child_close_comments_for_pages', 10, 3 );
}
add_action( 'save_post', 'bylaw_child_close_comments_for_pages', 10, 3 );

// Default settings: new pages have comments closed by default
add_filter( 'comments_open', function ( $open, $post_id ) {
	$post = get_post( $post_id );
	if ( $post && $post->post_type === 'page' ) {
		return false;
	}
	return $open;
}, 20, 2 );

add_filter( 'pings_open', function ( $open, $post_id ) {
	$post = get_post( $post_id );
	if ( $post && $post->post_type === 'page' ) {
		return false;
	}
	return $open;
}, 20, 2 );

/**
 * 4) Hide comments UI site-wide (optional but professional)
 * This does NOT affect blog comments on posts if you keep them enabled;
 * it only removes menu & admin bar entry to reduce spam surface.
 */
add_action( 'admin_menu', function () {
	remove_menu_page( 'edit-comments.php' );
}, 999 );

add_action( 'wp_before_admin_bar_render', function () {
	global $wp_admin_bar;
	if ( is_object( $wp_admin_bar ) ) {
		$wp_admin_bar->remove_menu( 'comments' );
	}
}, 999 );

/**
 * 5) Basic cleanup: remove "generator" meta (minor hardening)
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Load custom site header template (no extra output here).
 */

/**
 * 6) Register navigation menus
 */
function bylaw_child_register_menus() {
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'bylaw-child' ),
		'footer'    => esc_html__( 'Footer Menu', 'bylaw-child' ),
		'sidebar'   => esc_html__( 'Sidebar Menu', 'bylaw-child' ),
	) );
}
add_action( 'after_setup_theme', 'bylaw_child_register_menus' );

/**
 * 7) Register sidebar widget areas
 */
function bylaw_child_register_sidebars() {
	// Main sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'bylaw-child' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets in this area will be shown in the sidebar.', 'bylaw-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer widget areas
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'bylaw-child' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'First footer widget area.', 'bylaw-child' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'bylaw-child' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Second footer widget area.', 'bylaw-child' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'bylaw-child' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Third footer widget area.', 'bylaw-child' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'bylaw-child' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Fourth footer widget area.', 'bylaw-child' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bylaw_child_register_sidebars' );

/**
 * 8) Enqueue additional child theme assets
 */
add_action( 'wp_enqueue_scripts', function () {
	// Enqueue header-footer CSS
	wp_enqueue_style(
		'bylaw-child-header-footer',
		get_stylesheet_directory_uri() . '/assets/css/header-footer.css',
		array( 'bylaw-child-style' ),
		wp_get_theme()->get( 'Version' )
	);

	// Enqueue custom CSS
	wp_enqueue_style(
		'bylaw-child-custom',
		get_stylesheet_directory_uri() . '/assets/css/custom.css',
		array( 'bylaw-child-style' ),
		wp_get_theme()->get( 'Version' )
	);

	// Enqueue navigation JS
	wp_enqueue_script(
		'bylaw-child-navigation',
		get_stylesheet_directory_uri() . '/assets/js/navigation.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}, 25 );

/**
 * 9) Load child theme include files
 */
require_once get_stylesheet_directory() . '/inc/hooks.php';
require_once get_stylesheet_directory() . '/inc/cta.php';

/**
 * 10) Helper function to sanitize phone numbers for links
 */
function bylaw_child_sanitize_phone( $phone ) {
	return preg_replace( '/[^0-9+]/', '', $phone );
}

// End of child theme functions. No closing PHP tag to avoid accidental whitespace output. 