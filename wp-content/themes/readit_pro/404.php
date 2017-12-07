<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package readit pro
 */

get_header(); ?>


<header class="entry-header">
    <div class="grid grid-pad">
        <div class="col-1-1">
		<?php _e( '<h1 class="page-entry-title">404.', '</h1>' ); ?>
        </div>
    </div>
</header><!-- .entry-header -->

<section id="page-content" class="blog-archive">
    <div class="grid grid-pad">
        <div class="col-1-1">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        
                    <section class="error-404 not-found">
                        <div class="page-content">
                            <p><?php _e( 'It looks like nothing was found at this location.', 'readit' ); ?></p>
        
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
        
                </main><!-- #main -->
            </div><!-- #primary -->
		</div>
    </div>
</section>
<?php get_footer(); ?>
