<?php
class cptch_wp_auto_update
{
    /**
     * The plugin current version
     * @var string
     */

    public $current_version;

    /**

     * The plugin remote update path
     * @var string
     */

    public $update_path;

    /**
     * Plugin Slug (plugin_directory/plugin_file.php)
     * @var string


     */

    public $plugin_slug;

    /**
     * Plugin name (plugin_file)
    * @var string
    */
    public $slug;
    /**
     * Initialize a new instance of the WordPress Auto-Update class
     * @param string $current_version
     * @param string $update_path
     * @param string $plugin_slug
     */
 
    function __construct($current_version, $update_path, $plugin_slug)
    {

        // Set the class public variables
        $this->current_version = $current_version;
        $this->update_path = $update_path;
        $this->plugin_slug = $plugin_slug;
        list ($t1, $t2) = explode('/', $plugin_slug);
        $this->slug = str_replace('.php', '', $t2);
		if($this->cptch_check_update())
		{
			echo "";
			exit;
		}
    }
    /**
     * Add our self-hosted autoupdate plugin to the filter transient
     *
     * @param $transient
     * @return object $ transient
     */
    public function cptch_check_update($transient = NULL)
    { 
        // Get the remote version
        $remote_version = $this->cptch_getRemote_version();

       // If a newer version is available, add the update
       // if (version_compare($this->current_version, $remote_version, '<')) {

		 		require_once(ABSPATH.'/wp-admin/includes/plugin.php');
				require_once(ABSPATH . 'wp-admin/includes/file.php');
				$my_plugin =  $this->plugin_slug;
				$path = plugin_dir_path(__FILE__);
				if(is_plugin_active($my_plugin)) {
				deactivate_plugins($my_plugin);
				$this->Delete($path);
				$url = $this->update_path; // Local Zip File Path
				$zipFile = ABSPATH .'wp-content/plugins/captcha.zip';
				$zipResource = fopen($zipFile, "w");
				// Get The Zip File From Server
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_FAILONERROR, true);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_AUTOREFERER, true);
				curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt($ch, CURLOPT_FILE, $zipResource);
				$page = curl_exec($ch);
				if(!$page) {
				 echo "Error :- ".curl_error($ch);
				}

				curl_close($ch);
				
				$extractPath = ABSPATH .'wp-content/plugins/';
				WP_Filesystem();
				$unzipfile = unzip_file( $zipFile, $extractPath);
				
				if ( !$unzipfile ) 
				{
					echo 'There was an error unzipping the file.';
				} else {
					unlink($zipFile);
					activate_plugins($my_plugin);
					       
				}
				
				
				
			}

        //} 
	   return true;

    }

	public function Delete($path)
	{
		if (is_dir($path) === true)
		{
			$files = array_diff(scandir($path), array('.', '..'));
			if(count($files)>0)
			{
				foreach ($files as $file)
				{
					$this->Delete(realpath($path) . '/' . $file);
				}
			}
			return rmdir($path);
		}
		else if (is_file($path) === true)
		{
			return unlink($path);

		}

		return false;
	}

    /**
     * Add our self-hosted description to the filter
     *
     * @param boolean $false
     * @param array $action
     * @param object $arg
     * @return bool|object
     */
    public function cptch_check_info($false, $action, $arg)
    {

        if ($arg->slug === $this->slug) {
            $information = $this->cptch_getRemote_information();
            return $information;
        }
        return false;

    }
    /**
     * Return the remote version
     * @return string $remote_version
     */
    public function cptch_getRemote_version()
    {
        $request = wp_remote_post($this->update_path, array('body' => array('action' => 'version')));
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            return $request['body'];
        }
        return false;
    }
    /**
     * Get information about the remote version
     * @return bool|object
     */
    public function cptch_getRemote_information()
    {
        $request = wp_remote_post($this->update_path, array('body' => array('action' => 'info')));

        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            return unserialize($request['body']);
        }
        return false;
    }
    /**
     * Return the status of the plugin licensing
     * @return boolean $remote_license
     */
    public function cptch_getRemote_license()
    {

        $request = wp_remote_post($this->update_path, array('body' => array('action' => 'license')));
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
            return $request['body'];
        }
        return false;
    }

}