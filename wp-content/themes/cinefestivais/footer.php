<?php
global $pageClass;
$pageClass      = (!isset($pageClass)) ? '' : $pageClass;

// LINKS PAGES
$menu_anuncie		= esc_url( home_url( '/' ) )."anuncie";
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

    <img src="<?= $url ?>/assets/img/icone-cine-festivais.svg" alt="Icone Cine Festivais" class="footer-logo">

    <nav class="footer-links">

        <div class="footer-links__link">
            <a href="<?= $menu_quem_somos ?>">Quem somos</a>
            <a href="<?= $menu_anuncie ?>">Anuncie</a>
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
        <a href="https://www.facebook.com/cinefestivais" target="_blank">
            <svg class="icon icon-facebook">
                <use xlink:href="#icon-facebook"></use>
            </svg>
        </a>
        <a href="https://www.instagram.com/cinefestivais/" target="_blank">
            <svg class="icon icon-instagram">
                <use xlink:href="#icon-instagram"></use>
            </svg>
        </a>
        <a href="https://twitter.com/cinefestivais" target="_blank">
            <svg class="icon icon-twitter">
                <use xlink:href="#icon-twitter"></use>
            </svg>
        </a>
        <a href="https://www.youtube.com/channel/UCRW7TglJNAH_2dAuNtbuzGw" target="_blank">
            <svg class="icon icon-youtube">
                <use xlink:href="#icon-youtube"></use>
            </svg>
        </a>
    </nav>
    <p class="footer-copyright">
        ©
        <?php echo currentYear(); ?> Cine festivais - Todos os direitos reservados
    </p>
    <a href="https://instinto.me/" target="_blank" class="footer-logoInstinto">
        <img src="<?= $url ?>/assets/img/logo-instinto.svg" alt="Logo Instinto" width="60">
    </a>
</footer>

<?php
wp_footer();
if ($pageClass === 'homePg') {
    ?>
    <script async src="<?= $url ?>/assets/js/tiny-slider.js"></script>
<?php
}
?>

<script async src="<?= $url ?>/assets/js/app.js"></script>
<script async src="<?= $url ?>/assets/js/header-scroll.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79646896-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-79646896-1');
</script>

</body>

</html>