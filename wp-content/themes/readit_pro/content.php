<?php
/**
 * @package readit pro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    	<a href="<?php the_permalink(); ?>"><?php if (class_exists('MultiPostThumbnails')) : 
 
MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
 
endif; ?></a>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php readit_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php
			
			/* translators: %s: Name of current post */
				if ( 'option2' == readit_sanitize_index_content( get_theme_mod( 'readit_post_content' ) ) ) :
				the_content( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'readit'  ) ); 
				else :
				the_excerpt( __( '<span class="screen-reader-text">"', '"</span>', false  ) ); 
				endif;
			
		?> 

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'readit' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->