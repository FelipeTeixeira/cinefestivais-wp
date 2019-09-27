<?php
global $pageClass;
$pageClass = "contactPg";
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
?>

<?php
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }
 
    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }
?>

        <header class="post-header full bg-img bg-contato"></header>

        <article class="content">
            <section class="content-card">
                <h1 class="content-card--title">
                    Contato
                </h1>

                <article class="content-container content-card-text">
					<?php the_content(); ?>
				</article>

                <?php echo do_shortcode('[contact-form-7 id="219" title="Formulário de Contato"]'); ?>

            </section>
        </article>

<?php
        include 'templates/newsletter.php';
    }
}
get_footer();
?>