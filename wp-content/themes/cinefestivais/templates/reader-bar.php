<nav id="js-progressbar-header" class="progress">
    <div class="progress-container">
        <div id="js-progressbar" class="progress-bar"></div>

        <img src="<?= $url ?>/assets/img/icone-cine-festivais.svg" alt="Icone Cine Festivais" class="progress-logo">

        <strong class="progress-title">
            <?php the_title(); ?>
        </strong>


        <div class="socialShared-list-desktop">
            <?php 
                include get_template_directory().'/templates/single/socialShared.php';
            ?>
        </div>

        <button class="progress-btnOptions">
            <svg id="js-showMenu" class="icon icon-dots" onClick="showMenuOptions()">
                <use xlink:href="#icon-dots"></use>
            </svg>
            <svg id="js-closeMenu" class="icon icon-close is-hidden" onClick="hideMenuOptions()">
                <use xlink:href="#icon-close"></use>
            </svg>
        </button>
    </div>

    <div class="progress-socialShared" id="js-progress-socialShared">
        <ul class="socialShared-list">
            <li>
                <button type="button" class="progress-socialShared-item" onClick="goToComments()">
                    <svg class="icon">
                        <use xlink:href="#icon-bubble"></use>
                    </svg>
                    <span class="progress-socialShared-item-text">
                        COMENTÁRIOS
                    </span>
                </button>
            </li>

            <li class="socialShared-divisor">
                <button type="button" class="progress-socialShared-item" onClick="shareMobile()">
                    <svg class="icon">
                        <use xlink:href="#icon-share-alt"></use>
                    </svg>
                    <span class="progress-socialShared-item-text">
                        COMPARTILHE
                    </span>
                </button>
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

    var shareButton = document.querySelector('.share-button');    
    function shareMobile() {
        if (navigator.share) {
            navigator.share({
                    title: document.title,
                    url: document.querySelector('link[rel=canonical]').href
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(console.error);
        }
    }
</script>