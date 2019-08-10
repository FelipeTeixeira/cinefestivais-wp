<?php 
	include 'head.php';
	include 'svg.php';
?>

<?php 
	include 'progressReader.php';
?>

<nav class="navbar">
	<button class="navbar-btn" onclick="toggleMenu()">
		<svg class="icon icon-menu">
			<use xlink:href="#icon-menu"></use>
		</svg>
	</button>

	<a href="/">
		<img src="assets/img/logo-cine-festivais.svg" alt="Logo Cine Festivais" id="js-navbar-logo" class="navbar-logo">
	</a>
	<button class="navbar-btn">
		<svg class="icon icon-search1">
			<use xlink:href="#icon-search1"></use>
		</svg>
	</button>

	<div class="navbar-menu" id="js-navbar-menu">
		<button class="navbar-btn navbar-menu-btnToggle" onclick="toggleMenu()">
			<svg class="icon icon-menu">
				<use xlink:href="#icon-menu"></use>
			</svg>
		</button>
		

		<ul class="navbar-links">
			<li><a href="entrevistas.php" class="navbar-menu-item">Entrevistas</a></li>
			<li><a href="" class="navbar-menu-item">Críticas</a></li>
			<li><a href="coberturas.php" class="navbar-menu-item">Coberturas</a></li>
			<li><a href="" class="navbar-menu-item">Notícias</a></li>
			<li><a href="" class="navbar-menu-item">Reportagens</a></li>
			<li><a href="" class="navbar-menu-item">Podcasts</a></li>
			<li><a href="quem-somos.php" class="navbar-menu-item teste">Quem Somos</a></li>
			<li><a href="anuncie.php" class="navbar-menu-item teste">Anuncie</a></li>
			<li><a href="contato.php" class="navbar-menu-item teste">Contato</a></li>
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

</nav>