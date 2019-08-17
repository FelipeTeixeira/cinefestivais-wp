<?php
	$pagina 	 	 = "pg-category";
	$body 	 	 = "header-active-main";
	$header  	 = "header-active";
	$quem_somos	 = "quem-somos";

	require_once('header.php');

?>
	<header class="post-header full bg-img bg-quemsomos" style="background-image: url(<?php if (function_exists('z_taxonomy_image')) echo z_taxonomy_image_url(); ?>)">
		<h1 class="post-header--title">
			<?php single_cat_title( ''); ?>
		</h1>
	</header>
	<h2 class="header-banner">
	Cidadão Kane, Orson Welles, 1941
	</h2>

	<section class="content bg-lightgrey">
		<article class="categoryText article-text">
			<?php the_content(); ?>
		</article>
	</section>
<?php
	require_once('footer.php');
?>