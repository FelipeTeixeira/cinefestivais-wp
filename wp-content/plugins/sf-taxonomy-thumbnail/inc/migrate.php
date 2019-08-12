<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/* ---------------------------------------------------------------------------------------------- */
/* MIGRATE ====================================================================================== */
/* ---------------------------------------------------------------------------------------------- */

/**
 * Migrate from "Meta for Taxonomies" to WP 4.4 metas.
 *
 * @since 1.2.0
 *
 * @return (bool) True if data have been migrated.
 */
function sftth_migrate_from_taxometa_to_termmeta() {
	if ( ! sftth_is_wp44() ) {
		return false;
	}

	// Get old metas.
	$metas = sftth_get_all_metas_from_taxometa( true );

	// Delete old metas.
	delete_metadata( 'term_taxo', false, '_thumbnail_id', false, true );

	if ( ! $metas ) {
		return false;
	}

	// Create new metas.
	foreach ( $metas as $meta ) {
		update_term_meta( absint( $meta->term_id ), '_thumbnail_id', absint( $meta->meta_value ) );
	}

	return true;
}


/**
 * Migrate from the option to WP 4.4 metas.
 *
 * @since 1.2.0
 *
 * @return (bool) True if data have been migrated.
 */
function sftth_migrate_from_option_to_termmeta() {
	if ( ! sftth_is_wp44() ) {
		return false;
	}

	// Get old metas.
	$option = sftth_get_all_metas_from_option( true );

	// Delete old metas.
	delete_option( SFTTH_OPTION_NAME );

	if ( ! $option ) {
		return false;
	}

	// Create new metas.
	foreach ( $option as $term_id => $thumbnail_id ) {
		update_term_meta( $term_id, '_thumbnail_id', $thumbnail_id );
	}

	return true;
}


/**
 * Migrate from the option to "Meta for Taxonomies".
 *
 * @since 1.2.0
 *
 * @return (bool) True if data have been migrated.
 */
function sftth_migrate_from_option_to_taxometa() {
	if ( ! sftth_has_term_meta_plugin() ) {
		return false;
	}

	// Get old metas.
	$option = sftth_get_all_metas_from_option();

	// Delete old metas.
	delete_option( SFTTH_OPTION_NAME );

	if ( ! $option ) {
		return false;
	}

	// Create new metas.
	foreach ( $option as $tt_id => $thumbnail_id ) {
		update_term_taxonomy_meta( $tt_id, '_thumbnail_id', $thumbnail_id );
	}

	return true;
}


/**
 * Migrate from "Meta for Taxonomies" to the option.
 *
 * @since 1.2.0
 *
 * @return (bool) True if data have been migrated.
 */
function sftth_migrate_from_taxometa_to_option() {
	// Get old metas.
	$metas = sftth_get_all_metas_from_taxometa();

	// Delete old metas.
	delete_metadata( 'term_taxo', false, '_thumbnail_id', false, true );

	if ( ! $metas ) {
		return false;
	}

	// Create new option.
	$option = array();

	foreach ( $metas as $meta ) {
		$option[ absint( $meta->term_taxo_id ) ] = absint( $meta->meta_value );
	}

	update_option( SFTTH_OPTION_NAME, $option );

	return true;
}


/* ---------------------------------------------------------------------------------------------- */
/* MIGRATE DATA TO WP 4.4. ====================================================================== */
/* ---------------------------------------------------------------------------------------------- */

/**
 * Migrate old data to WP 4.4 metas.
 *
 * @since 1.2.0
 */
function sftth_migrate_to_wp44() {
	if ( ! sftth_is_wp44() || get_option( 'sftth_version' ) ) {
		return;
	}

	/**
	 * Filter providing a way to skip the migration process. Simply filter with `__return_true`.
	 *
	 * @since 1.2.0
	 *
	 * @param (bool) true if the migration must be skipped.
	 */
	if ( apply_filters( 'sftth_skip_migration_to_wp44', false ) ) {
		add_option( 'sftth_version', SFTTH_VERSION );
		return;
	}

	if ( ! sftth_migrate_from_taxometa_to_termmeta() ) {
		sftth_migrate_from_option_to_termmeta();
	}

	add_option( 'sftth_version', SFTTH_VERSION );

	/**
	 * Fires after the migration to WordPress 4.4 term metas API is done.
	 *
	 * @since 1.2.0
	 */
	do_action( 'sftth_migration_to_wp44_done' );
}


/* ---------------------------------------------------------------------------------------------- */
/* GETTERS ====================================================================================== */
/* ---------------------------------------------------------------------------------------------- */

/**
 * Get the option, sanitize, make sure the thumbnails exist.
 *
 * @since 1.2.0
 *
 * @param (bool) $use_term_id The WP 4.4 term metas API uses `term_id` as identifier, not `term_taxonomy_id`.
 *               Setting this parameter to true will return `term_id` instead of `term_taxonomy_id`.
 *
 * @return (array) Array of metas.
 */
function sftth_get_all_metas_from_option( $use_term_id = false ) {
	global $wpdb;

	// Get the option.
	$option = get_option( SFTTH_OPTION_NAME );

	if ( ! $option ) {
		return array();
	}

	// Sanitize.
	$tmp = array();
	foreach ( $option as $tt_id => $thumbnail_id ) {
		$tt_id        = absint( $tt_id );
		$thumbnail_id = absint( $thumbnail_id );

		if ( $tt_id && $thumbnail_id ) {
			$tmp[ $tt_id ] = $thumbnail_id;
		}
	}
	$option = $tmp;

	if ( ! $option ) {
		return array();
	}

	if ( $use_term_id ) {
		$tt_ids = implode( ',', array_unique( array_keys( $option ) ) );

		// Get old metas and make sure terms and thumbnails exist.
		$t_and_tts = $wpdb->get_results( // WPCS: unprepared SQL ok.
			"
			SELECT term_id, term_taxonomy_id
			FROM $wpdb->term_taxonomy
			WHERE term_taxonomy_id IN ( $tt_ids )"
		);

		$tmp = array();
		foreach ( $t_and_tts as $t_and_tt ) {
			$t_id  = absint( $t_and_tt->term_id );
			$tt_id = absint( $t_and_tt->term_taxonomy_id );

			if ( $t_id && $tt_id && isset( $option[ $tt_id ] ) ) {
				$tmp[ $t_id ] = $option[ $tt_id ];
			}
		}
		$option = $tmp;
	}

	// Make sure the thumbnails exist.
	$thumbnails = get_posts( array(
		'post_type'      => 'attachment',
		'post_mime_type' => 'image/',
		'post__in'       => array_unique( $option ),
		'posts_per_page' => -1,
		'fields'         => 'ids',
	) );

	if ( ! $thumbnails ) {
		return array();
	}

	$thumbnails = array_map( 'absint', $thumbnails );

	return array_intersect( $option, $thumbnails );
}


/**
 * Get metas from "Meta for Taxonomies", sanitize, make sure terms and thumbnails exist.
 *
 * @since 1.2.0
 *
 * @param (bool) $use_term_id The WP 4.4 term metas API uses `term_id` as identifier, not `term_taxonomy_id`.
 *               Setting this parameter to true will return `term_id` instead of `term_taxonomy_id`.
 *
 * @return (array) Array of metas.
 */
function sftth_get_all_metas_from_taxometa( $use_term_id = false ) {
	global $wpdb;

	// Test if the table exists.
	$table  = $wpdb->prefix . 'term_taxometa';
	$exists = $wpdb->get_var( "SHOW TABLES LIKE '$table'" ); // WPCS: unprepared SQL ok.

	if ( ! $exists ) {
		return array();
	}

	$field = $use_term_id ? 'tt.term_id' : 'tt.term_taxonomy_id';

	// Get old metas and make sure terms and thumbnails exist.
	$metas = $wpdb->get_results( // WPCS: unprepared SQL ok.
		"
		SELECT $field, ttm.meta_value
		FROM $table AS ttm
		INNER JOIN $wpdb->term_taxonomy AS tt
			ON tt.term_taxonomy_id = ttm.term_taxo_id
		INNER JOIN $wpdb->posts AS p
			ON p.ID = ttm.meta_value
		WHERE ttm.meta_key = '_thumbnail_id'
			AND CAST( ttm.meta_value AS SIGNED ) > 0
			AND p.post_type = 'attachment'
			AND p.post_mime_type LIKE 'image/%'"
	);

	return $metas;
}
