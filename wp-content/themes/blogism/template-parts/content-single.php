<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blogism
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content-wrapper">
    <?php
	  /**
	   * Hook - blogism_single_image.
	   *
	   * @hooked blogism_add_image_in_single_display - 10
	   */
	  do_action( 'blogism_single_image' );
	?>

	<div class="entry-content-inner">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

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
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogism' ),
					'after'  => '</div>',
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

<?php
/**
 * Hook - blogism_author_bio.
 *
 * @hooked blogism_add_author_bio_in_single - 10
 */
do_action( 'blogism_author_bio' );
