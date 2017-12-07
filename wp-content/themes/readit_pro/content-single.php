<?php
/**
 * @package readit pro
 */
?>

<div id="container" class="container intro-effect-fadeout">
	<header class="header">
	 	<div class="bg-img"><?php the_post_thumbnail(); ?></div>
		<div class="title animate-plus" data-animations="fadeIn" data-animation-when-visible="true" data-animation-delay="0.5s">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<p class="subline"><?php readit_posted_on(); ?></p>
			<p>by <strong><?php the_author_posts_link(); ?></strong> &#8212; Posted in <strong><?php the_category(', ') ?></strong></p>
		</div>
	</header>
	<button class="trigger" data-info="Read More"><span>Trigger</span></button>
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