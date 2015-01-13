<?php

// Get Current User Info
require_once(ABSPATH . '/wp-includes/pluggable.php');
global $current_user;
get_currentuserinfo();

/**
 * Add Actions if not imforza-dev
 */
if ( $current_user->user_login != 'wpengine' && $current_user->user_login != 'imforza-dev' && $current_user->user_login != 'imforza-devs' ) {
	add_action( 'admin_init', 'imforzawpe_remove_menu_pages' );
	add_action( 'admin_bar_menu', 'imforzawpe_remove_admin_bar_links', 999 );
    add_action( 'admin_head', 'imforzawpe_hide_update_notice_to_all_but_admin_users', 1 );
}

/**
 * Remove the WP Engine menu page
 */
function imforzawpe_remove_menu_pages() {
	remove_menu_page( 'wpengine-common' ); // WP Engine
	remove_menu_page( 'plugins.php' ); // Plugins
}

/**
 * Remove the "WP Engine Quick Links" from the menu bar
 */
function imforzawpe_remove_admin_bar_links( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wpengine_adminbar' );
}

/**
 * Remove the Theme Editor
 */
add_action('_admin_menu', 'imforzawpe_remove_editor_menu', 1);
function imforzawpe_remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

/**
 * Hide Update Nags to non users
 */
function imforzawpe_hide_update_notice_to_all_but_admin_users() {
        remove_action( 'admin_notices', 'update_nag', 3 );
}





/* Disable Plugin & Editor Access */
if ( !defined('DISALLOW_FILE_EDIT')) {
    define( 'DISALLOW_FILE_EDIT', true );
}


/* Disable Plugin & Theme Update/Install */
/*
    if ( $current_user->user_login != 'wpengine' && $current_user->user_login != 'imforza-dev' && $current_user->user_login != 'imforza-devs' ) {
if ( !defined('DISALLOW_FILE_MODS') ) {
    define( 'DISALLOW_FILE_MODS', true );
}
}
*/

/* Specify maximum number of Revisions. */
/*
if ( !defined('WP_POST_REVISIONS')) {
    define( 'WP_POST_REVISIONS', '3' );
}
*/

/* Empty Trash Days (Every 15) */
/*
if ( !defined('EMPTY_TRASH_DAYS')) {
    define( 'EMPTY_TRASH_DAYS', '15' );
}
*/

