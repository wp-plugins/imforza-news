<?php


/**
 * Creates or Updates the 'imforza-dev' user and it's profile information
 *
 * @access public
 * @return void
 */
function imforza_update_dev_user() {

	$imforza_user = get_user_by('login', 'imforza-dev');
	$imforza_user_id = $imforza_user->ID;
	update_user_meta($imforza_user_id, 'first_name', 'imFORZA');
	update_user_meta($imforza_user_id, 'last_name', 'Team');
	update_user_meta($imforza_user_id, 'nickname', 'imFORZA Team');
	update_user_meta($imforza_user_id, 'description', 'The imFORZA Team is a tight knit team with a diverse background of skills. With over 30 years of combined web development and marketing experience, our eclectic group of experts defines who we are today.');
	update_user_meta($imforza_user_id, 'googleplus', 'https://plus.google.com/+imFORZA');
	update_user_meta($imforza_user_id, 'twitter', 'imforza');
	update_user_meta($imforza_user_id, 'facebook', 'https://www.facebook.com/imforza');
	wp_update_user( array( 'ID' => $imforza_user_id, 'user_url' => '//www.imforza.com', 'display_name' => 'imFORZA Team' ));
	// Yoast SEO
	update_user_meta($imforza_user_id, 'wpseo_excludeauthorsitemap', 'on');
	update_user_meta($imforza_user_id, 'wpseo_title', 'The imFORZA Team');
	update_user_meta($imforza_user_id, 'wpseo_metadesc', 'The imFORZA Team is a tight knit team with a diverse background of skills. With over 30 years of combined web development and marketing experience, our eclectic group of experts defines who we are today.');

}
add_action('init', 'imforza_update_dev_user');



/**
 * Sets noindex for the imforza-dev author archive pages.
 *
 * @access public
 * @return void
 */
function imforza_noindex_author() {
	if (is_author( 'imforza-dev' )) {

		echo '<meta name="robots" content="noindex">';
	}
}

add_action('wp_head', 'imforza_noindex_author');
