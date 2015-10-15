<?php


/**
 * Customize WP101 Videos for imFORZA Websites
 *
 * @access public
 * @return void
 */
function imforza_customize_wp101() {

	// Hide Select Videos that are not applicable for our clients
	update_option( 'wp101_hidden_topics', array('14', '17', '18', '19', '20', 'wpseo.9', 'wpseo.10', 'wpseo.11', 'wpseo.12', 'wpseo.13', 'wpseo.14', 'wpseo.15', 'wpseo.16','wpseo.17') );


	// Add Custom Videos for our Clients
	add_filter( 'wp101_get_custom_help_topics', function( $custom_videos ) {

			$custom_videos['idxbroker.1'] = array(
				'id'      => 'idxbroker.1',
				'title'   => 'IDX Broker: Getting Started',
				'content' => '<iframe width="560" height="315" src="//www.youtube.com/embed/Gm-R4l23tp8?rel=0&showinfo=0&controls=1&vq=hd1080&modestbranding=1" frameborder="0" allowfullscreen></iframe>'
			);

			$custom_videos['idxbroker.2'] = array(
				'id'      => 'idxbroker.2',
				'title'   => 'IDX Broker: Creating/Managing Pages',
				'content' => '<iframe width="560" height="315" src="//www.youtube.com/embed/cHg-Gx5P_Uo?rel=0&showinfo=0&controls=1&vq=hd1080&modestbranding=1" frameborder="0" allowfullscreen></iframe>'
			);

			$custom_videos['idxbroker.3'] = array(
				'id'      => 'idxbroker.3',
				'title'   => 'IDX Broker: Social and Facebook',
				'content' => '<iframe width="560" height="315" src="//www.youtube.com/embed/GvvsVgp_PLI?rel=0&showinfo=0&controls=1&vq=hd1080&modestbranding=1" frameborder="0" allowfullscreen></iframe>'
			);

			$custom_videos['idxbroker.4'] = array(
				'id'      => 'idxbroker.4',
				'title'   => 'IDX Broker: Lead Management',
				'content' => '<iframe width="560" height="315" src="//www.youtube.com/embed/jU5Z0z_GOHA?rel=0&showinfo=0&controls=1&vq=hd1080&modestbranding=1" frameborder="0" allowfullscreen></iframe>'
			);

			return $custom_videos;
		} );

		// TODO
		// Lock down the seetings page to only the imforza-dev user, wp101 plugin has an option to set this already.

}

add_action('init', 'imforza_customize_wp101');
