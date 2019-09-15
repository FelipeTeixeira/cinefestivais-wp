"use strict";

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;

        var later = function later() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };

        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

function progressbar() {
    var pageHeight = window.innerHeight;
    var container = document.getElementById('js-progressbar-container');

    if (container) {
        var adjustedHeight = container.clientHeight - pageHeight;
        var progress = window.pageYOffset / adjustedHeight * 100;
        document.querySelector('#js-progressbar').style.width = progress + "%";
    }
} 

// HOME
var scrollLocation = debounce(function () {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
    var progressbar = document.getElementById('js-progressbar-header');

    if (progressbar) {
        if (scrollTop >= 50) {
            progressbar.classList.add('is-active');
        } else {
            document.getElementById('js-progress-socialShared').classList.remove('is-active');
            document.getElementById('js-closeMenu').classList.add('is-hidden');
            document.getElementById('js-showMenu').classList.remove('is-hidden');
            progressbar.classList.remove('is-active');
        }
    }
}, 100);

function _toggleLogo() {
    var imgNavbar = document.querySelector('.js-navbar-logo');

    if (window.pageYOffset > 100) {
        imgNavbar.classList.add('is-active');
    } else {
        imgNavbar.classList.remove('is-active');
    }
};

function toggleMenu() {
    if (window.innerWidth <= 768) {
        document.getElementById('js-navbar-menu').classList.toggle('navbar-menu-is-active');
    } else {
        document.getElementById('js-navbar-lg').classList.toggle('navbar-menu-lg-is-active');
        document.getElementById('btn-toggle').classList.toggle('is-active');
    }
};

function toggleSearch() {
    document.getElementById('js-searchBar').classList.toggle('search-bar-is-active');
    document.getElementById('btn-toggleSearch').classList.toggle('is-active-search');
};

function goToComments() {
    var commentsPos = document.getElementById('js-singlePg-btnComments').offsetTop;
    window.scrollTo({top: commentsPos - 200, behavior: 'smooth'});
};

if (document.querySelector('.carousel')) {
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
}

window.onscroll = function (event) {
    progressbar();

    _toggleLogo();

    scrollLocation();
};

function openDisqus() {    
    document.getElementById('js-disqusContainer').classList.toggle('is-active');
}