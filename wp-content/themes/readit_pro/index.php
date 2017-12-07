<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package daily pro
 */

get_header(); ?>


<header class="entry-header">
    <div class="grid grid-pad">
        <div class="col-1-1">
        
			<h1 class="blog-entry-title">
			
			<?php echo esc_html( get_theme_mod( 'readit_headline_text'), __( 'Welcome to Readit,', 'readit' )) ?> 
            
            <br />
            
			<?php if ( get_theme_mod( 'readit_headline_subtext') ) : ?>
            	
				<?php echo esc_html( get_theme_mod( 'readit_headline_subtext'), __( 'a modern WordPress blog.', 'readit' )) ?> 
                
            <?php else : ?>
            
            	
        	
			<?php endif; ?>
        	
        	</h1> 
            
        </div>
    </div>
</header><!-- .entry-header -->

<section id="page-content" class="blog-archive">
    <div class="grid grid-pad">
    	
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        	<div class="col-8-12">
    	<?php else: ?>
    		<div class="col-1-1">
    	<?php endif; ?>
        
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        
                <?php if ( have_posts() ) : ?>
        
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        ?>
                       
                    <?php endwhile; ?>
        
                    <?php readit_the_posts_navigation(); ?>
        
                <?php else : ?>
        
                    <?php get_template_part( 'content', 'none' ); ?>
        
                <?php endif; ?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    
    	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?> 
    		<?php get_sidebar(); ?>
    	<?php endif; ?> 
    
    </div>
</section>

<?php get_footer(); ?>
