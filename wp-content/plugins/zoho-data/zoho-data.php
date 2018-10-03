<?php
/**
 * Plugin Name:       Zoho Data
 * Plugin URI:        http://heochaua.tk
 * Description:       Push data from website to zoho
 * Version:           0.1
 * Author:            HeoChauA
 * Author URI:        http://heochaua.tk
 * License:           GPLv2
 * License URI:       http://heochaua.tk
 * Text Domain:       zoho-data
 */

/**
 * Class wrapper for Zoho Data
 */
class Zoho_Data {
  
  function __construct() {
    //Change ACF Local JSON save location to /acf folder inside this plugin
    //add_filter('acf/settings/save_json', array( $this, 'acfSaveJsonPath') );

    //Include the /acf folder in the places to look for ACF Local JSON files
    add_filter('acf/settings/load_json', array( $this, 'acfLoadJsonPath') );

    // Init Functions
    add_action( 'init', array( $this, 'init' ) );
  }

  /**
   * Init the textdomain and all the the hooks/filters/etc
   */
  function init() {
    require_once('init/functions.php');
    require_once('hooks/hook-filter.php');
    require_once('hooks/hook-action.php');
  }

  /**
   * Load ACF Json files
   */
  function acfLoadJsonPath($paths) {
    $paths[] = dirname(__FILE__) . '/acf';
    return $paths;
  }

  /**
   * Save ACF Json files 
   */
  function acfSaveJsonPath() {
    return dirname(__FILE__) . '/acf';
  }


}

$zohoData = new Zoho_Data();
