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

function nameUser() {
	$fname = get_the_author_meta('first_name');
	$lname = get_the_author_meta('last_name');
	$full_name = '';

	if( empty($fname)){
		$full_name = $lname;
	} elseif( empty( $lname )){
		$full_name = $fname;
	} else {
		$full_name = "{$fname} {$lname}";
	}

	echo $full_name;
}

function categoryDefault($slug) {
	return $slug !== 'criticas' && 
	$slug !== 'noticias' && 
	$slug !== 'reportagens' && 
	$slug !== 'podcasts' &&
	$slug !== 'entrevistas';
}

function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 50);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	return $excerpt;
}	