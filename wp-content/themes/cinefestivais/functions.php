<?php

add_theme_support('post-thumbnails');
require_once('general-admin.php');
show_admin_bar(false);

function get_title()
{
	if (is_home()) {
		bloginfo('name');
	} else {
		bloginfo('name');
		echo ' | ';
		the_title();
	}
}

function nameUser()
{
	$fname = get_the_author_meta('first_name');
	$lname = get_the_author_meta('last_name');
	$full_name = '';

	if (empty($fname)) {
		$full_name = $lname;
	} elseif (empty($lname)) {
		$full_name = $fname;
	} else {
		$full_name = "{$fname} {$lname}";
	}

	echo $full_name;
}

function categoryDefault($slug)
{
	return $slug !== 'criticas' &&
		$slug !== 'noticias' &&
		$slug !== 'reportagens' &&
		$slug !== 'podcasts' &&
		$slug !== 'destaques' &&
		$slug !== 'especiais' &&
		$slug !== 'slider' &&
		$slug !== 'area-nobre' &&
		$slug !== 'entrevistas';
}

function ignoreCategories()
{
	$criticas 		= get_category_by_slug('criticas');
	$noticias 		= get_category_by_slug('noticias');
	$reportagens 	= get_category_by_slug('reportagens');
	$podcasts 		= get_category_by_slug('podcasts');
	$destaques 		= get_category_by_slug('destaques');
	$especiais 		= get_category_by_slug('especiais');
	$slider 		= get_category_by_slug('slider');
	$entrevistas 	= get_category_by_slug('entrevistas');
	$area_nobre 	= get_category_by_slug('area-nobre');

	return array(
		$criticas->term_id,
		$noticias->term_id,
		$reportagens->term_id,
		$podcasts->term_id,
		$destaques->term_id,
		$especiais->term_id,
		$slider->term_id,
		$entrevistas->term_id,
		$area_nobre->term_id
	);
}

function currentYear()
{
	return date('Y');
}

function disqus_embed() {
	$disqus_shortname = 'cinefestivais';
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}

// CONTACT 7
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );