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
        <img src="https://i.imgur.com/dEZ0sdV.png" alt="">
    </div>
</footer>

<?php wp_footer(); ?>

<!-- JSfiles -->
<!-- FALTA ISSO -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/min/tiny-slider.js"></script>
<script>
    _toggleLogo = () => {
        const imgNavbar = document.querySelector('.js-navbar-logo');

        if (window.pageYOffset > 100) {
            imgNavbar.classList.add('is-active');
        } else {
            imgNavbar.classList.remove('is-active');
        }
    }

    toggleMenu = () => {
        if (window.innerWidth <= 768) {
            document.getElementById('js-navbar-menu').classList.toggle('navbar-menu-is-active')
        } else {
            document.getElementById('js-navbar-lg').classList.toggle('navbar-menu-lg-is-active')
            document.getElementById('btn-toggle').classList.toggle('is-active');
        }
    };

    toggleSearch = () => {
        document.getElementById('js-searchBar').classList.toggle('search-bar-is-active');
        document.getElementById('btn-toggleSearch').classList.toggle('is-active-search');
    }

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

    var slider = tns({
        container: '.carousel',
        loop: true,
        items: 1,
        slideBy: 'page',
        nav: false,
        autoplay: true,
        speed: 400,
        autoplayButtonOutput: false,
        mouseDrag: true,
        lazyload: true,
        controlsContainer: "#customize-controls"    
    });
</script>
</body>

</html>