<?php
/**
 * @package readit pro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('animate-plus'); ?>  data-animations="fadeIn" data-animation-when-visible="true" data-animation-delay="0.5s">

	<div class="entry-content">
    	<h6><?php the_category(); ?></h6>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        
		<div class="entry-meta">
			<?php the_time('F jS, Y'); ?> <?php echo get_avatar( get_the_author_email(), get_the_author() ); ?> <?php the_author(); ?>
		</div><!-- .entry-meta -->

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'readit' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->