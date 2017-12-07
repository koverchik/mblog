<?php

if(!function_exists('cptch_esccss_notice'))

{

	function cptch_esccss_notice()

	{

		require_once( dirname( __FILE__ ) . '/bws_menu/bws_functions.php' );

		global $hook_suffix;

			

			if(isset($_GET['page']) and ($_GET['page'] == 'captcha.php' || $_GET['page'] == 'cptc_dashboard' )){

				cptch_call_notice('captcha');

			}

			else if($hook_suffix == 'plugins.php')

			{

				cptch_call_notice('captcha');

			}

	

	}

}



if(!function_exists('cptch_recommended_notice'))

{

	function cptch_recommended_notice()

	{

		require_once( dirname( __FILE__ ) . '/bws_menu/bws_functions.php' );

		cptch_my_recommended_notice();

	}

}







// call notice function if plugin activate and advanced blocking  checkbox is not checked

if(empty($cptch_options))

$cptch_options = get_option( 'cptch_options' );

$cptch_plugin_activation_status = $cptch_options['cptch_plugin_activation_status'];

$cptch_plugin_install_status = $cptch_options['cptch_plugin_install_status'];

$cptch_enable_advanced_blocking = $cptch_options['cptch_enable_advanced_blocking'];



if($cptch_plugin_activation_status == 1 and empty($cptch_enable_advanced_blocking)  )

add_action( 'admin_notices', 'cptch_esccss_notice'); // call action





if(isset($_GET['allow']) and $_GET['allow'] == 'yes')

{

	add_action( 'admin_notices', 'cptch_recommended_notice'); // call action

}



// get captcha version

if(!function_exists('cptch_get_captcha_version'))

{

	function cptch_get_captcha_version()

	{

		

		return 0;

		

	}

}



// return plugin  version status wheater  it is premium (trur) or free (false) 

function cptch_get_version()

{

	global $cptch_options;

	

	$captcha_version = cptch_get_captcha_version();

	if($captcha_version == '0')

	{

		echo "False";

		exit;

	}

	else if($captcha_version == '1')

	{

		echo "True";

		exit;



	}



}



// get Plugin version

if(isset($_GET['pname']) and $_GET['pname'] == 'captcha')

{

	add_action('init', 'cptch_get_version');

}