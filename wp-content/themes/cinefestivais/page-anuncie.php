<?php
global $pageClass;
$pageClass = "advertisePg";
get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();

		if (function_exists('wpcf7_enqueue_scripts')) {
			wpcf7_enqueue_scripts();
		}

		if (function_exists('wpcf7_enqueue_styles')) {
			wpcf7_enqueue_styles();
		}

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

				<?php echo do_shortcode('[contact-form-7 id="303" title="Formulário de Anúncio"]'); ?>

			</section>

			<img src="<?= $url ?>/assets/img/numeros-cinematograficos-mobile.jpg" alt="Números Cinematográficos" class="is-mobile advertisePg-img">
			<img src="<?= $url ?>/assets/img/numeros-cinematograficos-desktop.jpg" alt="Números Cinematográficos" class="is-tablet advertisePg-img">
		</article>

<?php
		include 'templates/newsletter.php';
	}
}
wp_reset_postdata();
get_footer();
?>