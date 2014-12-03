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
	add_action('_admin_menu', 'imforzawpe_remove_editor_menu', 1);
    add_action( 'admin_head', 'imforzawpe_hide_update_notice_to_all_but_admin_users', 1 );
}

/**
 * Remove the WP Engine menu page
 */
function imforzawpe_remove_menu_pages() {
	remove_menu_page( 'wpengine-common' );
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
function imforzawpe_remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

/**
 * Hide Update Nags to non users
 */
function imforzawpe_hide_update_notice_to_all_but_admin_users() {
        remove_action( 'admin_notices', 'update_nag', 3 );
}
