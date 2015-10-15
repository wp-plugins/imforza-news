<?php


/**
 * Adds an imFORZA Menu to the WordPress Adminbar
 *
 * @access public
 * @return void
 */
function imforza_adminbar_menu() {
	global $wp_admin_bar;
	if ( !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
			'id' => 'imforza_link',
			'title' => __( 'imFORZA', 'imforza'),
			'href' => __('//www.imforza.com/#utm_source=wpadmin&amp;utm_medium=imforzaplugin&amp;utm_campaign=wpadminbar'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Homepage']);")
		));

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
			'href' => __('//help.imforza.com/customer/portal/emails/new'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Support']);")
		));

}
add_action('admin_bar_menu', 'imforza_adminbar_menu',25);
