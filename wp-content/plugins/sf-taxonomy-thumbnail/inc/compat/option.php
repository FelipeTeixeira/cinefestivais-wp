<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/* ---------------------------------------------------------------------------------------------- */
/* IF "META FOR TAXONOMIES" IS NOT INSTALLED ==================================================== */
/* ---------------------------------------------------------------------------------------------- */

// When the plugin "Meta for Taxonomies" is not installed, the thumbnail IDs are stored in an option.

/**
 * Get term thumbnails.
 *
 * @since 1.0.0
 *
 * @param (int) $term_taxonomy_id The term taxonomy ID.
 *
 * @return (array) An array like `array( term_taxonomy_id => thumbnail_id, term_taxonomy_id => thumbnail_id )`.
 */
function sftth_get_option( $term_taxonomy_id = null ) {
	static $out;

	/**
	 * Filter allowing to clear the option cache: the option will be fetched and sanitized again. Simply filter with `__return_true`.
	 *
	 * @since 1.0.0
	 *
	 * @param (bool) true to clear the cache.
	 */
	if ( apply_filters( 'sftth_terms_thumbnail_clear_options_cache', false ) ) {
		$out = null;
		remove_all_filters( 'sftth_terms_thumbnail_clear_options_cache' );
	}

	if ( ! isset( $out ) ) {
		$out    = array();
		$option = get_option( SFTTH_OPTION_NAME );

		if ( $option ) {
			foreach ( $option as $tt_id => $thumbnail_id ) {
				$tt_id        = absint( $tt_id );
				$thumbnail_id = absint( $thumbnail_id );

				if ( $tt_id && $thumbnail_id ) {
					$out[ $tt_id ] = $thumbnail_id;
				}
			}
		}
	}

	if ( $term_taxonomy_id ) {
		return isset( $out[ $term_taxonomy_id ] ) ? $out[ $term_taxonomy_id ] : false;
	}

	return $out;
}


/**
 * Update/delete a term thumbnail.
 *
 * @since 1.0.0
 *
 * @param (int) $term_taxonomy_id The term taxonomy ID.
 * @param (int) $thumbnail_id     The thumbnail ID.
 *
 * @return (bool) True if the option has been updated.
 */
function sftth_update_option( $term_taxonomy_id, $thumbnail_id ) {
	if ( ! $term_taxonomy_id ) {
		return false;
	}

	$option = sftth_get_option();

	if ( $thumbnail_id && wp_get_attachment_image( $thumbnail_id, 'thumbnail' ) ) {
		$option[ $term_taxonomy_id ] = $thumbnail_id;
	}
	elseif ( ! isset( $option[ $term_taxonomy_id ] ) ) {
		return false;
	}
	else {
		unset( $option[ $term_taxonomy_id ] );
	}

	if ( $option ) {
		if ( update_option( SFTTH_OPTION_NAME, $option ) ) {
			add_filter( 'sftth_terms_thumbnail_clear_options_cache', '__return_true' );
			return true;
		}

		return false;
	}

	if ( delete_option( SFTTH_OPTION_NAME ) ) {
		add_filter( 'sftth_terms_thumbnail_clear_options_cache', '__return_true' );
		return true;
	}

	return false;
}


add_action( 'deleted_term_taxonomy', 'sftth_option_deleted_term_taxonomy' );
/**
 * When a term is deleted, remove its term_taxonomy_id from our option.
 *
 * @since 1.0.0
 *
 * @param (int) $term_taxonomy_id The term taxonomy ID.
 */
function sftth_option_deleted_term_taxonomy( $term_taxonomy_id ) {
	sftth_update_option( $term_taxonomy_id, false );
}
