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
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this,
                args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    // HOME
    var scrollLocation = debounce(function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        var progressbar = document.getElementById('js-progressbar');

        if (scrollTop >= 50) {
            progressbar.classList.add('is-active');
        } else {
            progressbar.classList.remove('is-active');
        }
    }, 100);

    window.addEventListener('scroll', scrollLocation);

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

    window.onscroll = () => {
        _toggleLogo();
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