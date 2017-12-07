<?php
include dirname( __FILE__ ) .'/live-trafic-lib/cptch_traffic_functions.php';


cptch_create_db();


cptch_add_visitor();

function cptch_livetraffic_ips(){


	wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'asset/css/bootstrap.min.css', false, '' );
    wp_enqueue_style( 'admin-style', plugin_dir_url( __FILE__ ) . 'asset/css/admin-style.css', false, '' );
	wp_enqueue_script( 'tether.min', plugin_dir_url( __FILE__ ) . 'asset/js/tether.min.js', false, '' );
	wp_enqueue_script( 'bootstrap.min', plugin_dir_url( __FILE__ ) . 'asset/js/bootstrap.min.js', false, '' );
	wp_enqueue_script( 'custom', plugin_dir_url( __FILE__ ) . 'asset/js/custom.js', false, '' );
	include("live-trafic-lib/cptch_menu_activity.php");
}
