<?php


/**
 * Adds an imFORZA Menu to the WordPress Adminbar
 *
 * @access public
 * @return void
 */
function imforza_adminbar_menu() {


	$client_details = get_option('imforza_client_details');


	global $wp_admin_bar;

	if ( !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
			'id' => 'imforza_link',
			'title' => __( 'imFORZA', 'imforza'),
			'href' => __('//www.imforza.com/#utm_source=wpadmin&amp;utm_medium=imforzaplugin&amp;utm_campaign=wpadminbar'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Homepage']);")
		));


	// Add sub menu link "Internal"
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_link',
			'id'     => 'imforza_internal',
			'title' => __( 'Internal', 'imforza'),
			'meta'   => array(
			'class' => 'imfza_menu_internal',),
			"meta" => array("target" => "blank")
		));
	// Salesforce
	if ( !empty($client_details['sf_acct_url'])) {
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_internal',
			'id'     => 'imforza_salesforce_account',
			'title' => __( 'Salesforce', 'imforza'),
			'href' => esc_url($client_details['sf_acct_url']),
			"meta" => array("target" => "blank")
		));
		}
	// Basecamp
	if ( !empty($client_details['bc_project_url'])) {
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_internal',
			'id'     => 'imforza_basecamp_project',
			'title' => __( 'Basecamp', 'imforza'),
			'href' => esc_url($client_details['bc_project_url']),
			"meta" => array("target" => "blank")
		));
		}
	// Harvest
	if ( !empty($client_details['harvest_url'])) {
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_internal',
			'id'     => 'imforza_harvest_project',
			'title' => __( 'Harvest', 'imforza'),
			'href' => esc_url($client_details['harvest_url']),
			"meta" => array("target" => "blank")
		));
		}
	// Designs
	if ( !empty($client_details['design_url'])) {
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_internal',
			'id'     => 'imforza_designs_project',
			'title' => __( 'Designs', 'imforza'),
			'href' => esc_url($client_details['design_url']),
			"meta" => array("target" => "blank")
		));
		}
	// Beanstalk
	if ( !empty($client_details['beanstalk_url'])) {
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_internal',
			'id'     => 'imforza_beanstalk_project',
			'title' => __( 'Beanstalk', 'imforza'),
			'href' => esc_url($client_details['beanstalk_url']),
			"meta" => array("target" => "blank")
		));
		}


	// Add sub menu link "Connect"
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_link',
			'id'     => 'imforza_social',
			'title' => __( 'Connect', 'imforza'),
			'meta'   => array(
				'class' => 'imfza_menu_social',),
			"meta" => array("target" => "blank")
		));
	// Facebook
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_facebook',
			'title' => __( 'Facebook', 'imforza'),
			'href' => __('https://www.facebook.com/pages/imFORZA-LLC/139444646068486'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Facebook']);")
		));
	// Twitter
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_twitter',
			'title' => __( 'Twitter', 'imforza'),
			'href' => __('//twitter.com/imforza'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Twitter']);")
		));
	// Pinterest
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_pinterest',
			'title' => __( 'Pinterest', 'imforza'),
			'href' => __('//pinterest.com/imforza'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Pinterest']);")
		));
	// LinkedIn
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_linkedin',
			'title' => __( 'LinkedIn', 'imforza'),
			'href' => __('//www.linkedin.com/company/230194'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'LinkedIn']);")
		));

	// Add sub menu link "Contact Support"
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_link',
			'id'     => 'imforza_support',
			'title' => __( 'Support', 'imforza'),
			'href' => __('https://www.imforza.com/support/get-support/'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Support']);")
		));

	// Add sub menu link "Live Chat"
	/*
	$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_link',
			'id'     => 'imforza_support_chat',
			'title' => __( 'Live Chat Support', 'imforza'),
			'href' => __('http://help.imforza.com:443/customer/widget/chats/new?'),
			"meta" => array("target" => "blank")
		));
*/

}
add_action('admin_bar_menu', 'imforza_adminbar_menu',25);






// Hide Adminbar internal links to all users except imforza-dev & wpengine
function imforza_hide_internal_links() {

	// Get Current User Info
require_once(ABSPATH . '/wp-includes/pluggable.php');
global $current_user;
get_currentuserinfo();


	global $wp_admin_bar;

	if ( $current_user->user_login != 'wpengine' && $current_user->user_login != 'imforza-dev' ) {
	$wp_admin_bar->remove_menu('imforza_internal');

	}
}
add_action( 'wp_before_admin_bar_render', 'imforza_hide_internal_links' );
