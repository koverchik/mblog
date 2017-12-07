<?php
/**
Template Name: Home - Masonry Sidebar
 *
 * @package readit pro
 */

get_header(); ?>


<header class="entry-header">
    <div class="grid grid-pad">
        <div class="col-1-1">
		
        	<h1 class="blog-entry-title">
			
			<?php echo wp_kses_post( get_theme_mod( 'readit_headline_text'), __( 'Welcome to Readit,', 'readit' )) ?> 
            
            <br />
            
			<?php if ( get_theme_mod( 'readit_headline_subtext') ) : ?>
            	
				<?php echo wp_kses_post( get_theme_mod( 'readit_headline_subtext'), __( 'a modern WordPress blog.', 'readit' )) ?> 
                
            <?php else : ?>
            
            	
        	
			<?php endif; ?>
        	
        	</h1>
        
        </div>
    </div>
</header><!-- .entry-header -->

<section id="page-content" class="blog-archive">
    <div class="grid grid-pad">
        <div class="col-8-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        
					<?php if ( have_posts() ) : ?>
                    
                    	<div id="masonry-container" class="masonry-sidebar clear">
            
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
                                get_template_part( 'content', 'masonry' );
                            ?>
            
                        <?php endwhile; ?>
                        
                        </div>
            
                        <?php readit_the_posts_navigation(); ?> 
            
                    <?php else : ?>
            
                        <?php get_template_part( 'content', 'none' ); ?>
            
                    <?php endif; ?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    <?php get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
