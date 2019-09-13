<?php 
    $argsDestaques = array( 'category_name' => 'destaques', 'posts_per_page' => 6);
    query_posts($argsDestaques);
?>  

<section class="content">
    <h2 class="content-title">
        Destaques
    </h2>

    <?php
		$ignoreCategory = 'destaques';
		include get_template_directory().'/templates/list-card.php';
	?>    
    
</section>