<nav id="js-progressbar" class="progress-container">
    <div class="progress-container--content">
        <img src="./assets/img/icone-cine-festivais.svg" alt="">
        <span id="js-pagetitle" class="progress-title">Título da página</span>

        <div class="mobile-options">
            <svg id="js-showMenu" class="icon icon-dots" onClick="showMenuOptions()">
                <use xlink:href="#icon-dots"></use>
            </svg>
            <svg id="js-closeMenu" class="icon icon-close is-hidden" onClick="hideMenuOptions()">
                <use xlink:href="#icon-close"></use>
            </svg>
        </div>

        <div class="progress-options">

            <svg class="icon icon-bubble">
                <use xlink:href="#icon-bubble"></use>
            </svg>

            <span></span>

            <div class="progress-share">

                <div class="share-link">
                    <svg class="icon icon-share-alt">
                        <use xlink:href="#icon-share-alt"></use>
                    </svg>

                    <span>Compartilhe</span>
                </div>

                <div class="progress-share-hover">
                    <svg class="icon icon-facebook">
                        <use xlink:href="#icon-facebook"></use>
                    </svg>
                    <svg class="icon icon-twitter">
                        <use xlink:href="#icon-twitter"></use>
                    </svg>
                    <svg class="icon icon-envelope">
                        <use xlink:href="#icon-envelope"></use>
                    </svg>
                    <svg class="icon icon-link">
                        <use xlink:href="#icon-link"></use>
                    </svg>
                </div>
            </div>

        </div>
    </div>

    <div class="progress-bar" id="myBar"></div>

    <div id="js-shareOptions" class="menu-reader-options is-hidden">

        <div class="reader-option">
            <svg class="icon icon-bubble">
                <use xlink:href="#icon-bubble"></use>
            </svg>
            <span class="text-uppercase">Comentários</span>
        </div>

        <span></span>

        <div class="reader-option">
            <svg class="icon icon-share-alt">
                <use xlink:href="#icon-share-alt"></use>
            </svg>
            <span class="text-uppercase">Compartilhe</span>
        </div>

    </div>
</nav>