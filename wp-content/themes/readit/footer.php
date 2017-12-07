<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package readit
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo"> 
		<div class="site-info">
			<?php if ( get_theme_mod( 'readit_footerid' ) ) : ?>     
        	<?php echo wp_kses_post( get_theme_mod( 'readit_footerid' )); ?>  
		<?php else : ?>  
    		<?php  printf( __( 'Theme: %1$s by %2$s', 'readit' ), 'readit', '<a href="http://modernthemes.net" rel="designer">modernthemes.net</a>' ); ?> 
		<?php endif; ?>
            
            <?php if( get_theme_mod( 'active_social' ) == '') : ?>
        	
        			<div class="social-media">
        		
                        	<ul class='social-media-icons'>
                            	<?php if ( get_theme_mod( 'readit_fb' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_fb' )); ?>"> 
                                    <i class="fa fa-facebook"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_twitter' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_twitter' )); ?>">
                                    <i class="fa fa-twitter"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_linked' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_linked' )); ?>">
                                    <i class="fa fa-linkedin"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_google' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_google' )); ?>">
                                    <i class="fa fa-google-plus"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_instagram' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_instagram' )); ?>">
                                    <i class="fa fa-instagram"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_snapchat' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_snapchat' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-snapchat-ghost"></i>   
                                    </a> 
                                    </li>
								<?php endif; ?> 
                                <?php if ( get_theme_mod( 'readit_flickr' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_flickr' )); ?>">
                                    <i class="fa fa-flickr"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_pinterest' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_pinterest' )); ?>">
                                    <i class="fa fa-pinterest"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_youtube' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_youtube' )); ?>">
                                    <i class="fa fa-youtube"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_vimeo' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_vimeo' )); ?>">
                                    <i class="fa fa-vimeo-square"></i>
                                    </a>
                                    </li> 
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_tumblr' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_tumblr' )); ?>">
                                    <i class="fa fa-tumblr"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_dribbble' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_dribbble' )); ?>">
                                    <i class="fa fa-dribbble"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_weibo' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_weibo' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-weibo"></i> 
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_rss' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_rss' )); ?>">
                                    <i class="fa fa-rss"></i>
                                    </a>
                                    </li>   
								<?php endif; ?>
                        	</ul> 
                           
        			</div> <!-- social-media --> 
            
			<?php endif; ?>
			<?php // end if ?> 
            
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
