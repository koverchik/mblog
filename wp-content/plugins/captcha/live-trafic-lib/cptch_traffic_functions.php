<?php

function cptch_create_db()

{

	global $wpdb;

	$table = 'cptch_track_visitor';

	$sql = "create table IF NOT EXISTS " . $wpdb->prefix . $table . "(

	

			id INT UNSIGNED NOT NULL AUTO_INCREMENT,



			ip_address CHAR(31) NOT NULL,



			no_of_visits BIGINT,



			user_browser text,

			

			country varchar(200),

			

			country_code varchar(100),

			

			city varchar(100),

			

			hostname varchar(100),

			

			region varchar(100),

			

			location varchar(100),

			

			requested_url text,

			

			referer_page text,

			

			user_agent text,

			

			page_name text,

			

			query_string text,

			

			add_time DATETIME,

			

			PRIMARY KEY (id)

			

			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";



			$wpdb->query($sql);

			

		

			$table = 'cptch_track_countries';

			$sql = "create table IF NOT EXISTS " . $wpdb->prefix . $table . "(

			id INT UNSIGNED NOT NULL AUTO_INCREMENT,

			name VARCHAR(200) NOT NULL,

			country_code VARCHAR(200) NOT NULL,

			status INT,

			PRIMARY KEY (id)

			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";



			$wpdb->query($sql);

			$countries = array(

						"AF" => array("country" => "Afghanistan", "continent" => "Asia"),

						"AX" => array("country" => "Aland Islands", "continent" => "Europe"),

						"AL" => array("country" => "Albania", "continent" => "Europe"),

						"DZ" => array("country" => "Algeria", "continent" => "Africa"),

						"AS" => array("country" => "American Samoa", "continent" => "Oceania"),

						"AD" => array("country" => "Andorra", "continent" => "Europe"),

						"AO" => array("country" => "Angola", "continent" => "Africa"),

						"AI" => array("country" => "Anguilla", "continent" => "North America"),

						"AQ" => array("country" => "Antarctica", "continent" => "Antarctica"),

						"AG" => array("country" => "Antigua and Barbuda", "continent" => "North America"),

						"AR" => array("country" => "Argentina", "continent" => "South America"),

						"AM" => array("country" => "Armenia", "continent" => "Asia"),

						"AW" => array("country" => "Aruba", "continent" => "North America"),

						"AU" => array("country" => "Australia", "continent" => "Oceania"),

						"AT" => array("country" => "Austria", "continent" => "Europe"),

						"AZ" => array("country" => "Azerbaijan", "continent" => "Asia"),

						"BS" => array("country" => "Bahamas", "continent" => "North America"),

						"BH" => array("country" => "Bahrain", "continent" => "Asia"),

						"BD" => array("country" => "Bangladesh", "continent" => "Asia"),

						"BB" => array("country" => "Barbados", "continent" => "North America"),

						"BY" => array("country" => "Belarus", "continent" => "Europe"),

						"BE" => array("country" => "Belgium", "continent" => "Europe"),

						"BZ" => array("country" => "Belize", "continent" => "North America"),

						"BJ" => array("country" => "Benin", "continent" => "Africa"),

						"BM" => array("country" => "Bermuda", "continent" => "North America"),

						"BT" => array("country" => "Bhutan", "continent" => "Asia"),

						"BO" => array("country" => "Bolivia", "continent" => "South America"),

						"BA" => array("country" => "Bosnia and Herzegovina", "continent" => "Europe"),

						"BW" => array("country" => "Botswana", "continent" => "Africa"),

						"BV" => array("country" => "Bouvet Island", "continent" => "Antarctica"),

						"BR" => array("country" => "Brazil", "continent" => "South America"),

						"IO" => array("country" => "British Indian Ocean Territory", "continent" => "Asia"),

						"BN" => array("country" => "Brunei Darussalam", "continent" => "Asia"),

						"BG" => array("country" => "Bulgaria", "continent" => "Europe"),

						"BF" => array("country" => "Burkina Faso", "continent" => "Africa"),

						"BI" => array("country" => "Burundi", "continent" => "Africa"),

						"KH" => array("country" => "Cambodia", "continent" => "Asia"),

						"CM" => array("country" => "Cameroon", "continent" => "Africa"),

						"CA" => array("country" => "Canada", "continent" => "North America"),

						"CV" => array("country" => "Cape Verde", "continent" => "Africa"),

						"KY" => array("country" => "Cayman Islands", "continent" => "North America"),

						"CF" => array("country" => "Central African Republic", "continent" => "Africa"),

						"TD" => array("country" => "Chad", "continent" => "Africa"),

						"CL" => array("country" => "Chile", "continent" => "South America"),

						"CN" => array("country" => "China", "continent" => "Asia"),

						"CX" => array("country" => "Christmas Island", "continent" => "Asia"),

						"CC" => array("country" => "Cocos (Keeling) Islands", "continent" => "Asia"),

						"CO" => array("country" => "Colombia", "continent" => "South America"),

						"KM" => array("country" => "Comoros", "continent" => "Africa"),

						"CG" => array("country" => "Congo", "continent" => "Africa"),

						"CD" => array("country" => "The Democratic Republic of The Congo", "continent" => "Africa"),

						"CK" => array("country" => "Cook Islands", "continent" => "Oceania"),

						"CR" => array("country" => "Costa Rica", "continent" => "North America"),

						"CI" => array("country" => "Cote D'ivoire", "continent" => "Africa"),

						"HR" => array("country" => "Croatia", "continent" => "Europe"),

						"CU" => array("country" => "Cuba", "continent" => "North America"),

						"CY" => array("country" => "Cyprus", "continent" => "Asia"),

						"CZ" => array("country" => "Czech Republic", "continent" => "Europe"),

						"DK" => array("country" => "Denmark", "continent" => "Europe"),

						"DJ" => array("country" => "Djibouti", "continent" => "Africa"),

						"DM" => array("country" => "Dominica", "continent" => "North America"),

						"DO" => array("country" => "Dominican Republic", "continent" => "North America"),

						"EC" => array("country" => "Ecuador", "continent" => "South America"),

						"EG" => array("country" => "Egypt", "continent" => "Africa"),

						"SV" => array("country" => "El Salvador", "continent" => "North America"),

						"GQ" => array("country" => "Equatorial Guinea", "continent" => "Africa"),

						"ER" => array("country" => "Eritrea", "continent" => "Africa"),

						"EE" => array("country" => "Estonia", "continent" => "Europe"),

						"ET" => array("country" => "Ethiopia", "continent" => "Africa"),

						"FK" => array("country" => "Falkland Islands (Malvinas)", "continent" => "South America"),

						"FO" => array("country" => "Faroe Islands", "continent" => "Europe"),

						"FJ" => array("country" => "Fiji", "continent" => "Oceania"),

						"FI" => array("country" => "Finland", "continent" => "Europe"),

						"FR" => array("country" => "France", "continent" => "Europe"),

						"GF" => array("country" => "French Guiana", "continent" => "South America"),

						"PF" => array("country" => "French Polynesia", "continent" => "Oceania"),

						"TF" => array("country" => "French Southern Territories", "continent" => "Antarctica"),

						"GA" => array("country" => "Gabon", "continent" => "Africa"),

						"GM" => array("country" => "Gambia", "continent" => "Africa"),

						"GE" => array("country" => "Georgia", "continent" => "Asia"),

						"DE" => array("country" => "Germany", "continent" => "Europe"),

						"GH" => array("country" => "Ghana", "continent" => "Africa"),

						"GI" => array("country" => "Gibraltar", "continent" => "Europe"),

						"GR" => array("country" => "Greece", "continent" => "Europe"),

						"GL" => array("country" => "Greenland", "continent" => "North America"),

						"GD" => array("country" => "Grenada", "continent" => "North America"),

						"GP" => array("country" => "Guadeloupe", "continent" => "North America"),

						"GU" => array("country" => "Guam", "continent" => "Oceania"),

						"GT" => array("country" => "Guatemala", "continent" => "North America"),

						"GG" => array("country" => "Guernsey", "continent" => "Europe"),

						"GN" => array("country" => "Guinea", "continent" => "Africa"),

						"GW" => array("country" => "Guinea-bissau", "continent" => "Africa"),

						"GY" => array("country" => "Guyana", "continent" => "South America"),

						"HT" => array("country" => "Haiti", "continent" => "North America"),

						"HM" => array("country" => "Heard Island and Mcdonald Islands", "continent" => "Antarctica"),

						"VA" => array("country" => "Holy See (Vatican City State)", "continent" => "Europe"),

						"HN" => array("country" => "Honduras", "continent" => "North America"),

						"HK" => array("country" => "Hong Kong", "continent" => "Asia"),

						"HU" => array("country" => "Hungary", "continent" => "Europe"),

						"IS" => array("country" => "Iceland", "continent" => "Europe"),

						"IN" => array("country" => "India", "continent" => "Asia"),

						"ID" => array("country" => "Indonesia", "continent" => "Asia"),

						"IR" => array("country" => "Iran", "continent" => "Asia"),

						"IQ" => array("country" => "Iraq", "continent" => "Asia"),

						"IE" => array("country" => "Ireland", "continent" => "Europe"),

						"IM" => array("country" => "Isle of Man", "continent" => "Europe"),

						"IL" => array("country" => "Israel", "continent" => "Asia"),

						"IT" => array("country" => "Italy", "continent" => "Europe"),

						"JM" => array("country" => "Jamaica", "continent" => "North America"),

						"JP" => array("country" => "Japan", "continent" => "Asia"),

						"JE" => array("country" => "Jersey", "continent" => "Europe"),

						"JO" => array("country" => "Jordan", "continent" => "Asia"),

						"KZ" => array("country" => "Kazakhstan", "continent" => "Asia"),

						"KE" => array("country" => "Kenya", "continent" => "Africa"),

						"KI" => array("country" => "Kiribati", "continent" => "Oceania"),

						"KP" => array("country" => "Democratic People's Republic of Korea", "continent" => "Asia"),

						"KR" => array("country" => "Republic of Korea", "continent" => "Asia"),

						"KW" => array("country" => "Kuwait", "continent" => "Asia"),

						"KG" => array("country" => "Kyrgyzstan", "continent" => "Asia"),

						"LA" => array("country" => "Lao People's Democratic Republic", "continent" => "Asia"),

						"LV" => array("country" => "Latvia", "continent" => "Europe"),

						"LB" => array("country" => "Lebanon", "continent" => "Asia"),

						"LS" => array("country" => "Lesotho", "continent" => "Africa"),

						"LR" => array("country" => "Liberia", "continent" => "Africa"),

						"LY" => array("country" => "Libya", "continent" => "Africa"),

						"LI" => array("country" => "Liechtenstein", "continent" => "Europe"),

						"LT" => array("country" => "Lithuania", "continent" => "Europe"),

						"LU" => array("country" => "Luxembourg", "continent" => "Europe"),

						"MO" => array("country" => "Macao", "continent" => "Asia"),

						"MK" => array("country" => "Macedonia", "continent" => "Europe"),

						"MG" => array("country" => "Madagascar", "continent" => "Africa"),

						"MW" => array("country" => "Malawi", "continent" => "Africa"),

						"MY" => array("country" => "Malaysia", "continent" => "Asia"),

						"MV" => array("country" => "Maldives", "continent" => "Asia"),

						"ML" => array("country" => "Mali", "continent" => "Africa"),

						"MT" => array("country" => "Malta", "continent" => "Europe"),

						"MH" => array("country" => "Marshall Islands", "continent" => "Oceania"),

						"MQ" => array("country" => "Martinique", "continent" => "North America"),

						"MR" => array("country" => "Mauritania", "continent" => "Africa"),

						"MU" => array("country" => "Mauritius", "continent" => "Africa"),

						"YT" => array("country" => "Mayotte", "continent" => "Africa"),

						"MX" => array("country" => "Mexico", "continent" => "North America"),

						"FM" => array("country" => "Micronesia", "continent" => "Oceania"),

						"MD" => array("country" => "Moldova", "continent" => "Europe"),

						"MC" => array("country" => "Monaco", "continent" => "Europe"),

						"MN" => array("country" => "Mongolia", "continent" => "Asia"),

						"ME" => array("country" => "Montenegro", "continent" => "Europe"),

						"MS" => array("country" => "Montserrat", "continent" => "North America"),

						"MA" => array("country" => "Morocco", "continent" => "Africa"),

						"MZ" => array("country" => "Mozambique", "continent" => "Africa"),

						"MM" => array("country" => "Myanmar", "continent" => "Asia"),

						"NA" => array("country" => "Namibia", "continent" => "Africa"),

						"NR" => array("country" => "Nauru", "continent" => "Oceania"),

						"NP" => array("country" => "Nepal", "continent" => "Asia"),

						"NL" => array("country" => "Netherlands", "continent" => "Europe"),

						"AN" => array("country" => "Netherlands Antilles", "continent" => "North America"),

						"NC" => array("country" => "New Caledonia", "continent" => "Oceania"),

						"NZ" => array("country" => "New Zealand", "continent" => "Oceania"),

						"NI" => array("country" => "Nicaragua", "continent" => "North America"),

						"NE" => array("country" => "Niger", "continent" => "Africa"),

						"NG" => array("country" => "Nigeria", "continent" => "Africa"),

						"NU" => array("country" => "Niue", "continent" => "Oceania"),

						"NF" => array("country" => "Norfolk Island", "continent" => "Oceania"),

						"MP" => array("country" => "Northern Mariana Islands", "continent" => "Oceania"),

						"NO" => array("country" => "Norway", "continent" => "Europe"),

						"OM" => array("country" => "Oman", "continent" => "Asia"),

						"PK" => array("country" => "Pakistan", "continent" => "Asia"),

						"PW" => array("country" => "Palau", "continent" => "Oceania"),

						"PS" => array("country" => "Palestinia", "continent" => "Asia"),

						"PA" => array("country" => "Panama", "continent" => "North America"),

						"PG" => array("country" => "Papua New Guinea", "continent" => "Oceania"),

						"PY" => array("country" => "Paraguay", "continent" => "South America"),

						"PE" => array("country" => "Peru", "continent" => "South America"),

						"PH" => array("country" => "Philippines", "continent" => "Asia"),

						"PN" => array("country" => "Pitcairn", "continent" => "Oceania"),

						"PL" => array("country" => "Poland", "continent" => "Europe"),

						"PT" => array("country" => "Portugal", "continent" => "Europe"),

						"PR" => array("country" => "Puerto Rico", "continent" => "North America"),

						"QA" => array("country" => "Qatar", "continent" => "Asia"),

						"RE" => array("country" => "Reunion", "continent" => "Africa"),

						"RO" => array("country" => "Romania", "continent" => "Europe"),

						"RU" => array("country" => "Russian Federation", "continent" => "Europe"),

						"RW" => array("country" => "Rwanda", "continent" => "Africa"),

						"SH" => array("country" => "Saint Helena", "continent" => "Africa"),

						"KN" => array("country" => "Saint Kitts and Nevis", "continent" => "North America"),

						"LC" => array("country" => "Saint Lucia", "continent" => "North America"),

						"PM" => array("country" => "Saint Pierre and Miquelon", "continent" => "North America"),

						"VC" => array("country" => "Saint Vincent and The Grenadines", "continent" => "North America"),

						"WS" => array("country" => "Samoa", "continent" => "Oceania"),

						"SM" => array("country" => "San Marino", "continent" => "Europe"),

						"ST" => array("country" => "Sao Tome and Principe", "continent" => "Africa"),

						"SA" => array("country" => "Saudi Arabia", "continent" => "Asia"),

						"SN" => array("country" => "Senegal", "continent" => "Africa"),

						"RS" => array("country" => "Serbia", "continent" => "Europe"),

						"SC" => array("country" => "Seychelles", "continent" => "Africa"),

						"SL" => array("country" => "Sierra Leone", "continent" => "Africa"),

						"SG" => array("country" => "Singapore", "continent" => "Asia"),

						"SK" => array("country" => "Slovakia", "continent" => "Europe"),

						"SI" => array("country" => "Slovenia", "continent" => "Europe"),

						"SB" => array("country" => "Solomon Islands", "continent" => "Oceania"),

						"SO" => array("country" => "Somalia", "continent" => "Africa"),

						"ZA" => array("country" => "South Africa", "continent" => "Africa"),

						"GS" => array("country" => "South Georgia and The South Sandwich Islands", "continent" => "Antarctica"),

						"ES" => array("country" => "Spain", "continent" => "Europe"),

						"LK" => array("country" => "Sri Lanka", "continent" => "Asia"),

						"SD" => array("country" => "Sudan", "continent" => "Africa"),

						"SR" => array("country" => "Suriname", "continent" => "South America"),

						"SJ" => array("country" => "Svalbard and Jan Mayen", "continent" => "Europe"),

						"SZ" => array("country" => "Swaziland", "continent" => "Africa"),

						"SE" => array("country" => "Sweden", "continent" => "Europe"),

						"CH" => array("country" => "Switzerland", "continent" => "Europe"),

						"SY" => array("country" => "Syrian Arab Republic", "continent" => "Asia"),

						"TW" => array("country" => "Taiwan, Province of China", "continent" => "Asia"),

						"TJ" => array("country" => "Tajikistan", "continent" => "Asia"),

						"TZ" => array("country" => "Tanzania, United Republic of", "continent" => "Africa"),

						"TH" => array("country" => "Thailand", "continent" => "Asia"),

						"TL" => array("country" => "Timor-leste", "continent" => "Asia"),

						"TG" => array("country" => "Togo", "continent" => "Africa"),

						"TK" => array("country" => "Tokelau", "continent" => "Oceania"),

						"TO" => array("country" => "Tonga", "continent" => "Oceania"),

						"TT" => array("country" => "Trinidad and Tobago", "continent" => "North America"),

						"TN" => array("country" => "Tunisia", "continent" => "Africa"),

						"TR" => array("country" => "Turkey", "continent" => "Asia"),

						"TM" => array("country" => "Turkmenistan", "continent" => "Asia"),

						"TC" => array("country" => "Turks and Caicos Islands", "continent" => "North America"),

						"TV" => array("country" => "Tuvalu", "continent" => "Oceania"),

						"UG" => array("country" => "Uganda", "continent" => "Africa"),

						"UA" => array("country" => "Ukraine", "continent" => "Europe"),

						"AE" => array("country" => "United Arab Emirates", "continent" => "Asia"),

						"GB" => array("country" => "United Kingdom", "continent" => "Europe"),

						"US" => array("country" => "United States", "continent" => "North America"),

						"UM" => array("country" => "United States Minor Outlying Islands", "continent" => "Oceania"),

						"UY" => array("country" => "Uruguay", "continent" => "South America"),

						"UZ" => array("country" => "Uzbekistan", "continent" => "Asia"),

						"VU" => array("country" => "Vanuatu", "continent" => "Oceania"),

						"VE" => array("country" => "Venezuela", "continent" => "South America"),

						"VN" => array("country" => "Viet Nam", "continent" => "Asia"),

						"VG" => array("country" => "Virgin Islands, British", "continent" => "North America"),

						"VI" => array("country" => "Virgin Islands, U.S.", "continent" => "North America"),

						"WF" => array("country" => "Wallis and Futuna", "continent" => "Oceania"),

						"EH" => array("country" => "Western Sahara", "continent" => "Africa"),

						"YE" => array("country" => "Yemen", "continent" => "Asia"),

						"ZM" => array("country" => "Zambia", "continent" => "Africa"),

						"ZW" => array("country" => "Zimbabwe", "continent" => "Africa")

    );

			

			$country_exist = $wpdb->query( "SHOW TABLES LIKE '{$wpdb->prefix}{$table}'" );

			if ( ! empty( $country_exist ) ) {

				foreach($countries as $key=>$val)

				{

					$country_code = $key;

					foreach($val as $myval)

					{

						$num = $wpdb->get_var("select count(*) from " . $wpdb->prefix . $table ."  where name = '".esc_html($myval)."' ");

						if($num == 0){

						$wpdb->insert(

							$wpdb->prefix . $table,

							array(

								'name'          => esc_html($myval),

								'country_code' => $country_code,

								'status'   => 1,

								

							)

						);

						

						}

					}

				}

			}

}







// block Country

add_action( 'wp_ajax_cptch_block_country',        'cptch_block_country_callback' );

add_action( 'wp_ajax_nopriv_cptch_block_country', 'cptch_block_country_callback' );

function cptch_block_country_callback()

{

	global $wpdb;

	$cid = $_POST['cid'];

	$table = 'cptch_track_countries';

	$sq = "UPDATE ".$wpdb->prefix.$table." SET status = 0 where id = '".$cid."' ";

	$st = $wpdb->query($sq);

	if($st)

	{

		echo 1;

		exit;

	}

	else

	{

		echo 0;

		exit;

	}				

}



// Unblock Country

add_action( 'wp_ajax_cptch_unblock_country',        'cptch_unblock_country_callback' );

add_action( 'wp_ajax_nopriv_cptch_unblock_country', 'cptch_unblock_country_callback' );

function cptch_unblock_country_callback()

{

	global $wpdb;

	$cid = $_POST['cid'];

	$table = 'cptch_track_countries';

	$sq = "UPDATE ".$wpdb->prefix.$table." SET status = 1 where id = '".$cid."' ";

	$st = $wpdb->query($sq);

	if($st)

	{

		echo 1;

		exit;

	}

	else

	{

		echo 0;

		exit;

	}				

}







// convert seconds into days and hours , minute

function cptch_convert_seconds($seconds) 

{

	$dt1 = new DateTime("@0");

	$dt2 = new DateTime("@$seconds");

	return $dt1->diff($dt2)->format('%a,%h,%i,%s');

}



// Block an IP

function block_this_ip($ip)

{

	 global $wpdb;

	 $add_ip = $ip;

	 $time = date_i18n("Y-m-d H:i:s");

	 $valid_ip = filter_var( stripslashes( esc_html( trim( $add_ip ) ) ), FILTER_VALIDATE_IP );

	 $ip_int = sprintf( '%u', ip2long( $valid_ip ) );

	 $id = $wpdb->get_var( "SELECT id FROM " . $wpdb->prefix . "cptch_blacklist_ip WHERE ( ip_from_int <= " . $ip_int . " AND ip_to_int >= " . $ip_int . " ) OR ip = '" . $valid_ip . "' LIMIT 1;" );

				

	if ( is_null( $id ) ) {	/* check if IP already in database */

	$wpdb->insert(

			$wpdb->prefix . "cptch_blacklist_ip",

			array(

				'ip'          => $valid_ip,

				'ip_from_int' => $ip_int,

				'ip_to_int'   => $ip_int,

				'add_time'    => $time

			)

		);

		

	}

}





// block IP

add_action( 'wp_ajax_cptch_block_ip',        'cptch_block_ip_callback' );

add_action( 'wp_ajax_nopriv_cptch_block_ip', 'cptch_block_ip_callback' );

function cptch_block_ip_callback()

{

	global $wpdb;

	 $time = date_i18n('Y-m-d H:i:s');

	 $add_ip = $_POST['ip'];

	 $ip = $_SERVER['REMOTE_ADDR'];

	 

	 if($add_ip == $ip)

	 {

	 	echo 3;

		exit;

	 }

	 

	 

	 $valid_ip = filter_var( stripslashes( esc_html( trim( $add_ip ) ) ), FILTER_VALIDATE_IP );

	 $ip_int = sprintf( '%u', ip2long( $valid_ip ) );

	 

	 $id = $wpdb->get_var( "SELECT id FROM " . $wpdb->prefix . "cptch_blacklist_ip WHERE ( ip_from_int <= " . $ip_int . " AND ip_to_int >= " . $ip_int . " ) OR ip = '" . $valid_ip . "' LIMIT 1;" );

					

					if ( is_null( $id ) ) {	/* check if IP already in database */

	 

					$wpdb->insert(

							$wpdb->prefix . "cptch_blacklist_ip",

							array(

								'ip'          => $valid_ip,

								'ip_from_int' => $ip_int,

								'ip_to_int'   => $ip_int,

								'add_by_status'   => '2',

								'add_time'    => $time

							)

						);

						echo 1;

						exit;

					}

					else

					{

						echo 2;

						exit;

					}						

		

}



// get visitor traffic record 

add_action( 'wp_ajax_cptch_get_traffic_record',        'cptch_get_traffic_record_callback' );

add_action( 'wp_ajax_nopriv_cptch_get_traffic_record', 'cptch_get_traffic_record_callback' );

function cptch_get_traffic_record_callback()

{

	 global $wpdb;

	 $item_per_page = 20;

	 $page_number = $_POST['page'];

	 $table = 'cptch_track_visitor';

	 

	 $position = (($page_number-1) * $item_per_page);

	 $results = $wpdb->get_results("SELECT * FROM ". $wpdb->prefix . $table ." ORDER BY id DESC LIMIT $position , $item_per_page ");

	 $num = $wpdb->num_rows;

		if($num > 0)		{

			foreach($results as $row){

			

							$count1 = $wpdb->get_var("select count(*) from {$wpdb->prefix}cptch_track_countries where name = '".$row->country."' and status = 0 ");

							$cid = $wpdb->get_var("select id from {$wpdb->prefix}cptch_track_countries where name = '".$row->country."' ");

							

							if($count1>0)

							{

								$myip = $row->ip_address;

								block_this_ip($myip); // block this ip because its country is in black list 

							}

							

							$count = $wpdb->get_var("select count(*) from {$wpdb->prefix}cptch_blacklist_ip where ip = '".$row->ip_address."' ");

							if($count > 0 || $count1 > 0)

							{

								$class = 'mred';

							}

							else

							{

								$class = 'mgreen';

							}

							

							$myclass = str_replace('.','',$row->ip_address);

			?>

				

				<div >

								<div id="" >

									

                                    

                                    <div  class="wfActEvent wfHuman">

										

                                        <div>

													

														<img  width="16" height="11" class="wfFlag" src="<?php echo plugin_dir_url(__file__ );?>/images/flags/<?php echo strtolower($row->country_code);?>.png" alt="<?php echo $row->country;?>" title="<?php echo $row->country;?>">

														

                                                        

                                                        

                                                        <a target="_blank" rel="noopener noreferrer" href="http://maps.google.com/maps?q=<?php echo $row->location; ?>&amp;z=6"><?php if($row->city == 'Delhi'){echo "New Delhi";}else {echo $row->city; }?> , <?php echo $row->country;?>  </a>visited

                                                            

													</span>

													

                                                    

												<?php

													$cur_time = date_i18n('Y-m-d H:i:s');

                                                    $a = date_i18n('m/d/Y h:i:s A',strtotime($row->add_time));

                                                    $b = strtotime($a);

													$c = strtotime($cur_time);

													$d = $c-$b;

													

													$mtime = cptch_convert_seconds($d);

													$time_arr = explode(',',$mtime);

													$str = '';

													

													if(trim($time_arr[0])!= '0')

													{

														$str = $time_arr[0]."	days	";

													}

													if(trim($time_arr[1])!= '0')

													{

														$str .= $time_arr[1]."	hours	";

													}

													if(trim($time_arr[2])!= '0')

													{

														$str .= $time_arr[2]."	minute	";

													}

													if(trim($time_arr[3])!= '0')

													{

														$str .= $time_arr[3]."	seconds";

													}													

													

													

                                                 ?>                            

                                                                            

													

                                                    <a class="wf-lt-url wf-split-word-xs myurl<?php echo $myclass;?> <?php echo $class;?> visit_linkx"  target="_blank" rel="noopener noreferrer" href="<?php echo $row->requested_url; ?>" title="<?php echo $row->requested_url;?>"><?php echo $row->requested_url;?></a>

										</div>

										

                                        <div>

											<span  class="wfTimeAgo wfTimeAgo-timestamp" data-timestamp="<?php echo $d; ?>"><?php echo date_i18n('m/d/Y h:i:s A',strtotime($row->add_time));  ?>(<?php echo $str;?> before)</span>&nbsp;&nbsp;

													<strong>IP:</strong> <?php echo $row->ip_address; ?>

														

													</span>

													&nbsp;

													<span class="wfReverseLookup"><strong>Hostname:	</strong><?php echo $row->hostname;?></span>

										</div>

			

											<div>

													<strong>Browser:</strong>

													<span><?php echo $row->user_browser;?></span>

											</div>

												<div style="color: #000;"><?php echo $row->user_agent; ?></div>

											<div>

											

                                            <?php 

											if($count>0)

											{

												

												$txt = "Unblock this IP";

												$val = 0;

											}

											else

											{

												

												$txt = "Block this IP";

												$val = 1;

											}

											?>		

														<?php if($count1 == 0){?>

														<a href="javascript:void(0);" onclick="cptch_call_it('<?php echo $row->ip_address;?>' , '<?php echo $myclass;?>');" data-id="<?php echo $val;?>" class="btn btn-default btn-sm mybtn btn<?php echo $myclass;?>" id="" role="button" >

															<?php echo $txt; ?>

														</a>

                                             			<?php }?>

                                                        

                                                        

                                                        <?php if($count1 > 0){?>

                                                        <a href="javascript:void(0);" onclick="cptch_unblock_country('<?php echo $cid;?>');" data-id="" class="btn btn-default btn-sm blockcountry" id="" role="button" >

															<?php echo "UnBlock this Country"; ?>

														</a>

														<?php }else{?>

                                                        <a href="javascript:void(0);" onclick="cptch_block_country('<?php echo $cid;?>');" data-id="" class="btn btn-default btn-sm blockcountry" id="" role="button" >

															<?php echo "Block this Country"; ?>

														</a>

														<?php }?>

                                             

                                             

                                             

                                             

                                             

                                                 

													</span>

													<span data-bind="if: action() == 'blocked:waf'"></span>

											</div>

									</div>

								</div>

							</div>

				

				

			<?php }

				

		}else{"<div>No result found</div>";}	

	

	exit;	

}









// unblock IP Ajax

add_action( 'wp_ajax_cptch_unblock_ip',        'cptch_unblock_ip_callback' );

add_action( 'wp_ajax_nopriv_cptch_unblock_ip', 'cptch_unblock_ip_callback' );

function cptch_unblock_ip_callback()

{

	 global $wpdb;

	 $add_ip = $_POST['ip'];

	 $valid_ip = filter_var( stripslashes( esc_html( trim( $add_ip ) ) ), FILTER_VALIDATE_IP );

	 $result = $wpdb->query( "DELETE FROM " . $wpdb->prefix . "cptch_blacklist_ip WHERE ip = '" . $valid_ip . "' " );

	 echo 1;				

	 exit;							

		

}



// unblock IP 

function unblock_this_ip($myip)

{

	global $wpdb;

	$add_ip = $myip;

	$valid_ip = filter_var( stripslashes( esc_html( trim( $add_ip ) ) ), FILTER_VALIDATE_IP );

	

	$result = $wpdb->query( "DELETE FROM " . $wpdb->prefix . "cptch_blacklist_ip WHERE ip = '" . $valid_ip . "' and add_by_status != 2 " );

}





// Add visitor info in db

function cptch_add_visitor()

{

	global $wpdb;

	$ip = $_SERVER['REMOTE_ADDR'];

	//	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
	
/*if( ini_get('allow_url_fopen') ) {
      $details = json_decode(@file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']));
    } else {
        return;
    }
	*/
 $details = json_decode(@file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']));
 
	//	$code = $details->country; // -> "US"

	$country = $details->country_name;

	$country_code = $details->country_code;

	$city = $details->city;

	$region = $details->region_name;

	$loc = $details->latitude.','.$details->longitude;

	$datetime = date_i18n("Y-m-d H:i:s");

	$query_string = $_SERVER['QUERY_STRING'] ;

	$http_referer = isset( $_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "no referer" ;

	$http_user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "no User-agent" ;

	$web_page = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	$remotehost = @getHostByAddr($ip);

	

	$ua = cptch_getBrowser();

	$browser = 'Browser :'.$ua['name'] .' Version '.$ua['version'].' running on  '. $ua['platform'];

	$table = 'cptch_track_visitor';

	$ajax_page =  get_bloginfo('url').'/wp-admin/admin-ajax.php';

	$web_page = str_replace('//images','/images' , $web_page);

	$num = $wpdb->get_var("select count(*) from  ". $wpdb->prefix . $table ." where requested_url = '".trim($web_page)."' ");

	

	if($num == 0 and $web_page != $ajax_page)

	{

		$sq = "insert into ". $wpdb->prefix . $table ."  set ip_address = '".$ip."' , no_of_visits = no_of_visits + 1 ,  country = '".$country."' , city = '".$city."' ,region = '".$region."' , location = '".$loc."' , requested_url = '".$web_page."'  , referer_page = '".$http_referer."' , user_agent = '".$http_user_agent."' , query_string = '".$query_string."' , add_time = '".$datetime."' , hostname = '".$remotehost."' , user_browser = '".$browser."' , country_code = '".$country_code."' ";

	

		$wpdb->query($sq);

		$vid = $wpdb->insert_id;

	}

	

	

	



}



// get country by country code

function countryCodeToCountry($code) {

    $code = strtoupper($code);

    if ($code == 'AF') return 'Afghanistan';

    if ($code == 'AX') return 'Aland Islands';

    if ($code == 'AL') return 'Albania';

    if ($code == 'DZ') return 'Algeria';

    if ($code == 'AS') return 'American Samoa';

    if ($code == 'AD') return 'Andorra';

    if ($code == 'AO') return 'Angola';

    if ($code == 'AI') return 'Anguilla';

    if ($code == 'AQ') return 'Antarctica';

    if ($code == 'AG') return 'Antigua and Barbuda';

    if ($code == 'AR') return 'Argentina';

    if ($code == 'AM') return 'Armenia';

    if ($code == 'AW') return 'Aruba';

    if ($code == 'AU') return 'Australia';

    if ($code == 'AT') return 'Austria';

    if ($code == 'AZ') return 'Azerbaijan';

    if ($code == 'BS') return 'Bahamas the';

    if ($code == 'BH') return 'Bahrain';

    if ($code == 'BD') return 'Bangladesh';

    if ($code == 'BB') return 'Barbados';

    if ($code == 'BY') return 'Belarus';

    if ($code == 'BE') return 'Belgium';

    if ($code == 'BZ') return 'Belize';

    if ($code == 'BJ') return 'Benin';

    if ($code == 'BM') return 'Bermuda';

    if ($code == 'BT') return 'Bhutan';

    if ($code == 'BO') return 'Bolivia';

    if ($code == 'BA') return 'Bosnia and Herzegovina';

    if ($code == 'BW') return 'Botswana';

    if ($code == 'BV') return 'Bouvet Island (Bouvetoya)';

    if ($code == 'BR') return 'Brazil';

    if ($code == 'IO') return 'British Indian Ocean Territory (Chagos Archipelago)';

    if ($code == 'VG') return 'British Virgin Islands';

    if ($code == 'BN') return 'Brunei Darussalam';

    if ($code == 'BG') return 'Bulgaria';

    if ($code == 'BF') return 'Burkina Faso';

    if ($code == 'BI') return 'Burundi';

    if ($code == 'KH') return 'Cambodia';

    if ($code == 'CM') return 'Cameroon';

    if ($code == 'CA') return 'Canada';

    if ($code == 'CV') return 'Cape Verde';

    if ($code == 'KY') return 'Cayman Islands';

    if ($code == 'CF') return 'Central African Republic';

    if ($code == 'TD') return 'Chad';

    if ($code == 'CL') return 'Chile';

    if ($code == 'CN') return 'China';

    if ($code == 'CX') return 'Christmas Island';

    if ($code == 'CC') return 'Cocos (Keeling) Islands';

    if ($code == 'CO') return 'Colombia';

    if ($code == 'KM') return 'Comoros the';

    if ($code == 'CD') return 'Congo';

    if ($code == 'CG') return 'Congo the';

    if ($code == 'CK') return 'Cook Islands';

    if ($code == 'CR') return 'Costa Rica';

    if ($code == 'CI') return 'Cote d\'Ivoire';

    if ($code == 'HR') return 'Croatia';

    if ($code == 'CU') return 'Cuba';

    if ($code == 'CY') return 'Cyprus';

    if ($code == 'CZ') return 'Czech Republic';

    if ($code == 'DK') return 'Denmark';

    if ($code == 'DJ') return 'Djibouti';

    if ($code == 'DM') return 'Dominica';

    if ($code == 'DO') return 'Dominican Republic';

    if ($code == 'EC') return 'Ecuador';

    if ($code == 'EG') return 'Egypt';

    if ($code == 'SV') return 'El Salvador';

    if ($code == 'GQ') return 'Equatorial Guinea';

    if ($code == 'ER') return 'Eritrea';

    if ($code == 'EE') return 'Estonia';

    if ($code == 'ET') return 'Ethiopia';

    if ($code == 'FO') return 'Faroe Islands';

    if ($code == 'FK') return 'Falkland Islands (Malvinas)';

    if ($code == 'FJ') return 'Fiji the Fiji Islands';

    if ($code == 'FI') return 'Finland';

    if ($code == 'FR') return 'France, French Republic';

    if ($code == 'GF') return 'French Guiana';

    if ($code == 'PF') return 'French Polynesia';

    if ($code == 'TF') return 'French Southern Territories';

    if ($code == 'GA') return 'Gabon';

    if ($code == 'GM') return 'Gambia the';

    if ($code == 'GE') return 'Georgia';

    if ($code == 'DE') return 'Germany';

    if ($code == 'GH') return 'Ghana';

    if ($code == 'GI') return 'Gibraltar';

    if ($code == 'GR') return 'Greece';

    if ($code == 'GL') return 'Greenland';

    if ($code == 'GD') return 'Grenada';

    if ($code == 'GP') return 'Guadeloupe';

    if ($code == 'GU') return 'Guam';

    if ($code == 'GT') return 'Guatemala';

    if ($code == 'GG') return 'Guernsey';

    if ($code == 'GN') return 'Guinea';

    if ($code == 'GW') return 'Guinea-Bissau';

    if ($code == 'GY') return 'Guyana';

    if ($code == 'HT') return 'Haiti';

    if ($code == 'HM') return 'Heard Island and McDonald Islands';

    if ($code == 'VA') return 'Holy See (Vatican City State)';

    if ($code == 'HN') return 'Honduras';

    if ($code == 'HK') return 'Hong Kong';

    if ($code == 'HU') return 'Hungary';

    if ($code == 'IS') return 'Iceland';

    if ($code == 'IN') return 'India';

    if ($code == 'ID') return 'Indonesia';

    if ($code == 'IR') return 'Iran';

    if ($code == 'IQ') return 'Iraq';

    if ($code == 'IE') return 'Ireland';

    if ($code == 'IM') return 'Isle of Man';

    if ($code == 'IL') return 'Israel';

    if ($code == 'IT') return 'Italy';

    if ($code == 'JM') return 'Jamaica';

    if ($code == 'JP') return 'Japan';

    if ($code == 'JE') return 'Jersey';

    if ($code == 'JO') return 'Jordan';

    if ($code == 'KZ') return 'Kazakhstan';

    if ($code == 'KE') return 'Kenya';

    if ($code == 'KI') return 'Kiribati';

    if ($code == 'KP') return 'Korea';

    if ($code == 'KR') return 'Korea';

    if ($code == 'KW') return 'Kuwait';

    if ($code == 'KG') return 'Kyrgyz Republic';

    if ($code == 'LA') return 'Lao';

    if ($code == 'LV') return 'Latvia';

    if ($code == 'LB') return 'Lebanon';

    if ($code == 'LS') return 'Lesotho';

    if ($code == 'LR') return 'Liberia';

    if ($code == 'LY') return 'Libyan Arab Jamahiriya';

    if ($code == 'LI') return 'Liechtenstein';

    if ($code == 'LT') return 'Lithuania';

    if ($code == 'LU') return 'Luxembourg';

    if ($code == 'MO') return 'Macao';

    if ($code == 'MK') return 'Macedonia';

    if ($code == 'MG') return 'Madagascar';

    if ($code == 'MW') return 'Malawi';

    if ($code == 'MY') return 'Malaysia';

    if ($code == 'MV') return 'Maldives';

    if ($code == 'ML') return 'Mali';

    if ($code == 'MT') return 'Malta';

    if ($code == 'MH') return 'Marshall Islands';

    if ($code == 'MQ') return 'Martinique';

    if ($code == 'MR') return 'Mauritania';

    if ($code == 'MU') return 'Mauritius';

    if ($code == 'YT') return 'Mayotte';

    if ($code == 'MX') return 'Mexico';

    if ($code == 'FM') return 'Micronesia';

    if ($code == 'MD') return 'Moldova';

    if ($code == 'MC') return 'Monaco';

    if ($code == 'MN') return 'Mongolia';

    if ($code == 'ME') return 'Montenegro';

    if ($code == 'MS') return 'Montserrat';

    if ($code == 'MA') return 'Morocco';

    if ($code == 'MZ') return 'Mozambique';

    if ($code == 'MM') return 'Myanmar';

    if ($code == 'NA') return 'Namibia';

    if ($code == 'NR') return 'Nauru';

    if ($code == 'NP') return 'Nepal';

    if ($code == 'AN') return 'Netherlands Antilles';

    if ($code == 'NL') return 'Netherlands the';

    if ($code == 'NC') return 'New Caledonia';

    if ($code == 'NZ') return 'New Zealand';

    if ($code == 'NI') return 'Nicaragua';

    if ($code == 'NE') return 'Niger';

    if ($code == 'NG') return 'Nigeria';

    if ($code == 'NU') return 'Niue';

    if ($code == 'NF') return 'Norfolk Island';

    if ($code == 'MP') return 'Northern Mariana Islands';

    if ($code == 'NO') return 'Norway';

    if ($code == 'OM') return 'Oman';

    if ($code == 'PK') return 'Pakistan';

    if ($code == 'PW') return 'Palau';

    if ($code == 'PS') return 'Palestinian Territory';

    if ($code == 'PA') return 'Panama';

    if ($code == 'PG') return 'Papua New Guinea';

    if ($code == 'PY') return 'Paraguay';

    if ($code == 'PE') return 'Peru';

    if ($code == 'PH') return 'Philippines';

    if ($code == 'PN') return 'Pitcairn Islands';

    if ($code == 'PL') return 'Poland';

    if ($code == 'PT') return 'Portugal, Portuguese Republic';

    if ($code == 'PR') return 'Puerto Rico';

    if ($code == 'QA') return 'Qatar';

    if ($code == 'RE') return 'Reunion';

    if ($code == 'RO') return 'Romania';

    if ($code == 'RU') return 'Russian Federation';

    if ($code == 'RW') return 'Rwanda';

    if ($code == 'BL') return 'Saint Barthelemy';

    if ($code == 'SH') return 'Saint Helena';

    if ($code == 'KN') return 'Saint Kitts and Nevis';

    if ($code == 'LC') return 'Saint Lucia';

    if ($code == 'MF') return 'Saint Martin';

    if ($code == 'PM') return 'Saint Pierre and Miquelon';

    if ($code == 'VC') return 'Saint Vincent and the Grenadines';

    if ($code == 'WS') return 'Samoa';

    if ($code == 'SM') return 'San Marino';

    if ($code == 'ST') return 'Sao Tome and Principe';

    if ($code == 'SA') return 'Saudi Arabia';

    if ($code == 'SN') return 'Senegal';

    if ($code == 'RS') return 'Serbia';

    if ($code == 'SC') return 'Seychelles';

    if ($code == 'SL') return 'Sierra Leone';

    if ($code == 'SG') return 'Singapore';

    if ($code == 'SK') return 'Slovakia (Slovak Republic)';

    if ($code == 'SI') return 'Slovenia';

    if ($code == 'SB') return 'Solomon Islands';

    if ($code == 'SO') return 'Somalia, Somali Republic';

    if ($code == 'ZA') return 'South Africa';

    if ($code == 'GS') return 'South Georgia and the South Sandwich Islands';

    if ($code == 'ES') return 'Spain';

    if ($code == 'LK') return 'Sri Lanka';

    if ($code == 'SD') return 'Sudan';

    if ($code == 'SR') return 'Suriname';

    if ($code == 'SJ') return 'Svalbard & Jan Mayen Islands';

    if ($code == 'SZ') return 'Swaziland';

    if ($code == 'SE') return 'Sweden';

    if ($code == 'CH') return 'Switzerland, Swiss Confederation';

    if ($code == 'SY') return 'Syrian Arab Republic';

    if ($code == 'TW') return 'Taiwan';

    if ($code == 'TJ') return 'Tajikistan';

    if ($code == 'TZ') return 'Tanzania';

    if ($code == 'TH') return 'Thailand';

    if ($code == 'TL') return 'Timor-Leste';

    if ($code == 'TG') return 'Togo';

    if ($code == 'TK') return 'Tokelau';

    if ($code == 'TO') return 'Tonga';

    if ($code == 'TT') return 'Trinidad and Tobago';

    if ($code == 'TN') return 'Tunisia';

    if ($code == 'TR') return 'Turkey';

    if ($code == 'TM') return 'Turkmenistan';

    if ($code == 'TC') return 'Turks and Caicos Islands';

    if ($code == 'TV') return 'Tuvalu';

    if ($code == 'UG') return 'Uganda';

    if ($code == 'UA') return 'Ukraine';

    if ($code == 'AE') return 'United Arab Emirates';

    if ($code == 'GB') return 'United Kingdom';

    if ($code == 'US') return 'United States of America';

    if ($code == 'UM') return 'United States Minor Outlying Islands';

    if ($code == 'VI') return 'United States Virgin Islands';

    if ($code == 'UY') return 'Uruguay, Eastern Republic of';

    if ($code == 'UZ') return 'Uzbekistan';

    if ($code == 'VU') return 'Vanuatu';

    if ($code == 'VE') return 'Venezuela';

    if ($code == 'VN') return 'Vietnam';

    if ($code == 'WF') return 'Wallis and Futuna';

    if ($code == 'EH') return 'Western Sahara';

    if ($code == 'YE') return 'Yemen';

    if ($code == 'XK') return 'Kosovo';

    if ($code == 'ZM') return 'Zambia';

    if ($code == 'ZW') return 'Zimbabwe';

    return '';

}    



// get user browser info

function cptch_getBrowser()

{

    $u_agent = $_SERVER['HTTP_USER_AGENT'];

    $bname = 'Unknown';

    $platform = 'Unknown';

    $version= "";

	$ub = "";



    //First get the platform?

    if (preg_match('/linux/i', $u_agent)) {

        $platform = 'linux';

    }

    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {

        $platform = 'mac';

    }

    elseif (preg_match('/windows|win32/i', $u_agent)) {

        $platform = 'windows';

    }



    // Next get the name of the useragent yes seperately and for good reason

    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))

    {

        $bname = 'Internet Explorer';

        $ub = "MSIE";

    }

    elseif(preg_match('/Firefox/i',$u_agent))

    {

        $bname = 'Mozilla Firefox';

        $ub = "Firefox";

    }

    elseif(preg_match('/Chrome/i',$u_agent))

    {

        $bname = 'Google Chrome';

        $ub = "Chrome";

    }

    elseif(preg_match('/Safari/i',$u_agent))

    {

        $bname = 'Apple Safari';

        $ub = "Safari";

    }

    elseif(preg_match('/Opera/i',$u_agent))

    {

        $bname = 'Opera';

        $ub = "Opera";

    }

    elseif(preg_match('/Netscape/i',$u_agent))

    {

        $bname = 'Netscape';

        $ub = "Netscape";

    }



    // finally get the correct version number

    $known = array('Version', $ub, 'other');

    $pattern = '#(?<browser>' . join('|', $known) .

    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

    if (!preg_match_all($pattern, $u_agent, $matches)) {

        // we have no matching number just continue

    }



    // see how many we have

    $i = count($matches['browser']);

    if ($i != 1) {

        //we will have two since we are not using 'other' argument yet

        //see if version is before or after the name

        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){

            $version= $matches['version'][0];

        }

        else {

            $version= $matches['version'][1];

        }

    }

    else {

        $version= $matches['version'][0];

    }



    // check if we have a number

    if ($version==null || $version=="") {$version="?";}



    return array(

        'userAgent' => $u_agent,

        'name'      => $bname,

        'version'   => $version,

        'platform'  => $platform,

        'pattern'    => $pattern

    );

}