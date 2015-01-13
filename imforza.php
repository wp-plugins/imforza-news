<?php
/*
Plugin Name: imFORZA News
Version: 1.2.5
Plugin URI: //www.imforza.com#utm_source=wpadmin&utm_medium=plugin&utm_campaign=imforzanewsplugin
Description: imFORZA is a Web Design and Marketing company based out of El Segundo, CA. Get quick access to imFORZA Support and the latest marketing news.
Author: imFORZA
Author URI: //www.imforza.com#utm_source=wpadmin&utm_medium=plugin&utm_campaign=imforzanewsplugin
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


// Include WP Engine Cleanup
include_once('admin/wpengine.php');

// Include WP 101 Support
include_once('admin/wp101.php');

// Include Jetpack
include_once('admin/jetpack.php');

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
// imFORZA Support Widget
################################################################################

function imforza_support_dashboard() { ?>

<style>
a.button.imforza-button{background:#f7921e;color:#fff;border:0;font-weight:bold;text-transform:uppercase}a.button.imforza-button:hover{background:#ff971f;color:#fff}
</style>

	<div class="support-widget">
	<div style="text-align:center;">
	<a href="//www.imforza.com" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/supportwidget-logo.png'; ?>" alt="imFORZA" height="60" /></a></div>
	<div style="border-top: 1px solid #ddd; padding-top: 10px; text-align:center;">
		<p><strong>Have a feature request, bug, or other support issue?</strong><br /><br />Visit the <a style="color: #37B34A;" href="//help.imforza.com" target="_blank">imFORZA KnowledgeBase</a> or submit a ticket to get a fast response from our team.</p>
		<p style="text-align: center;">
		<ul class="imforza-button-list">
			<li><a style="cursor: pointer;" class="button imforza-button" href="//help.imforza.com/customer/portal/emails/new" title="imFORZA Web Support" target="_blank">Get Support</a></li>

		</ul>
		</p>

		</div>
	</div>
	<?php
}

add_action('wp_dashboard_setup', 'imforza_support_dashboard_setup');

function imforza_support_dashboard_setup() {
	wp_add_dashboard_widget( 'imforza_support', __( 'imFORZA Support' ), 'imforza_support_dashboard' );
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
	'title' => __( 'imFORZA' ),
	'href' => __('//www.imforza.com/#utm_source=wpadmin&amp;utm_medium=imforzaplugin&amp;utm_campaign=wpadminbar'),
	"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Homepage']);")
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
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Facebook']);")
		));
		// Twitter
		$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_twitter',
			'title' => __( 'Twitter'),
			'href' => __('//twitter.com/imforza'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Twitter']);")
		));
		// Pinterest
		$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_pinterest',
			'title' => __( 'Pinterest'),
			'href' => __('//pinterest.com/imforza'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Pinterest']);")
		));
		// LinkedIn
		$wp_admin_bar->add_menu( array(
			'parent' => 'imforza_social',
			'id'     => 'imforza_linkedin',
			'title' => __( 'LinkedIn'),
			'href' => __('//www.linkedin.com/company/230194'),
			"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'LinkedIn']);")
		));

	// Add sub menu link "Contact Support"
	$wp_admin_bar->add_menu( array(
		'parent' => 'imforza_link',
		'id'     => 'imforza_support',
		'title' => __( 'Support'),
		'href' => __('//help.imforza.com/customer/portal/emails/new'),
		"meta" => array("target" => "blank", "onClick" => "_gaq.push(['_trackEvent', 'imFORZA News Plugin', 'Support']);")
	));

}
add_action('admin_bar_menu', 'add_imforza_admin_bar_link',25);



