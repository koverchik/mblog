<?php 


function readitpro_admin_page_styles() {
    wp_enqueue_style( 'readit-font-awesome-admin', get_template_directory_uri() . '/fonts/font-awesome.css' ); 
	wp_enqueue_style( 'readit-style-admin', get_template_directory_uri() . '/panel/css/theme-admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'readitpro_admin_page_styles' ); 

     
    add_action('admin_menu', 'readit_setup_menu'); 
     
    function readit_setup_menu(){
            add_theme_page( __( 'Readit Theme Details', 'readit' ), __( 'Readit Theme Details', 'readit' ), 'edit_theme_options', 'readit-setup', 'readit_init' );
    } 
     
 	function readit_init(){
	 	echo '<div class="grid grid-pad"><div class="col-1-1"><h1 style="text-align: center;">';
		printf( __('Thank you for using Readit Pro!', 'readit' )); 
        echo "</h1></div></div>";
			
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;" ><div class="col-1-3"><h2>'; 
		printf( __('Readit Theme Setup', 'readit' ));
        echo '</h2>';
		
		echo '<p>';
		printf( __('We created a quick theme setup video to help you get started with Readit Pro. Watch the video with the link below', 'readit' )); 
		echo '</p>'; 
		
		echo '<a href="http://modernthemes.net/documentation/readit-documentation/readit-quick-demo-import/" target="_blank"><button>';
		printf( __('View Video', 'readit' ));
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( __('Documentation', 'readit' )); 
        echo "</h2>";  
		
		echo '<p>';
		printf( __('Check out our Readit documentation to learn how to use your Readit Pro theme. Click the link below.', 'readit' ));   
		echo "</p>";
		
		echo '<a href="http://modernthemes.net/documentation/readit-pro-documentation/" target="_blank"><button>';
		printf( __('Read Docs', 'readit' ));
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( __('About ModernThemes', 'readit' ));
        echo '</h2>';  
		
		echo '<p>';
		printf( __('Want to learn more about ModernThemes? Let us help you at modernthemes.net.', 'readit' ));
		echo '</p>'; 
		
		echo '<a href="http://modernthemes.net/" target="_blank"><button>'; 
		printf( __('About Us', 'readit' ));
		echo '</button></a></div></div>'; 
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( __('Premium Membership. Premium Experience.', 'readit' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-cogs"></i><h4>'; 
		printf( __('Plugin Compatibility', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Use our new free plugins with this theme to add functionality for things like projects, clients, team members and more. Compatible with all premium themes!', 'readit' ));
		echo '</p></div>';
		
		echo '<div class="col-1-4"><i class="fa fa-desktop"></i><h4>'; 
        printf( __('Agency Designed Themes', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Look as good as can be with our new premium themes. Each one is agency designed with modern styles and professional layouts.', 'readit' ));
		echo '</p></div>'; 
		
        echo '<div class="col-1-4"><i class="fa fa-users"></i><h4>';
        printf( __('Membership Options', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('We have options to fit every budget. Choose between a single theme, or access to all current and future themes for a year, or forever!', 'readit' ));
		echo '</p></div>'; 
		
		echo '<div class="col-1-4"><i class="fa fa-calendar"></i><h4>'; 
		printf( __( 'Access to New Themes', 'readit' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'New themes added monthly! When you purchase a premium membership you get access to all premium themes, with new themes added monthly.', 'readit' ));   
		echo '</p></div>';
		
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="//modernthemes.net/premium-wordpress-themes/" target="_blank"><button class="pro">'; 
		printf( __( 'Get Premium Membership', 'readit' ));  
		echo '</button></a></div></div>';
		
		
		echo '<div class="grid grid-pad"><div class="col-1-1"><h2 style="text-align: center;">';
		printf( __( 'Changelog' , 'readit' ) );
        echo "</h2>";
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.1.5 - Fix: added proper string for querying the date on single.php', 'readit' ));
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.1.4 - Fix: number input bug in theme customizer', 'readit' ));
		echo '</p>'; 
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.1.3 - Update: Tested with WordPress 4.5, Updating Font Awesome icons to 4.6, Added Snapchat and Weibo social icon options', 'readit' ));
		echo '</p>'; 
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.1.2 - Update: adds one-click option to add Child Theme. Go to Appearance => Editor and activate child theme from notification.', 'readit' ));
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.1.1 - Update: blog will now go fullwidth if no sidebar is active', 'readit' ));
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.1.0 - style updates to Comments section', 'readit' ));
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.0.10 - added new Home Page Hero Background Template', 'readit' ));
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.0.9 - added new Font Awesome 4.5 icons', 'readit' ));
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.0.8 - new theme update method added', 'readit' ));
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.0.7 - added Navigation section that was deleted when WordPress switched to 4.3. Removed color options from Menu Locations.', 'readit' ));
		echo '</p>'; 
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.0.6 - bug fixes', 'readit' ));
		echo '</p>'; 
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.0.5 - updated Font Awesome icons', 'readit' ));
		echo '</p>'; 
		
		echo '<p style="text-align: center;">'; 
		printf( __('1.0.0 - New Theme!', 'readit' ));
		echo '</p></div></div>'; 
		
		 	 
    }
?>