<?php
/**
 * Display content of "Dashboard" tab on dashboard page
 * @package Captcha
 * @since   4.1.4
 * @version 1.0.2
 */

if ( ! class_exists( 'Cptch_dashboard' ) ) {
	if ( ! class_exists( 'WP_List_Table' ) )
		require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

	class Cptch_dashboard extends WP_List_Table {
		private	$basename;
		
		/*
		
		* Constructor of class
		
		*/
		
		function __construct( $plugin_basename ) {
			global $cptch_options;
			if ( empty( $cptch_options ) )
				$cptch_options = get_option('cptch_options');
			$this->basename     = $plugin_basename;
		}

		/**
		 * Display content dashboard tab
		 * @return void
		 */
		function display_content_dashboard_tab() {
		global  $cptch_options;
		?>
        <div class="cptch-dash-inner-area">
            <div class="videoWrapper"><iframe width="600" height="315"
            src="https://www.youtube.com/embed/hniFiIUhAqc">
            </iframe>
            </div>
        
        
        <div class="cptch_simple_logo_area">
            <ul class="cptch_simple_logo">
                <li><a href="https://simplywordpress.net/download/plugin/captcha.zip"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/captcha.png'; ?>" /></a></li>
                <li><a href="https://simplywordpress.net/download/plugin/convert-popup.zip"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/convet-me-popups.png'; ?>" /></a></li>
                <li><a href="https://simplywordpress.net/download/plugin/death-to-comments.zip"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/death-to-comments.png'; ?>" /></a></li>
                <li><a href="https://simplywordpress.net/download/plugin/sw-human-captcha.zip"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/human-captcha.png'; ?>" /></a></li>
                <li><a href="https://simplywordpress.net/download/plugin/smart-recaptcha.zip"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/smart-recaptcha.png'; ?>" /></a></li>
                <li><a href="https://simplywordpress.net/download/plugin/social-exchange.zip"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/social-exchange.png'; ?>" /></a></li>
            </ul>
        
        </div>
        
        
        
        <div class="cptch_simple_head"><h2> <span>Now for the Fun Stuff </span> - As a Customer of ours you can access to our free database of plugins all using the simply secure stuff here is some of our free offerings at the moment. <br /><br /> Click To Download </h2> </div>
        
       <ul class="plugin_content_area">

       

        <li class="p_links"><a href="https://simplywordpress.net/download/plugin/captcha.zip"><div class="p_img"><img   src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/small-logo/captcha.png'; ?>" /></div><div class="p_text"><strong>Captcha</strong>&nbsp;&nbsp;<span class="dash_download_link">Click us</span>

        <div class='infoplugin'>Keeping you safe from the dreaded spammers your welcome...</div></div></a></li>

        <li class="p_links"><a href="https://simplywordpress.net/download/plugin/convert-popup.zip"><div class="p_img"><img   src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/small-logo/convet-me-popups.png'; ?>" /></div><div class="p_text"><strong>Covert me Popup</strong>&nbsp;&nbsp;<span class="dash_download_link">Click us</span><div class='infoplugin'>Stop missing out on sales or subscribers hit them with a pop up...</div></div></a></li>

        <li class="p_links"><a href="https://simplywordpress.net/download/plugin/death-to-comments.zip"><div class="p_img"><img   src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/small-logo/death-to-comments.png'; ?>" /></div><div class="p_text"><strong>Death To Comments</strong>&nbsp;&nbsp;<span class="dash_download_link">Click us</span><div class='infoplugin'>Think the name tells you all you need to know!</div></div></a></li>

        <li class="p_links"><a href="https://simplywordpress.net/download/plugin/sw-human-captcha.zip"><div class="p_img"><img   src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/small-logo/human-captcha.png'; ?>" /></div><div class="p_text"><strong>Human Captcha</strong>&nbsp;&nbsp;<span class="dash_download_link">Click us</span><div class='infoplugin'>Still getting spam lets get see how clever these spammers are..</div></div></a></li>

        <li class="p_links"><a href="https://simplywordpress.net/download/plugin/smart-recaptcha.zip"><div class="p_img"><img   src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/small-logo/smart-recaptcha.png'; ?>" /></div><div class="p_text"><strong>Smart Recaptcha</strong>&nbsp;&nbsp;<span class="dash_download_link">Click us</span><div class='infoplugin'>Why not take it to the next step and double your security.</div></div></a></li>

        <li class="p_links"><a href="https://simplywordpress.net/download/plugin/social-exchange.zip"><div class="p_img"><img   src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'logo/small-logo/social-exchange.png'; ?>" /></div><div class="p_text"><strong>Social Exchange</strong>&nbsp;&nbsp;<span class="dash_download_link">Click us</span><div class='infoplugin'>Not getting anything from your readers? at least get a like!</div></div></a></li>

        

        </ul>
        
		</div>
		<?php
		}
		
		/**
		 * Display content simply secure
		 * @return void
		 */
		
		function cptch_display_content_secure_tab() {
		global  $cptch_options;
		?>
        <div class="cptch-dash-sub-tab">
        <h2 class="cptch-dash-nav-tab-wrapper">
			<ul class="cptch-dash-nav child_list">
				<li><a class="<?php if ( isset( $_GET['action']) &&  'whitelist' == $_GET['stab'] ) echo 'nav-tab-active';?>" href="admin.php?page=cptc_dashboard&amp;action=simply_secure&amp;stab=whitelist"><?php _e( 'White List IP', 'captcha' ); ?></a></li>
                <li><a class="<?php if ( isset( $_GET['action'] ) && 'blacklist' == $_GET['stab'] ) echo 'nav-tab-active'; ?>" href="admin.php?page=cptc_dashboard&amp;action=simply_secure&amp;stab=blacklist"><?php _e( 'Black List IP', 'captcha' ); ?></a>
                </li>
				<li><a class=" <?php if ( isset( $_GET['action'] ) && 'livetraffic' == $_GET['stab'] ) echo 'nav-tab-active'; ?>" href="admin.php?page=cptc_dashboard&amp;action=simply_secure&amp;stab=livetraffic"><?php _e( 'Live Traffic', 'captcha' ); ?></a>
                </li>
             </ul>   
			</h2>
        
        </div>
        
		<?php
		}
		// static text
		function cpcth_get_static_text()
		{
			?>
			
			<div class="cptch_dash_simply_message"><p>Welcome to Simply Secure Beta our plugin is growing and constantly improving and as one of our users you get the chance to test our patented simply secure service for free.

We will be adding to the secure side of this plugin weekly so please feel free to let us know if you have an idea to make it better!</p></div>
			
		<?php }
		
	}
}