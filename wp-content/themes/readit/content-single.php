<?php
/**
 * @package readit
 */
?>

<div id="container" class="container intro-effect-fadeout">
	<header class="header">
	 	<div class="bg-img"><?php the_post_thumbnail(); ?></div>
		<div class="title">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<p class="subline"><?php the_time('F j, Y'); ?></p>
			<p>by <strong><?php the_author_posts_link(); ?></strong> &#8212; Posted in <strong><?php the_category(', ') ?></strong></p>
		</div>
        
	</header>
    
	<button class="trigger" data-info="Read More">
    <span><?php __( 'Trigger', 'readit' ) ?></span>
    </button>
	<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
		<div>
			<?php the_content(); ?>
			<?php
                 wp_link_pages( array(
                 	'before' => '<div class="page-links">' . __( 'Pages:', 'readit' ), 
                 	'after'  => '</div>',
                   ) );
             ?>
		</div>
	</article>
</div><!-- /container -->