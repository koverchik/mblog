<?php

// run web service manualy
function cptch_run_service_on_prefered_click()
{
	global $cptch_plugin_info;
	global $wpdb;
	$add_date = date_i18n('Y-m-d H:i:s');
	if ( ! $cptch_plugin_info ) {

			if ( ! function_exists( 'get_plugin_data' ) )

			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			$cptch_plugin_info = get_plugin_data( __FILE__ );
	}

	$name = 'Captcha';

	$name = str_replace(' ','-',$name);

	$webhost = get_bloginfo("url");

	$name = $name.'+++'.$webhost;

	$param = array( 'your_name' => $name); 

	$response = file_get_contents('http://badips.simplywordpress.net/server.php?domain='.$name);

	$result = json_decode($response);	

	

	if(!empty($result->data)){

	foreach($result->data as $k=>$v)

	{

		$add_ip = $v->ip;

		$valid_ip = filter_var( stripslashes( esc_html( trim( $add_ip ) ) ), FILTER_VALIDATE_IP );

		if($valid_ip)

		{

			$ip_int = sprintf( '%u', ip2long( $valid_ip ) );

			$sq = $wpdb->query("INSERT IGNORE INTO  {$wpdb->prefix}cptch_blacklist_ip SET ip = '".$valid_ip."' ,ip_from_int = '".$ip_int."' , ip_to_int = '".$ip_int."' , add_time = '".$add_date."' ");

		}

	}}


}




// start web service
//	register_activation_hook( __FILE__, 'cptch_plugins_loaded1');



// add cron shedule
function cptch_isa_add_cron_recurrence_interval( $schedules ) {
    $schedules['twicedaily'] = array(
            'interval'  => 43200,
            'display'   => __( 'twicedaily', 'textdomain' )
    );

    return $schedules;
}


// add cron shedule
add_filter( 'cron_schedules', 'cptch_isa_add_cron_recurrence_interval');

// call cron 
if ( ! wp_next_scheduled( 'cptch_call_twicedaily_action_hook' ) ) {
    wp_schedule_event( time(), 'twicedaily', 'cptch_call_twicedaily_action_hook');
}



// get captcha
$cptch_options = get_option( 'cptch_options' );
$cptch_enable_advanced_blocking = $cptch_options['cptch_enable_advanced_blocking'];

if($cptch_enable_advanced_blocking) // wheather user enabled automatically update bad ips or not 
add_action('cptch_call_twicedaily_action_hook', 'cptch_run_cron_job');

function cptch_run_cron_job() {
	
	global $cptch_plugin_info;
	$add_date = date_i18n('Y-m-d H:i:s');
	global $wpdb;

	if ( ! $cptch_plugin_info ) {

			if ( ! function_exists( 'get_plugin_data' ) )

			require_once( ABSPATH . 'wp-admin/includes/plugin.php');

			$cptch_plugin_info = get_plugin_data( __FILE__ );

	}

	
	$name = 'Captcha';
	$name = str_replace(' ','-',$name);
	$webhost = get_bloginfo("url");
	$name = $name.'+++'.$webhost;
	$param = array( 'your_name' => $name); 
	$response = file_get_contents('http://badips.simplywordpress.net/server.php?domain='.$name);
	$result = json_decode($response);	
	if(!empty($result->data)){
	foreach($result->data as $k=>$v)
	{

		$add_ip = $v->ip;

		$valid_ip = filter_var( stripslashes( esc_html( trim( $add_ip ) ) ), FILTER_VALIDATE_IP );

		if($valid_ip)

		{

			$ip_int = sprintf( '%u', ip2long( $valid_ip ) );

			$sq = $wpdb->query("INSERT IGNORE INTO  {$wpdb->prefix}cptch_blacklist_ip SET ip = '".$valid_ip."' ,ip_from_int = '".$ip_int."' , ip_to_int = '".$ip_int."' , add_time = '".$add_date."' ");

		}

	}}
}

// clean the cron on deactivation
register_deactivation_hook(__FILE__, 'cptch_deactivation');
function cptch_deactivation() {
	wp_clear_scheduled_hook('cptch_run_cron_job');
}