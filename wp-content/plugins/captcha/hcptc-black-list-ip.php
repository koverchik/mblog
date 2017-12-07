<?php 


function create_table_blacklist_ip(){
	
		global $wpdb;
		
		$sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}cptch_blacklist_ip` (

			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,

			`ip` CHAR(31) NOT NULL,

			`ip_from_int` BIGINT,

			`ip_to_int` BIGINT,
			
			`add_by_status` INT,

			`add_time` DATETIME,

			PRIMARY KEY (`id`),
			
			unique (ip)

			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

		$wpdb->query( $sql );
		

		
}
create_table_blacklist_ip();

function cptc_blacklist_ip_function()
{
	if ( ! function_exists( 'get_plugins' ) )

						
						require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						require_once( dirname( __FILE__ ) . '/includes/blacklist.php' );
						$plugin_basename  = plugin_basename( __FILE__ );
						$page = new Cptch_Blacklist( $plugin_basename );
						$page->display_content_blacklistip();
	
}