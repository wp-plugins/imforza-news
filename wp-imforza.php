<?php
/*
Plugin Name: imFORZA News
Version: 1.0
Plugin URI: http://www.imforza.com
Description: imFORZA is a Web Design and Marketing company based out of El Segundo, CA. This plugin adds several features for imFORZA clients to keep up-to-date with the latest information from imFORZA.
Author: The imFORZA Team
Author URI: http://www.imforza.com
License: GPL v3

imFORZA Wordpress Plugin
Copyright (C) 2012, imFORZA LLC support@imforza.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

################################################################################
// imFORZA Welcome Widget
################################################################################
function imforza_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Welcome to your new Website', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo 'Stay up-to-date with the latest marketing news from imFORZA. If you have any questions regarding your website or internet marketing please feel free to contact us at <a href="mailto:support@imforza.com">support@imforza.com</a>.
<br /><br />
<strong>Connect with Us:</strong> <a href="http://imforza.com" target="_blank" >Our Website</a> | <a href="http://www.facebook.com/pages/imFORZA-LLC/139444646068486" target="_blank" >Facebook</a> | <a href="http://twitter.com/imforza" target="_blank" >Twitter</a>';
}

add_action('wp_dashboard_setup', 'imforza_dashboard_widgets');

################################################################################
// imFORZA RSS News Widget
################################################################################
function imforza_rss_output(){
    echo '<div class="rss-widget">';
     
       wp_widget_rss_output(array(
            'url' => 'http://www.imforza.com/feed/',  //put your feed URL here
            'title' => 'Latest News from imforza &amp; Stirred', // Your feed title
            'items' => 3, //how many posts to show
            'show_summary' => 1, // 0 = false and 1 = true 
            'show_author' => 0,
            'show_date' => 1
       ));
       
       echo "</div>";
}

// Hook into wp_dashboard_setup and add our imFORZA widget
add_action('wp_dashboard_setup', 'imforza_rss_widget');
  
// Create the function that adds the imFORZA widget
function imforza_rss_widget(){
  // Add our RSS widget
  wp_add_dashboard_widget( 'imforza-rss', 'Latest News from imFORZA', 'imforza_rss_output');
}

################################################################################
// Add imFORZA Links to Admin Bar 
################################################################################
function add_imforza_admin_bar_link() {
	global $wp_admin_bar;
	if ( !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'imforza_link',
	'title' => __( 'imFORZA'),
	'href' => __('http://imforza.com'),
	"meta" => array("target" => "blank")
	));

	// Add sub menu link "Shop"
	$wp_admin_bar->add_menu( array(
		'parent' => 'imforza_link',
		'id'     => 'imforza_shop',
		'title' => __( 'Shop'),
		'href' => __('http://imforza.com/shop/'),
		"meta" => array("target" => "blank")
	));
	
	// Add sub menu link "Connect"
	$wp_admin_bar->add_menu( array(
		'parent' => 'imforza_link',
		'id'     => 'imforza_social',
		'title' => __( 'Connect'),
		'meta'   => array(
			'class' => 'imfza_menu_social',),
			"meta" => array("target" => "blank")
	));
		// Facebook
		$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_facebook',
			'title' => __( 'Facebook'),
			'href' => __('https://www.facebook.com/pages/imFORZA-LLC/139444646068486'),
			"meta" => array("target" => "blank")
		));
		// Twitter
		$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_twitter',
			'title' => __( 'Twitter'),
			'href' => __('http://twitter.com/imforza'),
			"meta" => array("target" => "blank")
		));
		// Pinterest
		$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_pinterest',
			'title' => __( 'Pinterest'),
			'href' => __('http://pinterest.com/imforza'),
			"meta" => array("target" => "blank")
		));
		// LinkedIn
		$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_linkedin',
			'title' => __( 'LinkedIn'),
			'href' => __('http://www.linkedin.com/company/230194'),
			"meta" => array("target" => "blank")
		));
	
	// Add sub menu link "Contact Support"
	$wp_admin_bar->add_menu( array(
		'parent' => 'imforza_link',
		'id'     => 'imforza_support',
		'title' => __( 'Support'),
		'href' => __('http://www.imforza.com/support/get-support'),
		"meta" => array("target" => "blank")
	));

}
add_action('admin_bar_menu', 'add_imforza_admin_bar_link',25);


################################################################################
// Custom Wordpress Admin Footer
################################################################################
function modify_footer_admin () {
  echo 'Created by <a href="http://www.imforza.com">imFORZA</a>';
}
add_filter('admin_footer_text', 'modify_footer_admin');