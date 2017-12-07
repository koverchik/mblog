<?php
/**
Template Name: Home - Slider
 *
 * @package readit pro
 */

get_header(); ?>

<section id="page-content" class="home-slider">
    <div class="hero-slider">
    	<?php query_posts( array ( 'post_type' => 'slider', 'posts_per_page' => -1 ) );
			
			while ( have_posts() ) : the_post(); ?> 
             
            <div>
            	<a href="<?php global $post; $text = get_post_meta( $post->ID, '_slide_url', true ); echo $text; ?>">
            	<div class="slide-content"><?php the_title('<h1 class="entry-title">', '</h1>' ); ?></div>
                </a>
				<?php the_post_thumbnail('slide-thumbnail'); ?>
            </div>        
                
		<?php endwhile; // end of the loop. ?> 
    </div>  
</section>
<?php get_footer(); ?>
