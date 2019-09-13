<?php
    global $pageClass;
    $pageClass = "searchPg";
    get_header();

    if (have_posts()) :
?>
  
    <section class="content">
        <h1 class="content-title p-margin-bottom-24">
            <?php single_tag_title(); ?>
        </h1>

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
