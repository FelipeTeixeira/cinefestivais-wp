<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/* ---------------------------------------------------------------------------------------------- */
/* FILTERS (WP 4.4+) ============================================================================ */
/*                                                                                                */
/* FOR WP < 4.4 SEE `inc/compat/filters.php`.                                                     */
/*                                                                                                */
/* ---------------------------------------------------------------------------------------------- */

add_filter( 'get_terms_args', 'sftth_get_terms_args_filter', 10, 2 );
/**
 * When using `get_terms()`, add the parameter `"with_thumbnail" => true` to return only terms with a thumbnail.
 * Side note: `"with_thumbnail" => false` will return ALL terms, not only the ones without thumbnail.
 *
 * This filter adds a meta query.
 *
 * @since 1.2.0
 *
 * @param (array) $args       An array of get_terms() arguments.
 * @param (array) $taxonomies An array of taxonomies.
 *
 * @return An array of arguments.
 */
function sftth_get_terms_args_filter( $args, $taxonomies ) {

	if ( empty( $args['with_thumbnail'] ) ) {
		return $args;
	}

	$args['meta_query'] = ! empty( $args['meta_query'] ) && is_array( $args['meta_query'] ) ? $args['meta_query'] : array();

	// We need a "AND" relation here: if we meet a "OR" relation we build a nested query.
	if ( isset( $args['meta_query']['relation'] ) && 'AND' !== strtoupper( $args['meta_query']['relation'] ) ) {
		$args['meta_query'] = array( $args['meta_query'] );
	}

	$args['meta_query'][] = sftth_meta_query();

	return $args;
}


add_action( 'delete_attachment', 'sftth_delete_attachment_filter' );
/**
 * When an attachment is deleted, remove the metas from the terms that have this attachment as thumbnail.
 *
 * @since 1.2.0
 *
 * @param (int) $post_id Attachment ID.
 */
function sftth_delete_attachment_filter( $post_id ) {
	$post_id = absint( $post_id );
	$deleted = delete_metadata( 'term', 0, '_thumbnail_id', $post_id, true );

	// Bust term query cache.
	if ( $deleted ) {
		wp_cache_set( 'last_changed', microtime(), 'terms' );
	}
}


add_action( 'wp_trash_post', 'sftth_trash_post_filter' );
/**
 * When an attachment is trashed, we also remove the metas.
 *
 * @since 1.2.0
 *
 * @param (int) $post_id Post ID.
 */
function sftth_trash_post_filter( $post_id ) {
	$post = get_post( $post_id );

	if ( 'attachment' === $post->post_type && 0 === strpos( $post->post_mime_type, 'image/' ) ) {
		sftth_delete_attachment_filter( $post_id );
	}
}
