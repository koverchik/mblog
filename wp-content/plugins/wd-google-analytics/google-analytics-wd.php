<?php

/**
 * Plugin Name:     Google Analytics
 * Plugin URI:		  https://web-dorado.com/products/wordpress-google-analytics-plugin.html
 * Description:     Google Analytics WD is a user-friendly all in one plugin, which allows to manage and monitor your website analytics from WordPress dashboard.
 * Version:         1.1.6
 * Author:          WebDorado
 * Author URI:      https://web-dorado.com/wordpress-plugins-bundle.html
 * License:         GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
if (!defined('GAWD_DIR')) {
    define('GAWD_DIR', dirname(__FILE__));
}

if (!defined('GWD_NAME')) {
define('GWD_NAME', plugin_basename(dirname(__FILE__)));
}

if (!defined('GAWD_URL')) {
    define('GAWD_URL', plugins_url(plugin_basename(dirname(__FILE__))));
}

if (!defined('GAWD_INC')) {
    define('GAWD_INC', GAWD_URL . '/inc');
}

if (!defined('GAWD_VERSION')) {
    define('GAWD_VERSION', '1.1.6');
}



$upload_dir = wp_upload_dir();
if (!is_dir($upload_dir['basedir'] . '/' . plugin_basename(dirname(__FILE__)))) {
    mkdir($upload_dir['basedir'] . '/' . plugin_basename(dirname(__FILE__)), 0777);
}
$GAWD_UPLOAD_DIR = $upload_dir['basedir'] . '/' . plugin_basename(dirname(__FILE__));


if (!defined('GAWD_UPLOAD_DIR')) {
    define('GAWD_UPLOAD_DIR', $GAWD_UPLOAD_DIR);
}




	add_action("init","gawd_dorado_web_init", 9);
	function gawd_dorado_web_init(){

		if( !class_exists("DoradoWeb") ){
			require_once(GAWD_DIR . '/wd/start.php');
		}
		
		global $gawd_options;
		$gawd_options = array (
			"prefix" => "gawd",
			"wd_plugin_id" => 158,
			"plugin_title" => "Google Analytics WD",
			"plugin_wordpress_slug" => "wd-google-analytics",
			"plugin_dir" => GAWD_DIR,
			"plugin_main_file" => __FILE__,
			"description" => __('Analytics WD WordPress plugin - a certified member of Google Analytics Technology Partners Program.
With a large number of detailed and user-friendly reports, Google Analytics WD plugin is just the right choice for you!', 'gawd'),
			"addons" => null,
			// from web-dorado.com
			"plugin_features" => array(
				0 => array(
					"title" => __("Tracking Code and Options", "gawd"),
					"description" => __("You can add Google Analytics tracking to your website using this plugin. Various options let you configure desired tracking settings. You can also exclude traffic from certain users, role types, IP address, country, city or region.", "gawd"),
				),
				1 => array(
					"title" => __("All Analytics Reports", "gawd"),
					"description" => __("Google Analytics WD provides various reports, including Age, Gender, Demographics and Interests, Behavior and Technology, as well as Ecommerce tracking, Custom Dimensions and Custom Reports. Just as in Google Analytics, you can compare tracking reports of two metrics with elegantly designed Line, Pie and Column charts.", "gawd"),
				),
				2 => array(
					"title" => __("Page and Post Reports", "gawd"),
					"description" => __("Each of your publications can have their own reports of Google Analytics. This lets authors to keep track of sessions on their posts and pages, giving full information about user activities.", "gawd"),
				),
				3 => array(
					"title" => __("Frontend Reports", "gawd"),
					"description" => __("Permit Editors, Authors or other user roles to check page or post statistics, while reviewing content from the frontend of your website. A quick report will provide key information about activities within that particular post.", "gawd"),
				),
				4 => array(
					"title" => __("Ecommerce Tracking", "gawd"),
					"description" => __("You can check revenues and performance of sales of your online shop. The plugin lets you keep up with product or category tracking, as well as product SKU and transaction IDs.", "gawd"),
				)
			),
			// user guide from web-dorado.com
			"user_guide" => array(
				0 => array(
					"main_title" => __("Installing Google Analytics WD", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/installation.html",
					"titles" => array()
				),
				1 => array(
					"main_title" => __("Quick Start", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/quick-start.html",
					"titles" => array(
						array(
							"title" => __("Overview", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/quick-start/overview.html"
						)
					)
				),
				2 => array(
					"main_title" => __("Report Types", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/reports.html",
					"titles" => array()
				),
				3 => array(
					"main_title" => __("Global description", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/global-description.html",
					"titles" => array(
						array(
							"title" => __("Metrics", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/global-description/metrics.html",
						),
						array(
							"title" => __("Charts", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/global-description/charts.html",
						),
						array(
							"title" => __("Date range", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/global-description/date-range.html",
						),
						array(
							"title" => __("Compare Date", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/global-description/compare-date.html",
						),
						array(
							"title" => __("Export and Email", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/global-description/export-email.html",
						),
					)
				),
				4 => array(
					"main_title" => __("Settings", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/settings/authenticate.html",
					"titles" => array(
						array(
							"title" => __("Use your own project", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/settings/use-your-own-project.html",
						),
						array(
							"title" => __("Alerts & Pushover", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/settings/alerts-pushover.html",
						),
						array(
							"title" => __("Filters", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/settings/filters.html",
						),
						array(
							"title" => __("Emails", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/settings/emails.html",
						),
						array(
							"title" => __("Advanced", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/settings/advanced.html",
						),
						array(
							"title" => __("AdSense and AdWords account linking", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/settings/adsense-and-adwords-account-linking.html",
						),
					)
				),
				5 => array(
					"main_title" => __("Tracking", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/tracking.html",
					"titles" => array(
						array(
							"title" => __("Custom Dimensions", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/tracking/custom-dimensions.html",
						),
						array(
							"title" => __("Exclude", "gawd"),
							"url" => "https://web-dorado.com/wordpress-google-analytics/tracking/exclude.html",
						)
					)
				),
				6 => array(
					"main_title" => __("Goal Management", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/goal-management.html",
					"titles" => array()
				),
				7 => array(
					"main_title" => __("Custom Reports", "gawd"),
					"url" => "https://web-dorado.com/wordpress-google-analytics/custom-reports.html",
					"titles" => array()
				)
			),
			"video_youtube_id" => "n1f7ECVFNPI",  // e.g. https://www.youtube.com/watch?v=acaexefeP7o youtube id is the acaexefeP7o
			"plugin_wd_url" => "https://web-dorado.com/products/wordpress-google-analytics-plugin.html",
			"plugin_wd_demo_link" => "http://wpdemo.web-dorado.com/wp-admin/admin.php?page=gawd_analytics&_ga=1.36699296.1878035738.1463981341",
			"plugin_wd_forum_link" => "https://web-dorado.com/forum/google-analytics-wd.html",
			"plugin_wd_addons_link" => "",
			"plugin_wizard_link" => null,
			"after_subscribe" => "admin.php?page=overview_gawd", // this can be plagin overview page or set up page
			"plugin_menu_title" => "Analytics",
			"plugin_menu_icon" => GAWD_URL . '/assets/main_icon.png',
			"menu_position" => "25, 13",
			"custom_post" => "gawd_analytics",  // if true => edit.php?post_type=contact
			"deactivate" => true,
			"subscribe" => true,
		);
		dorado_web_init($gawd_options);
	}

if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
	require_once('gawd_class.php');
	add_action('plugins_loaded', array('GAWD', 'get_instance'));

	register_activation_hook(__FILE__, array('GAWD', 'global_activate'));
	register_deactivation_hook(__FILE__, array('GAWD', 'deactivate'));
}
else{
	add_action( 'admin_notices', 'gawd_php_version_admin_notice' );
}

function gawd_php_version_admin_notice() {
	?>
	<div class="notice notice-error">
		<h3>Google Analytics WD</h3>
		<p><?php _e( 'This version of the plugin uses the latest Google library requiring PHP 5.4.0 or higher.', 'gawd' ); ?></p>
		<p><?php _e( 'We recommend you to update PHP or ask your hosting provider to do that. ', 'gawd' );
			printf(__( 'If it is not possible and you previously had Google Analytics free version installed, please download it again and do not update anymore. %s', 'gawd' ),
				'<a href="https://downloads.wordpress.org/plugin/wd-google-analytics.1.0.21.zip" target="_blank">Download from WordPress repository.</a>'
			); ?></p>

	</div>
	<?php


}
if (!function_exists('gawd_wd_bp_install_notice')) {

	if(get_option('wds_bk_notice_status')==='' || get_option('wds_bk_notice_status')==='1'){
		return;
	}


	function gawd_wd_bp_script_style() {
		$wd_bp_plugin_url = GAWD_URL;

		$get_current = get_current_screen();
		$current_screen_id = array(
			'toplevel_page_gawd_analytics',
			'analytics_page_gawd_reports',
			'analytics_page_gawd_settings',
			'analytics_page_gawd_tracking',
			'analytics_page_gawd_goals',
			'analytics_page_gawd_custom_reports',
			'analytics_page_gawd_uninstall',
			'analytics_page_overview_gawd',
			'analytics_page_gawd_updates',
		);

		if(in_array($get_current->id, $current_screen_id)) {
			wp_enqueue_script('wd_bck_install', $wd_bp_plugin_url . '/inc/js/wd_bp_install.js', array('jquery'));
			wp_enqueue_style('wd_bck_install', $wd_bp_plugin_url . '/inc/css/wd_bp_install.css');
		}

	}
  add_action('admin_enqueue_scripts', 'gawd_wd_bp_script_style');

  /**
   * Show notice to install backup plugin
   */
  function gawd_wd_bp_install_notice() {


		$wd_bp_plugin_url = GAWD_URL;


		$get_current = get_current_screen();
		$current_screen_id = array(
			'toplevel_page_gawd_analytics',
			'analytics_page_gawd_reports',
			'analytics_page_gawd_settings',
			'analytics_page_gawd_tracking',
			'analytics_page_gawd_goals',
			'analytics_page_gawd_custom_reports',
			'analytics_page_gawd_uninstall',
			'analytics_page_overview_gawd',
			'analytics_page_gawd_updates',
		);

		if(!in_array($get_current->id, $current_screen_id)) {
			return;
		}

		$prefix = 'gawd';
    $meta_value = get_option('wd_bk_notice_status');
    if ($meta_value === '' || $meta_value === false) {
      ob_start();
      ?>
      <div class="notice notice-info" id="wd_bp_notice_cont">
        <p>
          <img id="wd_bp_logo_notice" src="<?php echo $wd_bp_plugin_url . '/assets/logo.png'; ?>">
          <?php _e("Google Analytics WD advises: Install brand new FREE", $prefix) ?>
          <a href="https://wordpress.org/plugins/backup-wd/" title="<?php _e("More details", $prefix) ?>"
             target="_blank"><?php _e("Backup WD", $prefix) ?></a>
          <?php _e("plugin to keep your images and website safe.", $prefix) ?>
          <a class="button button-primary"
             href="<?php echo esc_url(wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=backup-wd'), 'install-plugin_backup-wd')); ?>">
            <span onclick="wd_bp_notice_install()"><?php _e("Install", $prefix); ?></span>
          </a>
        </p>
        <button type="button" class="wd_bp_notice_dissmiss notice-dismiss"><span class="screen-reader-text"></span>
        </button>
      </div>
      <script>wd_bp_url = '<?php echo add_query_arg(array('action' => 'wd_bp_dismiss',), admin_url('admin-ajax.php')); ?>'</script>
      <?php
      echo ob_get_clean();
    }
  }

	if (!is_dir(plugin_dir_path(dirname(__FILE__)) . 'backup-wd')) {
    add_action('admin_notices', 'gawd_wd_bp_install_notice');
  }

  /**
   * Add usermeta to db
   *
   * empty: notice,
   * 1    : never show again
   */
  function gawd_wd_bp_install_notice_status() {
    update_option('wd_bk_notice_status', '1', 'no');
  }
  add_action('wp_ajax_wd_bp_dismiss', 'gawd_wd_bp_install_notice_status');
}


add_filter("plugin_row_meta", 'gawd_add_plugin_meta_links', 10, 2);

function gawd_add_plugin_meta_links($meta_fields, $file){

  if(plugin_basename(__FILE__) == $file) {

    $meta_fields[] = "<a href='https://wordpress.org/support/plugin/wd-google-analytics/' target='_blank'>Support Forum</a>";
    $meta_fields[] = "<a href='https://wordpress.org/support/plugin/wd-google-analytics/reviews#new-post' target='_blank' title='Rate'>
            <i class='gawd-rate-stars'>"
      . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
      . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
      . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
      . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
      . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
      . "</i></a>";

    $stars_color = "#ffb900";

    echo "<style>"
      . ".gawd-rate-stars{display:inline-block;color:" . $stars_color . ";position:relative;top:3px;}"
      . ".gawd-rate-stars svg{fill:" . $stars_color . ";}"
      . ".gawd-rate-stars svg:hover{fill:" . $stars_color . "}"
      . ".gawd-rate-stars svg:hover ~ svg{fill:none;}"
      . "</style>";
  }

  return $meta_fields;
}
