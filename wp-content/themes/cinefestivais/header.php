<?php
    global $pageClass;
    $pageClass      = (!isset($pageClass)) ? '' : $pageClass;
    global $url;
    $url = get_template_directory_uri();
    $current_user   = wp_get_current_user();

    // LINKS PAGES
    $menu_anuncie		= esc_url( home_url( '/' ) )."anuncie";
    $menu_autor			= esc_url( home_url( '/' ) )."autor";
    $menu_contato		= esc_url( home_url( '/' ) )."contato";
    $menu_quem_somos	= esc_url( home_url( '/' ) )."quem-somos";
    $menu_coberturas	= esc_url( home_url( '/' ) )."coberturas";
    $menu_entrevistas	= esc_url( home_url( '/' ) )."entrevistas";
    $menu_criticas		= esc_url( home_url( '/' ) )."criticas";
    $menu_noticias		= esc_url( home_url( '/' ) )."noticias";
    $menu_reportagens	= esc_url( home_url( '/' ) )."reportagens";
    $menu_podcasts		= esc_url( home_url( '/' ) )."podcasts";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
    <meta charset="UTF-8">
    <title>
        <?php get_title(); ?>
    </title>

    <link rel="stylesheet" href="<?= $url; ?>/assets/css/style.css?v=11">

    <?php
        if ($pageClass === 'homePg') {
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/tiny-slider.css">';
        }

        if ($pageClass === 'singlePg') {
            echo '<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:400,700&display=swap" rel="stylesheet">';
        }
    ?>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700,900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $urlFavicon = $url . '/assets/img/favicon'; ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $urlFavicon; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $urlFavicon; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $urlFavicon; ?>/favicon-16x16.png">
    <link rel="manifest" href="<?= $urlFavicon; ?>/site.webmanifest">
    <link rel="mask-icon" href="<?= $urlFavicon; ?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#be3248">
    <meta name="theme-color" content="#be3248">
</head>
<body class="<?= $pageClass ?>">
    <?php
    include 'templates/svg.php';
    ?>

    <nav id="js-searchBar" class="search-bar">
        <form action="<?php echo esc_url(home_url('/')); ?>" class="search-bar-form" method="GET" accept-charset="utf-8">
            <button onclick="closeSearch()" type="button" class="search-bar-form-btnBack search-bar-form-btn navbar-btn">
                <svg class="icon icon-back">
                    <use xlink:href="#icon-back"></use>
                </svg>
            </button>
            <input type="text" placeholder="O que você procura?" name="s" id="input-search" class="search-bar-form-input" required>
            <button type="submit" class="search-bar-form-btnSubmit search-bar-form-btn navbar-btn">
                <svg class="icon icon-search">
                    <use xlink:href="#icon-search"></use>
                </svg>
            </button>
        </form>
    </nav>   
     
    <header id="js-navbar" class="navbar">
        <div class="navbar-lg">
            <button class="navbar-btn" id="btn-toggle" onclick="toggleMenu()">
                <svg class="icon icon-menu">
                    <use xlink:href="#icon-menu"></use>
                </svg>
            </button>
            <div class="navbar-links-lg">
                <a href="<?= $menu_entrevistas ?>" class="navbar-menu-item">Entrevistas</a>
                <a href="<?= $menu_criticas ?>" class="navbar-menu-item">Críticas</a>
                <a href="<?= $menu_coberturas ?>" class="navbar-menu-item">Coberturas</a>
            </div>
        </div>

        <a href="<?php echo home_url('/'); ?>" class="navbar-logo js-navbar-logo">
            <img src="<?= $url ?>/assets/img/logo-cine-festivais.svg" alt="Logo Cine Festivais" class="navbar-logo-logo">
            <img src="<?= $url ?>/assets/img/icone-cine-festivais.svg" alt="Icone Cine Festivais" width="44" class="navbar-logo-icon">
        </a>

        <div class="navbar-lg">
            <div class="navbar-links-lg">
                <a href="<?= $menu_noticias ?>" class="navbar-menu-item navbar-menu-item-gray">Notícias</a>
                <a href="<?= $menu_reportagens ?>" class="navbar-menu-item navbar-menu-item-gray">Reportagens</a>
                <a href="<?= $menu_podcasts ?>" class="navbar-menu-item navbar-menu-item-gray">Podcasts</a>
            </div>
            <button type="button" class="navbar-btn" id="btn-toggleSearch" onclick="toggleSearch()">
                <svg class="icon icon-search">
                    <use xlink:href="#icon-search"></use>
                </svg>
            </button>
        </div>

        <?php 
            include get_template_directory().'/templates/menu-desktop.php';
        ?>
    </header>
    <?php 
        include get_template_directory().'/templates/menu-mobile.php';
    ?>


    <main>