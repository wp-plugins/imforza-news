<?php
// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

delete_option('imforza');
delete_option('imforza_client_details');

// TODO
// uninstall imforza usermeta