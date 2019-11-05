<?php 
    $argsDestaques = array( 'category_name' => 'destaques', 'posts_per_page' => 4 );
    query_posts($argsDestaques);
?>  

<section class="content p-padding-bottom-0">
    <h2 class="content-title">
        Destaques
    </h2>

    <?php
        $ignoreCategory = 'destaques';
        include get_template_directory().'/templates/list-card.php';
        include get_template_directory().'/templates/adverts/ad-home-destaques.php';
	?>    
    
</section>