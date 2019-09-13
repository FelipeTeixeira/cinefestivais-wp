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
                $allsearch = new WP_Query("s=$s&showposts=0"); 
                echo $allsearch ->found_posts;
              ?>
              RESULTADOS
        </strong>

        <?php 
            require_once('templates/list-card.php');
        ?>

    </section>

        
<?php
    else :
        // TEMPLATE ERROR
        require_once('templates/error.php');

    endif;

    get_footer(); 
?>
