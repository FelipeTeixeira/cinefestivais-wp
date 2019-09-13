<?php 
    $argsDestaques = array( 'category_name' => 'noticias', 'posts_per_page' => 6);
    query_posts($argsDestaques);
?>  

<section class="content">
    <h2 class="content-title">
        Notícias
    </h2>

    <?php
		$ignoreCategory = 'noticias';
		include get_template_directory().'/templates/list-card.php';
	?>    
    
</section>