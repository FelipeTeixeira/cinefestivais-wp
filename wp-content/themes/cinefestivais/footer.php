<?php $url = get_template_directory_uri(); ?>
</main>
<footer class="footer">

    <img src="https://i.imgur.com/sGFajGu.png" alt="" class="footer-picture">

    <nav class="footer-links">

        <div class="footer-links__link">
            <a href="#">Quem somos</a>
            <a href="#">Anuncie</a>
            <a href="#">Contato</a>
        </div>

        <div class="footer-links__link">
            <a href="#">Entrevistas</a>
            <a href="#">Críticas</a>
            <a href="#">Coberturas</a>
            <a href="#">Notícias</a>
            <a href="#">Reportagens</a>
            <a href="#">Podcasts</a>
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
        © 2019 Cine festivais <br>
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