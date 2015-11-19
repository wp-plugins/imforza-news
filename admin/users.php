<?php


/**
 * Creates or Updates the 'imforza-dev' user and it's profile information
 *
 * @access public
 * @return void
 */

function imforza_update_dev_user() {

	if ( username_exists( 'imforza-dev' ) ) {

		$imforza_user_id = username_exists( 'imforza-dev' );

	update_user_meta($imforza_user_id, 'first_name', 'imFORZA');
	update_user_meta($imforza_user_id, 'last_name', 'Team');
	update_user_meta($imforza_user_id, 'nickname', 'imFORZA Team');
	update_user_meta($imforza_user_id, 'description', 'The imFORZA Team is a tight knit team with a diverse background of skills. With over 30 years of combined web development and marketing experience, our eclectic group of experts defines who we are today.');
	update_user_meta($imforza_user_id, 'googleplus', 'https://plus.google.com/+imFORZA');
	update_user_meta($imforza_user_id, 'twitter', 'imforza');
	update_user_meta($imforza_user_id, 'facebook', 'https://www.facebook.com/imforza');
	wp_update_user( array( 'ID' => $imforza_user_id, 'user_url' => '//www.imforza.com', 'display_name' => 'imFORZA Team' ));
	update_user_meta($imforza_user_id, 'imforza_tracking', '1');
	// Yoast SEO
	update_user_meta($imforza_user_id, 'wpseo_excludeauthorsitemap', 'on');
	update_user_meta($imforza_user_id, 'wpseo_title', 'The imFORZA Team');
	update_user_meta($imforza_user_id, 'wpseo_metadesc', 'The imFORZA Team is a tight knit team with a diverse background of skills. With over 30 years of combined web development and marketing experience, our eclectic group of experts defines who we are today.');

	}

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





/**
 * Add imforza green to adminbar if user is imforza-dev
 */
function imforza_dev_colorize() {

	$current_user = wp_get_current_user();


	if ( $current_user->user_login == 'imforza-dev') {
?>

<style>
	<?php if ( is_admin_bar_showing() ) : ?>
		html {padding-top: 3px;}
	<?php endif; ?>
#wpadminbar{border-top:3px solid #37b34a;-moz-box-sizing:content-box!important;box-sizing:content-box!important}
</style>
<?php }
	}


add_filter( 'admin_head', 'imforza_dev_colorize' );
add_filter( 'wp_head', 'imforza_dev_colorize' );




add_action( 'show_user_profile', 'imforza_profile_fields' );
add_action( 'edit_user_profile', 'imforza_profile_fields' );

function imforza_profile_fields( $user ) { ?>

	<h3 id="imforza">imFORZA</h3>

	<table class="form-table">

		<tr>
			<th><label for="tracking">Enable Tracking</label></th>

			<td>

				<select id="imforza_tracking" name="imforza_tracking" placeholder="Select">
					  <option value="0" <?php if ( get_the_author_meta( 'imforza_tracking', $user->ID ) == 0 ){ echo 'selected="selected"'; } ?>>No</option>
					  <option value="1" <?php if ( get_the_author_meta( 'imforza_tracking', $user->ID ) == 1 ){ echo 'selected="selected"'; } ?>>Yes</option>
				</select>
				<br />
				<p class="description">Allow imFORZA to track your WordPress activity to provide better support.</p>
			</td>
		</tr>

	</table>
<?php }



add_action( 'personal_options_update', 'imforza_save_profile_fields' );
add_action( 'edit_user_profile_update', 'imforza_save_profile_fields' );

function imforza_save_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'imforza_tracking', $_POST['imforza_tracking'] );
}




function imforza_tracking() {

	$current_user = wp_get_current_user();

	if ( get_the_author_meta( 'imforza_tracking', $current_user->ID ) == 1 ){

	echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70387128-1', 'auto', {'allowLinker': true});
  ga('require', 'linker');
  ga('send', 'pageview');
  ga('set', 'forceSSL', true);

</script>";

}

}

add_action('admin_footer', 'imforza_tracking');