<?php
	global $pageClass;
	$pageClass = "singlePg";
	get_header();

	include 'templates/reader-bar.php';

	if (have_posts()) : while (have_posts()) : the_post();

		$author_id = get_the_author_meta('ID');
		$user = 'user_' . $author_id;
		$image_user = get_field('user_photo', $user);
		$size = 'thumbnail';

		// User
		$first_name = get_the_author_meta('first_name');
		$last_name = get_the_author_meta('last_name');
		$user_email = get_the_author_meta('user_email');

		$post = get_post();
?>

<section id="js-progressbar-container">
	<div class="tags singlePg-container">
		<?php
				$categories = get_the_category();
				foreach ($categories as $category) {
					$name = $category->name;
					$slug = $category->slug;
					$category_link = get_category_link($category->term_id);
					if (categoryDefault($slug)) {
						?>
				<span class="tag">
					<?= esc_attr($name); ?>
				</span>

			<?php
						} else {
							?>
				<span class="tag is-active">
					<?= esc_attr($name); ?>
				</span>
		<?php
					}
				}
				?>
	</div>

	<h1 class="postpage-body--title singlePg-container">
		<?php the_title(); ?>
	</h1>

	<section class="postpage-body--author singlePg-container">

		<div class="author-picture">
			<?php
				if ($image_user) 
				{
					echo wp_get_attachment_image($image_user, $size, "", ["class" => "profile-photo"]);
				}
			?>
		</div>

		<div>
			<a href="<?= get_author_posts_url($author_id) ?>" class="author-name">
				<?= $first_name ?>
				<?= $last_name ?>
			</a>

			<div class="singlePg-date">
				<span class="postpage-body--timehour">
					<?= get_the_date('d/m/y'); ?>
					às
					<?= the_time('H:i'); ?>
				</span>
				<?php
						if (get_the_time('H:i') !== get_the_modified_time('H:i')) {
							?>
					<span class="postpage-body--updated">
						Atualizado em
						<?= get_the_modified_date('d/m/y') ?>
						as
						<?= get_the_modified_time('H:i') ?>
					</span>
				<?php
						}
						?>
			</div>
		</div>


	</section>

	<?php
		include 'templates/single/socialShared.php'; 
		the_post_thumbnail('', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'singlePg-imgFeatured' ) ); 
	?>

	<article id="box" class="postpage-body--text">
		<?php the_content(); ?>
	</article>

	<?php
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

<section class="postpage-body--contact content singlePg-container">

	<h2 class="content-title">Entre em contato</h2>

	<div class="contact-author">
		<?php
				if ($image_user) {
					echo wp_get_attachment_image($image_user, $size);
				}
				?>
		<div class="contact-author--info">
			<h3>
				<?= $first_name ?>
				<?= $last_name ?>
			</h3>
			<span>
				<svg class="icon icon-envelope">
					<use xlink:href="#icon-envelope"></use>
				</svg>
				<?= $user_email ?>
			</span>


			<?php
					$facebook = get_field('user_facebook', $user);
					$twitter = get_field('user_twitter', $user);
					?>
			<?php if ($facebook) : ?>
				<span>
					<svg class="icon icon-facebook">
						<use xlink:href="#icon-facebook"></use>
					</svg>
					/<?= $facebook ?>
				</span>
			<?php endif; ?>

			<?php if ($twitter) : ?>
				<span>
					<svg class="icon icon-twitter">
						<use xlink:href="#icon-twitter"></use>
					</svg>
					@<?= $twitter ?>
				</span>
			<?php endif; ?>
		</div>

	</div>

</section>

<section class="singlePg-container singlePg-disqus postpage-body--contact " id="js-disqusContainer">
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
	include 'templates/newsletter.php';

	endwhile;
endif;
get_footer();
?>