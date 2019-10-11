<?php
global $pageClass;
$pageClass = "whoWeArePg";
get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		?>

		<header class="post-header full bg-img bg-quemsomos">
		</header>

		<article class="content">
			<section class="content-card">
				<h1 class="content-card--title">
					Quem somos
				</h1>
				<article class="content-container content-card-text">
					<?php the_content(); ?>
				</article>

				<?php
					$user_email = "adriano@cinefestivais.com.br";
				?>

				<section class="content-author">
					<h2 class="content-title">
						Idealizador e editor
					</h2>

					<div class="contact-author">
						<img src="<?= $url ?>/assets/img/adriano-garrett.jpg" alt="Adriano Garrett">	
						
						<div class="contact-author--info">
							<h3>
								<a href="<?= esc_url( home_url( '/' ) )."author/agarrett1105" ?>">
									Adriano Garrett
								</a>
							</h3>
							
							<a href="mailto:<?= $user_email ?>?Subject=Cinefestivais" target="_top">
								<svg class="icon icon-envelope">
									<use xlink:href="#icon-envelope"></use>
								</svg>
								<?= $user_email ?>
							</a>

							<?php
								$facebook = "adrianogarrett";
							?>
							<?php if ($facebook) : ?>
								<a href="https://www.facebook.com/<?= $facebook ?>" target="_blank">
									<svg class="icon icon-facebook">
										<use xlink:href="#icon-facebook"></use>
									</svg>
									/<?= $facebook ?>
								</a>
							<?php endif; ?>

							<?php if ($twitter) : ?>
								<a href="https://www.twitter.com/<?= $twitter ?>" target="_blank">
									<svg class="icon icon-twitter">
										<use xlink:href="#icon-twitter"></use>
									</svg>
									@<?= $twitter ?>
								</a>
							<?php endif; ?>
						</div>

					</div>
				</section>
			</section>
		</article>

<?php
		include 'templates/newsletter.php';
	}
}
wp_reset_postdata();
get_footer(); 
?>