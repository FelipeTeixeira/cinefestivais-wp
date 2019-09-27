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
    document.querySelector('body').classList.toggle('p-overflow-hidden');
    // $screen-monitor-min: 1200
    if (window.innerWidth <= 1200) {
        document.getElementById('js-navbar-menu').classList.toggle('navbar-menu-is-active');
    } else {
        document.getElementById('js-navbar-lg').classList.toggle('navbar-menu-lg-is-active');
        document.getElementById('btn-toggle').classList.toggle('is-active');

        if (document.getElementById('btn-toggle').classList.contains('is-active')) {
            document.getElementById('js-navbar').classList.add('is-active');
        } else {
            document.getElementById('js-navbar').classList.remove('is-active');
        }
    }
};

function closeMenu() {
    document.getElementById('js-navbar-menu').classList.remove('navbar-menu-is-active');
    document.getElementById('js-navbar-lg').classList.remove('navbar-menu-lg-is-active');
    document.getElementById('btn-toggle').classList.remove('is-active');
}

function toggleSearch() {
    document.getElementById('js-searchBar').classList.toggle('search-bar-is-active');
    document.getElementById('btn-toggleSearch').classList.toggle('is-active-search');

    document.getElementById('js-navbar').classList.add('is-active');

    closeMenu();
};

function closeSearch() {
    document.getElementById('js-searchBar').classList.remove('search-bar-is-active');
    document.getElementById('btn-toggleSearch').classList.remove('is-active-search');
}

function goToComments() {
    var commentsPos = document.getElementById('js-disqusContainer').offsetTop;
    window.scrollTo({ top: commentsPos - 104 - 32, behavior: 'smooth' });
};

window.onscroll = function (event) {
    progressbar();

    _toggleLogo();

    scrollLocation();
};

function openDisqus() {
    document.getElementById('js-disqusContainer').classList.toggle('is-active');
}

document.addEventListener('click', function (event) {
    var isSearchBarOpen = document.getElementById('js-searchBar').classList.contains('search-bar-is-active');

    if (isSearchBarOpen) {
        var isSearchBar = document.getElementById('js-searchBar').contains(event.target);
        var isSearchButton = document.getElementById('btn-toggleSearch').contains(event.target);

        document.getElementById('input-search').focus();

        if (!isSearchBar && !isSearchButton) {
            closeSearch();
            document.getElementById('js-navbar').classList.remove('is-active');
        }
    }
});


// HOME COL NOTICES
if (document.querySelector('.newsPg')) {
    var htmlNotices = '';

    document.querySelectorAll(".newsPg .noticesSmallContainer").forEach(item => {
        htmlNotices += item.innerHTML;
    })


    if (!NodeList.prototype.forEach && Array.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
    }

    document.querySelectorAll(".newsPg .noticesSmallContainer").forEach(e => e.parentNode.removeChild(e));
    var new_html = "<ul class='js-noticesCol'>" + htmlNotices + "</ul>";
    document.querySelector('.list-2').insertAdjacentHTML('afterend', new_html);
}
