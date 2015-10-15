<?php

// Get Current User Info
require_once(ABSPATH . '/wp-includes/pluggable.php');
global $current_user;
get_currentuserinfo();

/**
 * Add Actions only if not imforza-dev
 */
if ( $current_user->user_login != 'wpengine' && $current_user->user_login != 'imforza-dev' ) {
	add_action( 'admin_init', 'imforza_remove_menu_pages' );
	add_action( 'admin_bar_menu', 'imforza_remove_admin_bar_links', 999 );
	add_action( 'admin_head', 'imforza_hide_update_notice_to_all_but_admin_users', 1 );
}

/**
 * Remove the WP Engine menu page
 *
 * @access public
 * @return void
 */
function imforza_remove_menu_pages() {
	remove_menu_page( 'wpengine-common' ); // WP Engine
	remove_menu_page( 'plugins.php' ); // Plugins
}


/**
 * Remove the "WP Engine Quick Links" from the menu bar
 *
 * @access public
 * @param mixed $wp_admin_bar
 * @return void
 */
function imforza_remove_admin_bar_links( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wpengine_adminbar' );
}



/**
 * Remove the Theme Editor.
 *
 * @access public
 * @return void
 */
function imforza_remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'imforza_remove_editor_menu', 1);



/**
 * Hide Update Nags to non users
 *
 * @access public
 * @return void
 */
function imforza_hide_update_notice_to_all_but_admin_users() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}



function imforza_wpengine_settings() {

	global $current_user;
	get_currentuserinfo();


/* Disable WP Engine Popup */
if ( !defined('WPE_POPUP_DISABLED')) {
	define( 'WPE_POPUP_DISABLED', true );
}

/* Disable Plugin & Editor Access */
if ( !defined('DISALLOW_FILE_EDIT')) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/* Disable Plugin & Theme Update/Install */
if ( $current_user->user_login != 'wpengine' && $current_user->user_login != 'imforza-dev') {
	if ( !defined('DISALLOW_FILE_MODS') ) {
		define( 'DISALLOW_FILE_MODS', true );
	}
}

/* Specify maximum number of Revisions. */
if ( !defined('WP_POST_REVISIONS')) {
	define( 'WP_POST_REVISIONS', '5' );
}

/* Empty Trash Days (Every 15) */
if ( !defined('EMPTY_TRASH_DAYS')) {
	define( 'EMPTY_TRASH_DAYS', '25' );
}

/* Auto Update Core */
if ( !defined('WP_AUTO_UPDATE_CORE')) {
	define( 'WP_AUTO_UPDATE_CORE', true );
}


/*
Not Yet Ready to Implement auto updates for everything

// Auto Update Plugins
add_filter( 'auto_update_plugin', '__return_true' );

// Auto Update Themes
add_filter( 'auto_update_theme', '__return_true' );

// Disable update emails
add_filter( 'auto_core_update_send_email', '__return_false' );

*/

}
add_action('init', 'imforza_wpengine_settings' );