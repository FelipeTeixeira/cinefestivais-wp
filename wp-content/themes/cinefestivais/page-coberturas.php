<?php
	global $pageClass;
	$pageClass = "coberturasPg";
	get_header();
?>

	<header class="post-header full bg-img bg-cobertura">
		<div class="post-header-container">
			<h1 class="post-header--title">Coberturas</h1>
		</div>
	</header>
	<h2 class="header-banner">Cidadão Kane, Orson Welles, 1941</h2>

	<section class="content">
		<?php
			include get_template_directory().'/templates/list-coberturas.php';
		?>
	</section>

<?php
	include 'templates/newsletter.php';
	get_footer(); 
?>