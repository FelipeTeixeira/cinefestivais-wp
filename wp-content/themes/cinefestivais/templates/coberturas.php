<?php
    $page_coberturas	= esc_url( home_url( '/' ) )."coberturas";
?>
<section class="content coberturas-container">

    <?php
        include get_template_directory().'/templates/list-coberturas.php';
    ?>

    <a href="<?= $page_coberturas ?>" class="btn btn-primary btn-centerPage">
        Ver Todas
    </a>

</section>
