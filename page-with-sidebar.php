<?php
/**
 * Template Name: Page with Sidebar
 * Template Post Type: page, post
 * 
 * @package ByLaw_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div id="primary" class="content-area content-with-sidebar">
	<div class="container">
		<div class="content-sidebar-wrapper">
			<main id="main" class="site-main" role="main">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header>

						<div class="entry-content">
							<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bylaw-child' ),
								'after'  => '</div>',
							) );
							?>
						</div>
					</article>
					<?php
				endwhile;
				?>
			</main>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php
get_footer();