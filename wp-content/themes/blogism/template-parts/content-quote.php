<?php
/**
 * Template part for displaying posts.
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
				<div class="entry-meta">
					<?php blogism_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blogism' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php blogism_entry_footer(); ?>
				<div/> <!-- .entry-meta -->
			</footer><!-- .entry-footer -->
		</div> <!-- .entry-content-inner -->
	</div><!-- .entry-content-wrapper -->
</article><!-- #post-## -->
