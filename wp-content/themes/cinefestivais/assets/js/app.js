function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

function scrollProgress() {
    var currentState = document.body.scrollTop || document.documentElement.scrollTop;
    var pageHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrollStatePercentage = (currentState / pageHeight) * 100;
    document.querySelector(".page-scroll-indicator > .progress").style.width = scrollStatePercentage + "%";
}

window.onscroll = function () {
    scrollProgress()
};


// HOME
var scrollLocation = debounce(function () {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
    var progressbar = document.getElementById('js-progressbar-header');

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

window.onscroll = function (event) {
    var pageHeight = window.innerHeight;
    var container = document.getElementById('js-progressbar-container');
    var adjustedHeight = container.clientHeight - pageHeight;
    var progress = ((window.pageYOffset / adjustedHeight) * 100);
    document.querySelector('#js-progressbar').style.width = progress + "%";
}