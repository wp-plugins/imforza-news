<?php

    // Remove VideoPress
    function imforzawpe_kill_videopress ( $modules ) {
        unset( $modules['videopress'] );
        return $modules;
    }
    add_filter( 'jetpack_get_available_modules', 'imforzawpe_kill_videopress' );

    // Remove VaultPress
    function imforzawpe_kill_vaultpress ( $modules ) {
        unset( $modules['vaultpress'] );
        return $modules;
    }
    add_filter( 'jetpack_get_available_modules', 'imforzawpe_kill_vaultpress' );

    // Remove Contact Form
    function imforzawpe_kill_contact_form ( $modules ) {
        unset( $modules['contact-form'] );
        return $modules;
    }
    add_filter( 'jetpack_get_available_modules', 'imforzawpe_kill_contact_form' );

    // Remove Site Verification
    function imforzawpe_kill_verification ( $modules ) {
        unset( $modules['verification-tools'] );
        return $modules;
    }
    add_filter( 'jetpack_get_available_modules', 'imforzawpe_kill_verification' );