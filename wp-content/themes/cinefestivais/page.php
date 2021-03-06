<?php
get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		?>

		<header class="post-header full bg-img">
		</header>

		<article class="content">
			<section class="content-card">
				<h1 class="content-card--title">
					<?php the_title(); ?>
				</h1>
				<article class="content-container content-card-text">
					<?php the_content(); ?>
				</article>
			</section>
		</article>

<?php
		include 'templates/newsletter.php';
	}
}
wp_reset_postdata();
get_footer(); 
?>