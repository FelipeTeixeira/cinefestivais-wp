<?php
	get_header();
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
			echo do_shortcode('		 [ajax_load_more 
									seo="true"
									transition_container="false" 
									post_type="post" 
									posts_per_page="4" 
									transition="fade" 
									scroll="false" 
									button_label="Ver mais" 
									category="'.$category->slug.'"]' ); 
		?>
	</section>

<?php
	get_footer(); 
?>