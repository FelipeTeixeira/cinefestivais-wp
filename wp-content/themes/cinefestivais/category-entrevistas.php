<?php require_once('header.php'); ?>

<header class="post-header full bg-img bg-entrevistas">
	<div class="post-header-container">
		<h1 class="post-header--title">Entrevistas</h1>
	</div>
</header>

<section class="content coberturas-container">
	<?php
		$ignoreCategory = 'entrevistas';
		include get_template_directory().'/templates/list-card.php';
	?>
</section>

<?php
	require_once('footer.php');
?>