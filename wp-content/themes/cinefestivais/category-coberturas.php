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
			Categorias
		</h1>
		<article class="categoryText article-text">
			<?php

			// The Loop
			while (have_posts()) : the_post();
				?>
				<h2>
					<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<small>
					<?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?>
				</small>

				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

			<?php 
				endwhile;
			?>
	</section>
</article>
<?php
	require_once('footer.php');
?>