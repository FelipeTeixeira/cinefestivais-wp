<nav id="js-progressbar-header" class="progress">

    <div id="js-progressbar" class="progress-bar"></div>

    <img src="<?= $url ?>/assets/img/icone-cine-festivais.svg" alt="Icone Cine Festivais" class="progress-logo">

    <strong class="progress-title">
        <?= wp_trim_words(get_the_title(), 12); ?>
    </strong>

    <button class="progress-btnOptions">
        <svg id="js-showMenu" class="icon icon-dots" onClick="showMenuOptions()">
            <use xlink:href="#icon-dots"></use>
        </svg>
        <svg id="js-closeMenu" class="icon icon-close is-hidden" onClick="hideMenuOptions()">
            <use xlink:href="#icon-close"></use>
        </svg>
    </button>
</nav>
