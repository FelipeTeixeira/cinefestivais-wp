<?php
/**
 * Plugin Name: SF Taxonomy Thumbnail
 * Plugin URI: https://www.screenfeed.fr/plugin-wp/taxonomy-thumbnail/
 * Description: Add a thumbnail to your taxonomy terms.
 * Version: 1.3
 * Author: Grégory Viguier
 * Author URI: https://www.screenfeed.fr/greg/
 * License: GPLv3
 * License URI: https://www.screenfeed.fr/gpl-v3.txt
 * Text Domain: sf-taxonomy-thumbnail
 * Domain Path: /languages/
 */

/**
 * @See `inc/template-tags.php`: the API you will use.
 * @See `inc/filters.php`: when using `get_terms()`, add the parameter `"with_thumbnail" => true` to return only terms with a thumbnail.
 *
 * Use the filter `sftth_taxonomies` to show/hide the thumbnail UI on your taxonomy edition pages. See `sftth_get_taxonomies()` in `inc/utilities.php`.
 * All public taxonomies are included by default.
 *
 * How this plugin stores data (in that order):
 * - For WordPress 4.4+, it uses the default term metas API.
 * - Or, if the plugin "Meta for Taxonomies" is used, it uses this plugin API.
 * - As fallback, it uses an option.
 *
 * THE PLUGIN USES `term_id` OR `term_taxonomy_id` DEPENDING ON THE WORDPRESS VERSION:
 * For WP 4.4+: `term_id`.
 * For WP < 4.4: `term_taxonomy_id`.
 *
 * Grab "Meta for Taxonomies" on Github: https://github.com/herewithme/meta-for-taxonomies,
 * or the official repository: https://wordpress.org/plugins/meta-for-taxonomies/.
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( 'Cheatin\' uh?' );
}
if ( version_compare( $GLOBALS['wp_version'], '3.5', '<' ) ) {
	return;
}


/* ---------------------------------------------------------------------------------------------- */
/* !CONSTANTS =================================================================================== */
/* ---------------------------------------------------------------------------------------------- */

define( 'SFTTH_VERSION', '1.3' );
define( 'SFTTH_FILE',    __FILE__ );

if ( ! defined( 'SFTTH_OPTION_NAME' ) ) {
	define( 'SFTTH_OPTION_NAME', 'sftth_terms_thumbnail' );
}


/* ---------------------------------------------------------------------------------------------- */
/* !INCLUDES ==================================================================================== */
/* ---------------------------------------------------------------------------------------------- */

add_action( 'plugins_loaded', 'sftth_includes', 1 );
/**
 * Plugin init.
 *
 * @since 1.0.0
 * @since 1.2.0 Introduced the upgrade process and tools.
 *              Split `template-tags.php` and `filters.php` into 2 versions for WP 4.4+ and back compat.
 *              Also moved `option.php` into `inc/compat/`.
 */
function sftth_includes() {
	if ( defined( 'WP_INSTALLING' ) && WP_INSTALLING ) {
		return;
	}

	$dir = plugin_dir_path( SFTTH_FILE );

	include( $dir . 'inc/utilities.php' );

	// WP 4.4+.
	if ( sftth_is_wp44() ) {
		include( $dir . 'inc/template-tags.php' );
		include( $dir . 'inc/filters.php' );
	}
	// Back compat.
	else {
		if ( ! sftth_has_term_meta_plugin() ) {
			include( $dir . 'inc/compat/option.php' );
		}
		include( $dir . 'inc/compat/template-tags.php' );
		include( $dir . 'inc/compat/filters.php' );
	}

	// Ajax.
	if ( doing_ajax() ) {
		include( $dir . 'inc/admin-and-ajax.php' );
		include( $dir . 'inc/ajax.php' );
	}
	// Admin.
	elseif ( is_admin() ) {
		include( $dir . 'inc/migrate.php' );

		sftth_migrate_to_wp44();

		include( $dir . 'inc/admin-and-ajax.php' );
		include( $dir . 'inc/admin.php' );
	}
}
