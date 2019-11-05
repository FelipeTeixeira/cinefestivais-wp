<?php
	global $pageClass;
	$pageClass = "singlePg";
	get_header();

	include 'templates/reader-bar.php';

	if (have_posts()) : while (have_posts()) : the_post();
?>
		<section id="js-progressbar-container">
			<div class="tags singlePg-container singleTagsHeader">
				<?php
					$categories = get_the_category();
					foreach ($categories as $category) {
						$name = $category->name;
						$slug = $category->slug;
						$category_link = get_category_link($category->term_id);

						if (!categoryDefault($slug, true)) {
							echo "<a href=" . $category_link . " class='tag is-active'>" . esc_attr($name) . "</a>";
						}

						if (categoryDefault($slug)) {
							echo "<a href=" . $category_link . " class='tag'>" . esc_attr($name) . "</a>";
						}
					}
				?>
			</div>

			<h1 class="singlePg-container singlePg-title">
				<?php the_title(); ?>
			</h1>
			
			<?php
				include get_template_directory().'/templates/single/get-coauthors-header.php';
			?>

			<div class="socialShared-container singlePg-container">
				<?php include 'templates/single/socialShared.php'; ?>
			</div>

			<?php
				the_post_thumbnail('', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'singlePg-imgFeatured'));
				include get_template_directory().'/templates/adverts/ad-post-imagem-principal.php';
			?>    

			<article id="box" class="postpage-body--text">
				<?php the_content(); ?>
			</article>

			<?php
				$post = get_post();
				$tags = get_the_tags($post->ID);
				if ($tags) 
				{
			?>
				<section class="postpage-body--related singlePg-container">
					<h2 class="related-title">
						Assuntos Relacionados
					</h2>

					<div class="tags">
						<?php
							foreach ($tags as $tag) 
							{
								$tag_link = get_tag_link($tag->term_id);
						?>
							<a href="<?= $tag_link ?>" class="tag">
								<?= $tag->name ?>
							</a>
						<?php
							}
						?>
					</div>
				</section>
			<?php
				}
			?>
		</section>

		<?php
			include get_template_directory().'/templates/single/get-coauthors.php';
		?>

		<section class="singlePg-container singlePg-disqus postpage-body--contact p-padding-bottom-32" id="js-disqusContainer">
			<button onclick="openDisqus()" type="button" class="singlePg-disqus-btnComments btn btn-primary">
				<svg class="icon icon-chevron-down">
					<use xlink:href="#icon-chevron-down"></use>
				</svg>
				Ver Comentários
			</button>

			<div class="singlePg-disqus-container">
				<?php disqus_embed(); ?>
			</div>
		</section>
<?php
		include get_template_directory().'/templates/adverts/ad-post-sessao-comentarios.php';
		include get_template_directory() . '/templates/newsletter.php';
		include get_template_directory() . '/templates/post-related.php';

	endwhile;
endif;
get_footer();
?>