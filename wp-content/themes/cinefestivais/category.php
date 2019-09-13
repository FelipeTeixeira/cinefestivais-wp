<?php
	require_once('header.php');
	$category = get_queried_object();
?>
	<header class="post-header full bg-img" 
		style="background-image: url(<?php if (get_field('image_background', $category)) the_field('image_background', $category); ?>)">
		<div class="post-header-container">
			<h1 class="post-header--title">
				<?php single_cat_title(''); ?>
			</h1>
		</div>
	</header>

	<h2 class="header-banner">
		<?= category_description(); ?>
	</h2>

	<section class="content bg-lightgrey">
		<?php
			$ignoreCategory = $category->slug;
			include get_template_directory().'/templates/list-card.php';
		?>
	</section>

<?php
	get_footer(); 
?>