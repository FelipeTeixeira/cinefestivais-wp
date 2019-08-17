<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/* ---------------------------------------------------------------------------------------------- */
/* FILTERS (WP < 4.4 ) ========================================================================== */
/* ---------------------------------------------------------------------------------------------- */

add_filter( 'terms_clauses', 'sftth_terms_clauses_filter_compat', 10, 3 );
/**
 * When using `get_terms()`, add the parameter `"with_thumbnail" => true` to return only terms with a thumbnail.
 * Side note: `"with_thumbnail" => false` will return ALL terms, not only the ones without thumbnail.
 *
 * This filter adds `WHERE` and/or `JOIN` clauses.
 *
 * @since 1.0.0
 *
 * @param (array) $clauses    Terms query SQL clauses.
 * @param (array) $taxonomies An array of taxonomies.
 * @param (array) $args       An array of terms query arguments.
 *
 * @return An array of arguments.
 */
function sftth_terms_clauses_filter_compat( $clauses, $taxonomies, $args ) {
	global $wpdb;

	if ( empty( $args['with_thumbnail'] ) ) {
		return $clauses;
	}

	// With "Meta for Taxonomies" plugin.
	if ( sftth_has_term_meta_plugin() ) {
		$clauses['join']   = ! empty( $clauses['join'] ) ? $clauses['join'] : '';
		$clauses['join']  .= " INNER JOIN $wpdb->term_taxometa AS ttm ON t.term_id = ttm.term_taxo_id";

		$clauses['where']  = ! empty( $clauses['where'] ) ? $clauses['where'] : '';
		$clauses['where'] .= " AND ttm.meta_key = '_thumbnail_id' AND CAST( ttm.meta_value AS SIGNED ) > 0";
	}
	// Without "Meta for Taxonomies" plugin.
	else {
		$option = sftth_get_option();
		$option = implode( ',', array_keys( $option ) );

		$clauses['where']  = ! empty( $clauses['where'] ) ? $clauses['where'] : '';
		$clauses['where'] .= " AND tt.term_taxonomy_id IN ( $option )";
	}

	return $clauses;
}


if ( sftth_has_term_meta_plugin() ) {
	add_filter( 'get_terms', 'sftth_get_terms_cache_filter_compat', 10, 3 );
}
/**
 * When using `get_terms()` with "Meta for Taxonomies" plugin and the parameter `with_thumbnail` is set, put thumbnail IDs in cache.
 * Hint: `"with_thumbnail" => false` will cache thumbnails and return ALL terms.
 * The downside is it will work only if the `fields` parameter is set to `all`.
 *
 * This filter simply updates the "termmeta" cache on `get_terms()` output.
 *
 * @since 1.0.0
 *
 * @param (array) $terms      Cached array of terms for the given taxonomy.
 * @param (array) $taxonomies An array of taxonomies.
 * @param (array) $args       An array of get_terms() arguments.
 */
function sftth_get_terms_cache_filter_compat( $terms, $taxonomies, $args ) {

	if ( $terms && 'all' === $args['fields'] && isset( $args['with_thumbnail'] ) && sftth_has_term_meta_plugin() ) {
		update_termmeta_cache( wp_list_pluck( $terms, 'term_taxonomy_id' ) );
	}

	return $terms;
}


add_action( 'delete_attachment', 'sftth_delete_attachment_filter_compat' );
/**
 * When an attachment is deleted, remove the meta from the terms that have this attachment as thumbnail.
 *
 * @since 1.2.0
 *
 * @param (int) $post_id Attachment ID.
 */
function sftth_delete_attachment_filter_compat( $post_id ) {
	$post_id = absint( $post_id );

	// With "Meta for Taxonomies" plugin.
	if ( sftth_has_term_meta_plugin() ) {
		return delete_term_taxonomy_meta( 0, '_thumbnail_id', $post_id, true );
	}

	// Without "Meta for Taxonomies" plugin.
	$option = sftth_get_option();

	if ( $option && in_array( $post_id, $option, true ) ) {

		foreach ( $option as $tt_id => $thumbnail_id ) {
			if ( $thumbnail_id === $post_id ) {
				unset( $option[ $tt_id ] );
			}
		}

		update_option( SFTTH_OPTION_NAME, $option );

		// Bust cache.
		add_filter( 'sftth_terms_thumbnail_clear_options_cache', '__return_true' );
	}
}


add_action( 'wp_trash_post', 'sftth_trash_post_filter_compat' );
/**
 * When an attachment is trashed, we also remove the metas.
 *
 * @since 1.2.0
 *
 * @param (int) $post_id Post ID.
 */
function sftth_trash_post_filter_compat( $post_id ) {
	$post = get_post( $post_id );

	if ( 'attachment' === $post->post_type && 0 === strpos( $post->post_mime_type, 'image/' ) ) {
		sftth_delete_attachment_filter_compat( $post_id );
	}
}
