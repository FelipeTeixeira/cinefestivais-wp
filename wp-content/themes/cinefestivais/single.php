<?php
	$pagina = "pg-article";
	require_once('header.php');

	if( have_posts() ) {
	while( have_posts() ) {
		the_post();
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
			<span class="tag">Entrevistas</span>
			<span class="tag">8º olhar de cinema</span>
		</div>
		<div class="social-icons">
			<a class="btn-bubble">
				<svg class="icon icon-bubble">
					<use xlink:href="#icon-bubble"></use>
				</svg>
			</a>

			<span></span>

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
		<img src="https://randomuser.me/api/portraits/men/12.jpg" class="profile-photo" alt="">
		<img src="https://randomuser.me/api/portraits/women/28.jpg" class="profile-photo" alt="">
	</div>
	<div class="author-name">
		<a href="#">Adriano Garrett</a>
		<a href="#">Gabriela Oliveira</a>
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
		<q>
			Lorem ipsum dolor sit amet consectetur adipisicing elit.
		</q>
				
	</section>
</div>

<hr class="postpage-body--separator">

<section class="postpage-body--related">
	<h2 class="related-title">
		Assuntos Relacionados
	</h2>
	<div class="tags">
		<span class="tag">Entrevistas</span>
		<span class="tag">8º olhar de cinema</span>
		<span class="tag">8º olhar de cinema</span>
		<span class="tag">Cinema</span>
		<span class="tag">Filme</span>
	</div>

</section>

<section class="postpage-body--contact content">

	<h2 class="content-title">Entre em contato</h2>

	<div class="contact-author">

		<img src="https://randomuser.me/api/portraits/men/12.jpg" alt="">
		<div class="contact-author--info">
			<h3>
	 			nome do USUARIO FALTA AQUI ---------
				<?php nameUser(); ?>
			</h3>
			<span>
				<svg class="icon icon-envelope">
					<use xlink:href="#icon-envelope"></use>
				</svg>
				adriano@cinefestivais.com.br
			</span>
			<span>
				<svg class="icon icon-facebook">
					<use xlink:href="#icon-facebook"></use>
				</svg>
				/adrianogarrett
			</span>
		</div>

	</div>

	<div class="contact-author">

		<img src="https://randomuser.me/api/portraits/women/28.jpg" alt="">
		<div class="contact-author--info">
			<h3>Gabriela Oliveira</h3>
			<span>
				<svg class="icon icon-envelope">
					<use xlink:href="#icon-envelope"></use>
				</svg>
				gabriela@cinefestivais.com.br
			</span>
			<span>
				<svg class="icon icon-facebook">
					<use xlink:href="#icon-facebook"></use>
				</svg>
				/gabrielaoliveiraa
			</span>
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

		}
	}
	get_footer(); 
?>