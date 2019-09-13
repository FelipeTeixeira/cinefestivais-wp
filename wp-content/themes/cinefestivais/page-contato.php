<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>

        <header class="post-header full bg-img bg-contato"></header>

        <article class="content">
            <section class="content-card">
                <h1 class="content-card--title">
                    Contato
                </h1>

                <?php echo do_shortcode('[contact-form-7 id="219" title="Formulário de Contato"]'); ?>
            </section>
        </article>

<?php
        include 'templates/newsletter.php';
    }
}
get_footer();
?>