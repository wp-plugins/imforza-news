<?php
/*
Plugin Name: imFORZA
Version: 1.2.8
Plugin URI: //www.imforza.com#utm_source=wpadmin&utm_medium=plugin&utm_campaign=imforzanewsplugin
Description: imFORZA is a Web Design and Marketing company based out of El Segundo, CA. Get quick access to imFORZA Support and the latest marketing news.
Author: imFORZA
Author URI: //www.imforza.com#utm_source=wpadmin&utm_medium=plugin&utm_campaign=imforzanewsplugin
Text Domain: imforza-news
License: GPL v3

*/



// Define Plugin Version
define( 'IMFORZA_PLUGIN_VERSION', '1.2.8' );


// Add Language Support
load_plugin_textdomain( 'imforza', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );


include_once('admin/settings.php');

// Include Users
include_once('admin/users.php');

// Include AdminBar
include_once('admin/adminbar.php');

// Include Dashboard
include_once('admin/dashboard.php');

// Include WP Engine Cleanup
include_once('modules/wpengine.php');

// Include WP 101 Support
include_once('modules/wp101.php');



/**
 * Activation Function.
 *
 * @access public
 * @return void
 */
function imforza_activation() {
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'imforza_activation' );



/**
 * De-activation Function
 *
 * @access public
 * @return void
 */
function imforza_deactivation() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'imforza_deactivation' );