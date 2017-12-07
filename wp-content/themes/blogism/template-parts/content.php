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
		<?php $archive_layout = blogism_get_option( 'archive_layout' ); ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $archive_image = blogism_get_option( 'archive_image' ); ?>
			<?php if ( 'disable' !== $archive_image ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( esc_attr( $archive_image ), array( 'class' => 'aligncenter' ) ); ?></a>
			<?php endif; ?>
		<?php endif; ?>
		<div class="entry-content-inner">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php blogism_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php if ( 'full' === $archive_layout ) : ?>
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
			    <?php else : ?>
					<?php the_excerpt(); ?>
			    <?php endif; ?>

			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php blogism_entry_footer(); ?>
				<div/> <!-- .entry-meta -->
			</footer><!-- .entry-footer -->
		</div> <!-- .entry-content-inner -->
	</div><!-- .entry-content-wrapper -->
</article><!-- #post-## -->
