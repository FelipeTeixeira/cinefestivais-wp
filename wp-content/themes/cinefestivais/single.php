<?php
	$pagina = "pg-article";
	require_once('header.php');

	if (have_posts()) : while (have_posts()) : the_post();
	$author_id = get_the_author_meta('ID');
	$user = 'user_'. $author_id;
	$image_user = get_field('user_photo', $user);
	$size = 'thumbnail'; 

	// User
	$first_name = get_the_author_meta('first_name');
	$last_name = get_the_author_meta('last_name');
	$user_email = get_the_author_meta('user_email');
?>

<header class="post-header">
	<?php
		the_post_thumbnail('', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'is-tablet' ) ); 
	?> 
	<?php if( get_field('image_mobile') ): ?>
		<img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
	<?php endif; ?>

	<div class="post-header--social">

		<div class="tags">
			<?php
				$categories = get_the_category();
				foreach( $categories as $category) {
					$name = $category->name;
					$slug = $category->slug;
					$category_link = get_category_link( $category->term_id );
					if (categoryDefault($slug)) {
			?>
				<span class="tag">
					<?= esc_attr( $name); ?>
				</span>
				
			<?php
				}
				else {
			?>
				<span class="tag is-active">
					<?= esc_attr( $name); ?>
				</span>
			<?php
					}

				}
			?>
		</div>

		<div class="social-icons">
			<a class="btn-bubble">
				<svg class="icon icon-bubble">
					<use xlink:href="#icon-bubble"></use>
				</svg>
			</a>

			<div class="social-icons--share">
				<div class="share-icon">
					<svg class="icon icon-share-alt">
						<use xlink:href="#icon-share-alt"></use>
					</svg>
					<span class="share-icon--text">Compartilhar</span>
				</div>
				<a href="" class="social-icons--share-item">
					<svg class="icon icon-facebook">
						<use xlink:href="#icon-facebook"></use>
					</svg>
				</a>
				<a href="" class="social-icons--share-item">
					<svg class="icon icon-twitter">
						<use xlink:href="#icon-twitter"></use>
					</svg>
				</a>
				<a href="" class="social-icons--share-item">
					<svg class="icon icon-envelope">
						<use xlink:href="#icon-envelope"></use>
					</svg>
				</a>
				<a href="" class="social-icons--share-item">
					<svg class="icon icon-link">
						<use xlink:href="#icon-link"></use>
					</svg>
				</a>
			</div>
		</div>
	</div>
</header>

<h1 class="postpage-body--title">
	<?php the_title(); ?>
</h1>

<section class="postpage-body--author">

	<div class="author-picture">
		<?php 
			if( $image_user ) 
			{
				echo wp_get_attachment_image( $image_user, $size, "", ["class" => "profile-photo"] );
			}
		?>
	</div>
	<div class="author-name">
		<a href="#">
			<?= $first_name ?>
			<?= $last_name ?>
		</a>
	</div>

</section>

<span class="postpage-body--timehour">
	<?= get_the_date('d/m/y'); ?>
	às 
	<?= the_time('H:i'); ?>
</span>
<?php
 	if (
		get_the_time('H:i') !== get_the_modified_time('H:i')
	) {
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

<hr class="postpage-body--separator">

<div class="flex-row-between">
	<section class="postpage-body--text">
		<?php the_content(); ?>
	</section>
</div>

<hr class="postpage-body--separator">

<section class="postpage-body--related">
	<h2 class="related-title">
		Assuntos Relacionados
	</h2>

	<div class="tags">
		<?php
			$tags = get_tags();
			foreach ( $tags as $tag ) 
			{
				$tag_link = get_tag_link( $tag->term_id );
		?>
				<a href="<?= $tag_link ?>" class="tag">
					<?= $tag->name ?>
				</a>
		<?php
			}
		?>
	</div>

</section>

<section class="postpage-body--contact content">

	<h2 class="content-title">Entre em contato</h2>

	<div class="contact-author">
		<?php 
			if( $image_user ) 
			{
				echo wp_get_attachment_image( $image_user, $size );
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
			<?php if( $facebook ): ?>
				<span>
					<svg class="icon icon-facebook">
						<use xlink:href="#icon-facebook"></use>
					</svg>
					/<?= $facebook ?>
				</span>
			<?php endif; ?>	

			<?php if( $twitter ): ?>
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

<div class="is-center">
	<button type="button" class="btn btn-primary btn-medium mb-24">
		<svg class="icon icon-chevron-down">
			<use xlink:href="#icon-chevron-down"></use>
		</svg>
		Ver Comentários
	</button>
</div>


<?php 
	include 'templates/newsletter.php'; 

	endwhile; endif;
	get_footer(); 
?>