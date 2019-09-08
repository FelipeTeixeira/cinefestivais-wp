<?php
	require_once('header.php');
	$category = get_queried_object();
?>
	<header class="post-header full bg-img bg-quemsomos" 
		style="background-image: url(<?php if (get_field('image_background', $category)) the_field('image_background', $category); ?>)">
		<h1 class="post-header--title">
			<?php single_cat_title(''); ?>
		</h1>
	</header>

	<h2 class="header-banner">
		<?= category_description(); ?>
	</h2>

	<section class="content bg-lightgrey">
		<ul class="container-card">
			<?php
				while (have_posts()) : the_post();
			?>

			<div class="card">
				<a href="<?php the_permalink() ?>">

					<?php
						the_post_thumbnail('medium', array('title' => get_the_title(), 'alt' => get_the_title() ) ); 
					?> 
					<?php if( get_field('image_mobile') ): ?>
						<img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
					<?php endif; ?>

					<div class="card-label">
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
					</div>
					<h2 class="card-title">
						<?php the_title(); ?>
					</h2>

					<time class="card-time">
						<?= get_the_date('d/m/y'); ?>
						|
						<?= the_time('H:i'); ?>
					</time>
				</a>
			</div>
			<?php 
				endwhile;
			?>
		</ul>
	</section>

<?php
	require_once('footer.php');
?>