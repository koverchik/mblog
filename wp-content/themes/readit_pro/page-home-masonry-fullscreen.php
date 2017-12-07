<?php
/**
Template Name: Home - Masonry Fullscreen
 *
 * @package readit pro
 */

get_header(); ?>

<section id="page-content" class="blog-archive">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        
					<?php if ( have_posts() ) : ?>
                    
                    	<div id="masonry-container" class="masonry-fullscreen clear">
            
                        <?php /* Start the Loop */ ?>
                        <?php    
						//The Query
						if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                    	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                    	else { $paged = 1; }
						$wp_query = new WP_Query( 'post_type=post&paged='.$paged );

						//The Loop
						while ($wp_query->have_posts()) : $wp_query->the_post(); ?> 
            
                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', 'fullscreen' );
                            ?>
            
                        <?php endwhile; ?>
                        
                        </div>
                        
                        <div class="grid grid-pad">
                        	<div class="col-1-1">
            
                        		<?php readit_the_posts_navigation(); ?> 
            				
                            </div>
                        </div>
                        
                    <?php else : ?>
                    
                    	<div class="grid grid-pad">
                        	<div class="col-1-1">
            
                        		<?php get_template_part( 'content', 'none' ); ?>
            
            				</div>
                        </div>
                        
                    <?php endif; ?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
</section>
<?php get_footer(); ?>
