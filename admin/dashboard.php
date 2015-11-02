<?php



/**
 * Adds the RSS Feed to the imFORZA News Dashboard Widget
 *
 * @access public
 * @return void
 */
function imforza_news_dashboard_widget(){
	echo '<div id="imforza-latest-news" class="rss-widget">';


	wp_widget_rss_output(array(
			'url' => 'https://www.imforza.com/feed/',  //put your feed URL here
			'title' => __('imFORZA - Latest News', 'imforza'), // Your feed title
			'items' => 3, //how many posts to show
			'show_summary' => 1, // 0 = false and 1 = true
			'show_author' => 0,
			'show_date' => 1
		));

	echo "</div>";
}

// Hook into wp_dashboard_setup and add our imFORZA widget
add_action('wp_dashboard_setup', 'imforza_add_news_dashboard_widget');



/**
 * Adds the imFORZA News Dashboard Widget
 *
 * @access public
 * @return void
 */
function imforza_add_news_dashboard_widget(){
	// Add our RSS widget
	wp_add_dashboard_widget( 'imforza-rss', 'Latest News from imFORZA', 'imforza_news_dashboard_widget');
}




/**
 * Adds the content to the imFORZA Support Dashboard Widget.
 *
 * @access public
 * @return void
 */
function imforza_support_dashboard_widget() { ?>

<style>
a.button.imforza-button{background:#f7921e;color:#fff;border:0;font-weight:bold;text-transform:uppercase}a.button.imforza-button:hover{background:#ff971f;color:#fff}
</style>

	<div class="support-widget">
	<div style="text-align:center;">
	<a href="//www.imforza.com" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/images/supportwidget-logo.png'; ?>" alt="imFORZA" height="60" /></a></div>
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

add_action('wp_dashboard_setup', 'imforza_add_support_dashboard_widget');



/**
 * Adds the imFORZA Support Dashboard Widget
 *
 * @access public
 * @return void
 */
function imforza_add_support_dashboard_widget() {
	wp_add_dashboard_widget( 'imforza_support', __( 'imFORZA Support' ), 'imforza_support_dashboard_widget' );
}







/**
 * Adds the Real Estate Marketing Blog Widget Content
 *
 * @access public
 * @return void
 */
function imforza_realestatenews_dashboard_widget(){
	echo '<div id="imforza-real-estate-marketing-blog" class="rss-widget">';


	wp_widget_rss_output(array(
			'url' => 'http://www.realestatemarketingblog.org/feed/',  //put your feed URL here
			'title' => __('Real Estate Marketing', 'imforza'), // Your feed title
			'items' => 3, //how many posts to show
			'show_summary' => 1, // 0 = false and 1 = true
			'show_author' => 0,
			'show_date' => 1
		));

	echo "</div>";
}

// Hook into wp_dashboard_setup and add our imFORZA widget
add_action('wp_dashboard_setup', 'imforza_add_realestatenews_dashboard_widget');



/**
 * Adds the imFORZA Real Estate News Dashboard Widget
 *
 * @access public
 * @return void
 */
function imforza_add_realestatenews_dashboard_widget(){

	$client_details = get_option('imforza_client_details');

	if ($client_details['industry'] == 'real-estate' ){

	// Add our RSS widget
	wp_add_dashboard_widget( 'imforza-realstate-rss', 'Real Estate Marketing Blog', 'imforza_realestatenews_dashboard_widget');

	}
}








/**
 * Adds the Beanstalk Repo Activity Widget
 *
 * @access public
 * @return void
 */
 /*
function imforza_beanstalk_dashboard_widget(){
	echo '<div id="imforza-beanstalk-dashboard-widget" class="rss-widget">';

	$client_details = get_option('imforza_client_details');


	wp_widget_rss_output(array(
			'url' => esc_url($client_details['beanstalk_feed_url']),  //put your feed URL here
			'title' => __('Theme Development Activity', 'imforza'), // Your feed title
			'items' => 3, //how many posts to show
			'show_summary' => 1, // 0 = false and 1 = true
			'show_author' => 0,
			'show_date' => 1
		));

	echo "</div>";
}
add_action('wp_dashboard_setup', 'imforza_add_beanstalk_dashboard_widget');
*/


/**
 * Adds the imFORZA Real Estate News Dashboard Widget
 *
 * @access public
 * @return void
 */
 /*
function imforza_add_beanstalk_dashboard_widget(){

	$client_details = get_option('imforza_client_details');

	if ( $client_details['beanstalk_feed_url'] != '' ) {

	// Add our RSS widget
	wp_add_dashboard_widget( 'imforza-beanstalk-rss', 'Theme Development Activity', 'imforza_beanstalk_dashboard_widget');

	}

}
*/

