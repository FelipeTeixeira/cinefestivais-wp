<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/* ---------------------------------------------------------------------------------------------- */
/* UTILITIES ==================================================================================== */
/* ---------------------------------------------------------------------------------------------- */

/**
 * Get taxonomies where the thumbnail UI will be displayed.
 *
 * @since 1.0.0
 *
 * @return (array) An array like `array( "category" => "category", "post_tag" => "post_tag" )`.
 */
function sftth_get_taxonomies() {
	$taxonomies = get_taxonomies( array(
		'public'  => true,
		'show_ui' => true,
	) );

	/**
	 * Filter allowing to change the taxonomies for which to display the UI.
	 *
	 * @since 1.0.0
	 *
	 * @param (array) list of taxonomies.
	 */
	return apply_filters( 'sftth_taxonomies', $taxonomies );
}


/**
 * Tells if we can use the WordPress 4.4+ term metas API.
 *
 * @since 1.2.0
 *
 * @return (bool) true if the API exists and the database has the termmeta table.
 */
function sftth_is_wp44() {
	static $is_wp44;

	if ( ! isset( $is_wp44 ) ) {
		$is_wp44 = function_exists( 'get_term_meta' ) && get_option( 'db_version' ) >= 34370;
	}

	return $is_wp44;
}


/**
 * Tells if the plugin "Meta for Taxonomies" is activated.
 *
 * @since 1.0.0
 *
 * @return (bool) true if the plugin is activated.
 */
function sftth_has_term_meta_plugin() {
	static $has_term_meta_plugin;

	if ( ! isset( $has_term_meta_plugin ) ) {
		$has_term_meta_plugin = function_exists( 'add_term_taxonomy_meta' );
	}

	return $has_term_meta_plugin;
}


if ( ! function_exists( 'doing_ajax' ) ) :
	/**
	 * Tells if we're in a WP ajax call.
	 *
	 * @since 1.0.0
	 *
	 * @return (bool) true if we're "doing ajax".
	 */
	function doing_ajax() {
		return defined( 'DOING_AJAX' ) && DOING_AJAX && is_admin();
	}
endif;
