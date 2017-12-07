<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blogism
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">

			<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blogism' ); ?></h2>

			<div class="page-content">

				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blogism' ); ?></p>

				<?php get_search_form(); ?>

				<?php if ( has_nav_menu( 'notfound' ) ) : ?>
					<nav id="navigation-404" role="navigation" aria-label="<?php esc_attr_e( '404 Menu', 'blogism' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'notfound',
							'depth'          => 1,
							'fallback_cb'    => false,
							'container'      => 'div',
							'container_id'   => 'quick-links-404',
							)
						);
						?>
					</nav><!-- #navigation-404 -->
				<?php endif; ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
