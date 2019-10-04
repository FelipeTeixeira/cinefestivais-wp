<?php
    global $pageClass;
    $pageClass = "searchPg";
    get_header();

    if (have_posts()) :
?>

    <section class="content">
        <h1 class="content-title">
            BUSCA
        </h1>

        <h2 class="searchPg-result">
            "<?php echo get_search_query(); ?>"
        </h2>
        
        <strong class="searchPg-total">
            <?php 
                global $wp_query;
                $total_results = $wp_query->found_posts;

                echo $total_results;
              ?>
              RESULTADOS
        </strong>

        <?php
            $isIgnoreCategorySpecif = true;
		    include get_template_directory().'/templates/list-card.php';
	    ?>    

    </section>

        
<?php
    else :
        // TEMPLATE ERROR
        require_once('templates/error.php');

    endif;

    get_footer(); 
?>
