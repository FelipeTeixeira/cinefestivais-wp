<?php
global $pageClass;
$pageClass = "advertisePg";
get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		?>

		<header class="post-header full bg-img bg-anuncie">
		</header>

		<article class="content">
			<section class="content-card">
				<h1 class="content-card--title">
					Anuncie
				</h1>

				<button class="btn btn-purple">
					Ver midia Kit
				</button>

				<article class="content-container content-card-text">
					<?php the_content(); ?>
				</article>

				<form action="" class="form content-container">

					<div class="form-group w45">
						<label for="name" class="form-group--label">Nome</label>
						<input class="form-group--input" type="text" name="name" id="name">
					</div>

					<div class="form-group w45">
						<label for="email" class="form-group--label">E-mail</label>
						<input class="form-group--input" type="email" name="email" id="email">
					</div>

					<div class="form-group">
						<label for="assunto" class="form-group--label">Empresa</label>
						<input class="form-group--input" type="text" name="assunto" id="assunto">
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary btn-small">Quero Anunciar</button>  
					</div>

				</form>
			</section>
		</article>

<?php
		include 'templates/newsletter.php';
	}
}
wp_reset_postdata();
get_footer(); 
?>