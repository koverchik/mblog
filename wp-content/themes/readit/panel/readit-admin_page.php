<?php 


function readit_admin_page_styles() { 
    wp_enqueue_style( 'readit-font-awesome-admin', get_template_directory_uri() . '/fonts/font-awesome.css' ); 
	wp_enqueue_style( 'readit-style-admin', get_template_directory_uri() . '/panel/css/theme-admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'readit_admin_page_styles' ); 

     
    add_action('admin_menu', 'readit_setup_menu'); 
     
    function readit_setup_menu(){
            add_theme_page( esc_html__( 'Readit Theme Details', 'readit' ), esc_html__( 'Readit Theme Details', 'readit' ), 'edit_theme_options', 'readit-setup', 'readit_init' );
    } 
     
 	function readit_init(){
	 	echo '<div class="grid grid-pad"><div class="col-1-1"><h1 style="text-align: center;">';
		printf( esc_html__('Thank you for using Readit!', 'readit' ));
        echo "</h1></div></div>";
			
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;" ><div class="col-1-3"><h2>'; 
		printf( esc_html__('Readit Theme Setup', 'readit' ));
        echo '</h2>';
		
		echo '<p>';
		printf( esc_html__('We created a quick theme setup video to help you get started with Readit. Watch the video with the link below', 'readit' )); 
		echo '</p>'; 
		
		echo '<a href="http://modernthemes.net/documentation/readit-documentation/readit-quick-demo-import/" target="_blank"><button>';
		printf( esc_html__('View Video', 'readit' )); 
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( esc_html__('Documentation', 'readit' ));
        echo "</h2>";  
		
		echo '<p>';
		printf( esc_html__('Check out our Readit documentation to learn how to use your Readit theme. Click the link below.', 'readit' )); 
		echo "</p>";
		
		echo '<a href="http://modernthemes.net/documentation/readit-documentation/" target="_blank"><button>';
		printf( esc_html__('Read Docs', 'readit' ));
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( esc_html__('About ModernThemes', 'readit' ));
        echo '</h2>';  
		
		echo '<p>';
		printf( esc_html__('Want to learn more about ModernThemes? Let us help you at modernthemes.net.', 'readit' ));
		echo '</p>'; 
		
		echo '<a href="http://modernthemes.net/" target="_blank"><button>'; 
		printf( esc_html__('About Us', 'readit' ));
		echo '</button></a></div></div>';
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( esc_html__('Want more features? Go Pro.', 'readit' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-newspaper-o"></i><h4>';
		printf( esc_html__('Blog Layouts', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Readit Pro comes with a number of creative blog layouts like Masonry and Library. Make your blog look as good as your writing.', 'readit' )); 
		echo '</p></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-magic"></i><h4>'; 
        printf( esc_html__('Animations + Hover Effects', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Add more to your website aesthetics, including scroll animations and hover effects to wow your readers and keep it fresh.', 'readit' ));
		echo '</p></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-crosshairs"></i><h4>'; 
		printf( esc_html__('Slider Option', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Readit Pro comes with a home page slider template so that you can add a side scrolling option that displays your entries.', 'readit' ));
		echo '</p></div> ';
            
        echo '<div class="col-1-4"><i class="fa fa-th"></i><h4>'; 
		printf( esc_html__( 'Footer Widget Areas', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Want more content for your footer? Readit Pro has footer widget areas to populate with any content you want.', 'readit' ));
		echo '</p></div></div>';
            
        echo '<div class="grid grid-pad senswp"><div class="col-1-4"><i class="fa fa-th-list"></i><h4>';
		printf( esc_html__( 'More Sidebars', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Sometimes you need different sidebars for different pages. We got you covered, offering up to 5 different sidebars.', 'readit' ));
		echo '</p></div>';
		
       	echo '<div class="col-1-4"><i class="fa fa-font"></i><h4>More Google Fonts</h4><p>';
		printf( esc_html__( 'Access an additional 65 Google fonts with Readit Pro right in the admin panel of the WordPress customizer.', 'readit' ));
		echo '</p></div>';
		
       	echo '<div class="col-1-4"><i class="fa fa-file-image-o"></i><h4>';
		printf( esc_html__( 'PSD Files', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Premium versions include PSD files. Preview your own content or showcase a customized version for your clients.', 'readit' ));
		echo '</p></div>';
            
        echo '<div class="col-1-4"><i class="fa fa-support"></i><h4>';
		printf( esc_html__( 'Free Support', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Call on us to help you out. Premium themes come with free support that goes directly to our support staff.', 'readit' ));
		echo '</p></div></div>';
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="http://modernthemes.net/wordpress-themes/readit-pro/" target="_blank"><button class="pro">';
		printf( esc_html__( 'View Pro Version', 'readit' )); 
		echo '</button></a></div></div>'; 
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( esc_html__('Premium Membership. Premium Experience.', 'readit' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-cogs"></i><h4>'; 
		printf( esc_html__('Plugin Compatibility', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Use our new free plugins with this theme to add functionality for things like projects, clients, team members and more. Compatible with all premium themes!', 'readit' ));
		echo '</p></div>';
		
		echo '<div class="col-1-4"><i class="fa fa-desktop"></i><h4>'; 
        printf( esc_html__('Agency Designed Themes', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Look as good as can be with our new premium themes. Each one is agency designed with modern styles and professional layouts.', 'readit' ));
		echo '</p></div>'; 
		
        echo '<div class="col-1-4"><i class="fa fa-users"></i><h4>';
        printf( esc_html__('Membership Options', 'readit' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('We have options to fit every budget. Choose between a single theme, or access to all current and future themes for a year, or forever!', 'readit' ));
		echo '</p></div>'; 
		
		echo '<div class="col-1-4"><i class="fa fa-calendar"></i><h4>'; 
		printf( esc_html__( 'Access to New Themes', 'readit' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'New themes added monthly! When you purchase a premium membership you get access to all premium themes, with new themes added monthly.', 'readit' ));   
		echo '</p></div>';
		
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="https://modernthemes.net/premium-wordpress-themes/" target="_blank"><button class="pro">'; 
		printf( esc_html__( 'Get Premium Membership', 'readit' ));
		echo '</button></a></div></div>';
		
		
		
		echo '<div class="grid grid-pad"><div class="col-1-1"><h2 style="text-align: center;">';
		printf( esc_html__( 'Changelog' , 'readit' ) ); 
        echo "</h2>";
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.1.3 - Update: Tested with WordPress 4.5, Updating Font Awesome icons to 4.6, Added Snapchat and Weibo social icon options', 'readit' )); 
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.1.2 - Update: blog will go fullwidth if no sidebar is active', 'readit' )); 
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.1.1 - updated demo link in theme description', 'readit' )); 
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.1.0 - added new Font Awesome 4.5 icons', 'readit' )); 
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.17 - added Navigation section that was deleted when WordPress switched to 4.3. Removed color options from Menu Locations.', 'readit' )); 
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.15 - bug fixes', 'readit' )); 
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.14 - updated Font Awesome icons', 'readit' )); 
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.0 - New Theme!', 'readit' ));
		echo '</p></div></div>'; 
	
		 	 
    }
?>