
<nav class="navbar-menu" id="js-navbar-menu">
    <button type="button" class="navbar-btn navbar-menu-btnToggle" onclick="toggleMenu()">
        <svg class="icon icon-menu">
            <use xlink:href="#icon-menu"></use>
        </svg>
    </button>

    <ul class="navbar-links">
        <li><a href="<?= $menu_entrevistas ?>" class="navbar-menu-item">Entrevistas</a></li>
        <li><a href="<?= $menu_criticas ?>" class="navbar-menu-item">Críticas</a></li>
        <li><a href="<?= $menu_coberturas ?>" class="navbar-menu-item">Coberturas</a></li>
        <li><a href="<?= $menu_noticias ?>" class="navbar-menu-item">Notícias</a></li>
        <li><a href="<?= $menu_reportagens ?>" class="navbar-menu-item">Reportagens</a></li>
        <li><a href="<?= $menu_podcasts ?>" class="navbar-menu-item">Podcasts</a></li>
        <li><a href="<?= $menu_quem_somos ?>" class="navbar-menu-item navbar-menu-item-gray">Quem Somos</a></li>
        <li><a href="<?= $menu_anuncie ?>" class="navbar-menu-item navbar-menu-item-gray">Anuncie</a></li>
        <li><a href="<?= $menu_contato ?>" class="navbar-menu-item navbar-menu-item-gray">Contato</a></li>
        <li>
            <a href="https://www.facebook.com/cinefestivais" target="_blank" class="navbar-menu-social">
                <svg class="icon icon-facebook">
                    <use xlink:href="#icon-facebook"></use>
                </svg>
            </a>
            <a href="https://www.instagram.com/cinefestivais/" target="_blank" class="navbar-menu-social">
                <svg class="icon icon-instagram">
                    <use xlink:href="#icon-instagram"></use>
                </svg>
            </a>
            <a href="https://twitter.com/cinefestivais" target="_blank" class="navbar-menu-social">
                <svg class="icon icon-twitter">
                    <use xlink:href="#icon-twitter"></use>
                </svg>
            </a>
            <a href="https://www.youtube.com/channel/UCRW7TglJNAH_2dAuNtbuzGw" target="_blank" class="navbar-menu-social">
                <svg class="icon icon-youtube">
                    <use xlink:href="#icon-youtube"></use>
                </svg>
            </a>
        </li>
    </ul>

</nav>