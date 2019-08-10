<?php
	$pagina 	 	 = "pg-category";
	$body 	 	 = "header-active-main";
	$header  	 = "header-active";
	$quem_somos	 = "quem-somos";

	require_once('header.php');

	if( have_posts() ) {
	while( have_posts() ) {
		the_post(); 
?>

<header class="post-header full bg-img bg-quemsomos">
</header>

<article class="">
    <section class="content content-card">
        <h1 class="content-card--title">
			Anuncie
		</h1>
		<article class="categoryText article-text">
			<?php the_content(); ?>
		</article>
	</section>
</article>
<?php 
		}
	} 
	
	require_once('footer.php');
?>