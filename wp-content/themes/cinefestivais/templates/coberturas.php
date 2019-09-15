<?php
    $page_coberturas	= esc_url( home_url( '/' ) )."coberturas";
?>
<section class="content content-bg">

    <h2 class="content-title">
        Coberturas
    </h2>

    <?php
        include get_template_directory().'/templates/list-coberturas.php';
    ?>

    <a href="<?= $page_coberturas ?>" class="btn btn-primary btn-centerPage p-margin-bottom-32 p-margin-top-32">
        Ver Todas
    </a>

</section>
