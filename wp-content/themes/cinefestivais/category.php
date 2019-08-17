<?php
	$pagina 	 	 = "pg-category";
	$body 	 	 = "header-active-main";
	$header  	 = "header-active";
	$quem_somos	 = "quem-somos";

	require_once('header.php');

?>
	<header class="post-header full bg-img bg-quemsomos" style="background-image: url(<?php if (function_exists('z_taxonomy_image')) echo z_taxonomy_image_url(); ?>)">
		<h1 class="post-header--title">
			<?php single_cat_title(''); ?>
		</h1>
	</header>
	<h2 class="header-banner">
		<?= category_description(); ?>
	</h2>

	<section class="content bg-lightgrey">
		<article class="categoryText article-text">
			<?php
				while (have_posts()) : the_post();
			?>
			<div class="card">
				<a href="<?php the_permalink() ?>">
					<figure>
						<?php the_post_thumbnail(); ?>
						<figcaption class="card-label">
							<?php
								$categories = get_the_category();
								foreach( $categories as $category) {
									$name = $category->name;
									$slug = $category->slug;
									$category_link = get_category_link( $category->term_id );
									if (!categoryDefault($slug)) {
							?>
								<span class="card-label__text">
									<?= esc_attr( $name); ?>
								</span>
							<?php
									}
								}
							?>
						</figcaption>
					</figure>
					<h2 class="card-text">
						<?php the_title(); ?>
					</h2>
				</a>

				<time>
					<?= get_the_date('d/m/y'); ?>
					<?= the_time('H:i'); ?>
				</time>
			</div>
			<?php 
				endwhile;
			?>
		</article>
	</section>
<?php
	require_once('footer.php');
?>