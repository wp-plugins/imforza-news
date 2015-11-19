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
.imforza-support-widget {text-align: center;} .imforza-links li {display: inline-block;padding: 10px;text-align: center;} .imforza-links .dashicons { clear:both; display:block;margin: 3px auto; color: #333;} .imforza-links li a {color: #333;font-weight: bold;} .imforza-links li a:hover { color:#37B34A; }
</style>

	<div class="imforza-support-widget">

	<a href="//www.imforza.com" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . '../assets/images/supportwidget-logo.png'; ?>" alt="imFORZA" height="60" /></a>



<ul class="imforza-links">
	<?php
	if ( is_plugin_active( 'wp101/wp101.php' ) ) {
		echo '<li><a href="admin.php?page=wp101"><span class="dashicons dashicons-video-alt3"></span> Video Guides</a></li>';
	}
?>
	<li><a href="//help.imforza.com" target="_blank"><span class="dashicons dashicons-book"></span> KnowledgeBase</a></li>
	<!-- <li><a href="https://help.imforza.com/customer/portal/chats/new" target="_blank"><span class="dashicons dashicons-format-chat"></span> Live Chat</a></li> -->
	<li><a href="mailto:support@imforza.com"><span class="dashicons dashicons-email"></span> Email Support</a></li>

</ul>


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

