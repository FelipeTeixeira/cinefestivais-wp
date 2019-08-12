<?php
	$pagina 	 	 = "pg-category";
	$body 	 	 = "header-active-main";
	$header  	 = "header-active";
	$quem_somos	 = "quem-somos";

	require_once('header.php');

?>

<header class="post-header full bg-img bg-quemsomos">
</header>

<article>
    <section class="content content-card">
        <h1 class="content-card--title">
			CATEGORIA GERAL
		</h1>
		<article class="categoryText article-text">
			<?php the_content(); ?>
		</article>
	</section>
</article>
<?php
	require_once('footer.php');
?>