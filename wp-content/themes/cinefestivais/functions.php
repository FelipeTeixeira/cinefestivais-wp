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
