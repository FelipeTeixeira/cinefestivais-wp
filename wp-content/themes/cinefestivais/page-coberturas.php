<?php
$pagina 	 	 = "pg-category";
$body 	 	 = "header-active-main";
$header  	 = "header-active";
$quem_somos	 = "quem-somos";

require_once('header.php');
?>

	<header class="post-header full bg-img bg-cobertura">
		<h1 class="post-header--title">Coberturas</h1>
	</header>
	<h2 class="header-banner">Cidadão Kane, Orson Welles, 1941</h2>

	<section class="content bg-lightgrey">
		<h3 class="content-title">Coberturas</h3>

		<ul class="coberturas">
			<?php
				$categories = get_categories(array(
					'taxonomy'   => 'category',
					'orderby'    => 'name',
					'parent'     => 0,
					'hide_empty' => 1, // change to 1 to hide categores not having a single post
				));

				foreach  ($categories as $category) {
				$category_link = get_category_link($category->cat_ID);
			?>
			<!-- TO DO, ignorar quando for reportagens essas coisas -->
				<li class="cobertura">
					<a href="<?= esc_url($category_link) ?>" class="cobertura-legend">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI4U1f1iXMC3gROM0-_MkhqF0E2ke8evi8kIqYyvtGnRbzmh79" alt="" class="cobertura-picture">
						<strong class="cobertura-name">
							<?= $category->name ?>  
						</strong>
					</a>
				</li>
			<?php	
				}
			?>
		</ul>
	</section>

<?php
	include 'templates/newsletter.php';
	require_once('footer.php');
?>