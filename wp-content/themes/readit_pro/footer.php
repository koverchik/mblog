<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package readit pro
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    
    	<div class="grid grid-pad">
        
        	<?php if ( is_active_sidebar('footer-1') ) : ?> 
        		<div class="col-1-4">
					<?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar('footer-2') ) : ?>
        		<div class="col-1-4">
					<?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar('footer-3') ) : ?>
        		<div class="col-1-4">
					<?php dynamic_sidebar('footer-3'); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar('footer-4') ) : ?>
        		<div class="col-1-4">
					<?php dynamic_sidebar('footer-4'); ?>
                </div>
            <?php endif; ?>
            
        <div class="col-1-1">
    
		<div class="site-info">
			<?php if ( get_theme_mod( 'readit_footerid' ) ) : ?>     
        	<?php echo wp_kses_post( get_theme_mod( 'readit_footerid' )); ?>  
		<?php else : ?>  
    		<?php  printf( __( 'Theme: %1$s by %2$s', 'readit pro' ), 'readit pro', '<a href="http://modernthemes.net" rel="designer">modernthemes.net</a>' ); ?> 
		<?php endif; ?>
            
            <?php if( get_theme_mod( 'active_social' ) == '') : ?>
        	
        			<div class="social-media">
        		
                        <ul class='social-media-icons'>
                            	<?php if ( get_theme_mod( 'readit_fb' ) ) : ?> 
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_fb' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-facebook"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_twitter' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_twitter' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-twitter"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_linked' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_linked' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-linkedin"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_google' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_google' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-google-plus"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_instagram' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_instagram' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
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
                                <?php if ( get_theme_mod( 'readit_vine' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_vine' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-vine"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_flickr' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_flickr' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-flickr"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_pinterest' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_pinterest' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-pinterest"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_youtube' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_youtube' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-youtube"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_vimeo' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_vimeo' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-vimeo-square"></i>
                                    </a>
                                    </li> 
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_tumblr' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_tumblr' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-tumblr"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_dribbble' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_dribbble' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-dribbble"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_behance' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_behance' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-behance"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_500px' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_500px' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-500px"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_vk' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_vk' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-vk"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_yelp' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_yelp' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-yelp"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_xing' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_xing' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-xing"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_skype' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_skype' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-skype"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_deviant' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_deviant' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-deviantart"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_reddit' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_reddit' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-reddit"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_github' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_github' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-github"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_codepen' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_codepen' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-codepen"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_spotify' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_spotify' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-spotify"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_soundcloud' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_soundcloud' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-soundcloud"></i>
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_lastfm' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_lastfm' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-lastfm"></i> 
                                    </a> 
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_stumble' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_stumble' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-stumbleupon"></i>  
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
                                    <a href="<?php echo esc_url( get_theme_mod( 'readit_rss' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-rss"></i>
                                    </a>
                                    </li>   
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_phone_number_icon' ) ) : ?>
                                	<li>
                                    <a href="tel:<?php echo esc_attr( get_theme_mod( 'readit_phone_number_icon' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-phone"></i> 
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'readit_email_icon' ) ) : ?>
                                	<li>
                                    <a href="mailto:<?php echo esc_html( get_theme_mod( 'readit_email_icon' )); ?>" <?php if( get_theme_mod( 'readit_social_new_window' ) ) : ?>target="_blank"<?php endif; ?>>  
                                    <i class="fa fa-envelope"></i>  
                                    </a>
                                    </li> 
								<?php endif; ?> 
                        	</ul>
                           
        			</div> <!-- social-media --> 
            
			<?php else : ?>  
			<?php endif; ?>
			<?php // end if ?> 
            
            </div>
            </div>
            
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
