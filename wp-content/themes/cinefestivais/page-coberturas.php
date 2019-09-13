<?php
	require_once('header.php');
?>

	<header class="post-header full bg-img bg-cobertura">
		<div class="post-header-container">
			<h1 class="post-header--title">Coberturas</h1>
		</div>
	</header>
	<h2 class="header-banner">Cidadão Kane, Orson Welles, 1941</h2>

	<section class="content coberturas-container">
		<ul class="coberturas">
			<?php
				$categories = get_categories(array(
					'taxonomy'   => 'category',
					'orderby'    => 'name',
					'parent'     => 0,
					'exclude'    => ignoreCategories(),
					'hide_empty' => 0, // change to 1 to hide categores not having a single post
				));

				foreach  ($categories as $category) {
				$category_link = get_category_link($category->cat_ID);
				$slug = $category->slug;
				
					if (categoryDefault($slug)) 
					{
			?>
					<li class="cobertura">
						<a href="<?= esc_url($category_link) ?>" class="cobertura-legend">
							<?php if( get_field('image_poster', $category) ): ?>
								<img src="<?php the_field('image_poster', $category); ?>" alt="<?= $category->name ?>"/>
							<?php endif; ?>
							<strong class="cobertura-name">
								<?= $category->name ?>  
							</strong>
						</a>
					</li>
				<?php	
					}	
				}
			?>
		</ul>
	</section>

<?php
	include 'templates/newsletter.php';
	require_once('footer.php');
?>