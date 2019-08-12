<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}

/* ---------------------------------------------------------------------------------------------- */
/* I18N ========================================================================================= */
/* ---------------------------------------------------------------------------------------------- */

add_action( 'init', 'sftth_lang_init' );
/**
 * Plugin i18n init.
 *
 * @since 1.0.0
 */
function sftth_lang_init() {
	load_plugin_textdomain( 'sf-taxonomy-thumbnail', false, basename( dirname( SFTTH_FILE ) ) . '/languages/' );
}


/* ---------------------------------------------------------------------------------------------- */
/* UPDATE ON FORM SUBMIT ======================================================================== */
/* ---------------------------------------------------------------------------------------------- */

add_action( 'created_term', 'sftth_update_term_thumbnail_on_form_submit', 10, 3 );
add_action( 'edited_term',  'sftth_update_term_thumbnail_on_form_submit', 10, 3 );
/**
 * Used in the following cases:
 * - when we add a new term,
 * - if JavaScript is disabled while editing a term,
 * - if the update via ajax failed while editing a term.
 *
 * @since 1.0.0
 * @since 1.2.0 Introduced WordPress 4.4.0 term metas API compat by using the term_id instead of the term_taxonomy_id.
 *
 * @param (int)    $term_id          Term ID.
 * @param (int)    $term_taxonomy_id Term taxonomy ID.
 * @param (string) $taxonomy         Taxonomy slug.
 */
function sftth_update_term_thumbnail_on_form_submit( $term_id, $term_taxonomy_id, $taxonomy ) {
	// The thumbnail is already set via ajax (or hasn't changed).
	if ( ! empty( $_POST['term-thumbnail-updated'] ) || ! isset( $_POST['thumbnail'] ) ) { // WPCS: CSRF ok.
		return;
	}

	if ( empty( $_POST['action'] ) || ( 'add-tag' !== $_POST['action'] && 'editedtag' !== $_POST['action'] ) ) { // WPCS: CSRF ok.
		return;
	}

	$thumbnail_id = absint( $_POST['thumbnail'] );
	$term_id      = sftth_is_wp44() ? $term_id : $term_taxonomy_id;

	if ( $thumbnail_id ) {
		set_term_thumbnail( $term_id, $thumbnail_id );
	}
	else {
		delete_term_thumbnail( $term_id );
	}
}


/* ---------------------------------------------------------------------------------------------- */
/* TABLES COLUMN ================================================================================ */
/* ---------------------------------------------------------------------------------------------- */

add_action( 'admin_init',      'sftth_add_columns', 5 );
add_action( 'wp_ajax_add-tag', 'sftth_add_columns', 5 );
/**
 * Init filters.
 *
 * @since 1.0.0
 */
function sftth_add_columns() {
	global $taxnow;

	$taxonomy   = doing_ajax() && ! empty( $_POST['taxonomy'] ) ? esc_html( $_POST['taxonomy'] ) : $taxnow; // WPCS: CSRF ok.
	$taxonomies = array_flip( sftth_get_taxonomies() );

	if ( $taxonomy && isset( $taxonomies[ $taxonomy ] ) ) {
		add_filter( 'manage_edit-' . $taxonomy . '_columns',  'sftth_add_column_header', PHP_INT_MAX );
		add_filter( 'manage_' . $taxonomy . '_custom_column', 'sftth_add_column_content', 10, 3 );
	}
}


/**
 * Add column header.
 *
 * @since 1.0.0
 * @since 1.1.0 Takes care of the WP 4.3 "primary" column.
 *
 * @param (array) $columns Other column headers.
 *
 * @return (array) Column headers.
 */
function sftth_add_column_header( $columns ) {
	$default_column = sftth_get_primary_column( $columns );

	if ( $default_column ) {
		$out = array();

		foreach ( $columns as $column => $label ) {
			$out[ $column ] = $label;

			if ( $column === $default_column ) {
				$out['term-thumbnail'] = __( 'Thumbnail' );
				$out = array_merge( $out, $columns );
				break;
			}
		}
	}
	else {
		$out = array_slice( $columns, 0, 2, true );
		$out['term-thumbnail'] = __( 'Thumbnail' );
		$out += $columns;
	}

	return $out;
}


/**
 * Add column content.
 *
 * @since 1.0.0
 * @since 1.2.0 Introduced WordPress 4.4.0 term metas API compat by using the term_id instead of the term_taxonomy_id.
 *
 * @param (string) $content     The column content.
 * @param (string) $column_name The column name (ID).
 * @param (int)    $term_id     The term ID.
 *
 * @return (string) Column content.
 */
function sftth_add_column_content( $content, $column_name, $term_id ) {
	global $taxnow;

	if ( 'term-thumbnail' !== $column_name ) {
		return $content;
	}

	if ( sftth_is_wp44() ) {
		return get_term_thumbnail( $term_id, array( 80, 60 ) );
	}

	// Back compat.
	$taxonomy         = doing_ajax() && ! empty( $_POST['taxonomy'] ) ? esc_html( $_POST['taxonomy'] ) : $taxnow; // WPCS: CSRF ok.
	$term             = get_term( $term_id, $taxonomy );
	$term_taxonomy_id = absint( $term->term_taxonomy_id );

	return get_term_thumbnail( $term_taxonomy_id, array( 80, 60 ) );
}


/* ---------------------------------------------------------------------------------------------- */
/* TOOLS ======================================================================================== */
/* ---------------------------------------------------------------------------------------------- */

/**
 * Since WP 4.3+ there is a "primary" column concept.
 *
 * @since 1.1.0
 *
 * @param (array) $columns Columns.
 *
 * @return (string) The primary column name.
 */
function sftth_get_primary_column( $columns ) {
	global $current_screen;

	$default = '';

	foreach ( $columns as $col => $column_name ) {
		if ( 'cb' === $col ) {
			continue;
		}

		$default = $col;
		break;
	}

	if ( ! isset( $columns[ $default ] ) ) {
		$default = isset( $columns['title'] ) ? 'title' : false;
	}

	/**
	 * Filter the name of the primary column for the current list table.
	 *
	 * @since WP 4.3.0
	 *
	 * @param (string) $default Column name default for the specific list table, e.g. 'name'.
	 * @param (string) $context Screen ID for specific list table, e.g. 'plugins'.
	 */
	$column = apply_filters( 'list_table_primary_column', $default, $current_screen->id );

	if ( empty( $column ) || ! isset( $columns[ $column ] ) ) {
		$column = $default;
	}

	return $column;
}
