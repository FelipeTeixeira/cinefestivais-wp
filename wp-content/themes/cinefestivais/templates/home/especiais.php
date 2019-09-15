<?php 
    $argsEspeciais = array( 'category_name' => 'especiais', 'posts_per_page' => 6);
    query_posts($argsEspeciais);

    $page_especiais	= esc_url( home_url( '/' ) )."especiais";
?>  

<section class="content">
    <h2 class="content-title">
        Especiais
    </h2>

    <?php
		$ignoreCategory = 'especiais';
		include get_template_directory().'/templates/list-card.php';
    ?>    
    
    <a href="<?= $page_especiais ?>" class="btn btn-primary btn-centerPage p-margin-bottom-32">
        Ver Todas
    </a>
    
</section>