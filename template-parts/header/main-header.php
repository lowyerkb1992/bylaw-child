<?php
/**
 * Main Header Logo
 */

// مسار اللوجو (من داخل القالب)
$logo_url = trailingslashit( get_template_directory_uri() ) . 'assets/images/logo.svg';
?>

<div class="site-logo">
  <a href="<?php echo esc_url( home_url('/') ); ?>" aria-label="<?php echo esc_attr( get_bloginfo('name') ); ?>">
    <img
      src="<?php echo esc_url( $logo_url ); ?>"
      alt="<?php echo esc_attr( get_bloginfo('name') ); ?>"
      loading="lazy"
    >
  </a>
</div>
