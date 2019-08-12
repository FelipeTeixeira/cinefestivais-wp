=== Taxonomy Thumbnail ===

Contributors: GregLone
Tags: thumbnail, image, taxonomy, category, dev
Requires at least: 3.5
Tested up to: 4.5.2
Stable tag: trunk
License: GPLv3
License URI: https://www.screenfeed.fr/gpl-v3.txt

Add a thumbnail to your taxonomy terms.


== Description ==

This plugin is meant for developers, it allows to attach a thumbnail to taxonomy terms.

= UI for setting the thumbnails =

The thumbnail can be added on term creation or later on the term edition page.  
The terms list has a column displaying the current thumbnail (so far, no specific action here).  
The plugin uses the "new" media window (the one used since WP 3.5), not the old thickbox.  
I made some extra efforts to enhance accessibility. I'm not an a11y expert but the UI is not only a "Add thumbnail" button. For instance, the new `wp.a11y.speak()` is used when available. Please give me feedback if you think it can be improved.  
Works with or without JavaScript.  
If JavaScript is enabled, thumbnails are set via ajax in the term edition window, no need to update the term.  
By default, the UI is displayed for all public taxonomies, but this can be filtered that way:

	add_filter( 'sftth_taxonomies', 'my_taxonomies_with_thumbnail' );

	function my_taxonomies_with_thumbnail( $taxonomies ) {
		unset( $taxonomies['post_tag'] );
		$taxonomies['my_custom_tax'] = 'my_custom_tax';
		return $taxonomies;
	}

= Template tags =

Find them in `inc/template-tags.php`.  
**Important note: for WP 4.4+, these functions use `term_id`. For WP < 4.4, they use `term_taxonomy_id`.**  
I tried to mimic the post thumbnail functions:

1. `get_term_thumbnail_id( $term_id )`: Retrieve term thumbnail ID.
1. `has_term_thumbnail( $term_id )`: Check if a term has a thumbnail attached to it.
1. `the_term_thumbnail( $term_id, $size = 'post-thumbnail', $attr = '' )`: Display the term thumbnail.
1. `get_term_thumbnail( $term_id, $size = 'post-thumbnail', $attr = '' )`: Retrieve the term thumbnail.
1. `set_term_thumbnail( $term_id, $thumbnail_id )`: Set a term thumbnail.
1. `delete_term_thumbnail( $term_id )`: Detach a thumbnail from a term.

= Store the data =

From WordPress 4.4, the term metas API is used.  
Below WordPress 4.4, there are two ways to store the thumbnail IDs:

1. Use term metas with the plugin [Meta for Taxonomies](https://wordpress.org/plugins/meta-for-taxonomies/).
1. Use an option (an array association of `term_taxonomy_id` => `thumbnail_id` integers). The option name can be customized by defining the constant `SFTTH_OPTION_NAME` in `wp-config.php`.

= Get terms =

Use `get_terms()` with a specific parameter to retrieve only terms with a thumbnail:

	$terms = get_terms( array(
		'with_thumbnail' => true,
	) );

From WordPress 4.4, you can also use a small helper to build your meta query:

	$terms = get_terms( array(
		'meta_query' => array(
			'relation' => 'AND',
			array(
				// Any meta query.
			),
			sftth_meta_query(),
		),
	) );

Below WordPress 4.4, if you use the plugin *Meta for Taxonomies*, you should always cache thumbnails.  
When using `'with_thumbnail' => false` you will retrieve all terms, even those without a thumbnail, but the thumbnails will be cached, saving calls to the database later:

	$terms = get_terms( array(
		'with_thumbnail' => false,
	) );

= Uninstall =

When uninstalling the plugin, you can decide to not delete the thumbnails, simply define a constant in `wp-config.php`:

	define( 'SFTTH_KEEP_DATA', true );


= Translations =

* US English
* French

= Requirements =

Should work starting from WP 3.5, but tested only in WP 4.2.2+ so far.

= Credits =

Photo used for the banner by [Nicolas Janik](https://www.flickr.com/photos/n1colas/2598073727/) ([CC BY 2.0](https://creativecommons.org/licenses/by/2.0/)).


== Installation ==

1. Extract the plugin folder from the downloaded ZIP file.
1. Upload the `sf-taxonomy-thumbnail` folder to your `/wp-content/plugins/` directory.
1. Activate the plugin from the "Plugins" page.
1. Below WordPress 4.4, if you want to use term metas instead of an option, install the plugin [Meta for Taxonomies](https://wordpress.org/plugins/meta-for-taxonomies/).


== Frequently Asked Questions ==

= Why should I use the plugin *Meta for Taxonomies*? =

If you use WordPress 4.4 or greater you don't need to.  
Otherwise, I think it's the proper way to store this kind of data. Post thumbnails are stored in post metas, right? So term thumbnails should be stored in term metas.  
But it requires a plugin, WordPress does not provide a term metas system before 4.4. On the other hand, I don't want to force you to use a dependency, so I wanted my plugin to also work without it.

= Any plan for a settings page where I can choose the taxonomies? =

Nope, it will not happen, imho there is no point to do so.

= Other questions? =

Eventually, try the [WordPress support forum](https://wordpress.org/support/plugin/sf-taxonomy-thumbnail).


== Screenshots ==

1. Create a new category an assign a thumbnail.
2. Change or remove the thumbnail from the category.


== Changelog ==

= 1.3 =

* 2016/05/30
* The plugin now works with svg files (using svg files require an adequate plugin).
* Improved code docs.

= 1.2.2 =

* 2016/05/30
* Fixed a bug that prevented the use of SVG as thumbnail.

= 1.2.1 =

* 2016/01/31
* Bugfix in uninstallation process: term metas wouldn't be deleted with the new WordPress API. Props Ghislain Phu.

= 1.2 =

* 2015/11/01
* Ready for WordPress 4.4: the plugin will use the new term metas API and will no longer use *Meta for Taxonomies* plugin. **Developers, be aware that with WP 4.4+ the template tags do not use `term_taxonomy_id` anymore, but `term_id` instead.**
* Migrate to WordPress 4.4: when the site is updated to WP 4.4, the plugin automatically migrate the old data (stored in an option or by *Meta for Taxonomies*) to the new term metas table, convert `term_taxonomy_id`s into `term_id`s, and delete old data (only the plugin data of course). Then if you used *Meta for Taxonomies*, it can be uninstalled afterward. **Side note: in case *Meta for Taxonomies* is not updated by then, you should deactivate it BEFORE updating to WordPress 4.4 (it is not compatible with WP 4.4 yet, and will trigger a fatal error).**
* New: when an image attachment is trashed or deleted, the related meta is also removed.
* Lots of docs have been added or updated.
* It's a bit late now but there are new tools to migrate data between option and *Meta for Taxonomies*. See `inc/migrate.php`.

= 1.1 =

* 2015/09/20
* Move the thumbnail column after the term name. Since WP 4.3 there is a concept of *primary column*: if the thumbnail is not displayed AFTER this primary column (the term name), it will break the row layout on screens < 782px.
* Code cleanup.

= 1.0 =

* 2015/06/11
* Initial release.


== Upgrade Notice ==

If you use *Meta for Taxonomies* plugin, you will need this version when WordPress 4.4 comes out.
