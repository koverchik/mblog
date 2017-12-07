<?php
/**
 * The template for displaying search results pages.
 *
 * @package readit pro
 */

get_header(); ?>

<header class="entry-header">
    <div class="grid grid-pad">
        <div class="col-1-1">
		<h1 class="page-entry-title"><?php printf( __( 'Search Results for: %s', 'readit' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </div>
    </div>
</header><!-- .entry-header -->

<section id="page-content" class="blog-archive">
    <div class="grid grid-pad">
        <div class="col-8-12">
            <section id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        
                <?php if ( have_posts() ) : ?>
        
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'content', 'search' );
                        ?>
        
                    <?php endwhile; ?>
        
                    <?php readit_the_posts_navigation(); ?>
        
                <?php else : ?>
        
                    <?php get_template_part( 'content', 'none' ); ?>
        
                <?php endif; ?>
        
                </main><!-- #main -->
            </section><!-- #primary -->
		</div>
<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>
