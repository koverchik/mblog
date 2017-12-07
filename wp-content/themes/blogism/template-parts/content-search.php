<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blogism
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content-wrapper">
		<div class="entry-content-inner">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<footer class="entry-footer">
				<div class="entry-meta">
					<?php blogism_entry_footer(); ?>
				<div/> <!-- .entry-meta -->
			</footer><!-- .entry-footer -->
		</div><!-- .entry-content-inner -->

	</div><!-- .entry-content-wrapper -->



</article><!-- #post-## -->
