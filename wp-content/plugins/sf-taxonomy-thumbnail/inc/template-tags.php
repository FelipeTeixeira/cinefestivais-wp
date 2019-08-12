<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/* ---------------------------------------------------------------------------------------------- */
/* TEMPLATE TAGS (WP 4.4+) ====================================================================== */
/*                                                                                                */
/* IMPORTANT NOTE!                                                                                */
/* FROM WORDPRESS 4.4, THESE FUNCTIONS USE THE `TERM_ID`, NOT THE `TERM_TAXONOMY_ID` ANYMORE.     */
/* THIS IS BECAUSE THE NEW API USES `TERM_ID`.                                                    */
/*                                                                                                */
/* FOR WP < 4.4 SEE `inc/compat/template-tags.php`.                                               */
/*                                                                                                */
/* ---------------------------------------------------------------------------------------------- */

/**
 * Retrieve term thumbnail ID.
 *
 * @since 1.0.0
 * @since 1.2.0 Introduced WordPress 4.4.0 term metas API compat.
 *
 * @param (int) $term_id Term term_id.
 *
 * @return (int|false) The term thumbnail ID on success, false on failure.
 */
function get_term_thumbnail_id( $term_id ) {
	$term_id = absint( $term_id );

	if ( $term_id ) {
		$thumbnail_id = get_term_meta( $term_id, '_thumbnail_id', true );
		return $thumbnail_id ? absint( $thumbnail_id ) : false;
	}

	return false;
}


/**
 * Check if term has a thumbnail attached.
 *
 * @since 1.0.0
 *
 * @param (int) $term_id Term term_id.
 *
 * @return (bool) Whether term has an image attached.
 */
function has_term_thumbnail( $term_id ) {
	return (bool) get_term_thumbnail_id( $term_id );
}


/**
 * Display the term thumbnail.
 *
 * @since 1.0.0
 *
 * @see get_term_thumbnail()
 *
 * @param (int)          $term_id Term term_id.
 * @param (string|array) $size    Optional. Registered image size to use, or flat array of height
 *                                and width values. Default 'post-thumbnail'.
 * @param (string|array) $attr    Optional. Query string or array of attributes. Default empty.
 */
function the_term_thumbnail( $term_id, $size = 'post-thumbnail', $attr = '' ) {
	echo get_term_thumbnail( $term_id, $size, $attr );
}


/**
 * Retrieve the term thumbnail.
 *
 * @since 1.0.0
 *
 * @param (int)          $term_id Term term_id.
 * @param (string|array) $size    Optional. Registered image size to use, or flat array of height
 *                                and width values. Default 'post-thumbnail'.
 * @param (string|array) $attr    Optional. Query string or array of attributes. Default empty.
 *
 * @return (string) The term thumbnail.
 */
function get_term_thumbnail( $term_id, $size = 'post-thumbnail', $attr = '' ) {

	$term_thumbnail_id = get_term_thumbnail_id( $term_id );

	/**
	 * Filter the term thumbnail size.
	 *
	 * @since 1.0.0
	 *
	 * @param (string) $size The term thumbnail size.
	 */
	$size = apply_filters( 'term_thumbnail_size', $size );

	if ( $term_thumbnail_id ) {

		/**
		 * Fires before fetching the term thumbnail HTML.
		 *
		 * Provides "just in time" filtering of all filters in wp_get_attachment_image().
		 *
		 * @since 1.0.0
		 *
		 * @param (string) $term_id           The term ID.
		 * @param (string) $term_thumbnail_id The term thumbnail ID.
		 * @param (string) $size              The term thumbnail size.
		 */
		do_action( 'begin_fetch_term_thumbnail_html', $term_id, $term_thumbnail_id, $size );

		$html = wp_get_attachment_image( $term_thumbnail_id, $size, false, $attr );

		// Make sure SVGs are not displayed 1px wide.
		$html = preg_replace( '@^<img width="1" height="1" src="(.+)\.svg" @', '<img src="$1.svg" ', $html );

		/**
		 * Fires after fetching the term thumbnail HTML.
		 *
		 * @since 1.0.0
		 *
		 * @param (string) $term_id           The term ID.
		 * @param (string) $term_thumbnail_id The term thumbnail ID.
		 * @param (string) $size              The term thumbnail size.
		 */
		do_action( 'end_fetch_term_thumbnail_html', $term_id, $term_thumbnail_id, $size );

	}
	else {
		$html = '';
	}
	/**
	 * Filter the term thumbnail HTML.
	 *
	 * @since 1.0.0
	 *
	 * @param (string) $html              The term thumbnail HTML.
	 * @param (string) $term_id           The term ID.
	 * @param (string) $term_thumbnail_id The term thumbnail ID.
	 * @param (string) $size              The term thumbnail size.
	 * @param (string) $attr              Query string of attributes.
	 */
	return apply_filters( 'term_thumbnail_html', $html, $term_id, $term_thumbnail_id, $size, $attr );
}


/**
 * Set a term thumbnail.
 *
 * @since 1.0.0
 * @since 1.2.0 Introduced WordPress 4.4.0 term metas API compat.
 *
 * @param (int) $term_id      Term term_id.
 * @param (int) $thumbnail_id Thumbnail to attach.
 *
 * @return (bool) True on success, false on failure.
 */
function set_term_thumbnail( $term_id, $thumbnail_id ) {
	$term_id      = absint( $term_id );
	$thumbnail_id = absint( $thumbnail_id );

	if ( ! $term_id ) {
		return false;
	}

	if ( $thumbnail_id && get_post( $thumbnail_id ) && wp_get_attachment_image( $thumbnail_id, 'thumbnail' ) ) {
		return update_term_meta( $term_id, '_thumbnail_id', $thumbnail_id );
	}

	return delete_term_meta( $term_id, '_thumbnail_id' );
}


/**
 * Remove a term thumbnail.
 *
 * @since 1.0.0
 *
 * @param (int) $term_id Term term_id.
 *
 * @return (bool) True on success, false on failure.
 */
function delete_term_thumbnail( $term_id ) {
	return set_term_thumbnail( $term_id, false );
}


/**
 * Instead of using `"with_thumbnail" => true` with `get_terms()`, you can build your own meta query with this shorthand (WP 4.4+ only).
 *
 * @since 1.2.0
 * @see `sftth_get_terms_args_filter()` for an example.
 *
 * @return (array) The meta query allowing to return only terms with thumbnail.
 */
function sftth_meta_query() {
	return array(
		'key'     => '_thumbnail_id',
		'value'   => 0,
		'compare' => '>',
		'type'    => 'SIGNED',
	);
}
