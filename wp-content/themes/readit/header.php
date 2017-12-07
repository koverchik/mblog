<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content"> 
 *
 * @package readit
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'readit' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
        
        	<?php if ( get_theme_mod( 'readit_logo' ) ) : ?> 
             
    			<div class="site-logo"> 
                
       				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                    	<img src='<?php echo esc_url( get_theme_mod( 'readit_logo' ) ); ?>' <?php if ( get_theme_mod( 'logo_size' ) ) : ?>
                        	width="<?php echo esc_attr( get_theme_mod( 'logo_size' ), __( '120', 'readit' )); ?>"<?php endif; ?> 
                            alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'
                        >
                    </a> 
                 
    			</div><!-- site-logo --> 
                
			<?php else : ?>
            
    			<hgroup> 
       				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    			</hgroup>
                
			<?php endif; ?>
      
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

		
		<div class="navigation-container">
        
        	<a class="cd-primary-nav-trigger" href="#0">
               	<span class="cd-menu-icon"></span>
            </a> <!-- cd-primary-nav-trigger -->
            
        </div>
    
    <nav>
		<ul class="cd-primary-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</ul>
	</nav>

	<div id="content" class="site-content">
