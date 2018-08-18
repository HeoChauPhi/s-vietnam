<?php
/**
 * Plugin Name: Custom Browsers Detect
 * Description: Detection Browsers
 * Version: 1.0 // Đây là phiên bản đầu tiên của plugin
 * Author: HeoChauA
 * License: GPLv2 or later
 */

// Admin settings.
include_once('custom-browsers-detect.admin.php');

if(is_admin()) {
  $settings = new CustomBrowsersSettingsPage();
}

// Custom Browsers Shortcode
include_once('custom-browsers-detect.shortcodes.php');

// Add script
function custom_browsers_detect_admin_scripts() {
  wp_register_script('jquery-browsers-detect-cookie', plugin_dir_url( __FILE__ ) . 'access/js/libs/jquery.cookie.js', array('jquery'), '1.4.1', TRUE);
  wp_enqueue_script('jquery-browsers-detect-cookie');

  wp_register_script('jquery-custom-browsers-detect', plugin_dir_url( __FILE__ ) . 'access/js/script.js', array('jquery'), '1.0.0', TRUE);
  wp_enqueue_script('jquery-custom-browsers-detect');
}
add_action('wp_print_scripts', 'custom_browsers_detect_admin_scripts');

// Add style
function custom_browsers_detect_admin_styles() {
  wp_register_style( 'styles-custom-browsers-detect', plugin_dir_url( __FILE__ ) . 'access/css/style.css', array(), '1.0', 'all' );
  wp_enqueue_style('styles-custom-browsers-detect');
}
add_action( 'wp_enqueue_scripts', 'custom_browsers_detect_admin_styles' );
