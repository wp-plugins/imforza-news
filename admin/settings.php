<?php


################################################################################
// Add Admin Menu
################################################################################




// create custom plugin settings menu
add_action('admin_menu', 'imforza_create_menu');




function imforza_create_menu() {

	// Add imFORZA Settings Page to Menu
	add_menu_page('imFORZA Settings', 'imFORZA', 'administrator', 'imforza-settings', 'imforza_settings_page', '', 999);

}



add_action( 'admin_menu', 'imforza_hide_menu' );

function imforza_hide_menu() {

	// Get Current User Info
	require_once(ABSPATH . '/wp-includes/pluggable.php');
	global $current_user;
	get_currentuserinfo();

	if ( $current_user->user_login != 'wpengine' && $current_user->user_login != 'imforza-dev' ) {
		remove_menu_page( 'imforza-settings' );
  	}

};



//call register settings function
add_action( 'admin_init', 'imforza_register_settings' );





################################################################################
// Register Settings
################################################################################
function imforza_register_settings() {
	//register our settings
	register_setting( 'imforza-settings-group', 'imforza_client_details' );
}


function imforza_settings_page() {

  if (!current_user_can('manage_options')) wp_die(__("You don't have access to this page"));

  	// Get Current User Info
require_once(ABSPATH . '/wp-includes/pluggable.php');
global $current_user;
get_currentuserinfo();

	if ( $current_user->user_login != 'wpengine' && $current_user->user_login != 'imforza-dev' ) {
		wp_die(__("Sorry, you don't have access to this page."));
		}

?>
<div class="wrap">
<h1><img src="<?php echo plugins_url('../assets/images/settings-page-logo.png', __FILE__);  ?>" alt="imFORZA" width="210" height="60" /></h1>

<div id="icon-options-general" class="icon32"></div>
<?php settings_errors(); ?>

<hr />



<p>This page can only be seen by imFORZA employees, if you are not an imFORZA employee and can see this page please email support@imforza.com for help.</p>

<form method="post" action="options.php">


    <?php settings_fields( 'imforza-settings-group' ); ?>
    <?php do_settings_sections( 'imforza-settings-group' ); ?>

    <?php $client_details = get_option('imforza_client_details'); ?>


    <table class="form-table">


	    <?php /* Questionaire Questions

		    What phrases best describe the business?
		    What phrases are commonly used, but do not properly represent the business?
		    Who are the top 2-3 competitors?
		    How important is locality to the business?
		    Who makes up the target demographic?
		    What stage (in the buying cycle) does the business prefer to attract the most?


		   https://www.imforza.com/support/service-questionnaires/web-development-questionnaire/
		   https://www.imforza.com/support/service-questionnaires/web-marketing-questionnaire/
		   https://www.imforza.com/support/service-questionnaires/content-development-questionnaire/


		    */ ?>



        <tr>
        <th>Industry:</th>
        <td>


	       <select class="widefat" name="imforza_client_details[industry]" placeholder="Choose an Industry">
		   		<option value="" <?php if ($client_details['industry'] == '' ){ echo 'selected="selected"'; } ?> style="color:#ddd;">Choose an Industry</option>
		   		<option value="agriculture" <?php if ($client_details['industry'] == 'agriculture' ){ echo 'selected="selected"'; } ?>>Agriculture</option>
		   		<option value="apparel" <?php if ($client_details['industry'] == 'apparel' ){ echo 'selected="selected"'; } ?>>Apparel</option>
		   		<option value="banking" <?php if ($client_details['industry'] == 'banking' ){ echo 'selected="selected"'; } ?>>Banking</option>
		   		<option value="banking" <?php if ($client_details['industry'] == 'banking' ){ echo 'selected="selected"'; } ?>>Banking</option>
		   		<option value="biotechnology" <?php if ($client_details['industry'] == 'biotechnology' ){ echo 'selected="selected"'; } ?>>Biotechnology</option>
		   		<option value="chemicals" <?php if ($client_details['industry'] == 'chemicals' ){ echo 'selected="selected"'; } ?>>Chemicals</option>
		   		<option value="communications" <?php if ($client_details['industry'] == 'communications' ){ echo 'selected="selected"'; } ?>>Communications</option>
		   		<option value="construction" <?php if ($client_details['industry'] == 'construction' ){ echo 'selected="selected"'; } ?>>Construction</option>
		   		<option value="consulting" <?php if ($client_details['industry'] == 'consulting' ){ echo 'selected="selected"'; } ?>>Consulting</option>
		   		<option value="education" <?php if ($client_details['industry'] == 'education' ){ echo 'selected="selected"'; } ?>>Education</option>
		   		<option value="electronics" <?php if ($client_details['industry'] == 'electronics' ){ echo 'selected="selected"'; } ?>>Electronics</option>
		   		<option value="energy" <?php if ($client_details['industry'] == 'energy' ){ echo 'selected="selected"'; } ?>>Energy</option>
		   		<option value="engineering" <?php if ($client_details['industry'] == 'engineering' ){ echo 'selected="selected"'; } ?>>Engineering</option>
		   		<option value="entertainment" <?php if ($client_details['industry'] == 'entertainment' ){ echo 'selected="selected"'; } ?>>Entertainment</option>
		   		<option value="environmental" <?php if ($client_details['industry'] == 'environmental' ){ echo 'selected="selected"'; } ?>>Environmental</option>
		   		<option value="finance" <?php if ($client_details['industry'] == 'finance' ){ echo 'selected="selected"'; } ?>>Finance</option>
		   		<option value="food-and-beverage" <?php if ($client_details['industry'] == 'food-and-beverage' ){ echo 'selected="selected"'; } ?>>Food & Beverage</option>
		   		<option value="government" <?php if ($client_details['industry'] == 'government' ){ echo 'selected="selected"'; } ?>>Government</option>
		   		<option value="healthcare" <?php if ($client_details['industry'] == 'healthcare' ){ echo 'selected="selected"'; } ?>>Healthcare</option>
		   		<option value="hospitality" <?php if ($client_details['industry'] == 'hospitality' ){ echo 'selected="selected"'; } ?>>Hospitality</option>
		   		<option value="insurance" <?php if ($client_details['industry'] == 'insurance' ){ echo 'selected="selected"'; } ?>>Insurance</option>
		   		<option value="legal" <?php if ($client_details['industry'] == 'legal' ){ echo 'selected="selected"'; } ?>>Legal</option>
		   		<option value="machinery" <?php if ($client_details['industry'] == 'machinery' ){ echo 'selected="selected"'; } ?>>Machinery</option>
		   		<option value="manufacturing" <?php if ($client_details['industry'] == 'manufacturing' ){ echo 'selected="selected"'; } ?>>Manufacturing</option>
		   		<option value="media" <?php if ($client_details['industry'] == 'media' ){ echo 'selected="selected"'; } ?>>Media</option>
		   		<option value="not-for-profit" <?php if ($client_details['industry'] == 'not-for-profit' ){ echo 'selected="selected"'; } ?>>Not for Profit</option>
		   		<option value="other" <?php if ($client_details['industry'] == 'other' ){ echo 'selected="selected"'; } ?>>Other</option>
		   		<option value="real-estate" <?php if ($client_details['industry'] == 'real-estate' ){ echo 'selected="selected"'; } ?>>Real Estate</option>
		   		<option value="recreation" <?php if ($client_details['industry'] == 'recreation' ){ echo 'selected="selected"'; } ?>>Recreation</option>
		   		<option value="retail" <?php if ($client_details['industry'] == 'retail' ){ echo 'selected="selected"'; } ?>>Retail</option>
		   		<option value="shipping" <?php if ($client_details['industry'] == 'shipping' ){ echo 'selected="selected"'; } ?>>Shipping</option>
		   		<option value="technology" <?php if ($client_details['industry'] == 'technology' ){ echo 'selected="selected"'; } ?>>Technology</option>
		   		<option value="telecommunications" <?php if ($client_details['industry'] == 'telecommunications' ){ echo 'selected="selected"'; } ?>>Telecommunications</option>
		   		<option value="transportation" <?php if ($client_details['industry'] == 'transportation' ){ echo 'selected="selected"'; } ?>>Transportation</option>
		   		<option value="utilities" <?php if ($client_details['industry'] == 'utilities' ){ echo 'selected="selected"'; } ?>>Utilities</option>
		  </select>
		    </td>
        </tr>

        <tr>
	        <th>Website Type:</th>
	        <td>
 <label>
		        <input type="radio" name="imforza_client_details[site_type]" id="" value="template" <?php if ($client_details['site_type'] == 'template' ){ echo 'checked="checked"'; } ?>> Template </label><br /><br />
		      <label>   <input type="radio" name="imforza_client_details[site_type]" id="" value="custom" <?php if ($client_details['site_type'] == 'custom' ){ echo 'checked="checked"'; } ?>> Custom </label>

	        </td>
        </tr>

		<tr>
		 <th><label for="imforza_sfaccountid_input">Salesforce Account URL:</label></th>
		<td>
		<input type="text" id='imforza_sfaccountid_input' name="imforza_client_details[sf_acct_url]" style="width:500px;" value="<?php if ( !empty($client_details['sf_acct_url']) != '' ) { echo $client_details['sf_acct_url']; } ?>" placeholder="Salesforce Account URL" /></input>
        </td>
        </tr>


        <tr>
		 <th><label for="imforza_bcproject_input">Basecamp Project URL:</label></th>
		<td>
		<input type="text" id='imforza_bcproject_input' name="imforza_client_details[bc_project_url]" style="width:500px;" value="<?php if ( !empty($client_details['bc_project_url']) != '' ) { echo $client_details['bc_project_url']; } ?>" placeholder="Basecamp Project URL" /></input>
        </td>
        </tr>


        <tr>
		 <th><label for="imforza_harvest_input">Harvest Project URL:</label></th>
		<td>
		<input type="text" id='imforza_harvest_input' name="imforza_client_details[harvest_url]" style="width:500px;" value="<?php if ( !empty($client_details['harvest_url']) != '' ) { echo $client_details['harvest_url']; } ?>" placeholder="Harvest URL" /></input>
        </td>
        </tr>

        <tr>
		 <th><label for="imforza_design_input">Design (comps) URL:</label></th>
		<td>
		<input type="text" id='imforza_design_input' name="imforza_client_details[design_url]" style="width:500px;" value="<?php if ( !empty($client_details['design_url']) != '' ) { echo $client_details['design_url']; } ?>" placeholder="Design URL" /></input>
        </td>
        </tr>


        <tr>
		 <th><label for="imforza_beanstalk_input">Beanstalk URL:</label></th>
		<td>
		<input type="text" id='imforza_beanstalk_input' name="imforza_client_details[beanstalk_url]" style="width:500px;" value="<?php if ( !empty($client_details['beanstalk_url']) != '' ) { echo $client_details['beanstalk_url']; } ?>" placeholder="Beanstalk URL" /></input>
        </td>
        </tr>

        <tr>
		 <th><label for="imforza_beanstalkfeed_input">Beanstalk RSS Feed URL:</label></th>
		<td>
		<input type="text" id='imforza_beanstalkfeed_input' name="imforza_client_details[beanstalk_feed_url]" style="width:500px;" value="<?php if ( !empty($client_details['beanstalk_feed_url']) != '' ) { echo $client_details['beanstalk_feed_url']; } ?>" placeholder="Beanstalk RSS URL" /></input>
        </td>
        </tr>

        <!--
	        Site Launch Date / Notes Sections
	    -->

    </table>

    <input class='button-primary' type='submit' name='Save' value='Save Changes' id='submitbutton' />

</form>
</div><!-- end wrap -->




<?php }



##################################################################
# Run Actions on Save
##################################################################
/*
add_action( 'load-imforza_settings_page', 'imforza_settings_save');
function imforza_settings_save() {
  if(isset($_GET['settings-updated']) && $_GET['settings-updated'])
   {

   }
}
*/

