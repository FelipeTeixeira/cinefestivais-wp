<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die();
}


delete_option( 'sftth_version' );


if ( defined( 'SFTTH_KEEP_DATA' ) && SFTTH_KEEP_DATA ) {
	return;
}

if ( ! defined( 'SFTTH_OPTION_NAME' ) ) {
	define( 'SFTTH_OPTION_NAME', 'sftth_terms_thumbnail' );
}

delete_option( SFTTH_OPTION_NAME );

// WP 4.4.
if ( function_exists( 'get_term_meta' ) && get_option( 'db_version' ) >= 34370 ) {
	delete_metadata( 'term', false, '_thumbnail_id', '', true );
}
// Plugin "Meta for Taxonomies".
if ( function_exists( 'delete_term_taxonomy_meta' ) ) {
	delete_term_taxonomy_meta( false, '_thumbnail_id', false, true );
}
