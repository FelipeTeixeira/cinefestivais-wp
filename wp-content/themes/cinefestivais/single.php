<?php
$css_escolhido = 'single';
require_once('header.php');
?>

<main class="align-top">
	
	<article>

		<?php if( have_posts() ) {
			while( have_posts() ) {
				the_post(); ?>

		<div class="single-imovel-thumbnail">
			<?php the_post_thumbnail(); ?>

		</div>

		<div class="container">
			<section class="chamada-principal">
				<h1><?php the_title(); ?></h1>
			</section>

			<section class="single-imovel-geral">
				
				<div class="single-imovel-descricao">
					<?php the_content(); ?>
				</div>

				<?php	$imoveis_meta_data = get_post_meta( $post->ID ); ?>
				 


			</section>

			<span class="single-imovel-data">
			 <?php the_date(); ?>
			</span>


		</div>
		
		<?php }
		} ?>

	</article>

</main>



<?php get_footer(); ?>