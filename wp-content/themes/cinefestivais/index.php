<?php
    get_header();
    include 'templates/home/slider.php';
    include 'templates/home/destaques.php';
    include 'templates/home/area-nobre.php';
    include 'templates/home/noticias.php';
    include 'templates/newsletter.php';
    include 'templates/coberturas.php';    
    include 'templates/home/especiais.php';

    wp_reset_postdata();    
    get_footer(); 
?>