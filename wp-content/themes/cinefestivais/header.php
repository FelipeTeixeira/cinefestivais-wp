<?php
    // Compressor HTML
    ob_start();

    $pageClass         = (!isset($pageClass )) ? '' : $pageClass ;
    $body           = (!isset($body)) ? '' : $body;
    $header         = (!isset($header)) ? '' : $header;
    $current_user   = wp_get_current_user();

    // LINKS PAGES
    $menu_anuncie		= esc_url( home_url( '/' ) )."anuncie";
    $menu_autor			= esc_url( home_url( '/' ) )."autor";
    $menu_contato		= esc_url( home_url( '/' ) )."contato";
    $menu_quem_somos	= esc_url( home_url( '/' ) )."quem-somos";
	$menu_coberturas	= esc_url( home_url( '/' ) )."coberturas";
	$menu_entrevistas	= esc_url( home_url( '/' ) )."category/entrevistas";
	$menu_criticas		= esc_url( home_url( '/' ) )."category/criticas";
	$menu_noticias		= esc_url( home_url( '/' ) )."category/noticias";
	$menu_reportagens	= esc_url( home_url( '/' ) )."category/reportagens";
	$menu_podcasts		= esc_url( home_url( '/' ) )."category/podcasts";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
	<meta charset="UTF-8">
	<?php $url = get_template_directory_uri(); ?>
	<title>
		<?php get_title(); ?>
	</title>

	<link rel="stylesheet" href="<?= $url; ?>/assets/css/style.css?v=5">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.11/tiny-slider.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,700,900|Noto+Serif:400,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->	
</head>
<body class="<?= $pageClass ?>">
<?php 
	include 'templates/svg.php'; 
?>

<nav id="js-searchBar" class="search-bar">
    <input type="text" placeholder="O que você procura?" class="searchbar-input">
</nav>
<nav class="navbar">
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
		<img src="<?= $url ?>/assets/img/logo-cine-festivais.svg" alt="Logo Cine Festivais" width="90" class="navbar-logo-logo">
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

    <div class="navbar-menu" id="js-navbar-menu">
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
                <a href="" class="navbar-menu-social">
                    <svg class="icon icon-facebook">
                        <use xlink:href="#icon-facebook"></use>
                    </svg>
                </a>
                <a href="" class="navbar-menu-social">
                    <svg class="icon icon-instagram">
                        <use xlink:href="#icon-instagram"></use>
                    </svg>
                </a>
                <a href="" class="navbar-menu-social">
                    <svg class="icon icon-twitter">
                        <use xlink:href="#icon-twitter"></use>
                    </svg>
                </a>
                <a href="" class="navbar-menu-social">
                    <svg class="icon icon-youtube">
                        <use xlink:href="#icon-youtube"></use>
                    </svg>
                </a>
            </li>
        </ul>

    </div>

    <div class="navbar-menu-lg" id="js-navbar-lg">
        <div class="menu-lg--links">
            <a href="<?= $menu_quem_somos ?>" class="navbar-menu-item">Quem Somos</a>
            <a href="<?= $menu_anuncie ?>" class="navbar-menu-item">Anuncie</a>
            <a href="<?= $menu_contato ?>" class="navbar-menu-item">Contato</a>
        </div>
        <div class="menu-lg--links">
            <a href="" class="navbar-menu-social">
                <svg class="icon icon-facebook">
                    <use xlink:href="#icon-facebook"></use>
                </svg>
            </a>
            <a href="" class="navbar-menu-social">
                <svg class="icon icon-instagram">
                    <use xlink:href="#icon-instagram"></use>
                </svg>
            </a>
            <a href="" class="navbar-menu-social">
                <svg class="icon icon-twitter">
                    <use xlink:href="#icon-twitter"></use>
                </svg>
            </a>
            <a href="" class="navbar-menu-social">
                <svg class="icon icon-youtube">
                    <use xlink:href="#icon-youtube"></use>
                </svg>
            </a>
        </div>
    </div>

</nav>

<main>