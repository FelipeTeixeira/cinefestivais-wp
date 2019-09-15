<nav id="js-progressbar-header" class="progress">

    <div id="js-progressbar" class="progress-bar"></div>

    <img src="<?= $url ?>/assets/img/icone-cine-festivais.svg" alt="Icone Cine Festivais" class="progress-logo">

    <strong class="progress-title">
        <?php the_title(); ?>
    </strong>

    <button class="progress-btnOptions">
        <svg id="js-showMenu" class="icon icon-dots" onClick="showMenuOptions()">
            <use xlink:href="#icon-dots"></use>
        </svg>
        <svg id="js-closeMenu" class="icon icon-close is-hidden" onClick="hideMenuOptions()">
            <use xlink:href="#icon-close"></use>
        </svg>
    </button>

    <div class="progress-socialShared" id="js-progress-socialShared">
        <ul class="progress-socialShared-list">
            <li>
                <span class="progress-socialShared-item" onClick="goToComments()">
                    <svg class="icon">
                        <use xlink:href="#icon-bubble"></use>
                    </svg>
                    <span class="progress-socialShared-item-text">
                        COMENTÁRIOS
                    </span>
                </span>
            </li>

            <li class="socialShared-divisor">
                <span class="progress-socialShared-item">
                    <svg class="icon">
                        <use xlink:href="#icon-share-alt"></use>
                    </svg>
                    <span class="progress-socialShared-item-text">
                        COMPARTILHE
                    </span>
                </span>
            </li>
        </ul>
    </div>
</nav>


<script>
    function showMenuOptions() {
        document.getElementById('js-progress-socialShared').classList.add('is-active');
        document.getElementById('js-showMenu').classList.add('is-hidden');
        document.getElementById('js-closeMenu').classList.remove('is-hidden');
    };
    
    function hideMenuOptions() {
        document.getElementById('js-progress-socialShared').classList.remove('is-active');
        document.getElementById('js-closeMenu').classList.add('is-hidden');
        document.getElementById('js-showMenu').classList.remove('is-hidden');
    };
</script>