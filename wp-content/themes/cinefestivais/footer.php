<?php 
    // LINKS PAGES
    $menu_anuncie		= esc_url( home_url( '/' ) )."anuncie";
    $menu_autor			= esc_url( home_url( '/' ) )."autor";
    $menu_contato		= esc_url( home_url( '/' ) )."contato";
    $menu_quem_somos	= esc_url( home_url( '/' ) )."quem-somos";
	$menu_coberturas	= esc_url( home_url( '/' ) )."coberturas";
	$menu_entrevistas	= esc_url( home_url( '/' ) )."category/entrevistas";
	$menu_criticas		= esc_url( home_url( '/' ) )."category/criticas";
	$menu_noticias		= esc_url( home_url( '/' ) )."category/noticias";
	$menu_reportagens	= esc_url( home_url( '/' ) )."category/reportagens";
	$menu_podcasts		= esc_url( home_url( '/' ) )."category/podcasts";
    $url = get_template_directory_uri(); 
?>
</main>
<footer class="footer">

    <img src="https://i.imgur.com/sGFajGu.png" alt="" class="footer-picture">

    <nav class="footer-links">

        <div class="footer-links__link">
            <a href="<?= $menu_quem_somos ?>">Quem somos</a>
            <a href="<?= $menu_autor ?>">Anuncie</a>
            <a href="<?= $menu_contato ?>">Contato</a>
        </div>

        <div class="footer-links__link">
            <a href="<?= $menu_entrevistas ?>">Entrevistas</a>
            <a href="<?= $menu_criticas ?>">Críticas</a>
            <a href="<?= $menu_coberturas ?>">Coberturas</a>
            <a href="<?= $menu_noticias ?>">Notícias</a>
            <a href="<?= $menu_reportagens ?>">Reportagens</a>
            <a href="<?= $menu_podcasts ?>">Podcasts</a>
        </div>

    </nav>
    <nav class="footer-social">
        <a href="">
            <svg class="icon icon-facebook">
                <use xlink:href="#icon-facebook"></use>
            </svg>
        </a>
        <a href="">
            <svg class="icon icon-instagram">
                <use xlink:href="#icon-instagram"></use>
            </svg>
        </a>
        <a href="">
            <svg class="icon icon-twitter">
                <use xlink:href="#icon-twitter"></use>
            </svg>
        </a>
        <a href="">
            <svg class="icon icon-youtube">
                <use xlink:href="#icon-youtube"></use>
            </svg>
        </a>
    </nav>
    <p class="footer-copyright">
        © 
        <?php echo currentYear(); ?> Cine festivais <br>
        Todos os direitos reservados
    </p>
    <div class="footer-logo">
        <img src="<?= $url ?>/assets/img/logo-instinto.png" alt="Logo Instinto">
    </div>
</footer>

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/min/tiny-slider.js"></script>
<script src="<?= $url ?>/assets/js/app.js"></script>
</body>

</html>