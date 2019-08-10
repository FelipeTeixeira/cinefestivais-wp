<?php wp_footer(); ?>
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
        <img src="https://i.imgur.com/dEZ0sdV.png" alt="">
    </div>
</footer>

<!-- JSfiles -->
<!-- FALTA ISSO -->
<script>
    _toggleLogo = () => {
        const imgNavbar = document.getElementById('js-navbar-logo');

        if (window.pageYOffset > 100) {
            imgNavbar.src = './assets/img/icone-cine-festivais.svg';
            imgNavbar.classList.add('scroll');
        } else {
            imgNavbar.src = './assets/img/logo-cine-festivais.svg';
            imgNavbar.classList.remove('scroll');
        }
    }

    toggleMenu = () => document.getElementById('js-navbar-menu').classList.toggle('navbar-menu-is-active');

    _showProgressBar = () => {
        const postHeaderHeight = document.getElementById('js-postheader').offsetHeight;
        const progressBar = document.getElementById('js-progressbar');
        const post = document.getElementById('js-postpage');

        window.pageYOffset > postHeaderHeight - 200 ? progressBar.classList.add('progress-container-is-active') : progressBar.classList.remove('progress-container-is-active');

        const winScroll = (document.body.scrollTop || document.documentElement.scrollTop) - postHeaderHeight;
        const height = post.clientHeight - postHeaderHeight;
        const scrolled = (winScroll / height) * 100;

        document.getElementById('myBar').style.width = `${scrolled}%`;
    }

    showMenuOptions = () => {
        document.getElementById('js-showMenu').classList.add('is-hidden');
        document.getElementById('js-closeMenu').classList.remove('is-hidden');
        document.getElementById('js-shareOptions').classList.remove('is-hidden');
    }

    hideMenuOptions = () => {
        document.getElementById('js-showMenu').classList.remove('is-hidden');
        document.getElementById('js-closeMenu').classList.add('is-hidden');
        document.getElementById('js-shareOptions').classList.add('is-hidden');
    }

    window.onscroll = () => {
        _toggleLogo();
        _showProgressBar();
    };
</script>
</body>

</html>