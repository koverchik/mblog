<?php
/**
 * @package readit pro
 */
?>

<div class="masonry-post">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
    	<div class="slide-content"><span><h2><?php the_title(); ?></h2><h5><?php the_time('F j, Y'); ?></h5></span></div>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumbnail'); ?></a>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
</div>